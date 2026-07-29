<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\KeyController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/game/overview', function () {
    return view('front.game');
});
Route::get('/checkout', function () {
    return view('front.checkout');
});



Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Side
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('games', GameController::class)->except(['create', 'show', 'edit']);

    Route::resource('keys', KeyController::class)->only(['index', 'store', 'destroy']);

    Route::get('/transactions', function () {
        return view('admin.transactions.index');
    })->name('transactions.index');
});
