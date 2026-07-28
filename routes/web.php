<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\KeyController;

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

    Route::resource('games', GameController::class)->except(['create', 'show', 'edit']);

    Route::resource('keys', KeyController::class)->only(['index', 'store', 'destroy']);

    Route::get('/transactions', function () {
        return view('admin.transactions.index');
    })->name('transactions.index');
});
