<?php

use App\Http\Controllers\api\StepsController;
use App\Http\Controllers\api\TypeSupplyController;
use App\Http\Resources\FabricResource;
use App\Http\Resources\GlossaryResource;
use App\Http\Resources\GradationResource;
use App\Http\Resources\ThreadResource;
use App\Http\Resources\TypeSupplyResource;
use App\Http\Resources\UserResource;
use App\Models\Fabric;
use App\Models\Glossary;
use App\Models\Gradation;
use App\Models\TypeSupply;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Orion;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/types', function () {
    return TypeSupplyResource::collection(TypeSupply::all());
});
Route::get('/glossaries', function () {
    return GlossaryResource::collection(Glossary::all());
});
Route::get('/users', function () {
    return UserResource::collection(User::all());
});
Route::get('/threads', function () {
    return ThreadResource::collection(Thread::all());
});
Route::get('/fabrics', function () {
    return FabricResource::collection(Fabric::all());
});
Route::get('/gradations', function () {
    return GradationResource::collection(Gradation::all());
});

//Route::group(['as' => 'api.'], function() {
//    Orion::resource('type', [TypeSupplyController::class, 'index'])->withSoftDeletes();
//});
