<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class fournisseurController extends Controller
{
    /**
     * Show the fournisseur dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        return view('fournisseur.dashboard');
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        // If search is provided, filter fournisseurs by name or email
        $fournisseurs = User::where('role', 'fournisseur')
                      ->where(function($query) use ($search) {
                          if ($search) {
                              $query->where('name', 'LIKE', "%{$search}%")
                                    ->orWhere('email', 'LIKE', "%{$search}%");
                          }
                      })->get();

        return view('admin.sections.fournisseurs.index', compact('fournisseurs', 'search'));
    }

         // Show form to create a new fournisseur
         public function create()
         {
             return view('admin.sections.fournisseurs.create');
         }

         // Store new fournisseur in the database
         public function store(Request $request)
         {
             $request->validate([
                 'name' => 'required|string|max:255',
                 'email' => 'required|email|unique:users',
                 'password' => 'required|min:6|confirmed',
             ]);

             User::create([
                 'name' => $request->name,
                 'email' => $request->email,
                 'password' => Hash::make($request->password),
                 'role' => 'fournisseur', // Role is fixed as 'fournisseur'
             ]);

             return redirect()->route('fournisseurs.index')->with('success', 'fournisseur created successfully.');
         }

         // Show form to edit an existing fournisseur
         public function edit($id)
         {
             $fournisseur = User::findOrFail($id);
             return view('admin.sections.fournisseurs.edit', compact('fournisseur'));
         }

         // Update an fournisseur in the database
         public function update(Request $request, $id)
         {
             $fournisseur = User::findOrFail($id);

             $request->validate([
                 'name' => 'required|string|max:255',
                 'email' => 'required|email|unique:users,email,' . $fournisseur->id,
                 'password' => 'nullable|min:6|confirmed',
             ]);

             $fournisseur->update([
                 'name' => $request->name,
                 'email' => $request->email,
                 'password' => $request->password ? Hash::make($request->password) : $fournisseur->password,
             ]);

             return redirect()->route('fournisseurs.index')->with('success', 'fournisseur updated successfully.');
         }

         // Delete an fournisseur from the database
         public function destroy($id)
         {
             $fournisseur = User::findOrFail($id);
             $fournisseur->delete();

             return redirect()->route('fournisseurs.index')->with('success', 'fournisseur deleted successfully.');
         }
}
