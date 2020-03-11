<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourDay extends Model
{
    protected $fillable = ['day', 'package_id', 'date', 'overnight_stay', 'day_description', 'freakfast', 'lunch', 'dinner'];
}
