<?php

use App\Http\Resources\GlossaryResource;
use App\Http\Resources\TypeSupplyResource;
use App\Http\Resources\UserResource;
use App\Models\Glossary;
use App\Models\TypeSupply;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
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
