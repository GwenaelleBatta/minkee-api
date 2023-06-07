<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class VerificationController extends Controller
{

    public function verifyEmail($id, $hash)
    {
        $user = User::findOrFail($id);

        if (hash_equals($hash, sha1($user->getEmailForVerification()))) {
            $user->markEmailAsVerified();

            if (!$user->connected){
                $user->connected = true;
            }
            $user->save();
            $message = "Votre compte a été vérifié avec succès !";

            return view('welcome', compact('message'));

        } else {
            return "Lien de validation invalide.";
        }
    }





}
