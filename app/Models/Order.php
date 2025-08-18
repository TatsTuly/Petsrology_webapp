<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_number',
        'customer_first_name',
        'customer_last_name',
        'customer_email',
        'customer_phone',
        'delivery_address',
        'delivery_city',
        'delivery_postal_code',
        'subtotal',
        'delivery_fee',
        'total_amount',
        'payment_method',
        'payment_status',
        'payment_reference',
        'order_status',
        'notes',
        'cart_data',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'cart_data' => 'array',
        'subtotal' => 'decimal:2',
        'delivery_fee' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the order items for the order.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the customer's full name.
     */
    public function getCustomerFullNameAttribute(): string
    {
        return $this->customer_first_name . ' ' . $this->customer_last_name;
    }

    /**
     * Get the formatted order number.
     */
    public function getFormattedOrderNumberAttribute(): string
    {
        return 'PF-' . $this->order_number;
    }

    /**
     * Generate a unique order number.
     */
    public static function generateOrderNumber(): string
    {
        do {
            $orderNumber = date('Ymd') . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
        } while (self::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }

    /**
     * Scope a query to only include orders with a specific status.
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('order_status', $status);
    }

    /**
     * Scope a query to only include orders with a specific payment status.
     */
    public function scopePaymentStatus($query, $status)
    {
        return $query->where('payment_status', $status);
    }

    /**
     * Get orders by customer email.
     */
    public function scopeByCustomer($query, $email)
    {
        return $query->where('customer_email', $email);
    }

    /**
     * Get recent orders.
     */
    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }
}
