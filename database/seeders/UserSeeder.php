<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('111'),  // Hash the password
            'role' => 'admin',  // Set the role
        ]);

        User::create([
            'name' => 'Fournisseur User',
            'email' => 'fournisseur@example.com',
            'password' => Hash::make('111'),  // Hash the password
            'role' => 'fournisseur',  // Set the role
        ]);
    }
}
