<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AuthenticatedSessionController extends Controller
{

    public function store(LoginRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($validated, true)) {
            $user = Auth::user();
            $user->api_token = Str::random(60);
            $user->remember_token = Str::random(10);
            $followed = $user->followed;
            $follower = $user->followers;
            $pictures = $user->pictures;
            $token = $user->remember_token;
            $user->save();
            return response()->json([
                'message' => 'Authentication successful',
                'favorite' => count($user->favorites),
                'data' => $user,
                'email' => $user->email,
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
    }


    public function logout(User $user)
    {
        $token = $user->api_token;
        $user->api_token =  Str::random(60);
        $user->remember_token = Str::random(10);
        $user->save();
        return response()->json([
            'message' => 'Logout successful',
        ]);
    }
}
