<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'description',
        'brand',
        'size',
        'color',
        'weight',
        'price',
        'discount_price',
        'quantity',
        'alert_stock',
        'stock',
        'sku',
        'category',
        'image',
        'status',
        'created_by',
    ];

    public function orderDetails()
    {
        return $this->hasMany(Order_Detail::class, 'product_id');
    }
}
