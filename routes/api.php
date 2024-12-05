<?php



use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/usersapi', [UserController::class, 'apiIndex'])->name('usersApi.index');
