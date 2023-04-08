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

    public function store(string $locale = null, ForgotPasswordRequest $request)
    {
        $request->validated();

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function update(string $locale, ResetPasswordRequest $request)
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

                Auth::login($user);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect('/'.$locale)->with('success', __('home.success_reset'). auth()->user()->firstname .' '. auth()->user()->name)
            : back()->withErrors(['email' => [__($status)]]);

    }
}
