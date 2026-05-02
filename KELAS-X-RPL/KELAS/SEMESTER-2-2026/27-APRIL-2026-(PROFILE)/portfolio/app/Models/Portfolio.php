<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'project_url',
        'github_url',
        'tech_stack',
        'category',
        'is_featured',
        'completed_at',
        'sort_order',
    ];

    protected $casts = [
        'tech_stack'   => 'array',
        'is_featured'  => 'boolean',
        'completed_at' => 'date',
    ];

    // ── Auto-generate slug ──────────────────────────────────────────
    protected static function booted(): void
    {
        static::creating(function (Portfolio $portfolio) {
            if (empty($portfolio->slug)) {
                $portfolio->slug = Str::slug($portfolio->title);
            }
        });
    }

    // ── Scopes ──────────────────────────────────────────────────────
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('completed_at');
    }
}
