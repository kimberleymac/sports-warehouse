<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/contactus', function () {
    return view('contact_us');
});

// calls the ContactController and runs store() method and created the shortcut name 'contact.store' for easy referencing
Route::post('/contactus', [ContactController::class, 'store'])->name('contactus.store');
