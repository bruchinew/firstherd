<?php


use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\QuoteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('quotes', [QuoteController::class,'index'])->name('quotes');

});
