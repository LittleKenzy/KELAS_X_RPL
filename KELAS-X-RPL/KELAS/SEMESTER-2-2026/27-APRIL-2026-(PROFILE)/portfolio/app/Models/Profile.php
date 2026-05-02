<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'tagline', 'bio', 'bio_extended', 'photo',
        'email', 'phone', 'location', 'school', 'major', 'class_info',
        'social_links', 'motto', 'motto_author',
        'prime_time', 'prime_time_quote', 'current_status',
        'personality_traits', 'hobbies', 'daily_vibe',
    ];

    protected $casts = [
        'social_links'       => 'array',
        'personality_traits'  => 'array',
        'hobbies'            => 'array',
        'daily_vibe'         => 'array',
    ];
}
