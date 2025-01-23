<?php

namespace App\Http\Controllers;

use App\Data\QuoteFormData;
use App\Models\Quote;
use App\Models\QuotePrice;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
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
    public function store(Request $request, QuoteFormData $quoteFormData)
    {
        $quoteFormData->visitor_id = auth()->id();
        $buildYear = QuotePrice::query()->where('factor_type', 'build_year')->first()->multiplication_amount;
        $quote_amount = $request->input('build_year') * $buildYear;
        $quoteFormData->quote_amount = $quote_amount;

        $quote = Quote::create($quoteFormData->toArray());

        return redirect()->route('quote.show', $quote->id);
    }

    // /**
    //  * Display the specified quote.
    //  *
    //  * @param  \App\Models\Quote  $quote
    //  * @return \Illuminate\Http\Response
    //  */
    public function show(Request $request, Quote $quote)
    {
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
    public function update(Request $request, QuoteFormData $quoteFormData)
    {
        $quoteFormData->visitor_id = auth()->id();
        $buildYear = QuotePrice::query()->where('factor_type', 'build_year')->first()->multiplication_amount;
        $quote_amount = $request->input('build_year') * $buildYear;
        $quoteFormData->quote_amount = $quote_amount;

        $quote = Quote::create($quoteFormData->toArray());

        return redirect()->route('quote.show', $quote->id);
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
    public function payment(Request $request, Quote $quote)
    {
        return Inertia::render('Halperninsurance/Quote/Payment', [
            'quote' => $quote,
        ]);
    }

    public function storePayment(Request $request, Quote $quote)
    {
        $qote = Quote::find($request->input('quote_id'));

        $price = (int) $request->input('quote_amount');
        $amountInCents = $price * 100;

        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $amountInCents,
                'currency' => 'usd',
                'payment_method' => $request->paymentMethodId,
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => route('quote.summary', ['quote' => $qote->id]),
            ]);


            if ($paymentIntent->status == 'succeeded') {

                $qote->update(['status' => 'paid']);
                return response()->json([
                    'success' => true,
                ]);
            } else {
                return response()->json(['error' => 'Payment failed or requires further action.']);
            }

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function summary(Request $request, int $id)
    {

        $quote = Quote::query()->where('id', $id)->first();

        return Inertia::render('Halperninsurance/Quote/Summary', [
'quote' => $quote,
        ]);
    }
}
