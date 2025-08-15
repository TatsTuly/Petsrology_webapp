<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminLogin;

class AdminLoginSeeder extends Seeder
{
    public function run()
    {
        AdminLogin::insert([
            ['username' => 'admin1', 'password' => 'adminpass1', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'admin2', 'password' => 'adminpass2', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'admin3', 'password' => 'adminpass3', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'admin4', 'password' => 'adminpass4', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'admin5', 'password' => 'adminpass5', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
