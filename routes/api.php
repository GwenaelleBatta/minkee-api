<?php

use App\Http\Controllers\api\AuthenticatedSessionController;
use App\Http\Controllers\api\FabricController;
use App\Http\Controllers\api\GlossaryController;
use App\Http\Controllers\api\GradationController;
use App\Http\Controllers\api\RegisterSessionController;
use App\Http\Controllers\api\ThreadController;
use App\Http\Controllers\api\TypeSupplyController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/types', [TypeSupplyController::class, 'index']);
Route::get('/glossaries', [GlossaryController::class, 'index']);

Route::get('/users', function () {
    return UserResource::collection(User::all());
});
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware(['guest', 'api']);
Route::post('/register', [RegisterSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');

Route::get('/threads', [ThreadController::class, 'index']);
Route::get('/fabrics', [FabricController::class, 'index']);

Route::get('/gradations', [GradationController::class, 'index']);
Route::get('/supplies', function () {
    return \App\Http\Resources\SupplyResource::collection(\App\Models\Supply::all());
});

//Route::group(['as' => 'api.'], function() {
//    Orion::resource('type', [TypeSupplyController::class, 'index'])->withSoftDeletes();
//});
