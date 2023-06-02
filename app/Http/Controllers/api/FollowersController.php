<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FollowerRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $ids = [];
        foreach ($user->followed as $followed) {
            $ids[] = $followed->id;
        }

        return UserResource::collection(User::whereIn('id', $ids)->withCount('followed')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function countFollowers(User $user)
    {
        $followerCount = $user->followers()->count();

        return $followerCount;
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, $id, FollowerRequest $request)
    {
        $validatedData = $request->safe()->all();
        $validatedData['followed_id'] = $id;
        $validatedData['follower_id'] = $user->id;
        if (DB::table('followers')->where('followed_id', $id)->where('follower_id', $user->id)->count() > 0) {
            DB::table('followers')->where('followed_id', $id)->where('follower_id', $user->id)->delete();
            return response()->json([
                'message' => 'Désabonné',
                'user' => $user,
            ]);
        } else {
            DB::table('followers')->insert([
                "followed_id" => $validatedData['followed_id'],
                "follower_id" => $validatedData['follower_id']
            ]);

            return response()->json([
                'message' => 'Abonné',
                'user' => $user,
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
