<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    // Définition de la relation entre les commandes et les utilisateurs
    // On utilise BelongsTo pour dire qu'une commande (Order) est associée à un utilisateur (User) unique
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Définition de la relation entre les produits et les commandes
    // On utilise BelongsTo pour dire qu'une commande (Order) est associée à un produit (Product)
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
