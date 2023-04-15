<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterSessionController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);
        $validated['slug'] = Str::slug($validated['name']);
        $validated['avatar'] = "";
        $validated['description'] = "";
        $user = User::create($validated);
        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json([
            'message' => 'Registration successful',
            'data' => $user,
            'token' => $token,
        ]);

    }
}
