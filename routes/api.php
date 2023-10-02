<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogLevelController;
use App\Http\Controllers\LogTargetController;
use App\Http\Controllers\LogLevelTargetController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserLogLevelConfigController;

//Retrieve User Level Config
// Retrieve All User Log Level Configurations (GET)
Route::get('/user-log-level-configs', [UserLogLevelConfigController::class, 'index']);

// Retrieve a Specific User Log Level Configuration (GET)
Route::get('/user-log-level-configs/{id}', [UserLogLevelConfigController::class, 'show']);

// Create a New User Log Level Configuration (POST)
Route::post('/user-log-level-configs', [UserLogLevelConfigController::class, 'store']);

// Update an Existing User Log Level Configuration (PUT/PATCH)
Route::put('/user-log-level-configs/{id}', [UserLogLevelConfigController::class, 'update']);
Route::patch('/user-log-level-configs/{id}', [UserLogLevelConfigController::class, 'update']);

// Delete a User Log Level Configuration (DELETE)
Route::delete('/user-log-level-configs/{id}', [UserLogLevelConfigController::class, 'destroy']);



// Log Level Endpoints
Route::get('/log-levels', [LogLevelController::class, 'index']);
Route::get('/log-levels/{name}', [LogLevelController::class, 'show']);
Route::post('/log-levels', [LogLevelController::class, 'store']);
Route::put('/log-levels/{name}', [LogLevelController::class, 'update']);
Route::delete('/log-levels/{name}', [LogLevelController::class, 'destroy']);

// Log Target Endpoints
Route::get('/log-targets', [LogTargetController::class, 'index']);
Route::get('/log-targets/{id}', [LogTargetController::class, 'show']);
Route::post('/log-targets', [LogTargetController::class, 'store']);
Route::put('/log-targets/{id}', [LogTargetController::class, 'update']);
Route::delete('/log-targets/{id}', [LogTargetController::class, 'destroy']);

// Log Level Target Endpoints
Route::get('/log-level-targets', [LogLevelTargetController::class, 'index']);
Route::get('/log-level-targets/{id}', [LogLevelTargetController::class, 'show']);
Route::post('/log-level-targets', [LogLevelTargetController::class, 'store']);
Route::put('/log-level-targets/{id}', [LogLevelTargetController::class, 'update']);
Route::delete('/log-level-targets/{id}', [LogLevelTargetController::class, 'destroy']);

// Log Endpoints
Route::get('/logs', [LogController::class, 'index']);
Route::get('/logs/{id}', [LogController::class, 'show']);
Route::post('/logs', [LogController::class, 'store']);
Route::put('/logs/{id}', [LogController::class, 'update']);
Route::delete('/logs/{id}', [LogController::class, 'destroy']);
