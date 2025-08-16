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
        Schema::table('vet_details', function (Blueprint $table) {
            $table->time('visit_start_time')->nullable();
            $table->time('visit_end_time')->nullable();
            $table->json('available_days')->nullable(); // Store available days as JSON array
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vet_details', function (Blueprint $table) {
            $table->dropColumn(['visit_start_time', 'visit_end_time', 'available_days']);
        });
    }
};
