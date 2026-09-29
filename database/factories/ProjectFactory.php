<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
		'title' => fake()->sentence(3),
		'slug' => fake()->unique()->slug(),
		'description' => fake()->paragraph(),
		'is_published' => true,
		'image_path' => 'storage/projects/default.jpg',
		'tech_stack' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'MySQL'],
		'github_url' => 'https://github.com',
		'live_url' => 'https://example.com',
	];
    }
}