<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Enterprise E-Commerce Platform',
            'slug' => 'enterprise-ecommerce-platform',
            'description' => 'Full-stack headless architecture utilizing Laravel and Vue 3.',
            'tech_stack' => ['Laravel', 'Vue.js', 'Tailwind CSS'],
            'image_path' => null,
        ]);

        Project::create([
            'title' => 'Real-Time Analytics Dashboard',
            'slug' => 'real-time-analytics-dashboard',
            'description' => 'High-throughput data visualization dashboard processing millions of events daily.',
            'tech_stack' => ['Laravel', 'Vue.js', 'Tailwind CSS'],
            'image_path' => null,
        ]);

        Project::create([
            'title' => 'Cloud Infrastructure Orchestrator',
            'slug' => 'cloud-infrastructure-orchestrator',
            'description' => 'Automated deployment pipeline manager integrated with container registries.',
            'tech_stack' => ['Laravel', 'Tailwind CSS'],
            'image_path' => null,
        ]);
    }
}