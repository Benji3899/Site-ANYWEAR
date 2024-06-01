<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'size', 'brand', 'first_img', 'second_img', 'type', 'category', 'user_id'];

    // Relation entre produits et utilisateurs
    // On utilise BelongsTo pour dire qu'un produit (Product) est associée à un utilisateur (User) unique
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relation entre produits et commandes
    // HasMany pour dire qu'une commande (Order) peut avoir plusieurs produits (Product)
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
