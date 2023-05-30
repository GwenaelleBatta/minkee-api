<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FabricRequest;
use App\Http\Resources\StepResource;
use App\Http\Uploads\HandlesImagesUploads;
use App\Models\Fabric;
use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    use HandlesImagesUploads;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StepResource::collection(Step::all());
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
    public function update(FabricRequest $request, string $id)
    {
        $step = Step::find($id);
        $validatedData = $request->safe()->all();
        $uploaded_image = $request->file('image');
        if ($uploaded_image) {
            $validatedData['image'] = 'storage/plans/steps/' . $this->resizeAndSaveStep($uploaded_image);
        }
        $step->update($validatedData);
        return response()->json([
            'message' => 'Étape mise à jour',
            'step' => $step,
            'user' => $validatedData,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
