<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Services\UinsureApiService;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PolicyController extends Controller
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


    public function getDetail($policyId)
    {
        $policyDetails = $this->uinsureApiService->getDetail($policyId);
        return response()->json($policyDetails);
        // return Inertia::render('Halperninsurance/Uinsure/Show', [
        //     'policy' => $policyDetails,
        // ]);
    }

    public function getLink($policyId)
    {
        $policyDetails = $this->uinsureApiService->getLink($policyId);
        return response()->json($policyDetails);
    }

    public function getPolicyDocuments($policyId)
    {
        $policyDetails = $this->uinsureApiService->getPolicyDocuments($policyId);

        // Directly return the JSON response from the service
        return response()->json($policyDetails);
    }

    public function clientDetails(Request $request)
    {
        $clientDetails = $request->all();
        return Inertia::render('Halperninsurance/Uinsure/Address', [
            // 'client_details' => $clientDetails,
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
}
