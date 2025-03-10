<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplyRequest;
use App\Http\Requests\UpdateSupplyRequest;
use App\Http\Resources\GlossaryResource;
use App\Http\Resources\SupplyResource;
use App\Http\Resources\TypeSupplyResource;
use App\Http\Uploads\HandlesImagesUploads;
use App\Models\Glossary;
use App\Models\Supply;
use App\Models\Thread;
use App\Models\TypeSupply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupplyController extends Controller
{
    use HandlesImagesUploads;
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $supplies = SupplyResource::collection(Supply::where('user_id', $user->id)->get());
        $ids = [];
        foreach ($supplies as $s) {
            $ids [] = $s->typesupply_id;
        }
        return TypeSupplyResource::collection(TypeSupply::whereIn('id', $ids)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, SupplyRequest $request)
    {
        if (!$user) {
            return response()->json([
                'message' => 'Utilisateur introuvable',
            ], 404);
        }
        $validatedData = $request->safe()->all();
        if ($validatedData['number']) {
            $thread = Thread::where('number', $validatedData['number'])->get()->first();
            $validatedData['category'] = $thread->category;
            $validatedData['tint'] = $thread->tint;
        }
        $validatedData['user_id'] = $user->id;
        $validatedData['slug'] = Str::slug($validatedData['name'] . $user->slug);
        $uploaded_image = $request->file('pictures');
        if ($uploaded_image) {
            $validatedData['pictures'] = 'storage/supplies/pictures/' . $this->resizeAndSaveSupplies($uploaded_image);
        }
        $supply = Supply::create($validatedData);

        return response()->json([
            'message' => 'Fourniture créée avec succès',
            'supply' => $supply
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, string $id)
    {
        $searchTerm = request()->input('search') ?? '';
        if ($searchTerm){
            $references = Supply::query()
                ->where('typesupply_id', $id)
                ->where('user_id', $user->id)
                ->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('color', 'like', '%' . $searchTerm . '%')
                        ->orWhere('category', 'like', '%' . $searchTerm . '%')
                        ->orWhere('quantity', 'like', '%' . $searchTerm . '%')
                        ->orWhere('number', 'like', '%' . $searchTerm . '%')
                        ->orWhere('width', 'like', '%' . $searchTerm . '%');
                })->get();

            return SupplyResource::collection($references);
        }

        return SupplyResource::collection(Supply::where('typesupply_id', $id)->where('user_id', $user->id)->get());
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
    public function update(User $user, UpdateSupplyRequest $request, string $id)
    {
        $supply = Supply::find($id);
        $data_supply = $request->safe()->all();;
        if ($request['name'] !== null) {
            $data_supply['slug'] = Str::slug($data_supply['name']);
        }
        if($request['typesupply_id'] !== null){
            $data_supply['typesupply_id'] = intval($request['typesupply_id']);
        }
        if ($request['pictures'] !== null) {
            $uploaded_image = $request->file('pictures');
            if ($uploaded_image) {
                $data_supply['pictures'] = 'storage/supplies/pictures/' . $this->resizeAndSaveSupplies($uploaded_image);
            }
        }
        $supply->update($data_supply);

        return response()->json([
            'message' => 'Fourniture mise à jour avec succès',
            'supply' => $supply
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user,string $id)
    {
        $supply = Supply::find($id);
        if (!$supply) {
            return response()->json([
                'message' => 'Fourniture introuvable',
            ], 404);
        }
        $supply->delete();
        return response()->json([
            'message' => 'Fourniture effacée avec succès',
        ]);
    }
}
