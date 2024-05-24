<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Détermine si l'utilisateur peut voir la liste des produits.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut voir un produit spécifique.
     */
    public function view(User $user, Product $product): bool
    {
        //
    }

    /**
     * Détermine si l'utilisateur peut créer un produit.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Détermine si l'utilisateur peut mettre à jour un produit.
     */
    public function update(User $user, Product $product): bool
    {
        //
    }

    /**
     * Détermine si l'utilisateur peut supprimer un produit.
     */
    public function delete(User $user, Product $product): bool
    {
        //
    }

    /**
     * Détermine si l'utilisateur peut restaurer un produit supprimé.
     */
    public function restore(User $user, Product $product): bool
    {
        //
    }

    /**
     * Détermine si l'utilisateur peut supprimer définitivement un produit.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        //
    }
}
