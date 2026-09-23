<?php

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns only published projects in the api index', function () {
    // Arrange: Create 3 published projects and 1 draft
    Project::factory()->count(3)->create(['is_published' => true]);
    Project::factory()->create(['is_published' => false]);

    // Act
    $response = $this->getJson('/api/projects');

    // Assert
    $response->assertStatus(200)
        ->assertJsonCount(3, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'slug',
                    'description',
                    'tech_stack',
                    'github_url',
                    'live_url',
                    'is_published',
                    'created_at',
                    'updated_at',
                ]
            ]
        ]);
});

it('returns a single project by its slug', function () {
    // Arrange
    $project = Project::factory()->create(['is_published' => true]);

    // Act
    $response = $this->getJson("/api/projects/{$project->slug}");

    // Assert
    $response->assertStatus(200)
        ->assertJsonPath('data.slug', $project->slug)
        ->assertJsonPath('data.title', $project->title);
});