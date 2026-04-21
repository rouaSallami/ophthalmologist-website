<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'phone',
        'button_text',
        'button_link',
        'secondary_button_text',
        'secondary_button_link',
        'badge_text',
        'experience_text',
        'patients_text',
        'image',
        'is_active',
    ];
}