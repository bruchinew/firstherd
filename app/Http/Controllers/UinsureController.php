<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UinsureController extends Controller
{
    public function clientDetails(Request $request)
    {
        $clientDetails = $request->all();
        dd($clientDetails);
        return Inertia::render('Halperninsurance/Uinsure/Address', [
            // 'client_details' => $clientDetails,
        ]);
    }
}
