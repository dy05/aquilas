<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\MaterialCategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OutputController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/contact', [AppController::class, 'contact'])->name('contact');
Auth::routes();

// Auth routes
Route::get('/order/{id}', [AppController::class, 'command'])->name('order');
Route::post('/order/{id}', [AppController::class, 'command'])->name('order');

// products
Route::group(['prefix' => 'product_categories', 'as' => 'product_categories.'], function () {
    Route::get('/', [ProductCategoryController::class, 'index'])->name('index');
    Route::get('/create', [ProductCategoryController::class, 'create'])->name('create');
    Route::post('/store', [ProductCategoryController::class, 'store'])->name('store');
    Route::get('/{product_category}', [ProductCategoryController::class, 'show'])->name('show');
    Route::get('/{product_category}/edit', [ProductCategoryController::class, 'edit'])->name('edit');
    Route::put('/{product_category}', [ProductCategoryController::class, 'update'])->name('update');
    Route::delete('/{product_category}', [ProductCategoryController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
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

//materials
Route::group(['prefix' => 'material_categories', 'as' => 'material_categories.'], function () {
    Route::get('/', [MaterialCategoryController::class, 'index'])->name('index');
    Route::get('/create', [MaterialCategoryController::class, 'create'])->name('create');
    Route::post('/store', [MaterialCategoryController::class, 'store'])->name('store');
    Route::get('/{material_category}', [MaterialCategoryController::class, 'show'])->name('show');
    Route::get('/{material_category}/edit', [MaterialCategoryController::class, 'edit'])->name('edit');
    Route::put('/{material_category}', [MaterialCategoryController::class, 'update'])->name('update');
    Route::delete('/{material_category}', [MaterialCategoryController::class, 'destroy'])->name('destroy');
});
Route::group(['prefix' => 'materials', 'as' => 'materials.'], function () {
    Route::get('/', [MaterialController::class, 'index'])->name('index');
    Route::get('/create', [MaterialController::class, 'create'])->name('create');
    Route::post('/store', [MaterialController::class, 'store'])->name('store');
    Route::get('/{material}', [MaterialController::class, 'show'])->name('show');
    Route::get('/{material}/edit', [MaterialController::class, 'edit'])->name('edit');
    Route::put('/{material}', [MaterialController::class, 'update'])->name('update');
    Route::delete('/{material}', [MaterialController::class, 'destroy'])->name('destroy');
});

// customers
Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {
    Route::get('/', [CustomerController::class, 'index'])->name('index');
    Route::get('/create', [CustomerController::class, 'create'])->name('create');
    Route::post('/store', [CustomerController::class, 'store'])->name('store');
    Route::get('/{customer}', [CustomerController::class, 'show'])->name('show');
    Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('edit');
    Route::put('/{customer}', [CustomerController::class, 'update'])->name('update');
    Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('destroy');
});

//commands
Route::group(['prefix' => 'commands', 'as' => 'commands.'], function () {
    Route::get('/', [CommandController::class, 'index'])->name('index');
    Route::get('/create', [CommandController::class, 'create'])->name('create');
    Route::post('/store', [CommandController::class, 'store'])->name('store');
    Route::get('/{command}', [CommandController::class, 'show'])->name('show');
    Route::get('/{command}/edit', [CommandController::class, 'edit'])->name('edit');
    Route::put('/{command}', [CommandController::class, 'update'])->name('update');
    Route::delete('/{command}', [CommandController::class, 'destroy'])->name('destroy');
    Route::post('/termine/{command}', [CommandController::class, 'termine'])->name('termine');
});

//entries
Route::group(['prefix' => 'entries', 'as' => 'entries.'], function () {
    Route::get('/', [EntryController::class, 'index'])->name('index');
    Route::get('/create', [EntryController::class, 'create'])->name('create');
    Route::post('/store', [EntryController::class, 'store'])->name('store');
    Route::get('/{entry}', [EntryController::class, 'show'])->name('show');
    Route::get('/{entry}/edit', [EntryController::class, 'edit'])->name('edit');
    Route::put('/{entry}', [EntryController::class, 'update'])->name('update');
    Route::delete('/{entry}', [EntryController::class, 'destroy'])->name('destroy');
});

//outputs
Route::group(['prefix' => 'outputs', 'as' => 'outputs.'], function () {
    Route::get('/', [OutputController::class, 'index'])->name('index');
    Route::get('/create', [OutputController::class, 'create'])->name('create');
    Route::post('/store', [OutputController::class, 'store'])->name('store');
    Route::get('/{entry}', [OutputController::class, 'show'])->name('show');
    Route::get('/{output}/edit', [OutputController::class, 'edit'])->name('edit');
    Route::put('/{output}', [OutputController::class, 'update'])->name('update');
    Route::delete('/{output}', [OutputController::class, 'destroy'])->name('destroy');
});
