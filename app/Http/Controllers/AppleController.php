<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Data\UserData;
use Inertia\Inertia;

class AppleController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Apple/Index');
    }





}
