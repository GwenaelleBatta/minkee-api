<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PictureRequest;
use App\Http\Requests\SupplyRequest;
use App\Http\Uploads\HandlesImagesUploads;
use App\Models\Picture;
use App\Models\Supply;
use App\Models\User;
use Illuminate\Http\Request;

class PictureController extends Controller
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
    public function store(User $user, PictureRequest $request)
    {

        $validatedData['user_id'] = $user->id;

        $uploaded_image = $request->file('link');
        if ($uploaded_image) {
            $validatedData['link'] = 'storage/profil/pictures/' . $this->resizeAndSavePictures($uploaded_image);
        }

        $picture = Picture::create($validatedData);

        $newUser = User::where('id', $user->id)->get()->first();

        return response()->json([
            'message' => 'Photo ajoutée avec succès',
            'picture' => $picture,
            'user'=>$newUser,
        ]);
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
    public function destroy(User $user,string $id)
    {
        $picture = Picture::find($id);
        if (!$picture) {
            return response()->json([
                'message' => 'Photo introuvable',
            ], 404);
        }
        $picture->delete();

        $newUser = User::where('id', $user->id)->get()->first();

        return response()->json([
            'message' => 'Photo effacée avec succès',
            'user'=>$newUser,
        ]);
    }
}
