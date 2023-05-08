<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteRequest;
use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexGlobal()
    {
        $sortBase = request()->input('base') ?? 'all';
        $sortSteps = request()->input('steps') ?? 'all';
        $sortLevelId = request()->input('level') ?? 'all';
        $sortGender = request()->input('gender') ?? 'femme';
        $sortType = request()->input('type') ?? 'all';
        $plansQuery = Plan::query();

        if ($sortBase !== 'all') {
            $plansQuery->where('base', $sortBase);
        } //OK
        if ($sortSteps !== 'all') {
            $plansQuery = Plan::query()
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps);
        }//OK
        if ($sortLevelId !== 'all') {
            $plansQuery->where('level_id', $sortLevelId);
        }//OK
        if ($sortType !== 'all') {
            $plansQuery->where('type', $sortType);
        }//OK
        if ($sortGender !== 'all') {
            $plansQuery->where('gender', $sortGender);
        }//OK
        //--------------------------------------------------
        if ($sortBase !== 'all' && $sortSteps !== 'all') {
            $plansQuery->where('base', $sortBase)
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps);
        }//OK
        if ($sortBase !== 'all' && $sortLevelId !== 'all') {
            $plansQuery->where('base', $sortBase)
                ->where('level_id', $sortLevelId);
        }//OK
        if ($sortBase !== 'all' && $sortGender !== 'all') {
            $plansQuery->where('base', $sortBase)
                ->where('gender', $sortGender);
        }//OK
        if ($sortGender !== 'all' && $sortLevelId !== 'all') {
            $plansQuery->where('gender', $sortGender)
                ->where('level_id', $sortLevelId);
        }//OK
        if ($sortType !== 'all' && $sortBase !== 'all') {
            $plansQuery->where('type', $sortType)
                ->where('base', $sortBase);
        }//OK
        if ($sortType !== 'all' && $sortGender !== 'all') {
            $plansQuery->where('type', $sortType)
                ->where('gender', $sortGender);
        }
        if ($sortType !== 'all' && $sortLevelId !== 'all') {
            $plansQuery->where('type', $sortType)
                ->where('level_id', $sortLevelId);
        }//OK
        if ($sortSteps !== 'all' && $sortType !== 'all') {
            $plansQuery = Plan::query()
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('type', $sortType);
        }//OK
        if ($sortSteps !== 'all' && $sortGender!== 'all') {
            $plansQuery = Plan::query()
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('gender', $sortGender);
        }//OK
        if ($sortSteps !== 'all' && $sortLevelId !== 'all') {
            $plansQuery = Plan::query()
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('level_id', $sortLevelId);
        }//OK
        //--------------------------------------------------
        if ($sortGender !== 'all' && $sortLevelId !== 'all' && $sortBase !== 'all') {
            $plansQuery->where('gender', $sortGender)
                ->where('level_id', $sortLevelId)
                ->where('base', $sortBase);
        }//OK
        if ($sortType !== 'all' && $sortBase !== 'all' && $sortGender !== 'all') {
            $plansQuery->where('type', $sortType)
                ->where('gender', $sortGender)
                ->where('base', $sortBase);
        }//OK
        if ($sortType !== 'all' && $sortBase !== 'all' && $sortSteps !== 'all') {
            $plansQuery
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('type', $sortType)
                ->where('base', $sortBase);
        }//OK
        if ($sortType !== 'all' && $sortLevelId !== 'all' && $sortSteps !== 'all') {
            $plansQuery
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('type', $sortType)
                ->where('level_id', $sortLevelId);
        }//OK
        if ($sortType !== 'all' && $sortGender !== 'all' && $sortSteps !== 'all') {
            $plansQuery
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('type', $sortType)
                ->where('gender', $sortGender);
        }//OK
        if ($sortLevelId !== 'all' && $sortGender !== 'all' && $sortSteps !== 'all') {
            $plansQuery
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('level_id', $sortLevelId)
                ->where('gender', $sortGender);
        }//OK
        if ($sortGender !== 'all' && $sortBase !== 'all' && $sortSteps !== 'all') {
            $plansQuery
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('gender', $sortGender)
                ->where('base', $sortBase);
        }//OK
        if ($sortLevelId !== 'all' && $sortBase !== 'all' && $sortSteps !== 'all') {
            $plansQuery
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('level_id', $sortLevelId)
                ->where('base', $sortBase);
        }//OK
        if ($sortType !== 'all' && $sortGender !== 'all' && $sortLevelId !== 'all') {
            $plansQuery->where('type', $sortType)
                ->where('level_id', $sortLevelId)
                ->where('gender', $sortGender);
        }//OK
        if ($sortType !== 'all' && $sortLevelId !== 'all' && $sortBase !== 'all') {
            $plansQuery->where('type', $sortType)
                ->where('base', $sortBase)
                ->where('level_id', $sortLevelId);
        }//OK
        //--------------------------------------------------
        if ($sortType !== 'all' && $sortLevelId !== 'all' && $sortBase !== 'all' && $sortGender !== 'all') {
            $plansQuery->where('type', $sortType)
                ->where('base', $sortBase)
                ->where('gender', $sortGender)
                ->where('level_id', $sortLevelId);
        }//OK
        if ($sortType !== 'all' && $sortLevelId !== 'all' && $sortBase !== 'all' && $sortSteps !== 'all') {
            $plansQuery
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('type', $sortType)
                ->where('base', $sortBase)
                ->where('level_id', $sortLevelId);
        }//OK
        if ($sortSteps !== 'all' && $sortLevelId !== 'all' && $sortBase !== 'all' && $sortGender !== 'all') {
            $plansQuery
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('base', $sortBase)
                ->where('gender', $sortGender)
                ->where('level_id', $sortLevelId);
        }//OK
        if ($sortType !== 'all' && $sortSteps !== 'all' && $sortBase !== 'all' && $sortGender !== 'all') {
            $plansQuery
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('type', $sortType)
                ->where('base', $sortBase)
                ->where('gender', $sortGender);
        }//OK
        if ($sortType !== 'all' && $sortLevelId !== 'all' && $sortSteps !== 'all' && $sortGender !== 'all') {
            $plansQuery
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('type', $sortType)
                ->where('gender', $sortGender)
                ->where('level_id', $sortLevelId);
        }//OK
        //--------------------------------------------------
        if ($sortType !== 'all' && $sortLevelId !== 'all' && $sortSteps !== 'all' && $sortGender !== 'all' && $sortBase !== 'all') {
            $plansQuery
                ->withCount('steps')
                ->having('steps_count', '<=', $sortSteps)
                ->where('type', $sortType)
                ->where('base', $sortBase)
                ->where('gender', $sortGender)
                ->where('level_id', $sortLevelId);
        }

        return PlanResource::collection($plansQuery->get());
    }

    public function index(User $user)
    {
        return PlanResource::collection(Plan::where('user_id', $user->id)->get());
    }

    public function indexFavorite(User $user)
    {
        return PlanResource::collection($user->favorites()->get());
    }

    public function suggest(User $user)
    {
        if (count($user->favorites) !== 0) {

            $types = [];
            $ids = [];
            foreach ($user->favorites as $favorite) {
                $types[] = $favorite->type;
                $ids[] = $favorite->id;
            }
            return PlanResource::collection(Plan::whereIn('type', $types)->whereNotIn('id', $ids)->take(4)->get());
        } else {
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
        $uploaded_images = $request->file('images');
        if ($uploaded_images) {
            $images = [];
            foreach ($uploaded_images as $image) {
                $image_path = 'storage/profil/avatar/' . $this->resizeAndSaveAvatar($image);
                $images[] = $image_path;
            }
            $validatedData['images'] = json_encode($images);
        }
        $validatedData['slug'] = Str::slug($validatedData['name'] . $user->slug);
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
        $uploaded_images = $request->file('images');
        if ($uploaded_images) {
            $images = [];
            foreach ($uploaded_images as $image) {
                $image_path = 'storage/profil/avatar/' . $this->resizeAndSaveAvatar($image);
                $images[] = $image_path;
            }
            $validatedData['images'] = json_encode($images);
        }
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

    public function favorite(User $user, $id, FavoriteRequest $request)
    {
        $validatedData = $request->safe()->all();
        $validatedData['plan_id'] = $id;
        $validatedData['user_id'] = $user->id;
        if (DB::table('favorite')->where('plan_id', $id)->where('user_id', $user->id)->count() > 0) {
            DB::table('favorite')->where('plan_id', $id)->where('user_id', $user->id)->delete();
            return response()->json([
                'message' => 'Plan mis supprimé des favoris',
            ]);
        } else {
            DB::table('favorite')->insert([
                "plan_id" => $validatedData['plan_id'],
                "user_id" => $validatedData['user_id']
            ]);
            return response()->json([
                'message' => 'Plan mis en favoris',
            ]);
        }


    }
}
