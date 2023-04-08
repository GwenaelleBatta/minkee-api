<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{

    public function store(ForgotPasswordRequest $request)
    {
        $request->validated();

        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? response()->json([
                'message' => 'Mot de passe réinitialiser',
            ])
            : response()->json([
                'message' => $status,
            ]);
    }

    public function update(ResetPasswordRequest $request)
    {
        $request->validated();
        $status = Password::reset(
            $request->only('email', 'password', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ])->setRememberToken(Str::random(60));

                $user->save();
                event(new PasswordReset($user));

                Auth::login($user);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json([
                'message' => 'Mot de passe réinitialiser',
            ]) : response()->json([
                'message' => $status,
            ]);

    }
}
