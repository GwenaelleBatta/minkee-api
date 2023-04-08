<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Supply;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
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
