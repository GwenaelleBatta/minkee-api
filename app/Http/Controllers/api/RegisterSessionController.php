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
        $validated['avatar'] = "storage/profil/avatar/2f57747a7dde66288f69e8b8ffedfcc1f1de9ae5.png";
        $validated['description'] = "Description";
        $validated['connected'] = 1;

        $user = User::create($validated);

        $user->api_token = Str::random(60);
        $user->remember_token = Str::random(10);
        $user->save();

        return response()->json([
            'message' => 'Registration successful',
            'data' => $user,
            'token' => $user->api_token,
        ]);
    }

}
