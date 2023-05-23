<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        if (count($user->favorites) !== 0) {
            $types = [];
            $ids = [];
            foreach ($user->favorites as $favorite) {
                $types[] = $favorite->type;
                $ids[] = $favorite->id;
            }
            $suggest = Plan::whereIn('type', $types)->whereNotIn('id', $ids)->where('user_id', '!=', $user->id)->take(20)->get();

            if (count($suggest) < 20) {
                $missingCount = 20 - count($suggest);
                $randomPlans = Plan::inRandomOrder()->whereNotIn('id', $ids)->where('user_id', '!=', $user->id)->take($missingCount)->get();
                $suggest = $suggest->merge($randomPlans);
            }

            return PlanResource::collection($suggest);
        } else {
            return PlanResource::collection(Plan::inRandomOrder()->where('user_id', '!=', $user->id)->take(20)->get());
        }
    }

    public function indexShort(User $user)
    {
        if (count($user->favorites) !== 0) {
            $types = [];
            $ids = [];
            foreach ($user->favorites as $favorite) {
                $types[] = $favorite->type;
                $ids[] = $favorite->id;
            }
            $suggest = Plan::whereIn('type', $types)->whereNotIn('id', $ids)->where('user_id', '!=', $user->id)->take(4)->get();

            if (count($suggest) < 5) {
                $missingCount = 5 - count($suggest);
                $randomPlans = Plan::inRandomOrder()->whereNotIn('id', $ids)->where('user_id', '!=', $user->id)->take($missingCount)->get();
                $suggest = $suggest->merge($randomPlans);
            }

            return PlanResource::collection($suggest);
        } else {
            return PlanResource::collection(Plan::inRandomOrder()->where('user_id', '!=', $user->id)->take(4)->get());
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
