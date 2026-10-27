<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);

// Stateful auth routes (wrapped in 'web' middleware to enable session handling for SPA login)
Route::middleware('web')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected routes (require Sanctum stateful cookie authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
});