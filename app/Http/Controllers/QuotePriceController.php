<?php

namespace App\Http\Controllers;

use App\Models\QuotePrice;
use Illuminate\Http\Request;

class QuotePriceController extends Controller
{
    /**
     * Display a listing of the quote prices.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotePrices = QuotePrice::all();
        return response()->json($quotePrices);
    }

    /**
     * Store a newly created quote price in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'factor_type' => 'required|string|max:255',
            'multiplication_amount' => 'required|numeric',
        ]);

        $quotePrice = QuotePrice::create($validatedData);
        return response()->json($quotePrice, 201);
    }

    /**
     * Display the specified quote price.
     *
     * @param  \App\Models\QuotePrice  $quotePrice
     * @return \Illuminate\Http\Response
     */
    public function show(QuotePrice $quotePrice)
    {
        return response()->json($quotePrice);
    }

    /**
     * Update the specified quote price in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuotePrice  $quotePrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuotePrice $quotePrice)
    {
        $validatedData = $request->validate([
            'factor_type' => 'required|string|max:255',
            'multiplication_amount' => 'required|numeric',
        ]);

        $quotePrice->update($validatedData);
        return response()->json($quotePrice);
    }

    /**
     * Remove the specified quote price from storage.
     *
     * @param  \App\Models\QuotePrice  $quotePrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotePrice $quotePrice)
    {
        $quotePrice->delete();
        return response()->json(null, 204);
    }
}
