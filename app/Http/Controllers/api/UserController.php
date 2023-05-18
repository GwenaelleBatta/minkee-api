<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckRequest;
use App\Http\Requests\FavoriteRequest;
use App\Http\Requests\FollowerRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\PlanResource;
use App\Http\Resources\SupplyResource;
use App\Http\Resources\TypeSupplyResource;
use App\Http\Resources\UserResource;
use App\Http\Uploads\HandlesImagesUploads;
use App\Models\Plan;
use App\Models\PlanStep;
use App\Models\Supply;
use App\Models\TypeSupply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use HandlesImagesUploads;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        return UserResource::collection(User::where('id', $id)->get());
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
    public function update(User $user, UpdateUserRequest $request)
    {
        $validatedData = $request->safe()->only(
            'name',
            'description',
            'avatar',
            'email',
        );

        if ($request['password'] !== null) {
            $validatedData = $request->safe()->all();
            $validatedData['password'] = password_hash($validatedData['password'], PASSWORD_DEFAULT);
        }
        if ($request['name'] !== null) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
        }
        if ($request['avatar'] !== null) {
            $uploaded_image = $request->file('avatar');
            if ($uploaded_image) {
                $validatedData['avatar'] = 'storage/profil/avatar/' . $this->resizeAndSaveAvatar($uploaded_image);
            }
        }


        $user->update($validatedData);
        return response()->json([
            'message' => 'Profil mis a jour avec succès',
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function indexFavorite(User $user)
    {
        $ids = [];
        foreach ($user->favorites as $f) {
            $ids [] = $f->id;
        }
        return PlanResource::collection(Plan::whereIn('id', $ids)->get());
    }

    public function indexFollowers(User $user)
    {
        $ids = [];
        foreach ($user->followed as $followed) {
            $ids[] = $followed->id;
        }

        return UserResource::collection(User::whereIn('id', $ids)->withCount('followed')->get());
    }

    public function follower(User $user, $id, FollowerRequest $request)
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

    public function checks(User $user, $id, CheckRequest $request){
        $validatedData = $request->safe()->all();
        $validatedData['planstep_id'] = $id;
        $validatedData['user_id'] = $user->id;

        if(DB::table('checksteps')->where('user_id', $user->id)->where('planstep_id', $id)->count() > 0){
            DB::table('checksteps')->where('user_id', $user->id)->where('planstep_id', $id)->delete();
            return response()->json([
                'message' => 'Étape non checkée',
                'user' => $user->refresh(),
            ]);
        } else {
            DB::table('checksteps')->insert($validatedData);
            return response()->json([
                'message' => 'Étape checkée',
                'user' => $user->refresh(),
            ]);
        }
    }

    public function indexChecks(User $user){

        $ids = [];
        foreach ($user->checks as $c) {
            $ids [] = $c->id;
        }
        return $ids;
    }

}
