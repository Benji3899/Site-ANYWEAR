<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Inertia\Inertia;

/**
 * @method authorize(string $string, Product $product)
 */
class ProductController extends Controller
{
    use AuthorizesRequests;
    /**
     * Affiche la liste des produits.
     */

    public function index()
    {
        // servira peut-être plus tard pour afficher les produits de l'user connecté
//        $products = Product::where('user_id', auth()->id())->get();
//        return Inertia::render('Dashboard', ['products' => $products]);
    }

    /**
     * Affiche le formulaire pour créer un nouveau produit.
     */
    public function create()
    {
        return Inertia::render('Products/Create');
    }

    /**
     * Créer et enregistre un nouveau produit en base de données.
     */
    public function store(StoreProductRequest $request)
    {
        // Enregistrement des fichiers images
        $firstImage = $request->file('first_img');
        $secondImage = $request->file('second_img');
        $pathFirstImage = $firstImage->store('', 'products');
        $pathSecondImage = $secondImage->store('', 'products');

        // Récupération des noms des fichiers
        $firstImageFileName = basename($pathFirstImage);
        $secondImageFileName = basename($pathSecondImage);

        // Création du produit avec les données validées.
        Product::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'size' => $request->get('size'),
            'brand' => $request->get('brand'),
            'first_img' => $firstImageFileName,
            'second_img' => $secondImageFileName,
            'type' => $request->get('type'),
            'category' => $request->get('category'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
//    public function show(string $id)
//    {
//
//    }

    public function show(Product $product)
    {
        return Inertia::render('Products/Show', [
            'product' => $product,
            'pageTitle' => 'Nom du produit: ' . $product->name,
        ]);
    }

    /**
     * Affiche le formulaire d'édition pour un produit spécifique.
     * @throws AuthorizationException
     */
    public function edit(Product $product)
    {
        // Vérifie les permissions
        $this->authorize('update', $product);
        return Inertia::render('Products/Edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(StoreProductRequest $request, int $id)
    {
        $product = Product::findOrFail($id);

        // Vérification des autorisations
        $this->authorize('update', $product);

        // Récupération des données validées
        $validated = $request->validated();

        // Mise à jour des fichiers d'images si nécessaires
        if ($request->hasFile('first_img')) {
            $firstImage = $request->file('first_img');
            $pathFirstImage = $firstImage->store('', 'products');
            $validated['first_img'] = basename($pathFirstImage);
        }

        if ($request->hasFile('second_img')) {
            $secondImage = $request->file('second_img');
            $pathSecondImage = $secondImage->store('', 'products');
            $validated['second_img'] = basename($pathSecondImage);
        }

        // Mise à jour du produit avec les données validées
        $product->update($validated);

        return redirect()->route('dashboard');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
