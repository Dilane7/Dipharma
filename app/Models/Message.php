<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'sender_id',
        // 'receiver_id', // Si vous l'avez ajouté
        'body',
        'is_read',
        'read_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
    ];

    // Relation: Un message appartient à une conversation
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    // Relation: Un message a un expéditeur (User)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relation: Un message a un destinataire (User) - Optionnel
    // public function receiver()
    // {
    //     return $this->belongsTo(User::class, 'receiver_id');
    // }
}
