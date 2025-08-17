<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToyProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'brand', 'description', 'price', 'old_price', 'pet_type',
        'age_group', 'toy_type', 'size', 'image', 'badge', 'rating',
        'stock_quantity', 'is_active', 'features'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'old_price' => 'decimal:2',
        'rating' => 'decimal:1',
        'stock_quantity' => 'integer',
        'is_active' => 'boolean',
        'features' => 'array'
    ];

    // Query scopes for filtering
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

    public function scopeByToyType($query, $toyType)
    {
        return $query->where('toy_type', $toyType);
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
}
