<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'product_id',
        'product_name',
        'quantity',
        'unit_price',
        'line_total',
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'line_total' => 'decimal:2',
    ];

    // Relationship: An invoice line belongs to an invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    // Relationship: An invoice line corresponds to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}