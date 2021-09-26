<?php

use App\Http\Controllers\CategorieMaterielleController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ToolController;
use App\Models\Equipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//  equipment
Route::group(['prefix' => 'equipments', 'as' => 'equipments.'], function () {
    Route::get('/', [EquipmentController::class, 'index'])->name('index');
    Route::get('/create', [EquipmentController::class, 'create'])->name('create');
    Route::post('/store', [EquipmentController::class, 'store'])->name('store');
    Route::get('/show/{id}', [EquipmentController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [EquipmentController::class, 'edit'])->name('edit');
    Route::put('/update', [EquipmentController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [EquipmentController::class, 'destroy'])->name('destroy');
});

// categorie meterielle
Route::get('/categorie_materielle', [CategorieMaterielleController::class, 'index'])->name('categorie_materielles.index');
Route::get('/categorie_materielle/create', [CategorieMaterielleController::class, 'create'])->name('categorie_materielles.create');
Route::post('/categorie_materielle/store', [CategorieMaterielleController::class, 'store'])->name('categorie_materielles.store');
Route::get('/categorie_materielle/show/{id}', [CategorieMaterielleController::class, 'show'])->name('categorie_materielles.show');
Route::get('/categorie_materielle/edit/{id}', [CategorieMaterielleController::class, 'edit'])->name('categorie_materielles.edit');
Route::put('/categorie_materielle/update', [CategorieMaterielleController::class, 'update'])->name('categorie_materielles.update');
Route::delete('/categorie_materielle/destroy/{id}', [CategorieMaterielleController::class, 'destroy'])->name('categorie_materielles.destroy');


// categorie produit
Route::get('/categorie_produit', [\App\Http\Controllers\categorieproduitcontroller::class, 'index'])->name('categorie_products.index');
Route::get('/categorie_produit/create', [\App\Http\Controllers\categorieproduitcontroller::class, 'create'])->name('categorie_products.create');
Route::post('/categorie_produit/store', [\App\Http\Controllers\categorieproduitcontroller::class, 'store'])->name('categorie_products.store');
Route::get('/categorie_produit/show/{id}', [\App\Http\Controllers\categorieproduitcontroller::class, 'show'])->name('categorie_products.show');
Route::get('/categorie_produit/edit/{id}', [\App\Http\Controllers\categorieproduitcontroller::class, 'edit'])->name('categorie_products.edit');
Route::put('/categorie_produit/update', [\App\Http\Controllers\categorieproduitcontroller::class, 'update'])->name('categorie_products.update');
Route::delete('/categorie_produit/destroy/{id}', [\App\Http\Controllers\categorieproduitcontroller::class, 'destroy'])->name('categorie_products.destroy');

// produit produit
Route::get('/produit', [\App\Http\Controllers\Produitcontroller::class, 'index'])->name('products.index');
Route::get('/produit/create', [\App\Http\Controllers\Produitcontroller::class, 'create'])->name('products.create');
Route::post('/produit/store', [\App\Http\Controllers\Produitcontroller::class, 'store'])->name('products.store');
Route::get('/produit/show/{id}', [\App\Http\Controllers\Produitcontroller::class, 'show'])->name('products.show');
Route::get('/produit/edit/{id}', [\App\Http\Controllers\Produitcontroller::class, 'edit'])->name('products.edit');
Route::put('/produit/update', [\App\Http\Controllers\Produitcontroller::class, 'update'])->name('products.update');
Route::delete('/produit/destroy/{id}', [\App\Http\Controllers\Produitcontroller::class, 'destroy'])->name('products.destroy');

//materielle
Route::get('/tools', [ToolController::class, 'index'])->name('tools.index');
Route::get('/tools/create', [ToolController::class, 'create'])->name('tools.create');
Route::post('/tools/store', [ToolController::class, 'store'])->name('tools.store');
Route::get('/tools/{tool}', [ToolController::class, 'show'])->name('tools.show');
Route::get('/tools/{tool}/edit', [ToolController::class, 'edit'])->name('tools.edit');
Route::put('/tools/{tool}', [ToolController::class, 'update'])->name('tools.update');
Route::delete('/tools/{tool}', [ToolController::class, 'destroy'])->name('tools.destroy');

// client
Route::get('/client', [\App\Http\Controllers\CustomerController::class, 'index'])->name('clients.index');
Route::get('/client/create', [\App\Http\Controllers\CustomerController::class, 'create'])->name('clients.create');
Route::post('/client/store', [\App\Http\Controllers\CustomerController::class, 'store'])->name('clients.store');
Route::get('/client/show/{id}', [\App\Http\Controllers\CustomerController::class, 'show'])->name('clients.show');
Route::get('/client/edit/{id}', [\App\Http\Controllers\CustomerController::class, 'edit'])->name('clients.edit');
Route::put('/client/update', [\App\Http\Controllers\CustomerController::class, 'update'])->name('clients.update');
Route::delete('/client/destroy/{id}', [\App\Http\Controllers\CustomerController::class, 'destroy'])->name('clients.destroy');


//command
Route::get('/entrer', [\App\Http\Controllers\EntrerController::class, 'index'])->name('entrers.index');
Route::get('/entrer/create', [\App\Http\Controllers\EntrerController::class, 'create'])->name('entrers.create');
Route::post('/entrer/store', [\App\Http\Controllers\EntrerController::class, 'store'])->name('entrers.store');
Route::get('/entrer/show/{id}', [\App\Http\Controllers\EntrerController::class, 'show'])->name('entrers.show');
Route::get('/entrer/edit/{id}', [\App\Http\Controllers\EntrerController::class, 'edit'])->name('entrers.edit');
Route::put('/entrer/update', [\App\Http\Controllers\EntrerController::class, 'update'])->name('entrers.update');
Route::delete('/entrer/destroy/{id}', [\App\Http\Controllers\EntrerController::class, 'destroy'])->name('entrers.destroy');

//command
Route::get('/commands', [CommandController::class, 'index'])->name('commands.index');
Route::get('/commands/create', [CommandController::class, 'create'])->name('commands.create');
Route::post('/commands/store', [CommandController::class, 'store'])->name('commands.store');
Route::get('/commands/{command}', [CommandController::class, 'show'])->name('commands.show');
Route::get('/commands/{command}/edit', [CommandController::class, 'edit'])->name('commands.edit');
Route::put('/commands/{command}', [CommandController::class, 'update'])->name('commands.update');
Route::delete('/commands/{command}', [CommandController::class, 'destroy'])->name('commands.destroy');
Route::get('/commands/termine/{id}', [CommandController::class, 'termine'])->name('commands.termine');
