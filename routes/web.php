<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ToolController;
use App\Models\Equipement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
Route::get('/tools', [ToolController::class, 'index'])->name('tools.index');
Route::get('/tools/create', [ToolController::class, 'create'])->name('tools.create');
Route::post('/tools/store', [ToolController::class, 'store'])->name('tools.store');
Route::get('/tools/{tool}', [ToolController::class, 'show'])->name('tools.show');
Route::get('/tools/{tool}/edit', [ToolController::class, 'edit'])->name('tools.edit');
Route::put('/tools/{tool}', [ToolController::class, 'update'])->name('tools.update');
Route::delete('/tools/{tool}', [ToolController::class, 'destroy'])->name('tools.destroy');

// client
Route::get('/client', [App\Http\Controllers\CustomerController::class, 'index'])->name('clients.index');
Route::get('/client/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('clients.create');
Route::post('/client/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('clients.store');
Route::get('/client/show/{id}', [App\Http\Controllers\CustomerController::class, 'show'])->name('clients.show');
Route::get('/client/edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('clients.edit');
Route::put('/client/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('clients.update');
Route::delete('/client/destroy/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('clients.destroy');


//command
Route::get('/entrer', [App\Http\Controllers\EntrerController::class, 'index'])->name('entrers.index');
Route::get('/entrer/create', [App\Http\Controllers\EntrerController::class, 'create'])->name('entrers.create');
Route::post('/entrer/store', [App\Http\Controllers\EntrerController::class, 'store'])->name('entrers.store');
Route::get('/entrer/show/{id}', [App\Http\Controllers\EntrerController::class, 'show'])->name('entrers.show');
Route::get('/entrer/edit/{id}', [App\Http\Controllers\EntrerController::class, 'edit'])->name('entrers.edit');
Route::put('/entrer/update', [App\Http\Controllers\EntrerController::class, 'update'])->name('entrers.update');
Route::delete('/entrer/destroy/{id}', [App\Http\Controllers\EntrerController::class, 'destroy'])->name('entrers.destroy');

//command
Route::get('/commands', [CommandController::class, 'index'])->name('commands.index');
Route::get('/commands/create', [CommandController::class, 'create'])->name('commands.create');
Route::post('/commands/store', [CommandController::class, 'store'])->name('commands.store');
Route::get('/commands/{command}', [CommandController::class, 'show'])->name('commands.show');
Route::get('/commands/{command}/edit', [CommandController::class, 'edit'])->name('commands.edit');
Route::put('/commands/{command}', [CommandController::class, 'update'])->name('commands.update');
Route::delete('/commands/{command}', [CommandController::class, 'destroy'])->name('commands.destroy');
Route::get('/commands/termine/{id}', [CommandController::class, 'termine'])->name('commands.termine');
