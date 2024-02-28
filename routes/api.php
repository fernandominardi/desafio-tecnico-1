<?php

use App\Http\Controllers\Api\V1\CollaboratorController;
use App\Http\Controllers\Api\V1\CountryController;
use App\Http\Controllers\Api\V1\TeamController;
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

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('collaborators', CollaboratorController::class);
    Route::get('/countries/{country}', [CountryController::class, 'show']);
    Route::get('/teams/{team}', [TeamController::class, 'show']);
    // Route::apiResource('countries', CountryController::class);
    // Route::apiResource('teams', TeamController::class);
});
