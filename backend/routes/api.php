<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ExperimentController;

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

Route::prefix('auth')->group(function() {
  Route::post('register',[AuthController::class,'register']);
  Route::post('login',[AuthController::class,'login']);
  
  Route::middleware('auth:sanctum')->group(function() {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout',[AuthController::class,'logout']);
  });
});

Route::middleware('auth:sanctum')->group(function() {
  Route::apiResource('experiments', ExperimentController::class);
});
