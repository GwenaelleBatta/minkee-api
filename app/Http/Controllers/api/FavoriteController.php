<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteRequest;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $sortGender = request()->input('gender') ?? 'femme';

        $favorites = $user->favorites()->where('gender', $sortGender)->get();
        $favoritesIds = $user->favorites()->pluck('id')->toArray();
        $searchTerm = request()->input('search') ?? '';
        if ($searchTerm) {
            $references = Plan::query()
                ->whereIn('id', $favoritesIds)
                ->where('gender', $sortGender)
                ->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('gender', 'like', '%' . $searchTerm . '%')
                        ->orWhere('type', 'like', '%' . $searchTerm . '%')
                        ->orWhere('base', 'like', '%' . $searchTerm . '%')
                        ->orWhereJsonContains('keywords', $searchTerm)
                        ->orWhereJsonContains('supplies', $searchTerm);
                })->get();
            return PlanResource::collection($references);
        }
        return PlanResource::collection($favorites);
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
    public function store(User $user, $id, FavoriteRequest $request)
    {
        $validatedData = $request->safe()->all();
        $validatedData['plan_id'] = $id;
        $validatedData['user_id'] = $user->id;
        if (DB::table('favorite')->where('plan_id', $id)->where('user_id', $user->id)->count() > 0) {
            DB::table('favorite')->where('plan_id', $id)->where('user_id', $user->id)->delete();
            return response()->json([
                'message' => 'Plan mis supprimé des favoris',
                'user' => $user->refresh(),
            ]);
        } else {
            DB::table('favorite')->insert([
                "plan_id" => $validatedData['plan_id'],
                "user_id" => $validatedData['user_id']
            ]);

            return response()->json([
                'message' => 'Plan mis en favoris',
                'user' => $user->refresh(),
            ]);
        }


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
