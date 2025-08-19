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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            
            // Product Information
            $table->unsignedBigInteger('product_id');
            $table->string('product_type'); // 'food' or 'toy'
            $table->string('product_title');
            $table->string('product_brand');
            $table->text('product_description')->nullable();
            $table->string('product_image')->nullable();
            
            // Order Item Details
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            
            $table->timestamps();
            
            // Indexes
            $table->index(['order_id', 'product_id']);
            $table->index('product_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
