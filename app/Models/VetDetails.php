<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VetDetails extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'user_email',
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

    /**
     * Get the user that owns the vet application.
     */
    public function user()
    {
        return $this->belongsTo(AppUser::class, 'user_id');
    }

    /**
     * Scope a query to only include pending applications.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include approved applications.
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Check if the application is approved.
     */
    public function isApproved()
    {
        return $this->status === 'approved';
    }

    /**
     * Check if the application is pending.
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }

    /**
     * Check if the application is rejected.
     */
    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    /**
     * Get the profile image URL that works on Windows
     */
    public function getProfileImageUrl()
    {
        if (!$this->profile_image) {
            return 'https://placehold.co/40x40?text=No+Image';
        }

        // First try the standard Laravel storage URL
        $storageUrl = asset('storage/' . $this->profile_image);
        $storagePath = public_path('storage/' . $this->profile_image);
        
        // If file exists in public/storage, use it
        if (file_exists($storagePath)) {
            return $storageUrl;
        }
        
        // Otherwise, create a custom route or use direct file access
        $directPath = storage_path('app/public/' . $this->profile_image);
        if (file_exists($directPath)) {
            // Copy file to public directory if needed
            $publicPath = public_path('storage/' . $this->profile_image);
            $publicDir = dirname($publicPath);
            
            if (!file_exists($publicDir)) {
                mkdir($publicDir, 0755, true);
            }
            
            copy($directPath, $publicPath);
            return $storageUrl;
        }
        
        return 'https://placehold.co/40x40?text=No+Image';
    }
}
