<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUsFeature extends Model
{
    protected $fillable = [
        'why_choose_us_section_id',
        'title',
        'description',
        'sort_order',
    ];

    public function section()
    {
        return $this->belongsTo(WhyChooseUsSection::class, 'why_choose_us_section_id');
    }
}