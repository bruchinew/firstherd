<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        $quotes = Quote::all();
        // return response()->json($quotes);
        return Inertia::render('Halperninsurance/Quote/Index', [
            'route' => request()->route()->getName(),
        ]);
    }

    /**
     * Store a newly created quote in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->all();
        // ->validate([
        // 'visitor_id' => 'required|string|max:255',
        // 'name' => 'nullable|string|max:255',
        // 'email' => 'nullable|string|email|max:255',
        // 'phone' => 'nullable|string|max:20',
        // 'address' => 'required|string|max:255',
        // 'property_value' => 'required|numeric',
        // 'coverage_amount' => 'required|numeric',
        // 'property_type' => 'required|in:detached,semi-detached,apartment,bungalow',
        // 'number_of_claims' => 'nullable|integer',
        // 'build_year' => 'nullable|integer',
        // 'location' => 'nullable|string|max:255',
        // 'quote_date' => 'nullable|date',
        // 'quote_amount' => 'nullable|numeric',
        // 'status' => 'nullable|in:pending,sent,expired',
        // 'coverage_factor' => 'nullable|numeric',
        // 'location_factor' => 'nullable|numeric',
        // 'claims_factor' => 'nullable|numeric',
        // 'age_factor' => 'nullable|numeric',
        // 'quote_price_id' => 'nullable|exists:quote_prices,price_id',
        // ]);
        // Set default value for visitor_id if not provided
        $validatedData['visitor_id'] = $validatedData['visitor_id'] ?? '2';

        $quote = Quote::create($validatedData);

        return redirect()->route('quote.show', ['quote' => $quote->id]);
    }

    // /**
    //  * Display the specified quote.
    //  *
    //  * @param  \App\Models\Quote  $quote
    //  * @return \Illuminate\Http\Response
    //  */
    public function show(int $id)
    {
        $quote = Quote::query()->where('quote_id', $id)->first();
        return Inertia::render('Halperninsurance/Quote/Show', [
            'quote' => $quote,
        ]);


    }

    /**
     * Update the specified quote in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        $validatedData = $request->validate([
            'visitor_id' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
            'property_value' => 'required|numeric',
            'coverage_amount' => 'required|numeric',
            'property_type' => 'required|in:detached,semi-detached,apartment,bungalow',
            'number_of_claims' => 'nullable|integer',
            'build_year' => 'nullable|integer',
            'location' => 'nullable|string|max:255',
            'quote_date' => 'nullable|date',
            'quote_amount' => 'nullable|numeric',
            'status' => 'nullable|in:pending,sent,expired',
            'coverage_factor' => 'nullable|numeric',
            'location_factor' => 'nullable|numeric',
            'claims_factor' => 'nullable|numeric',
            'age_factor' => 'nullable|numeric',
            'quote_price_id' => 'nullable|exists:quote_prices,price_id',
        ]);

        $quote->update($validatedData);
        return response()->json($quote);
    }

    /**
     * Remove the specified quote from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
        return response()->json(null, 204);
    }

    public function payment(Request $request)
    {
        return Inertia::render('Halperninsurance/Quote/Payment', [

        ]);
    }
}
