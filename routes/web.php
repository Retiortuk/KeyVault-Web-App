<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/checkout/{:id}', function ($id) {
    return "Checkout page for game with ID: {$id}";
})->name('checkout');

// Admin Side
Route::prefix('admin')->name('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/games', function () {
        return "Management page for games";
    })->name('games.index');

    Route::get('/keys', function () {
        return "Management page for game keys";
    })->name('keys.index');

    Route::get('/transactions', function () {
        return "Management page for transactions";
    })->name('transactions.index');
});
