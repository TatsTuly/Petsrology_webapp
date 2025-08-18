<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vet_id',
        'appointment_number',
        'owner_name',
        'owner_phone',
        'owner_email',
        'pet_name',
        'pet_type',
        'pet_age',
        'pet_breed',
        'service_type',
        'preferred_date',
        'preferred_time',
        'assigned_time',
        'urgency_level',
        'symptoms',
        'additional_notes',
        'status',
        'estimated_cost',
        'final_cost',
        'confirmed_at',
        'appointment_date'
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'preferred_time' => 'datetime:H:i',
        'assigned_time' => 'datetime:H:i',
        'appointment_date' => 'datetime',
        'confirmed_at' => 'datetime',
        'estimated_cost' => 'decimal:2',
        'final_cost' => 'decimal:2',
    ];

    /**
     * Generate unique appointment number
     */
    public static function generateAppointmentNumber()
    {
        do {
            $number = 'APT-' . date('Ymd') . '-' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        } while (self::where('appointment_number', $number)->exists());
        
        return $number;
    }

    /**
     * Get the user that owns the appointment
     */
    public function user()
    {
        return $this->belongsTo(AppUser::class, 'user_id');
    }

    /**
     * Get the vet assigned to the appointment
     */
    public function vet()
    {
        return $this->belongsTo(VetDetails::class, 'vet_id');
    }

    /**
     * Scope for pending appointments
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for confirmed appointments
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    /**
     * Scope for today's appointments
     */
    public function scopeToday($query)
    {
        return $query->whereDate('preferred_date', today());
    }

    /**
     * Scope for upcoming appointments
     */
    public function scopeUpcoming($query)
    {
        return $query->where('preferred_date', '>=', today());
    }

    /**
     * Get formatted date
     */
    public function getFormattedDateAttribute()
    {
        return $this->preferred_date ? $this->preferred_date->format('M d, Y') : '';
    }

    /**
     * Get formatted time
     */
    public function getFormattedTimeAttribute()
    {
        return $this->preferred_time ? Carbon::parse($this->preferred_time)->format('g:i A') : '';
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeClassAttribute()
    {
        $classes = [
            'pending' => 'badge-warning',
            'confirmed' => 'badge-success',
            'cancelled' => 'badge-danger',
            'completed' => 'badge-primary',
            'no_show' => 'badge-secondary'
        ];

        return $classes[$this->status] ?? 'badge-secondary';
    }

    /**
     * Get status display name
     */
    public function getStatusDisplayAttribute()
    {
        $statuses = [
            'pending' => 'Pending Confirmation',
            'confirmed' => 'Confirmed',
            'cancelled' => 'Cancelled',
            'completed' => 'Completed',
            'no_show' => 'No Show'
        ];

        return $statuses[$this->status] ?? 'Unknown';
    }

    /**
     * Get urgency badge class
     */
    public function getUrgencyBadgeClassAttribute()
    {
        $classes = [
            'routine' => 'badge-info',
            'urgent' => 'badge-warning',
            'emergency' => 'badge-danger'
        ];

        return $classes[$this->urgency_level] ?? 'badge-info';
    }

    /**
     * Get service type display name
     */
    public function getServiceTypeDisplayAttribute()
    {
        $services = [
            'general-checkup' => 'General Checkup',
            'vaccination' => 'Vaccination',
            'surgery' => 'Surgery Consultation',
            'grooming' => 'Pet Grooming',
            'emergency' => 'Emergency',
            'dental' => 'Dental Care',
            'skin-treatment' => 'Skin Treatment'
        ];

        return $services[$this->service_type] ?? $this->service_type;
    }

    /**
     * Check if appointment can be cancelled
     */
    public function canBeCancelled()
    {
        return in_array($this->status, ['pending', 'confirmed']) && 
               $this->preferred_date > today();
    }

    /**
     * Check if appointment is overdue
     */
    public function isOverdue()
    {
        return $this->status === 'confirmed' && 
               $this->preferred_date < today();
    }
}
