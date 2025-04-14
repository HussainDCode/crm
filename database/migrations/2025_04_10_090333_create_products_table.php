<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('description')->nullable();
            $table->string('brand')->nullable();
            $table->decimal('size', 10, 2)->nullable();
            $table->string('color')->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('alert_stock')->default('100');
            $table->integer('stock')->default(0);
            $table->string('sku')->unique()->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('active');
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
