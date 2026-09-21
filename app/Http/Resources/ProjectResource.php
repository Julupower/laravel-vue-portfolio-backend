<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray($request): array
	{
	    return [
		'id' => $this->id,
		'title' => $this->title,
		'slug' => $this->slug,
		'summary' => $this->summary,
		'content' => $this->content,
		'tech_stack' => $this->tech_stack,
		'image_path' => $this->image_path,
		'image_url' => $this->image_url,
		'is_published' => $this->is_published,
		'created_at' => $this->created_at,
		'updated_at' => $this->updated_at,
	    ];
	}
}