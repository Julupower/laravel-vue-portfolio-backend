<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'tech_stack',
        'github_url',
        'live_url',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'tech_stack' => 'array',
    ];

    /**
     * Get the route key for implicit model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}