<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUsSection extends Model
{
    protected $fillable = [
        'badge',
        'title',
        'description',
        'image',
    ];

    public function features()
    {
        return $this->hasMany(WhyChooseUsFeature::class)->orderBy('sort_order');
    }
}