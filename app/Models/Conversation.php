<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'status',
        'last_reply_at',
    ];

    protected $casts = [
        'last_reply_at' => 'datetime',
    ];

    // Relation: Une conversation appartient à un utilisateur (client)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation: Une conversation a plusieurs messages
    public function messages()
    {
        return $this->hasMany(Message::class)->orderBy('created_at', 'asc'); // Ordonner par date de création
    }

    // Relation: Accéder au dernier message (utile pour l'affichage)
    public function latestMessage()
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }

    // Vous pouvez ajouter des scopes ici (ex: conversations ouvertes, non lues par admin, etc.)
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }
}
