<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VetDetails extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'phone',
        'location',
        'role',
        'general_price',
        'surgery_price_min',
        'surgery_price_max',
        'experience',
        'profile_image',
        'status',
        'visit_start_time',
        'visit_end_time',
        'available_days'
    ];
    
    protected $casts = [
        'general_price' => 'decimal:2',
        'surgery_price_min' => 'decimal:2',
        'surgery_price_max' => 'decimal:2',
        'available_days' => 'array',
    ];
}
