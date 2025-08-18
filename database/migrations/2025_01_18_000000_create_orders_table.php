<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            
            // Customer Information
            $table->string('customer_first_name');
            $table->string('customer_last_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            
            // Delivery Address
            $table->text('delivery_address');
            $table->string('delivery_city');
            $table->string('delivery_postal_code');
            
            // Order Details
            $table->decimal('subtotal', 10, 2);
            $table->decimal('delivery_fee', 10, 2)->default(50.00);
            $table->decimal('total_amount', 10, 2);
            
            // Payment Information
            $table->enum('payment_method', ['cash_on_delivery', 'bkash', 'nagad', 'card']);
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->string('payment_reference')->nullable();
            
            // Order Status
            $table->enum('order_status', ['pending', 'confirmed', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
            
            // Additional Fields
            $table->text('notes')->nullable();
            $table->json('cart_data'); // Store the cart items as JSON
            
            $table->timestamps();
            
            // Indexes
            $table->index('order_number');
            $table->index('customer_email');
            $table->index('order_status');
            $table->index('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
