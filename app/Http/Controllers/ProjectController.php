<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
	public function index(): AnonymousResourceCollection
	{
	    return ProjectResource::collection(
		Project::where('is_published', true)->get()
	    );
	}

	public function show(string $slug): ProjectResource
	{
	    $project = Project::where('slug', $slug)
		->where('is_published', true)
		->firstOrFail();

	    return new ProjectResource($project);
	}
}