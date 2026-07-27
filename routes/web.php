<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/checkout/{:id}', function ($id) {
    return "Checkout page for game with ID: {$id}";
})->name('checkout');

// Admin Side
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/games', function () {
        return view('admin.games.index');
    })->name('games.index');

    Route::get('/keys', function () {
        return view('admin.keys.index');
    })->name('keys.index');

    Route::get('/transactions', function () {
        return view('admin.transactions.index');
    })->name('transactions.index');
});
