<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // You can also use Guzzle if preferred

class UinsureController extends Controller
{
    // This method will handle authentication and return the API key
    public function getApiKey(Request $request)
    {
        // Extract email and password from the request
        $email = $request->input('email');
        $password = $request->input('password');

        // Send the request to Uinsure API to get the API key
        $response = Http::post('https://api.test.uinsure.co.uk/auth', [
            'EmailAddress' => $email,
            'Password' => $password,
        ]);

        // If the request is successful, return the API key
        if ($response->successful()) {
            return response()->json([
                'apiKey' => $response->json()['apiKey']
            ]);
        }

        // Handle failure (e.g., wrong credentials)
        return response()->json(['error' => 'Authentication failed'], 401);
    }
}
