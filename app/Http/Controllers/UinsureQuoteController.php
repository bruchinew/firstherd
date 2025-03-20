<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Services\UinsureApiService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UinsureQuoteController extends Controller
{
    protected $uinsureApiService;

    public function __construct(UinsureApiService $uinsureApiService)
    {
        $this->uinsureApiService = $uinsureApiService;
    }
    public function index()
    {
        return Inertia::render('Halperninsurance/Uinsure/Index', );
    }
    /**
     * Store a newly created quote in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client1Details = $request->Client1;
        // $client2Details = $request->Client2;

        // Store client details in the session
        $clientDetails = [
            'Client1' => $client1Details,
            // 'Client2' => $client2Details,
        ];

        session(['clientDetails' => $clientDetails]);

        return redirect()->route('uinsure-quote.address');
    }

    public function address(Request $request)
    {
        $clientDetails = session('clientDetails');
        $client1Details = $clientDetails['Client1'] ?? null;
        // $client2Details = $clientDetails['Client2'] ?? null;

        return Inertia::render('Halperninsurance/Uinsure/Address', [
            'client1' => $client1Details,
            // 'client2' => $client2Details,
        ]);
    }

    public function createPolicy(Request $request)
    {
        $policyData = $request->all();
        $policyData['APIKey'] = env('API_KEY');
        $newPolicy = $this->uinsureApiService->createPolicy($policyData);
        $policyDetails = $this->uinsureApiService->getDetail($newPolicy['QuoteReference']);


        return redirect()->route('uinsure-quote.show', [
               'quote' => $newPolicy['QuoteReference'],
           ]);

    }

    public function show($quote)
    {
        // Find the quote by quote_reference
        $quote = Quote::where('quote_reference', $quote)->firstOrFail();
        return Inertia::render('Halperninsurance/Uinsure/Show', [
            'policy' => $quote,
        ]);
    }

    public function getEligibility(Request $request, $quoteReference)
    {
        $eligibility = $this->uinsureApiService->getEligibility($quoteReference);
        return Inertia::render('Halperninsurance/Uinsure/Eligibility', [
                    'eligibility' => $eligibility,
                    'quote_reference' => $quoteReference,
                ]);
    }

    public function summary(Request $request, $quoteId)
    {

        $quote = Quote::where('quote_reference', $quoteId)->firstOrFail();
        $confirmedEligibility = $this->uinsureApiService->getIllustration($quote);
        return Inertia::render('Halperninsurance/Uinsure/Summary', [
            'policy' => $quote,
        ]);
    }



}
