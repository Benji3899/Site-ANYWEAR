<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
