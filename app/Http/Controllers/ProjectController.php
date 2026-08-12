<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    /**
     * Display a listing of published projects.
     */
    public function index(): AnonymousResourceCollection
    {
        $projects = Project::query()
            ->where('is_published', true)
            ->latest('published_at')
            ->paginate(10);

        return ProjectResource::collection($projects);
    }

    /**
     * Display the specified project by its slug.
     */
    public function show(Project $project): ProjectResource
    {
        return new ProjectResource($project);
    }
}