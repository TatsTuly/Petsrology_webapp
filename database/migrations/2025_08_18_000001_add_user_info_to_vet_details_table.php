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
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->string('user_email')->after('user_id');
            $table->index(['user_id', 'user_email']);
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
            $table->dropIndex(['user_id', 'user_email']);
            $table->dropColumn(['user_id', 'user_email']);
        });
    }
};
