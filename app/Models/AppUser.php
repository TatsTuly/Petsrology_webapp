<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    use HasFactory;

    protected $table = 'app_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'confirmed_password',
        'role',
        'registration_time',
    ];
}
