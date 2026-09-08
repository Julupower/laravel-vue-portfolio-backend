<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Project::all());
    }

    public function show(Project $project): JsonResponse
    {
        return response()->json($project);
    }
}