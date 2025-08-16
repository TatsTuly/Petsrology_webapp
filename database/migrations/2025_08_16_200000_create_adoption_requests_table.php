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
        Schema::create('adoption_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('adoption_id'); // adoption_post id
            $table->unsignedBigInteger('user_id');
            $table->string('email');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('phone');
            $table->integer('age');
            $table->string('address');
            $table->string('city');
            $table->string('housingType');
            $table->string('ownRent');
            $table->string('currentPets');
            $table->string('previousPets');
            $table->text('reasonForAdoption');
            $table->text('veterinaryCare');
            $table->string('financialCommitment');
            $table->text('agreements');
            $table->tinyInteger('status')->default(0); // 0=pending, 1=confirmed
            $table->timestamps();

            $table->foreign('adoption_id')->references('id')->on('adoption_posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('app_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adoption_requests');
    }
};
