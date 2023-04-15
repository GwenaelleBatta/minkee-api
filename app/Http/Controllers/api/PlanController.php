<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteRequest;
use App\Http\Requests\PlanRequest;
use App\Http\Requests\TutoUserRequest;
use App\Http\Resources\PlanResource;
use App\Models\Mesure;
use App\Models\Plan;
use App\Models\TutoTranslation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Sodium\add;

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

    public function suggest(User $user)
    {
        if (count($user->favorites) !== 0){

            $types = [];
            $ids = [];
            foreach ($user->favorites as $favorite){
                $types[] = $favorite->type ;
                $ids[] = $favorite->id ;
            }
            return PlanResource::collection(Plan::whereIn('type', $types)->whereNotIn('id', $ids)->take(4)->get());
        }
        else{
            return PlanResource::collection(Plan::inRandomOrder()->take(4)->get());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, PlanRequest $request)
    {
        if (!$user) {
            return response()->json([
                'message' => 'Utilisateur introuvable',
            ], 404);
        }

        $validatedData = $request->safe()->all();
        $validatedData['user_id'] = $user->id;
        $validatedData['supplies'] = json_encode($validatedData['supplies']);
        if ($validatedData['keywords'] !== null) {
            $validatedData['keywords'] = json_encode($validatedData['keywords']);
        }
        if ($validatedData['images'] !== null){
        $validatedData['images'] = json_encode($validatedData['images']);
        }
        $validatedData['slug'] = Str::slug($validatedData['name'].$user->slug);
        $plan = Plan::create($validatedData);

        return response()->json([
            'message' => 'Plan créé avec succès',
            'mesure' => $plan
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

    public function favorite(User $user, $id,FavoriteRequest $request)
    {
        $validatedData = $request->safe()->all();
        $validatedData['plan_id'] = $id;
        $validatedData['user_id'] = $user->id;
        if (DB::table('favorite')->where('plan_id', $id)->where('user_id', $user->id)->count() > 0) {
            DB::table('favorite')->where('plan_id', $id)->where('user_id', $user->id)->delete();
        } else {
            DB::table('favorite')->insert([
                "plan_id" => $validatedData['plan_id'],
                "user_id" => $validatedData['user_id']
            ]);
        }
        return response()->json([
            'message' => 'Plan mis en favoris',
        ]);

    }
}
