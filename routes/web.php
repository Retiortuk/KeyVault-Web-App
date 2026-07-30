<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\KeyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;

Route::get('/',[FrontController::class, 'index'])->name('home');

Route::get('/game/overview', function () {
    return view('front.game');
});

Route::get('/checkout', function () {
    return view('front.checkout');
});

Route::get('/checkout/success', function () {
    $transaction = (object) [
        'order_id' => 'ORD-12345678',
        'key' => 'KVLT-9X2R-P4LQ-ZM92'
    ];
    return view('front.success', compact('transaction'));
})->name('checkout.success');

Route::get('/checkout/failed', function () {
    return view('front.failed');
})->name('checkout.failed');



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
