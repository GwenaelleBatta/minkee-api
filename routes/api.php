<?php

use App\Http\Controllers\api\AuthenticatedSessionController;
use App\Http\Controllers\api\FabricController;
use App\Http\Controllers\api\GlossaryController;
use App\Http\Controllers\api\GradationController;
use App\Http\Controllers\api\MesureController;
use App\Http\Controllers\api\PictureController;
use App\Http\Controllers\api\PlanController;
use App\Http\Controllers\api\QuestionController;
use App\Http\Controllers\api\RegisterSessionController;
use App\Http\Controllers\api\ResetPasswordController;
use App\Http\Controllers\api\SearchController;
use App\Http\Controllers\api\SupplyController;
use App\Http\Controllers\api\ThreadController;
use App\Http\Controllers\api\TypeSupplyController;
use App\Http\Controllers\api\UserController;
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
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login')->middleware(['guest', 'api']);
Route::post('/register', [RegisterSessionController::class, 'store'])->name('register')->middleware('guest');
Route::post('/logout/{user:slug}', [AuthenticatedSessionController::class, 'logout'])->name('logout');
Route::get('/user/{user:id}', [UserController::class, 'show']);
Route::post('/user/password', [ResetPasswordController::class, 'store'])->middleware('guest');
Route::post('/user/reset-password', [ResetPasswordController::class, 'update'])->middleware('guest')->name('password.reset');
Route::post('/user/update/{user:id}', [UserController::class, 'update']);
//Route::get('/user/favorite/{user:id}/', [UserController::class, 'indexFavorite']);
Route::get('/user/followers/{user:id}/', [UserController::class, 'indexFollowers']);

Route::get('/search', [SearchController::class, 'index']);
Route::get('/types', [TypeSupplyController::class, 'index']);
Route::get('/glossaries', [GlossaryController::class, 'index']);
Route::get('/questions', [QuestionController::class, 'index']);
Route::get('/threads', [ThreadController::class, 'index']);
Route::get('/fabrics', [FabricController::class, 'index']);
Route::get('/gradations', [GradationController::class, 'index']);

Route::get('/{user:slug}/mesures', [MesureController::class, 'index']);
Route::post('/{user:slug}/mesures/create', [MesureController::class, 'store']);
Route::post('/{user:slug}/mesures/update/{mesure:id}', [MesureController::class, 'update']);
Route::delete('/{user:slug}/mesures/destroy/{mesure:id}', [MesureController::class, 'destroy']);

Route::get('/{user:slug}/supplies', [SupplyController::class, 'index']);
Route::post('/{user:slug}/supplies/create', [SupplyController::class, 'store']);
Route::post('/{user:slug}/supplies/update/{supply:id}', [SupplyController::class, 'update']);
Route::get('/{user:slug}/supplies/type/{typesupply:id}', [SupplyController::class, 'show']);
Route::delete('/{user:slug}/supplies/destroy/{supply:id}', [SupplyController::class, 'destroy']);

Route::post('/{user:slug}/pictures/create', [PictureController::class, 'store']);
Route::delete('/{user:slug}/pictures/destroy/{picture:id}', [PictureController::class, 'destroy']);

Route::get('/plans', [PlanController::class, 'indexGlobal']);
Route::get('/{user:slug}/plans', [PlanController::class, 'index']);
Route::get('/{user:slug}/plans/favorite', [PlanController::class, 'indexFavorite']);
Route::get('/{user:slug}/plans/suggest', [PlanController::class, 'suggest']);
Route::get('/{user:slug}/plans/news', [PlanController::class, 'news']);
Route::post('/{user:slug}/plans/create', [PlanController::class, 'store']);
Route::post('/{user:slug}/plans/favorite/{plan:id}', [PlanController::class, 'favorite']);
Route::post('/{user:slug}/plans/update/{plan:id}', [PlanController::class, 'update']);
Route::delete('/{user:slug}/plans/destroy/{plan:id}', [PlanController::class, 'destroy']);

Route::get('/users', function () {
    return UserResource::collection(User::all());
});



