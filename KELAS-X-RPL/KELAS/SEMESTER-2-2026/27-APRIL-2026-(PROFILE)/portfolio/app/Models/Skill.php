<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name', 'icon', 'description', 'level', 'category', 'sort_order',
    ];

    protected $casts = [
        'level'      => 'integer',
        'sort_order' => 'integer',
    ];

    // ── Scopes ──────────────────────────────────────────────────────────

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }
}
