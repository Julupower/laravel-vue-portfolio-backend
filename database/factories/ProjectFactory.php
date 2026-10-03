<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
	public function definition(): array
	{
	    return [
		'title' => fake()->sentence(4),
		'slug' => fake()->unique()->slug(),
		'description' => fake()->paragraph(),
		'tech_stack' => ['Laravel', 'Vue.js', 'Tailwind CSS'],
		'github_url' => fake()->url(),
		'live_url' => fake()->url(),
		'image_path' => 'projects/default-thumbnail.jpg',
		'is_published' => true,
	    ];
	}
}