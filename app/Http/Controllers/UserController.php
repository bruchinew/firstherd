<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Data\UserData;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('category')) {
            $query->where('category', 'like', '%' . $request->input('category') . '%');
        }

        $users = $query->paginate(5);

        // Transform the paginated items using UserData
        $users->getCollection()->transform(function ($user) {
            return UserData::fromModel($user);
        });

        return Inertia::render('Users/Index', [
            'users' => $users,
        ]);
    }

    public function apiIndex(Request $request)
    {
        dd('apiIndex');
        $query = User::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('category')) {
            $query->where('category', 'like', '%' . $request->input('category') . '%');
        }

        $users = $query->paginate(5);

        // Transform the paginated items using UserData
        $users->getCollection()->transform(function ($user) {
            return UserData::fromModel($user);
        });

        return response()->json($users);
    }
    public function show(int $user, Request $request)
    {
        return Inertia::render('Users/Show', [
            'user' => UserData::fromModel(User::findOrFail($user)),
        ]);
    }
}
