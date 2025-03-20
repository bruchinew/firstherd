<?php

namespace App\Http\Controllers;

use App\Services\SandboxApiService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $sandboxApi;

    public function __construct(SandboxApiService $sandboxApi)
    {
        $this->sandboxApi = $sandboxApi;
    }

    public function createAccount(Request $request)
    {
        $name = $request->name;
        $initialBalance = $request->initial_balance;

        // Call the createAccount method from SandboxApiService
        $response = $this->sandboxApi->createAccount($name, $initialBalance);

        return response()->json($response);
    }

    public function transferFunds(Request $request)
    {
        $fromAccountId = $request->from_account_id;
        $toAccountId = $request->to_account_id;
        $amount = $request->amount;

        // Call the transferFunds method from SandboxApiService
        $response = $this->sandboxApi->transferFunds($fromAccountId, $toAccountId, $amount);

        return response()->json($response);
    }
}
