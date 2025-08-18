<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'brand',
        'description',
        'price',
        'old_price',
        'pet_type',
        'age_group',
        'food_type',
        'weight',
        'image',
        'badge',
        'rating',
        'stock_quantity',
        'is_active',
        'features'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'old_price' => 'decimal:2',
        'rating' => 'decimal:1',
        'stock_quantity' => 'integer',
        'is_active' => 'boolean',
        'features' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByPetType($query, $petType)
    {
        return $query->where('pet_type', $petType);
    }

    public function scopeByAgeGroup($query, $ageGroup)
    {
        return $query->where('age_group', $ageGroup);
    }

    public function scopeByFoodType($query, $foodType)
    {
        return $query->where('food_type', $foodType);
    }

    public function scopeByPriceRange($query, $minPrice, $maxPrice)
    {
        return $query->whereBetween('price', [$minPrice, $maxPrice]);
    }

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function($q) use ($searchTerm) {
            $q->where('title', 'like', "%{$searchTerm}%")
              ->orWhere('brand', 'like', "%{$searchTerm}%")
              ->orWhere('description', 'like', "%{$searchTerm}%");
        });
    }

    /**
     * Get the product image URL that works on Windows
     */
    public function getImageUrl()
    {
        if (!$this->image) {
            return 'https://images.unsplash.com/photo-1589924691995-400dc9ecc119?w=300&h=300&fit=crop&auto=format';
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
        
        return 'https://images.unsplash.com/photo-1589924691995-400dc9ecc119?w=300&h=300&fit=crop&auto=format';
    }
}
