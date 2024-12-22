<?php

use App\Http\Controllers\AppleController;
use App\Http\Controllers\HalperninsuranceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\QuotePriceController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{users}', [UserController::class, 'show'])->name('users.show');
    Route::get('/apple', [AppleController::class, 'index'])->name('apple.index');
    Route::get('/halperninsurance', [HalperninsuranceController::class, 'index'])->name('halperninsurance.index');
    Route::get('/halperninsurance/quote', [QuoteController::class, 'index'])->name('quote.index');
    Route::post('/halperninsurance/quote/index', [QuoteController::class, 'store'])->name('quote.store');
    Route::get('/halperninsurance/quote/{quote}/payment', [QuoteController::class, 'payment'])->name('quote.payment');
    Route::post('/halperninsurance/quote/payment', [QuoteController::class, 'storePayment'])->name('quote.storepayment');
    Route::get('/halperninsurance/quote/{quote}/summary', [QuoteController::class, 'summary'])->name('quote.summary');
    Route::get('/halperninsurance/quote', [QuoteController::class, 'show'])->name('quote.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'quotes' => QuoteController::class,
        'quote_prices' => QuotePriceController::class,
    ]);
});

require __DIR__.'/auth.php';
