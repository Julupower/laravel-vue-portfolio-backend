<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController; // Adjust if using a controller

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ensure this route exists:
Route::get('/projects', [ProjectController::class, 'index']);