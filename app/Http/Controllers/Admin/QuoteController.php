<?php

namespace App\Http\Controllers\Admin;

use App\Data\QuoteData;
use App\Http\Controllers\Controller;
use App\Models\Quote;
use Inertia\Inertia;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::query()
            ->with('visitor')
            ->get();
        return Inertia::render('Halperninsurance/Admin/Quotes/Index', [
            'quotes' => QuoteData::collect($quotes),
        ]);
    }

}
