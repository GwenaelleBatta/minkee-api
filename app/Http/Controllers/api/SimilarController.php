<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class SimilarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(User $user, Plan $plan)
    {
        $similar = PlanResource::collection(Plan::where('type', $plan->type)->where('user_id', '!=', $user->id)->take(4)->get());

        return $similar;
    }
}
