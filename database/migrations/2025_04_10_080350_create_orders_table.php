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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->foreignId('product_id')->constrained()->onDelete('cascade');
            // $table->integer('quantity');
            // $table->decimal('total_price', 10, 2);
            // $table->string('status')->default('pending');
            // $table->string('payment_method')->default('credit_card');
            // $table->string('shipping_address');
            // $table->string('billing_address');
            // $table->string('tracking_number')->nullable();
            // $table->string('shipping_status')->default('not_shipped');
            // $table->string('payment_status')->default('unpaid');
            // $table->string('order_notes')->nullable();
            // $table->string('coupon_code')->nullable();
            // $table->decimal('discount', 10, 2)->default(0);
            // $table->decimal('tax', 10, 2)->default(0);
            // $table->decimal('shipping_cost', 10, 2)->default(0);
            // $table->string('currency')->default('USD');
            // $table->string('ip_address')->nullable();
            // $table->string('user_agent')->nullable();
            // $table->string('payment_gateway')->default('stripe');
            // $table->string('transaction_id')->nullable();
            // $table->string('order_number')->unique();
            // $table->string('order_status')->default('processing');
            // $table->string('shipping_method')->default('standard');
            // $table->string('shipping_company')->nullable();
            // $table->string('shipping_service')->nullable();
            // $table->string('shipping_date')->nullable();
            // $table->string('delivery_date')->nullable();
            // $table->string('return_reason')->nullable();
            // $table->string('return_status')->default('not_returned');
            // $table->string('refund_status')->default('not_refunded');
            // $table->string('refund_amount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
