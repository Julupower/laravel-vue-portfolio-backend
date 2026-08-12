<?php

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns only published projects in the api index', function () {
    // Arrange: Create 3 published projects and 1 unpublished project
    Project::factory()->count(3)->create(['is_published' => true]);
    Project::factory()->create(['is_published' => false]);

    // Act: Send a GET request to the API route
    $response = $this->getJson('/api/projects');

    // Assert: Verify HTTP status 200, 3 items in payload, and schema keys
    $response->assertStatus(200)
        ->assertJsonCount(3, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'slug',
                    'summary',
                    'content',
                    'client_name',
                    'featured_image_url',
                    'tech_stack',
                    'is_published',
                    'published_at',
                    'created_at',
                ],
            ],
            'links',
            'meta',
        ]);
});

it('returns a single project by its slug', function () {
    // Arrange: Create a published project
    $project = Project::factory()->create(['is_published' => true]);

    // Act: Request the project by its unique slug
    $response = $this->getJson("/api/projects/{$project->slug}");

    // Assert: Verify HTTP status 200 and correct JSON response matching the model
    $response->assertStatus(200)
        ->assertJsonPath('data.slug', $project->slug)
        ->assertJsonPath('data.title', $project->title);
});