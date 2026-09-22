<?php

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it returns a list of projects in the api index', function () {
    // 1. Arrange: Create mock projects in isolated database
    Project::factory()->count(3)->create();

    // 2. Act: Request listing endpoint
    $response = $this->getJson('/api/projects');

    // 3. Assert: Verify status 200 and root array structure
    $response->assertStatus(200)
        ->assertJsonCount(3) // Counts items directly at the JSON root
        ->assertJsonStructure([
            '*' => [
                'id',
                'title',
                'slug',
                'summary',
                'content',
                'tech_stack',
                'image_url',
                'created_at',
                'updated_at',
            ]
        ]);
});

test('it returns a single project by its id using route model binding', function () {
    // 1. Arrange: Create target project
    $project = Project::factory()->create([
        'title' => 'Test Driven Portfolio'
    ]);

    // 2. Act: Request ID resource route
    $response = $this->getJson("/api/projects/{$project->id}");

    // 3. Assert: Verify status 200 and exact root path match
    $response->assertStatus(200)
        ->assertJsonPath('id', $project->id)
        ->assertJsonPath('title', 'Test Driven Portfolio');
});

test('it returns a 404 json error response when requesting a non-existent project id', function () {
    // Act & Assert
    $response = $this->getJson('/api/projects/99999');

    $response->assertStatus(404);
});