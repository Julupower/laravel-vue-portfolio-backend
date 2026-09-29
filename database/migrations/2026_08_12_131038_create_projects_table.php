<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
	    Schema::create('projects', function (Blueprint $table) {
		$table->id();
		$table->string('title');
		$table->string('slug')->unique();
		$table->text('description');
		$table->boolean('is_published')->default(true);
		$table->json('tech_stack')->nullable();
		$table->string('github_url')->nullable();
		$table->string('live_url')->nullable();
		$table->timestamps();

		// Index for performance on filtered queries
		$table->index(['is_published', 'created_at']);
	    });
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
	    Schema::dropIfExists('projects');
	}
};
