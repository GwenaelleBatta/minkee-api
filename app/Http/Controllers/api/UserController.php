<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\PlanResource;
use App\Http\Resources\UserResource;
use App\Http\Uploads\HandlesImagesUploads;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $user= User::find($id);
        $create = $user->created_at;
        $email_verify = $user->email_verified_at;
        $deadline = null;
        if (!$email_verify){
            $deadline = $create->addDays(10);
            if (Carbon::now() > $deadline){
                $user->connected = 0;
                $user->save();
            }
        }

        return UserResource::collection(User::where('id',$id)->get());
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

}
