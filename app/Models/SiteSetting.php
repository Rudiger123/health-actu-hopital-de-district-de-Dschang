<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_title', 'site_email', 'site_phone', 'site_keywords', 'site_description'
    ];
}
