<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptionPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'adoption_number',
        'pet_name',
        'pet_age',
        'gender',
        'character',
        'description',
        'image',
        'title',
        'status',
    ];
    /**
     * Get the adoption requests for this post.
     */
    public function requests()
    {
        return $this->hasMany(\App\Models\AdoptionRequest::class, 'adoption_post_id');
    }
}
