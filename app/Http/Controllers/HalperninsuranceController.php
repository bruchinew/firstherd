<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HalperninsuranceController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Halperninsurance/Index', [
            'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        ]);
    }





}
