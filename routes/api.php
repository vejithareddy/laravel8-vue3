<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/accommodation', [App\Http\Controllers\AccommodationController::class, 'index']);


Route::get('/accommodation-areas', [App\Http\Controllers\AccommodationController::class, 'getAreas']);


Route::group(['prefix' =>'sydney'], function(){
    Route::apiResource('regions', App\Http\Controllers\ApiController::class);
});

