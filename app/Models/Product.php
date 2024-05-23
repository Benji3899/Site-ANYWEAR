<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    // Définition de la relation entre les produits et les utilisateurs
    // On utilise BelongsTo pour dire qu'un produit (Product) est associée à un utilisateur (User) unique
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Définition de la relation entre les produits et commandes
    // On utilise HasMany pour dire qu'une commande (Order) peut avoir plusieurs produits (Product)
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
