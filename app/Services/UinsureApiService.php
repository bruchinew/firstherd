<?php

namespace App\Services;

use App\Models\File;
use App\Models\Quote;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class UinsureApiService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('API_KEY');
        $this->baseUrl = env('API_BASE_URL');
    }

    public function createPolicy($policyData)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
            ])
            ->withoutVerifying()  // Disable SSL certificate verification
            ->post($this->baseUrl . '/bc', $policyData);

            // Check for a successful response
            if ($response->successful()) {
                Quote::create([
                    'quote_reference' => $response['QuoteReference'],
                    'policy_data' => json_encode($policyData),
                ]);

                return $response->json();
            }

            // Log the response for debugging
            Log::error('API request failed', ['response' => $response->body()]);

            // Return error if the request failed
            return response()->json(['error' => 'API request failed', 'message' => $response->body()], $response->status());
        } catch (Exception $e) {
            // Catch any exceptions and return a detailed error message
            Log::error('Exception occurred', ['exception' => $e->getMessage()]);
            return response()->json(['error' => 'Exception occurred', 'message' => $e->getMessage()], 500);
        }
    }

    public function getPolicyDocuments($policyId)
    {
        try {
            $url = $this->baseUrl . "/bc/{$policyId}/documents";

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json', // Ensure you're sending JSON data
            ])
            ->withoutVerifying()  // Disable SSL certificate verification
            ->post($url, ['APIKey' => $this->apiKey]); // Use POST request with APIKey in the body


            // Check if the response is successful
            if ($response->successful()) {
                // Extract the DocumentKeys from the response
                $documentKeys = $response->json()['DocumentKeys'];
                return ['DocumentKeys' => $documentKeys];
            }

            // Return error if the request failed
            return ['error' => 'API request failed', 'message' => $response->body()];
        } catch (Exception $e) {
            Log::error('Exception occurred', ['exception' => $e->getMessage()]);

        }
    }

    public function getDetail($policyId)
    {
        try {
            $url = $this->baseUrl . "/bc/{$policyId}";
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->withoutVerifying()  // Disable SSL certificate verification
            ->post($url, ['APIKey' => $this->apiKey]); // Use POST request with APIKey in the body


            // Check if the response is successful
            if ($response->successful()) {
                $quote = Quote::where('quote_reference', $policyId)->firstOrFail();
                // Update the policy_data
                $quote->update([
                    'policy_data' => json_encode($response->json()),
                ]);


                return $response->json();
            }


            // Return error if the request failed
            return ['error' => 'API request failed', 'message' => $response->body()];
        } catch (Exception $e) {
            return ['error' => 'Exception occurred', 'message' => $e->getMessage()];
        }
    }

    public function getEligibility($quoteReference)
    {
        try {
            $url = $this->baseUrl . "/bc/{$quoteReference}/eligibility";
            $response = Http::withHeaders([
                 'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->withoutVerifying()  // Disable SSL certificate verification
            ->post($url, ['APIKey' => $this->apiKey]); // Use POST request with APIKey in the body

            if ($response->successful()) {
                return $response->json();
            }

        } catch (Exception $e) {
            return ['error' => 'Exception occurred', 'message' => $e->getMessage()];
        }
    }

    public function getIllustration($policyId)
    {
        $policyData = json_decode($policyId->policy_data, true);

        try {
            $url = $this->baseUrl . "/bc/{$policyId}/illustration";
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->withoutVerifying()  // Disable SSL certificate verification
            ->post($url, ['APIKey' => $this->apiKey,'PolicyNumber' => $policyId->quote_reference,
        'AgreeDeclarations' => true,'SelectedPremiumId' => $policyData['SelectedPremiumId']]); // Use POST request with APIKey in the body

            dd($response->json());
            if ($response->successful()) {
                return $response->json();
            }

        } catch (Exception $e) {
            return ['error' => 'Exception occurred', 'message' => $e->getMessage()];
        }
    }




    public function getLink($policyId)
    {
        try {
            $url = $this->baseUrl . "/bc/{$policyId}/direct";
            $response = Http::withHeaders([

                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->withoutVerifying()  // Disable SSL certificate verification
            ->post($url, ['APIKey' => $this->apiKey]); // Use POST request with APIKey in the body

            // Check if the response is successful
            if ($response->successful()) {
                return $response->json();
            }

            // Return error if the request failed
            return ['error' => 'API request failed', 'message' => $response->body()];
        } catch (Exception $e) {
            return ['error' => 'Exception occurred', 'message' => $e->getMessage()];
        }
    }
}
