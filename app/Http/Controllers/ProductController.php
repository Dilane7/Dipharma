<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProductController extends Controller
{
     /**
     * Affiche la liste des produits.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $products = Product::query()->with('categorie')->orderBy('name', 'asc');

        if ($search) {
            $products->where('name', 'like', '%' . $search . '%')->orderby('name', 'asc');
        }

        $products = $products->latest()->paginate(10);

        return view('products.index', compact('products'));
        
    }

    /**
     * Affiche le formulaire de création d'un nouveau produit.
     */
    public function create(): View
    {
        $categories = Categorie::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Enregistre un nouveau produit.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $productData = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        Product::create($productData);

        return redirect()->route('products.index')->with('success', 'Produit créé avec succès.');
    }

    /**
     * Affiche les détails d'un produit spécifique.
     */
    public function show(Product $product): View
    {
        $product->expiration_date = $product->expiration_date ? Carbon::parse($product->expiration_date) : null;
        
        return view('products.show', compact('product'));
    }

    /**
     * Affiche le formulaire d'édition d'un produit spécifique.
     */
    public function edit(Product $product): View
    {
        $product->expiration_date = $product->expiration_date ? Carbon::parse($product->expiration_date) : null;
        $categories = Categorie::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Met à jour un produit spécifique.
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $productData = $request->validated();
        

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        $product->update($productData);

        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Supprime un produit spécifique.
     */
    public function destroy(Product $product): RedirectResponse
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }
}
