<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GlossaryResource;
use App\Models\Glossary;
use App\Models\Tuto;
use App\Models\TutoTranslation;
use Illuminate\Http\Request;
use Orion\Concerns\DisablePagination;

class GlossaryController extends Controller
{
    use DisablePagination;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $searchTerm = request()->input('search') ?? '';
        if ($searchTerm){
            $references = Glossary::query()
                ->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%');
                })->get();

            return GlossaryResource::collection($references);
        }

        return GlossaryResource::collection(Glossary::all());
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
