<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CategorieMaterielleController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/contact', [AppController::class, 'contact'])->name('contact');
Auth::routes();

// products
Route::group(['prefix' => 'product_categories', 'as' => 'product_categories.'], function () {
    Route::get('/', [Productcontroller::class, 'index'])->name('index');
    Route::get('/create', [Productcontroller::class, 'create'])->name('create');
    Route::post('/store', [Productcontroller::class, 'store'])->name('store');
    Route::get('/{product_category}', [Productcontroller::class, 'show'])->name('show');
    Route::get('/{product_category}/edit', [Productcontroller::class, 'edit'])->name('edit');
    Route::put('/{product_category}', [Productcontroller::class, 'update'])->name('update');
    Route::delete('/{product_category}', [Productcontroller::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('/', [Productcontroller::class, 'index'])->name('index');
    Route::get('/create', [Productcontroller::class, 'create'])->name('create');
    Route::post('/store', [Productcontroller::class, 'store'])->name('store');
    Route::get('/{product}', [Productcontroller::class, 'show'])->name('show');
    Route::get('/{product}/edit', [Productcontroller::class, 'edit'])->name('edit');
    Route::put('/{product}', [Productcontroller::class, 'update'])->name('update');
    Route::delete('/{product}', [Productcontroller::class, 'destroy'])->name('destroy');
});

//  equipment
Route::group(['prefix' => 'equipments', 'as' => 'equipments.'], function () {
    Route::get('/', [EquipmentController::class, 'index'])->name('index');
    Route::get('/create', [EquipmentController::class, 'create'])->name('create');
    Route::post('/store', [EquipmentController::class, 'store'])->name('store');
    Route::get('/{equipment}', [EquipmentController::class, 'show'])->name('show');
    Route::get('/{equipment}/edit', [EquipmentController::class, 'edit'])->name('edit');
    Route::put('/{equipment}', [EquipmentController::class, 'update'])->name('update');
    Route::delete('/{equipment}', [EquipmentController::class, 'destroy'])->name('destroy');
});

// categorie
Route::get('/categorie_materielle', [CategorieMaterielleController::class, 'index'])->name('categorie_materielles.index');
Route::get('/categorie_materielle/create', [CategorieMaterielleController::class, 'create'])->name('categorie_materielles.create');
Route::post('/categorie_materielle/store', [CategorieMaterielleController::class, 'store'])->name('categorie_materielles.store');
Route::get('/categorie_materielle/show/{id}', [CategorieMaterielleController::class, 'show'])->name('categorie_materielles.show');
Route::get('/categorie_materielle/edit/{id}', [CategorieMaterielleController::class, 'edit'])->name('categorie_materielles.edit');
Route::put('/categorie_materielle/update', [CategorieMaterielleController::class, 'update'])->name('categorie_materielles.update');
Route::delete('/categorie_materielle/destroy/{id}', [CategorieMaterielleController::class, 'destroy'])->name('categorie_materielles.destroy');


// categorie product
Route::get('/categorie_product', [\App\Http\Controllers\categorieproductcontroller::class, 'index'])->name('categorie_products.index');
Route::get('/categorie_product/create', [\App\Http\Controllers\categorieproductcontroller::class, 'create'])->name('categorie_products.create');
Route::post('/categorie_product/store', [\App\Http\Controllers\categorieproductcontroller::class, 'store'])->name('categorie_products.store');
Route::get('/categorie_product/show/{id}', [\App\Http\Controllers\categorieproductcontroller::class, 'show'])->name('categorie_products.show');
Route::get('/categorie_product/edit/{id}', [\App\Http\Controllers\categorieproductcontroller::class, 'edit'])->name('categorie_products.edit');
Route::put('/categorie_product/update', [\App\Http\Controllers\categorieproductcontroller::class, 'update'])->name('categorie_products.update');
Route::delete('/categorie_product/destroy/{id}', [\App\Http\Controllers\categorieproductcontroller::class, 'destroy'])->name('categorie_products.destroy');

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
