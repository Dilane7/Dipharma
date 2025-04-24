<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');
        $categories = Categorie::query()->orderBy('name', 'asc');

        if ($search) {
            $categories->where('name', 'like', '%' . $search . '%')->orderBy('name', 'asc');
        }

        // Si vous utilisez la pagination :
        $categories = $categories->paginate(5);
        // $categories = Categorie::all(); // Récupère toutes les catégories

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //
        Categorie::create($request->validated()); // Crée une nouvelle catégorie avec les données validées

        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categorie = Categorie::findOrFail($id);
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        //
        $category = Categorie::findOrFail($id); // Récupère la catégorie par son ID
        $category->update($request->validated()); // Met à jour la catégorie avec les données validées

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Categorie::findOrFail($id); // Récupère la catégorie par son ID
        $category->delete(); // Supprime la catégorie

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
