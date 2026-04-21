<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $fillable = [
        'description',
        'phone',
        'email',
        'address',
        'hours',
        'facebook',
        'instagram',
        'linkedin',
    ];
}
