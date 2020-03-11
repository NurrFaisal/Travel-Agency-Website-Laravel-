<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TabItineraryTitle extends Model
{
    protected $fillable = ['tab_id', 'title', 'description', 'price', 'package_id'];
}
