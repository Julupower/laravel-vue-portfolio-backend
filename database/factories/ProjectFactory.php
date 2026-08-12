<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = fake()->unique()->sentence(4);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'summary' => fake()->paragraph(),
            'content' => fake()->paragraphs(3, true),
            'client_name' => fake()->company(),
            'featured_image_url' => 'https://via.placeholder.com/800x600',
            'tech_stack' => fake()->randomElements(
                ['Laravel', 'Vue 3', 'Tailwind CSS', 'Docker', 'Redis', 'PostgreSQL', 'TypeScript', 'GraphQL'],
                rand(2, 4)
            ),
            'is_published' => true,
            'published_at' => now(),
        ];
    }
}