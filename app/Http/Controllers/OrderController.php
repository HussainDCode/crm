<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Order_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::paginate(20);
        return view('orders.order', compact('products', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getOrderReceipt($orderId)
    {
        $order = Order::findOrFail($orderId);
        $orderDetails = Order_Detail::where('order_id', $orderId)->get();
        $transaction = Transaction::where('order_id', $orderId)->first();

        return response()->json([
            'order' => $order,
            'orderDetails' => $orderDetails,
            'transaction' => $transaction,
            'user' => auth()->user()->name
        ]);
    }

    public function storeOrder(Request $request)
    {
        // Validate the request
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'product_id' => 'required|array|min:1',
            'product_id.*' => 'required|exists:products,id',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|numeric|min:1',
            'price' => 'required|array|min:1',
            'price.*' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|in:cash,card,debt',
        ]);

        DB::beginTransaction();

        try {


            // Create Order
            $order = new Order;
            $order->name = $request->customer_name;
            $order->phone = $request->customer_phone;
            $order->save();

            // Calculate total transaction amount
            $total_amount = 0;

            // Store Order Details
            foreach ($request->product_id as $index => $product_id) {
                $product = Product::findOrFail($product_id);

                $order_details = new Order_Detail;
                $order_details->order_id = $order->id;
                $order_details->product_id = $product_id;
                $order_details->product_name = $product->product_name;
                $order_details->quantity = $request->quantity[$index];
                $order_details->unitprice = $request->price[$index];

                // Calculate amount with discount
                $discount = $request->discount[$index] ?? 0;
                $amount = ($request->price[$index] * $request->quantity[$index]) * (1 - ($discount / 100));

                $order_details->amount = $amount;
                $order_details->discount = $discount;
                $order_details->save();

                $total_amount += $amount;
            }

            // Create Transaction
            $paid_amount = floatval($request->paid_amount);
            $balance = $paid_amount - $total_amount;

            $transaction = new Transaction;
            $transaction->user_id = auth()->id();
            $transaction->order_id = $order->id;
            $transaction->paid_amount = $paid_amount;
            $transaction->balance = $balance;
            $transaction->payment_method = $request->payment_method;
            $transaction->tansaction_amount = $total_amount;
            $transaction->transaction_date = now();
            $transaction->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order created successfully.',
                'order_id' => $order->id
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error creating order: ' . $e->getMessage(),
                'error_details' => $e->getTraceAsString()
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
