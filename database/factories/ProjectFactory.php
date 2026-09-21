<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
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
            'title' => fake()->sentence(3),
            'slug' => fake()->slug(),
            'summary' => fake()->sentence(10),
            'content' => fake()->paragraphs(3, true),
            'tech_stack' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'MySQL'],
            'image_path' => 'projects/demo.jpg',
            'is_published' => true,
        ];
    }
}