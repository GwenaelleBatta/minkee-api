<?php

use App\Http\Resources\FabricResource;
use App\Http\Resources\GlossaryResource;
use App\Http\Resources\GradationResource;
use App\Http\Resources\ThreadResource;
use App\Http\Resources\TypeSupplyResource;
use App\Http\Resources\UserResource;
use App\Models\Fabric;
use App\Models\Glossary;
use App\Models\Gradation;
use App\Models\Thread;
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


