<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

//Home

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', function () {

    // Get featured events
    $featuredItems = \App\Models\Item::where("featured", 1)->get();

    // View data
    $data = [
        "featuredItems" => $featuredItems
    ];

    return view('home', $data);
})->name("home");


//Products

Route::get('/products', function () {
    return view('products');
});

Route::get('/products', [ItemController::class, 'index']);

//GET /products/1
Route::get('/products/{id}', [ItemController::class,'show'])->name("products.show");

// GET /search?keyword=abc
Route::get('/search', [ItemController::class,'search'])->name("products.search");

// Contact Us

Route::get('/contactus', function () {
    return view('contact_us');
});

// calls the ContactController and runs store() method and created the shortcut name 'contact.store' for easy referencing
Route::post('/contactus', [ContactController::class, 'store'])->name('contactus.store');


//Categories

// GET /categories/3
Route::get('/categories/{id}', [CategoryController::class,'show'])->name("categories.show");