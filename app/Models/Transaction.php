<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'user_id',
        'order_id',
        'transaction_id',
        'paid_amount',
        'balance',
        'payment_method',
        'tansaction_amount',
        'transaction_remaining',
        'transaction_date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
