<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasRoles, HasFactory, Notifiable, HasApiTokens;

    // Add the HasRoles trait if it exists in another namespace

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'telephone',
        'est_actif',
        'photo',
        'email',
        'password',
        'remember_token',
        'password_confirmation',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Add this method
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function conversations()
    {
        // S'assurer que cela ne concerne que les clients si nécessaire via le rôle
        return $this->hasMany(Conversation::class);
    }

    // Relation: Un utilisateur (client ou admin) peut avoir envoyé plusieurs messages
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    // // Relation: Un utilisateur (client ou admin) peut avoir reçu plusieurs messages (Optionnel)
    // public function receivedMessages()
    // {
    //     return $this->hasMany(Message::class, 'receiver_id');

}
