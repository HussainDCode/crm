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

    public function storeOrder(Request $request)
    {
        // Validate the request
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'product_id' => 'required|array|min:1',
            'product_id.*' => 'required|exists:products,id',
            'price' => 'required|array|min:1',
            'price.*' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
        ]);

        try {
            DB::transaction(function () use ($request) {
                // Create Order
                $orders = new Order;
                $orders->name = $request->customer_name;
                $orders->phone = $request->customer_phone;
                $orders->save();

                $order_id = $orders->id;

                // Calculate total transaction amount
                $total_amount = 0;

                // Store Order Details
                for ($product_id = 0; $product_id < count($request->product_id); $product_id++) {
                    $product = Product::findOrFail($request->product_id[$product_id]);

                    $order_details = new Order_Detail;
                    $order_details->order_id = $order_id;
                    $order_details->product_id = $request->product_id[$product_id];
                    $order_details->product_name = $product->product_name;
                    $order_details->quantity = $request->quantity[$product_id];
                    $order_details->unitprice = $request->price[$product_id];
                    $order_details->amount = $request->total_amount[$product_id];
                    $order_details->discount = $request->discount[$product_id] ?? 0;
                    $order_details->save();

                    $total_amount += $request->total_amount[$product_id];
                }

                // Create Transaction
                $paid_amount = floatval($request->paid_amount);
                $balance = $paid_amount - $total_amount;

                $transaction = new Transaction;
                $transaction->user_id = auth()->user()->id;
                $transaction->order_id = $order_id;
                $transaction->paid_amount = $paid_amount;
                $transaction->balance = $balance;
                $transaction->payment_method = $request->payment_method;
                $transaction->tansaction_amount = $total_amount;
                $transaction->transaction_date = now();
                $transaction->save();
            });

            return redirect()->route('orders.order')->with('success-swal', 'Order created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error-swal', 'Error creating order: ' . $e->getMessage());
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
