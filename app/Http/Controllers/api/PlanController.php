<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteRequest;
use App\Http\Requests\PlanRequest;
use App\Http\Requests\PlanUpdateRequest;
use App\Http\Requests\StepRequest;
use App\Http\Resources\PlanResource;
use App\Http\Uploads\HandlesImagesUploads;
use App\Models\Plan;
use App\Models\Supply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

class PlanController extends Controller
{
    use HandlesImagesUploads;

    /**
     * Display a listing of the resource.
     */
    public function indexGlobal()
    {
        $sortBase = request()->input('base') == 'Toutes' ? 'all' : request()->input('base');
        $sortSteps = request()->input('steps') ?? 'all';
        $sortLevel = request()->input('level') == 1 ? 'all' : request()->input('level');
        $sortLevelId = ($sortLevel !== 'all') ? intval($sortLevel) : 'all';
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
        if ($sortSteps !== 'all' && $sortGender !== 'all') {
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

    public function suggest(User $user)
    {
        if (count($user->favorites) !== 0) {
            $types = [];
            $ids = [];
            foreach ($user->favorites as $favorite) {
                $types[] = $favorite->type;
                $ids[] = $favorite->id;
            }
            $suggest = Plan::whereIn('type', $types)->whereNotIn('id', $ids)->where('user_id', '!=', $user->id)->take(4)->get();

            if (count($suggest) < 5) {
                $missingCount = 5 - count($suggest);
                $randomPlans = Plan::inRandomOrder()->whereNotIn('id', $ids)->where('user_id', '!=', $user->id)->take($missingCount)->get();
                $suggest = $suggest->merge($randomPlans);
            }

            return PlanResource::collection($suggest);
        } else {
            return PlanResource::collection(Plan::inRandomOrder()->where('user_id', '!=', $user->id)->take(4)->get());
        }
    }

    public function news(User $user)
    {
        return PlanResource::collection(Plan::orderBy('created_at', 'DESC')->where('user_id', '!=', $user->id)->take(4)->get());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, PlanRequest $request, StepRequest $stepRequest)
    {
        if (!$user) {
            return response()->json([
                'message' => 'Utilisateur introuvable',
            ], 404);
        }
        $steps = [];
        $validatedData = $request->safe()->all();

        $validatedData['user_id'] = $user->id;
        $uploaded_images = $request->file('images');
        if ($uploaded_images) {
            $images = [];
            foreach ($uploaded_images as $image) {
                $image_path = 'storage/plans/images/' . $this->resizeAndSavePlan($image);
                $images[] = $image_path;
            }
            $validatedData['images'] = json_encode($images);
        }
            $uploaded_cut = $request->file('cut');
            if ($uploaded_cut) {
                $validatedData['cut'] = 'storage/plans/images/' . $this->resizeAndSavePlan($uploaded_cut);
            }
        $validatedData['slug'] = Str::slug($validatedData['name'] . $user->slug);
        $plan = Plan::create($validatedData);

        if ($plan) {
            $validatedDataSteps = $stepRequest->safe()->all();
            $validatedDataSteps['step'] = json_decode($validatedDataSteps['step']);
            foreach ($validatedDataSteps['step'] as $i => $step) {
                $s = [];
                $s['plan_id'] = $plan->id;
                $s['order'] = $i + 1;
                $s['step_id'] = $step->step_id;
                $s['precision'] = $step->precision;
                $steps [] = $s;
                DB::table('plan_step')->insert([$s]);

            }
        }

        return response()->json([
            'message' => 'Plan créé avec succès',
            'plan' => $plan,
            'step' => $steps,
            'user' => $user->refresh(),
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
    public function update(User $user, int $id, PlanUpdateRequest $request, StepRequest $stepRequest)
    {
        $plan = Plan::find($id);

        $steps = [];
        $validatedData = $request->safe()->all();
        if ($request['newImages'] !== null) {
            $uploaded_images = $request->file('newImages');
            if ($uploaded_images) {
                $images = [];
                foreach ($uploaded_images as $image) {
                    $image_path = 'storage/plans/images/' . $this->resizeAndSavePlan($image);
                    $images[] = $image_path;
                }
                $existing_images = json_decode($validatedData['images'], true);

                $all_images = array_merge($existing_images, $images);

                $validatedData['images'] = json_encode($all_images);
            }
        }

        $uploaded_cut = $request->file('cut');
        if ($uploaded_cut) {
            $validatedData['cut'] = 'storage/plans/images/' . $this->resizeAndSavePlan($uploaded_cut);
        }

        $validatedData['slug'] = Str::slug($validatedData['name'] . $user->slug);

        $plan->update($validatedData);

        $validatedDataSteps = $stepRequest->safe()->all();
        $validatedDataSteps['step'] = json_decode($validatedDataSteps['step']);
        $validatedDataSteps['stepDeleted'] = json_decode($validatedDataSteps['stepDeleted']);
        foreach($validatedDataSteps['stepDeleted'] as $delete){
            DB::table('checksteps')->where('planstep_id', $delete)->delete();
            DB::table('plan_step')->where('id', $delete)->delete();
        }
        //$oldSteps = DB::table('plan_step')->where('plan_id', $plan->id)->get();
        foreach ($validatedDataSteps['step'] as $i => $step) {
            if (!property_exists($step, 'id')){
                    $s = [];
                    $s['plan_id'] = $plan->id;
                    $s['order'] = $i + 1;
                    $s['step_id'] = $step->step_id;
                    $s['precision'] = $step->precision;
                    $steps [] = $s;
                    DB::table('plan_step')->insert([$s]);
            }else{
                DB::table('plan_step')->where('id', $step->id)->update(['order' => $i + 1]);

            }
        }
        return response()->json([
            'message' => 'Plan mis à jour avec succès',
            'plan' => $plan,
            'step' => $steps,
            'user' => $user->refresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
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
            'user' => $user->refresh(),
        ]);
    }

}
