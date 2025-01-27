<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Inertia\Inertia;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::all();

        return Inertia::render('Halperninsurance/Admin/Quotes', [
            'quotes' => $quotes
        ]); 
    }

}
