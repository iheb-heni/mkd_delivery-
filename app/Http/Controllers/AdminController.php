<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index(Request $request)
{
    $search = $request->input('search');

    // If search is provided, filter admins by name or email
    $admins = User::where('role', 'admin')
                  ->where(function($query) use ($search) {
                      if ($search) {
                          $query->where('name', 'LIKE', "%{$search}%")
                                ->orWhere('email', 'LIKE', "%{$search}%");
                      }
                  })->get();

    return view('admin.sections.admins.index', compact('admins', 'search'));
}

     // Show form to create a new admin
     public function create()
     {
         return view('admin.sections.admins.create');
     }

     // Store new admin in the database
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
             'role' => 'admin', // Role is fixed as 'admin'
         ]);

         return redirect()->route('admins.index')->with('success', 'Admin created successfully.');
     }

     // Show form to edit an existing admin
     public function edit($id)
     {
         $admin = User::findOrFail($id);
         return view('admin.sections.admins.edit', compact('admin'));
     }

     // Update an admin in the database
     public function update(Request $request, $id)
     {
         $admin = User::findOrFail($id);

         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email,' . $admin->id,
             'password' => 'nullable|min:6|confirmed',
         ]);

         $admin->update([
             'name' => $request->name,
             'email' => $request->email,
             'password' => $request->password ? Hash::make($request->password) : $admin->password,
         ]);

         return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
     }

     // Delete an admin from the database
     public function destroy($id)
     {
         $admin = User::findOrFail($id);
         $admin->delete();

         return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
     }
}
