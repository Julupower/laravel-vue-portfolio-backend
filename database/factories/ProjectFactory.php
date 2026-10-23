<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'slug' => fake()->unique()->slug(),
            'description' => fake()->paragraph(),
            'tech_stack' => ['Laravel', 'Vue.js', 'Tailwind CSS'],
            'github_url' => fake()->url(),
            'live_url' => fake()->url(),
            'image_path' => fake()->optional(0.8)->randomElement([
                'projects/default-thumbnail.jpg',
                'projects/demo.jpg'
            ]),
            'is_published' => true,
        ];
    }
}