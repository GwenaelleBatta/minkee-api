<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexGlobal()
    {
        return PlanResource::collection(Plan::all());
    }

    public function index(User $user)
    {
        return PlanResource::collection(Plan::where('user_id', $user->id)->get());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanRequest $request)
    {
        $validatedData = $request->safe()->all();
        $validatedData['user_id'] = auth()->id();
        $validatedData['supplies'] = json_encode($validatedData['supplies']);
        $validatedData['keywords'] = json_encode($validatedData['keywords']);
        $validatedData['images'] = json_encode($validatedData['images']);
        $user = User::find($validatedData['user_id']);
        $validatedData['slug'] = Str::slug($validatedData['name'].$user->slug);
        $plan = Plan::create($validatedData);

        return response()->json([
            'message' => 'Plan create successful',
            'plan' => $plan
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
    public function destroy($id)
    {


        $plan = Plan::find($id);
        if (!$plan) {
            return response()->json([
                'message' => 'Plan introuvable',
            ], 404);
        }
        $plan->delete();
        return response()->json([
            'message' => 'Plan effacé avec succès',
        ]);
    }
}
