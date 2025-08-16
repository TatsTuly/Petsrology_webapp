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
        Schema::table('adoption_posts', function (Blueprint $table) {
            // $table->string('adoption_number')->unique()->after('id'); // removed adoption_number
            $table->integer('pet_age')->after('pet_name');
            $table->string('gender')->after('pet_age');
            $table->string('character')->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adoption_posts', function (Blueprint $table) {
            $table->dropColumn(['pet_age', 'gender', 'character']); // removed adoption_number from dropColumn
        });
    }
};
