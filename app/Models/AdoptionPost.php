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

    /**
     * Get the pet image URL that works on Windows
     */
    public function getImageUrl()
    {
        if (!$this->image) {
            return 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=300&h=300&fit=crop&auto=format';
        }

        // First try the standard Laravel storage URL
        $storageUrl = asset('storage/' . $this->image);
        $storagePath = public_path('storage/' . $this->image);
        
        // If file exists in public/storage, use it
        if (file_exists($storagePath)) {
            return $storageUrl;
        }
        
        // Otherwise, create a custom route or use direct file access
        $directPath = storage_path('app/public/' . $this->image);
        if (file_exists($directPath)) {
            // Copy file to public directory if needed
            $publicPath = public_path('storage/' . $this->image);
            $publicDir = dirname($publicPath);
            
            if (!file_exists($publicDir)) {
                mkdir($publicDir, 0755, true);
            }
            
            copy($directPath, $publicPath);
            return $storageUrl;
        }
        
        return 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=300&h=300&fit=crop&auto=format';
    }
}
