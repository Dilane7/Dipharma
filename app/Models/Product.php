<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'prix',
        'quantity',
        'dosage',
        'expiration_date',
        'image',
        'is_available',
        'categorie_id',
    ];

    protected $casts = [
        'expiration_date' => 'date',
    ];

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function getExpirationClass(): string
    {
        if (!$this->expiration_date) {
            return ''; // Pas de date d'expiration
        }

        $now = Carbon::now();
        $expirationDate = Carbon::parse($this->expiration_date); // Assurez-vous que c'est un objet Carbon
        $diffInDays = $now->diffInDays($expirationDate, false); // false pour inclure les dates passées
        if ($diffInDays <= 14) { // Date déjà expirée
            return 'bg-danger';
        } elseif ($diffInDays <= 30) { // 2 semaines
            return 'bg-warning';
        } elseif ($diffInDays <= 60) { // 1 mois (environ 30 jours)
            return 'bg-info';
        } else { // 3 mois et plus
            return 'bg-success';
        }
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Add this method
public function invoiceLines()
{
    return $this->hasMany(InvoiceLine::class);
}
}


