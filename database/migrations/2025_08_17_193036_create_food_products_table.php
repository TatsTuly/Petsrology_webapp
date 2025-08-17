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
        Schema::create('food_products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('brand');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->decimal('old_price', 10, 2)->nullable();
            $table->string('pet_type'); // dog, cat, bird, rabbit, fish, etc.
            $table->string('age_group'); // puppy, adult, senior
            $table->string('food_type'); // dry, wet, treats, raw
            $table->string('weight'); // 2kg, 400g, etc.
            $table->string('image')->nullable();
            $table->string('badge')->nullable(); // Popular, New, Premium, etc.
            $table->decimal('rating', 2, 1)->default(4.5);
            $table->integer('stock_quantity')->default(100);
            $table->boolean('is_active')->default(true);
            $table->json('features')->nullable(); // High Protein, Natural, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_products');
    }
};
