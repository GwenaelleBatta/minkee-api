<?php

use App\Http\Controllers\api\PrivacyController;
use App\Http\Controllers\api\ResetPasswordController;
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

Route::get('/user/privacy', [PrivacyController::class, 'index'])->middleware('guest');
Route::get('/user/reset-password/{token}', [ResetPasswordController::class, 'edit'])->middleware('guest')->name('password.reset');
Route::post('/user/reset', [ResetPasswordController::class, 'update'])->middleware('guest')->name('password.reset');




