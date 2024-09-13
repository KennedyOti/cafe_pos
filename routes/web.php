<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;

// Breeze default home and dashboard routes
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Breeze user profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// POS System Routes - Ensure these routes are protected by authentication
Route::middleware(['auth'])->group(function () {
    // Dish Routes
    Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');
    Route::get('/dishes/create', [DishController::class, 'create'])->name('dishes.create');
    Route::post('/dishes', [DishController::class, 'store'])->name('dishes.store');
    Route::get('/dishes/{dish}/edit', [DishController::class, 'edit'])->name('dishes.edit');
    Route::put('/dishes/{dish}', [DishController::class, 'update'])->name('dishes.update');
    Route::delete('/dishes/{dish}', [DishController::class, 'destroy'])->name('dishes.destroy');

    // Sell Dish Route - Should be handled by SalesController
    Route::post('/dishes/{dish}/sell', [SalesController::class, 'sell'])->name('dishes.sell');

    // Sales Routes
    Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
});

require __DIR__ . '/auth.php';
