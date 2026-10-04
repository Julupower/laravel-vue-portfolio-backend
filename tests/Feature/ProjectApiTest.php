<?php

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it returns a list of published portfolio projects in the expected resource structure', function () {
    // Arrange: Create test projects in database
    Project::factory()->count(3)->create();

    // Act: Request the projects index endpoint
    $response = $this->getJson('/api/projects');

    // Assert: Verify status and JSON resource structure
    $response->assertStatus(200)
        ->assertJsonCount(3, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'slug',
                    'description',
                    'image_path',
                    'tech_stack',
                ],
            ],
        ]);
});

test('it returns a single project resource when passed a valid slug', function () {
    // Arrange: Create a project record
    $project = Project::factory()->create([
        'title' => 'E-Commerce Platform',
        'slug' => 'e-commerce-platform',
    ]);

    // Act: Fetch the project by slug
    $response = $this->getJson("/api/projects/{$project->slug}");

    // Assert: Verify 200 response and exact matching fields
    $response->assertStatus(200)
        ->assertJson([
            'data' => [
                'id' => $project->id,
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
            ],
        ]);
});

test('it returns a 404 json response when an invalid slug is requested', function () {
    // Act: Request non-existent slug
    $response = $this->getJson('/api/projects/non-existent-slug');

    // Assert: Verify 404 status code
    $response->assertStatus(404);
});