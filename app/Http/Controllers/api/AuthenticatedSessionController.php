<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Mesure;
use App\Models\Picture;
use App\Models\Plan;
use App\Models\PlanStep;
use App\Models\Supply;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $user->api_token = Str::random(60);
        $user->remember_token = Str::random(10);
        $user->save();
        return response()->json([
            'message' => 'Logout successful',
        ]);
    }

    public function destroy(string $id)
    {
        $steps = [];
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'Utilisateur introuvable',
            ], 404);
        }
        $plans = Plan::where('user_id', $id)->get();
        DB::table('favorite')->where('user_id', $user->id)->delete();
        foreach ($plans as $plan) {
            $steps = PlanStep::where('plan_id', $plan->id)->get();
            DB::table('favorite')->where('plan_id', $plan->id)->delete();
        }
        Mesure::where('user_id', $id)->delete();
        Supply::where('user_id', $id)->delete();
        Picture::where('user_id', $id)->delete();
        DB::table('followers')->where('follower_id', $id)->delete();
        DB::table('followers')->where('followed_id', $id)->delete();
        DB::table('checksteps')->where('user_id', $id)->delete();

        foreach ($steps as $step) {
            DB::table('checksteps')->where('planstep_id', $step->id)->delete();
            $step->delete();
        }
        foreach ($plans as $plan) {
            $plan->delete();
        }
        $user->delete();

        return response()->json([
            'message' => 'Utilisateur effacé avec succès',
        ]);
    }
}
