<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(User $user, $id)
    {
        $ids = [];
        foreach ($user->checks->where("plan_id", $id) as $c) {
            $ids [] = $c->id;
        }
        return $ids;
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
    public function store(User $user, $id, CheckRequest $request){
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
