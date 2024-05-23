<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lastname',
        'firstname',
        'address',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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

    // Définition de la relation entre les utilisateurs et les commandes
    // On utilise HasMany pour dire qu'un utilisateur (User) peut avoir plusieurs commandes (Order)
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // Un utilisateurs peut avoir plusieurs produits
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // Un utilisateurs peut valider plusieurs produits
    public function validatedProducts(): HasMany
    {
        return $this->hasMany(Product::class, 'validated_by');
    }
}
