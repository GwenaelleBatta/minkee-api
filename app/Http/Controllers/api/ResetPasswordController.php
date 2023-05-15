<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Notifications\CustomResetPasswordNotification;
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
            $request->only('email'),
        );
        return $status === Password::RESET_LINK_SENT
            ? response()->json([
                'message' => 'Un email vous a été envoyé',
            ])
            : response()->json([
                'message' => 'Hello'.$status,
            ]);
    }

    public function edit($token)
    {
        return view('user.reset_password', ['token' => $token]);
    }

    public function update(ResetPasswordRequest $request)
    {
        $request->validated();
        $status = Password::reset(
            $request->only('email', 'password', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => password_hash($password,PASSWORD_DEFAULT)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect('/')->with('success', __('home.success_reset'))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
