<?php

use App\Models\equipement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//  equipement
Route::get('/equipement', [App\Http\Controllers\EquipementController::class, 'index'])->name('equipements.index');
Route::get('/equipement/create', [App\Http\Controllers\EquipementController::class, 'create'])->name('equipements.create');
Route::post('/equipement/store', [App\Http\Controllers\EquipementController::class, 'store'])->name('equipements.store');
Route::get('/equipement/show/{id}', [App\Http\Controllers\EquipementController::class, 'show'])->name('equipements.show');
Route::get('/equipement/edit/{id}', [App\Http\Controllers\EquipementController::class, 'edit'])->name('equipements.edit');
Route::put('/equipement/update', [App\Http\Controllers\EquipementController::class, 'update'])->name('equipements.update');
Route::delete('/equipement/destroy/{id}', [App\Http\Controllers\EquipementController::class, 'destroy'])->name('equipements.destroy');

// categorie meterielle
Route::get('/categorie_materielle', [App\Http\Controllers\CategorieMaterielleController::class, 'index'])->name('categorie_materielles.index');
Route::get('/categorie_materielle/create', [App\Http\Controllers\CategorieMaterielleController::class, 'create'])->name('categorie_materielles.create');
Route::post('/categorie_materielle/store', [App\Http\Controllers\CategorieMaterielleController::class, 'store'])->name('categorie_materielles.store');
Route::get('/categorie_materielle/show/{id}', [App\Http\Controllers\CategorieMaterielleController::class, 'show'])->name('categorie_materielles.show');
Route::get('/categorie_materielle/edit/{id}', [App\Http\Controllers\CategorieMaterielleController::class, 'edit'])->name('categorie_materielles.edit');
Route::put('/categorie_materielle/update', [App\Http\Controllers\CategorieMaterielleController::class, 'update'])->name('categorie_materielles.update');
Route::delete('/categorie_materielle/destroy/{id}', [App\Http\Controllers\CategorieMaterielleController::class, 'destroy'])->name('categorie_materielles.destroy');


// categorie produit
Route::get('/categorie_produit', [App\Http\Controllers\categorieproduitcontroller::class, 'index'])->name('categorie_produits.index');
Route::get('/categorie_produit/create', [App\Http\Controllers\categorieproduitcontroller::class, 'create'])->name('categorie_produits.create');
Route::post('/categorie_produit/store', [App\Http\Controllers\categorieproduitcontroller::class, 'store'])->name('categorie_produits.store');
Route::get('/categorie_produit/show/{id}', [App\Http\Controllers\categorieproduitcontroller::class, 'show'])->name('categorie_produits.show');
Route::get('/categorie_produit/edit/{id}', [App\Http\Controllers\categorieproduitcontroller::class, 'edit'])->name('categorie_produits.edit');
Route::put('/categorie_produit/update', [App\Http\Controllers\categorieproduitcontroller::class, 'update'])->name('categorie_produits.update');
Route::delete('/categorie_produit/destroy/{id}', [App\Http\Controllers\categorieproduitcontroller::class, 'destroy'])->name('categorie_produits.destroy');

// produit produit
Route::get('/produit', [App\Http\Controllers\Produitcontroller::class, 'index'])->name('produits.index');
Route::get('/produit/create', [App\Http\Controllers\Produitcontroller::class, 'create'])->name('produits.create');
Route::post('/produit/store', [App\Http\Controllers\Produitcontroller::class, 'store'])->name('produits.store');
Route::get('/produit/show/{id}', [App\Http\Controllers\Produitcontroller::class, 'show'])->name('produits.show');
Route::get('/produit/edit/{id}', [App\Http\Controllers\Produitcontroller::class, 'edit'])->name('produits.edit');
Route::put('/produit/update', [App\Http\Controllers\Produitcontroller::class, 'update'])->name('produits.update');
Route::delete('/produit/destroy/{id}', [App\Http\Controllers\Produitcontroller::class, 'destroy'])->name('produits.destroy');

//materielle
Route::get('/materielle', [App\Http\Controllers\MaterielleController::class, 'index'])->name('materielles.index');
Route::get('/materielle/create', [App\Http\Controllers\MaterielleController::class, 'create'])->name('materielles.create');
Route::post('/materielle/store', [App\Http\Controllers\MaterielleController::class, 'store'])->name('materielles.store');
Route::get('/materielle/show/{id}', [App\Http\Controllers\MaterielleController::class, 'show'])->name('materielles.show');
Route::get('/materielle/edit/{id}', [App\Http\Controllers\MaterielleController::class, 'edit'])->name('materielles.edit');
Route::put('/materielle/update', [App\Http\Controllers\MaterielleController::class, 'update'])->name('materielles.update');
Route::delete('/materielle/destroy/{id}', [App\Http\Controllers\MaterielleController::class, 'destroy'])->name('materielles.destroy');

// client
Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->name('clients.index');
Route::get('/client/create', [App\Http\Controllers\ClientController::class, 'create'])->name('clients.create');
Route::post('/client/store', [App\Http\Controllers\ClientController::class, 'store'])->name('clients.store');
Route::get('/client/show/{id}', [App\Http\Controllers\ClientController::class, 'show'])->name('clients.show');
Route::get('/client/edit/{id}', [App\Http\Controllers\ClientController::class, 'edit'])->name('clients.edit');
Route::put('/client/update', [App\Http\Controllers\ClientController::class, 'update'])->name('clients.update');
Route::delete('/client/destroy/{id}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('clients.destroy');


//commande
Route::get('/entrer', [App\Http\Controllers\EntrerController::class, 'index'])->name('entrers.index');
Route::get('/entrer/create', [App\Http\Controllers\EntrerController::class, 'create'])->name('entrers.create');
Route::post('/entrer/store', [App\Http\Controllers\EntrerController::class, 'store'])->name('entrers.store');
Route::get('/entrer/show/{id}', [App\Http\Controllers\EntrerController::class, 'show'])->name('entrers.show');
Route::get('/entrer/edit/{id}', [App\Http\Controllers\EntrerController::class, 'edit'])->name('entrers.edit');
Route::put('/entrer/update', [App\Http\Controllers\EntrerController::class, 'update'])->name('entrers.update');
Route::delete('/entrer/destroy/{id}', [App\Http\Controllers\EntrerController::class, 'destroy'])->name('entrers.destroy');


//command
Route::get('/commande', [App\Http\Controllers\CommandeController::class, 'index'])->name('commandes.index');
Route::get('/commande/create', [App\Http\Controllers\CommandeController::class, 'create'])->name('commandes.create');
Route::post('/commande/store', [App\Http\Controllers\CommandeController::class, 'store'])->name('commandes.store');
Route::get('/commande/show/{id}', [App\Http\Controllers\CommandeController::class, 'show'])->name('commandes.show');
Route::get('/commande/edit/{id}', [App\Http\Controllers\CommandeController::class, 'edit'])->name('commandes.edit');
Route::put('/commande/update', [App\Http\Controllers\CommandeController::class, 'update'])->name('commandes.update');
Route::delete('/commande/destroy/{id}', [App\Http\Controllers\EntrerController::class, 'destroy'])->name('commandes.destroy');
Route::get('/commande/termine/{id}', [App\Http\Controllers\EntrerController::class, 'termine'])->name('commandes.termine');
