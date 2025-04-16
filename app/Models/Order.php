<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'address',
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'status',
        'payment_method',
        'shipping_address',
        'billing_address',
        'tracking_number',
        'shipping_status',
        'payment_status',
        'order_notes',
        'coupon_code',
        'discount',
        'tax',
        'shipping_cost',
        'currency',
        'ip_address',
        'user_agent',
        'payment_gateway',
        'transaction_id',
        'order_number',
        'order_status',
        'shipping_method',
        'shipping_company',
        'shipping_service',
        'shipping_date',
        'delivery_date',
        'return_reason',
        'return_status',
        'refund_status',
    ];
}
