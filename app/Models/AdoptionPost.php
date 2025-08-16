<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptionPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_name',
        'breed',
        'weight',
        'location',
        'tags',
        'health_info',
        'special_care',
        'fee',
        'fee_includes',
        'gender',
        'description',
        'image',
        'title',
        'status',
        'category',
        'pet_age',
        'character',
    ];
    /**
     * Get the adoption requests for this post.
     */
    public function requests()
    {
        return $this->hasMany(\App\Models\AdoptionRequest::class, 'adoption_id');
    }
}
