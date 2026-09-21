<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'tech_stack',
        'image_path',
        'is_published',
    ];

    /**
     * Appends custom accessors to the model's array / JSON form.
     */
    protected $appends = [
        'image_url',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'tech_stack' => 'array',
        'is_published' => 'boolean',
    ];

    /**
     * Get the full public URL for the project's image.
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image_path 
                ? Storage::disk('public')->url($this->image_path) 
                : null,
        );
    }
}