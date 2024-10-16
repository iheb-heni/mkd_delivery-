<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ColisController;
use App\Http\Controllers\CategorieController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('admins', AdminController::class);
    Route::resource('fournisseurs', FournisseurController::class);





});

Route::middleware(['auth', 'role:fournisseur'])->group(function () {
    Route::get('/fournisseur/dashboard', [FournisseurController::class, 'dashboard'])->name('fournisseur.dashboard');

});


Route::resource('contacts', ContactController::class);
Route::resource('colis', ColisController::class);
Route::resource('categories', CategorieController::class);

Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');



