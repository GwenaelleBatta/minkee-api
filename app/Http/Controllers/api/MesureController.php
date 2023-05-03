<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MesureRequest;
use App\Http\Requests\UpdateMesureRequest;
use App\Http\Resources\MesureResource;
use App\Models\Mesure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MesureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return MesureResource::collection(Mesure::where('user_id', $user->id)->get());
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
    public function store(User $user, MesureRequest $request)
    {
        if (!$user) {
            return response()->json([
                'message' => 'Utilisateur introuvable',
            ], 404);
        }

        $validatedData = $request->safe()->all();
        $validatedData['user_id'] = $user->id;
        $validatedData['outline'] = json_encode($validatedData['outline']);
        $validatedData['lenght'] = json_encode($validatedData['lenght']);
        $validatedData['slug'] = Str::slug($validatedData['name'].$user->slug);
        $mesure = Mesure::create($validatedData);

        return response()->json([
            'message' => 'Mesure créée avec succès',
            'mesure' => $mesure
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
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
    public function update(User $user,UpdateMesureRequest $request, string $id)
    {
        $mesure = Mesure::find($id);
        $data_mesure = $request->safe()->all();;
        $data_mesure['slug'] = Str::slug($data_mesure['name']);
        $mesure->update($data_mesure);

        return response()->json([
            'message' => 'Mesure mise à jour avec succès',
            'mesure' => $mesure
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user,string $id)
    {
        $mesure = Mesure::find($id);
        if (!$mesure) {
            return response()->json([
                'message' => 'Mesure introuvable',
            ], 404);
        }
        $mesure->delete();
        return response()->json([
            'message' => 'Mesure effacée avec succès',
        ]);
    }
}
