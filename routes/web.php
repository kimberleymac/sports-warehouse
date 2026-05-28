<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

//Home

Route::get('/', function () {
    return view('home');
});

//Products

Route::get('/products', function () {
    return view('products');
});

Route::get('/products', [ItemController::class, 'index']);

Route::get('/products/{id}', [ItemController::class,'show'])->name("products.show");

// Contact Us

Route::get('/contactus', function () {
    return view('contact_us');
});

// calls the ContactController and runs store() method and created the shortcut name 'contact.store' for easy referencing
Route::post('/contactus', [ContactController::class, 'store'])->name('contactus.store');


//Categories

// GET /categories/3
Route::get('/categories/{id}', [CategoryController::class,'show'])->name("categories.show");