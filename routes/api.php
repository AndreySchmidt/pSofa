<?php

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

Route::group(['namespace' => 'App\Http\Controllers\Sanctum'], function (){
    Route::post('/personl-access-tokens', [\PersonalAccessTokenController::class, 'store']);
    Route::delete('/personl-access-tokens', [\PersonalAccessTokenController::class, 'destroy'])->middleware('auth:sanctum');
    // Route::delete('/personl-access-tokens/{$token}', [\PersonalAccessTokenController::class, 'destroy'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
