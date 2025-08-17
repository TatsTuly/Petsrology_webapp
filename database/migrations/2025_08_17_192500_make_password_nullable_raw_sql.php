<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Use raw SQL to modify columns to be nullable
        DB::statement('ALTER TABLE app_users MODIFY password VARCHAR(255) NULL');
        DB::statement('ALTER TABLE app_users MODIFY confirmed_password VARCHAR(255) NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revert to NOT NULL
        DB::statement('ALTER TABLE app_users MODIFY password VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE app_users MODIFY confirmed_password VARCHAR(255) NOT NULL');
    }
};
