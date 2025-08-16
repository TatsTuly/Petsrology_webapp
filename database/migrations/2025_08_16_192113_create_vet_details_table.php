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
        Schema::create('vet_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('location');
            $table->enum('role', ['general_checkup', 'surgery', 'both']);
            $table->decimal('general_price', 8, 2)->nullable();
            $table->decimal('surgery_price_min', 8, 2)->nullable();
            $table->decimal('surgery_price_max', 8, 2)->nullable();
            $table->integer('experience');
            $table->string('profile_image');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
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
        Schema::dropIfExists('vet_details');
    }
};
