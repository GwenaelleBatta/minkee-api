<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GradationResource;
use App\Http\Uploads\HandlesImagesUploads;
use App\Models\Fabric;
use App\Models\Gradation;
use Illuminate\Http\Request;

class GradationController extends Controller
{
    use HandlesImagesUploads;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GradationResource::collection(Gradation::all());
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
        $gradation = Gradation::find($id);
        $validatedData = $request->safe()->all();
        $uploaded_image = $request->file('image');
        if ($uploaded_image) {
            $validatedData['image'] = 'storage/technical/gradation/' . $this->resizeAndSaveGradation($uploaded_image);
        }
        $gradation->update($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
