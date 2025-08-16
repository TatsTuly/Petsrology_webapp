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
        Schema::create('adoption_posts', function (Blueprint $table) {
            $table->id();
            $table->string('category')->default('Others');
            $table->string('title');
            $table->text('description');
            $table->string('pet_name');
            $table->string('breed')->nullable();
            $table->string('weight')->nullable();
            $table->string('location')->nullable();
            $table->string('tags')->nullable();
            $table->text('health_info')->nullable();
            $table->text('special_care')->nullable();
            $table->string('fee')->nullable();
            $table->string('fee_includes')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('active'); // active, closed
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
        Schema::dropIfExists('adoption_posts');
    }
};
