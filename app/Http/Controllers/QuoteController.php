<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class QuoteController extends Controller
{
    public function index(Request $request)
    {

        return Inertia::render('Halperninsurance/Quote/Index');
    }





}
