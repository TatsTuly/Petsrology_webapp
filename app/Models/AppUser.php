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
        // 'confirmed_password', // Removed - only used for validation, not storage
        'role',
        'registration_time',
        'google_id',
        'avatar',
    ];
}
