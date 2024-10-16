<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Determine where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        // Check user role and redirect accordingly
        if (auth()->user()->role === 'admin') {
            return '/admin/dashboard';
        } elseif (auth()->user()->role === 'fournisseur') {
            return '/fournisseur/dashboard';
        }

        // Default fallback if no role is matched
        return '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
