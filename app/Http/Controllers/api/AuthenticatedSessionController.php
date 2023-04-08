<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthenticatedSessionController extends Controller
{

    public function store(LoginRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            // L'authentification a réussi, retourner une réponse JSON avec un jeton d'accès
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json([
                'message' => 'Authentication successful',
                'access_token' => $token,
            ]);
        } else {
            // L'authentification a échoué, retourner une réponse JSON avec une erreur
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Logout successful',
        ]);
    }
}
