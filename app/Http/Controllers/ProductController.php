<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductUpdateRequest;
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
        $pathFirstImage = $firstImage->store('products', 'public');
        $pathSecondImage = $secondImage->store('products', 'public');

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
//        $this->authorize('update', $product);
//        return Inertia::render('Products/Edit', ['product' => $product]);
        $this->authorize('update', $product); // Vérification des permissions

        return Inertia::render('Products/Edit', [
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'size' => $product->size,
                'brand' => $product->brand,
                'type' => $product->type,
                'category' => $product->category,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */

    public function update(ProductUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        if ($request->hasFile('first_img')) {
            $product->first_img = $request->file('first_img')->store('products');
        }

        if ($request->hasFile('second_img')) {
            $product->second_img = $request->file('second_img')->store('products');
        }

        $product->save();

        return response()->json(['product' => $product, 'message' => 'Product updated successfully']);

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
