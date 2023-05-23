<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return PlanResource::collection(Plan::orderBy('created_at', 'DESC')->where('user_id', '!=', $user->id)->take(20)->get());
    }
    public function indexShort(User $user)
    {
        return PlanResource::collection(Plan::orderBy('created_at', 'DESC')->where('user_id', '!=', $user->id)->take(4)->get());
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
