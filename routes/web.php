<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ItemController as AdminItemController;
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
Route::get('/products/{item:slug}', [ItemController::class,'show'])->name("products.show");

// GET /search?keyword=abc
Route::get('/search', [ItemController::class,'search'])->name("products.search");


// POST /products/1/save
Route::post('/products/{item:slug}/save', [ItemController::class,'save'])->name("products.save");


// POST /products/1/unsave
Route::post('/products/{item:slug}/unsave', [ItemController::class,'unsave'])->name("products.unsave");

// PUT update quantity
Route::put('products/{item:slug}/update-quantity', [ItemController::class, 'updateQuantity'])->name('products.update-quantity');

// GET /saved
Route::get('/saved', [ItemController::class,'showSaved'])->name("products.saved");


// Checkout

// GET /checkout
// Display the checkout form
Route::get('/checkout', function (){
    
    // Get the saved item IDs from the session
    $cart = Session::get("cart", []);

    // Get item Ids
    $itemIds = array_keys($cart);

    // Fetch items
    $items = Item::whereIn("itemId", $itemIds)->get();

    // OPTIONAL: Get the actual items (from DB) if you want the display titles
    foreach ($items as $item) {
        $item->quantity = $cart[$item->itemId]['quantity'] ?? 1;
    }

    // Pass the data into the view
    // ["this name" => $variable] the name you want in the view context, i.e will be called items in the checkout view
    return view('checkout', ["items" => $items]);

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



// LARAVEL BREEZE ROUTES

use App\Http\Controllers\ProfileController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// FULL BREEZE CODE

// <?php

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';


/**
 * Admin routes
 */

// Resource group that defines all of the CRUD actions/endpoints for categories
//Route::resource("admin/categories", AdminCategoryController::class)->middleware("auth")->names("admin.categories");

// Resource group that defines all of the CRUD actions/endpoints for items
//Route::resource("admin/items", AdminItemController::class)->middleware("auth")->names("admin.items");

// Updates resouce CRUD actions/endpoints with admin role using middleware 'admin'
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('categories', AdminCategoryController::class)->names('admin.categories');
    Route::resource('items', AdminItemController::class)->names('admin.items');
});


// For debugging
// Route::get('/clear-cart', function() {
//     Session::forget('cart');
//     Session::forget('saved_items');
//     return 'Cart cleared successfully';
// });