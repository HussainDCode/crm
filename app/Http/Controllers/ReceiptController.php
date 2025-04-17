<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Order_Detail;

class ReceiptController extends Controller
{
    /**
     * Return the receipt template view
     */
    public function getTemplate()
    {
        return view('reports.receipt-template');
    }

    /**
     * Get order receipt data
     */
    public function getReceiptData($orderId)
    {
        $order = Order::findOrFail($orderId);
        $orderDetails = Order_Detail::where('order_id', $orderId)->get();
        $transaction = Transaction::where('order_id', $orderId)->first();

        if (!$order || !$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Order data not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'order' => $order,
            'orderDetails' => $orderDetails,
            'transaction' => $transaction,
            'user' => auth()->user()->name
        ]);
    }
}
