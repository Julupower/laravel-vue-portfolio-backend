<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'tech_stack' => $this->tech_stack,
            'github_url' => $this->github_url,
            'live_url' => $this->live_url,
            'is_published' => (bool) $this->is_published,
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}