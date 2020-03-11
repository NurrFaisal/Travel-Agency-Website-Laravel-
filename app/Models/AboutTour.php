<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutTour extends Model
{
    protected $fillable = ['package_id', 'places_covered', 'inclusions', 'exclusions', 'others'];
}
