<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/usersapi', [UserController::class, 'apiIndex'])->name('usersApi.index');


Route::post('accounts/create', [AccountController::class, 'createAccount']);
Route::post('transfer', [AccountController::class, 'transferFunds']);


Route::post('/policy/{policyId}', [PolicyController::class, 'getDetail']);
Route::post('/policy/{policyId}/link', [PolicyController::class, 'getLink']);
Route::post('/policy/{policyId}/documents', [PolicyController::class, 'getPolicyDocuments']);
Route::post('/policy', [PolicyController::class, 'createPolicy']);
