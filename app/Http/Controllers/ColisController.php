<?php

namespace App\Http\Controllers;

use App\Models\Colis;
use Illuminate\Http\Request;

class ColisController extends Controller
{
    public function index()
    {
        $colis = Colis::all();
        return view('admin.sections.colis.index', compact('colis'));
    }

    public function create()
    {
        return view('admin.sections.colis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'contenus' => 'required|string',
            'prix' => 'required|integer',
            'quantité' => 'required|string',
            'nom_client' => 'required|string',
            'tel_client' => 'required|integer',
            'email_client' => 'required|email',
            'status' => 'required|string',
        ]);

        Colis::create($request->all());

        return redirect()->route('colis.index')->with('success', 'Colis ajouté avec succès');
    }



    public function edit($id)
    {
        $coli = Colis::findOrFail($id);

        return view('admin.sections.colis.edit', compact('coli'));
    }

    public function update(Request $request, Colis $colis)
    {
        $request->validate([
            'contenus' => 'required|string',
            'prix' => 'required|integer',
            'quantité' => 'required|string',
            'nom_client' => 'required|string',
            'tel_client' => 'required|integer',
            'email_client' => 'required|email',
            'status' => 'required|string',
        ]);

        $colis->update($request->all());

        return redirect()->route('colis.index')->with('success', 'Colis mis à jour avec succès');
    }

    public function destroy($id)
    {
        $coli = Colis::FindOrFail($id);
        $coli->delete();

        return redirect()->route('colis.index')->with('success', 'Colis supprimé avec succès');
    }
}
