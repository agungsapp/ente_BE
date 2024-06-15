<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TempatMakanController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReviewController;



// Welcome Page Route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard Route with authentication and verification middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes for user profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Using TempatMakanController for the index view
    Route::get('/index', [TempatMakanController::class, 'index'])->name('index');
});

// Culinary and Details Routes
Route::get('/culinary', [TempatMakanController::class, 'index']);
Route::get('/details/{id}', [TempatMakanController::class, 'details'])->name('details');
Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');


Route::post('/submit-review', [ReviewController::class, 'saveRating'])->name('front.saveRating');
Route::resource('bookmark', BookmarkController::class);
Route::get('/reviews', [ReviewController::class, 'index']);
Route::post('/review/submit', [ReviewController::class, 'submit']);


Route::get('/filter-by-location', [TempatMakanController::class, 'filterByLocation'])->name('filter.by.location');
// routes/web.php
Route::resource('product', ProductController::class);


// Include authentication routes from a separate file
require __DIR__.'/auth.php';
