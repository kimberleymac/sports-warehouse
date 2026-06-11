<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Models\Item;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

// Home


Route::get('/', function () {

    // Get featured events
    $featuredItems = \App\Models\Item::where("featured", 1)->get();

    // View data
    $data = [
        "featuredItems" => $featuredItems
    ];

    return view('home', $data);
})->name("home");


// Products

Route::get('/products', function () {
    return view('products');
});

Route::get('/products', [ItemController::class, 'index']);

// GET /products/1
Route::get('/products/{id}', [ItemController::class,'show'])->name("products.show");

// GET /search?keyword=abc
Route::get('/search', [ItemController::class,'search'])->name("products.search");


// POST /products/1/save
Route::post('/products/{id}/save', [ItemController::class,'save'])->name("products.save");


// POST /products/1/save
Route::post('/products/{id}/unsave', [ItemController::class,'unsave'])->name("products.unsave");

// GET /saved
Route::get('/saved', [ItemController::class,'showSaved'])->name("products.saved");


// Checkout

// GET /checkout
// Display the checkout form
Route::get('/checkout', function (){
    
    // Get the saved item IDs from the session
    $savedItemIds = Session::get("saved_items", []);

    // OPTIONAL: Get the actual items (from DB) if you want the display titles
    $items = Item::whereIn("itemId", $savedItemIds)->get();

    // Pass the data into the view
    // ["this name" => $variable] the name you want in the view context, i.e will be called savedItems in the checkout view
    return view('checkout', ["savedItems" => $items]);

})->name("products.checkout");

// POST /checkout 
// Process the checkout form data
Route::post('/checkout', [OrderController::class,'checkout'])->name("products.checkout");




// Contact Us

Route::get('/contactus', function () {
    return view('contact_us');
});

// Calls the ContactController and runs store() method and created the shortcut name 'contact.store' for easy referencing
Route::post('/contactus', [ContactController::class, 'store'])->name('contactus.store');


// Categories

// GET /categories/3
Route::get('/categories/{category:slug}', [CategoryController::class,'show'])->name("categories.show");