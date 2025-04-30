<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'due_date',
        'user_id',
        'order_id',
        'customer_name',
        'customer_phone',
        'customer_address',
        'sub_total',
        'tax',
        'total_amount',
        'status',
        'notes',
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'due_date' => 'date',
        'sub_total' => 'decimal:2',
        'tax' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    // Relationship: An invoice can belong to a user (customer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: An invoice might originate from an order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relationship: An invoice has many lines
    public function lines()
    {
        return $this->hasMany(InvoiceLine::class);
    }

    // Helper to generate unique invoice number (Example implementation)
    public static function generateInvoiceNumber()
    {
        $prefix = 'INV-' . date('Ymd') . '-';
        $lastInvoice = self::orderBy('id', 'desc')->first();
        $number = $lastInvoice ? ($lastInvoice->id + 1) : 1;
        return $prefix . str_pad($number, 4, '0', STR_PAD_LEFT);
    }
}