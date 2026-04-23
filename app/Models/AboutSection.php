<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'badge',
        'title',
        'description',
        'image',
        'experience_text',
        'point_one',
        'point_two',
        'point_three',
        'button_text',
        'button_link',
    ];
}