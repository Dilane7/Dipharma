<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id',
        'order_date',
        'total_amount',
        'status',
        'shipping_address',
        'customer_name',
    ];

    protected $casts = [
        'order_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Add this method
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

// IMPORTANT: Add your existing relationship to Order Lines/Items here
// Example:
// public function orderLines()
// {
//     return $this->hasMany(OrderLine::class);
// }
}
