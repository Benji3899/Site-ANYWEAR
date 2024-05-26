<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
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
       /* $products = Product::where('user_id', auth()->id())->get();
        return Inertia::render('Products/Index', ['products' => $products]);*/
    }

    /**
     * Affiche le formulaire pour créer un nouveau produit.
     */
    public function create()
    {
        return Inertia::render('Products/Create');
    }

    /**
     * Enregistre un nouveau produit en base de données.
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
    public function show(string $id)
    {
        //
    }

    /**
     * Affiche le formulaire d'édition pour un produit spécifique.
     */
    public function edit(Product $product)
    {
        // Vérifie les permissions
        $this->authorize('update', $product);
        return Inertia::render('Products/Edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        // Vérifie les permissions
        $this->authorize('update', $product);

        // Mise à jour des fichiers d'images si nécessaires
        if ($request->hasFile('first_img')) {
            $firstImage = $request->file('first_img');
            $pathFirstImage = $firstImage->store('', 'products');
            $firstImageFileName = basename($pathFirstImage);
            $product->first_img = $firstImageFileName;
        }

        if ($request->hasFile('second_img')) {
            $secondImage = $request->file('second_img');
            $pathSecondImage = $secondImage->store('', 'products');
            $secondImageFileName = basename($pathSecondImage);
            $product->second_img = $secondImageFileName;
        }

        // Mise à jour du produit avec les données validées
        $product->update($request->only(['name', 'description', 'size', 'brand', 'type', 'category']));

        return redirect()->route('products.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
