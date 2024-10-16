<?php
namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('admin.sections.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.sections.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categorie::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès');
    }

    public function show($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('admin.sections.categories.show', compact('categorie'));
    }

    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('admin.sections.categories.edit', compact('categorie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $categorie = Categorie::findOrFail($id);
        $categorie->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès');
    }

    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès');
    }
}
