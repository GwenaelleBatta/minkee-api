<?php

namespace App\Http\Controllers\api;

use App\Models\Steps;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;

class StepsController extends Controller
{
    protected $model = Steps::class;
    /**
     * Display a listing of the resource.
     */
    public function index()
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
    public function show(Steps $steps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Steps $steps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Steps $steps)
    {
        //
    }
}
