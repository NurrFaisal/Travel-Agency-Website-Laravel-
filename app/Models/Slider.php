<?php

namespace App\Models;

use App\Events\slider\SliderCreated;
use App\Events\slider\SliderDeleted;
use App\Events\slider\SliderUpdated;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['name', 'slug', 'slider_image', 'status'];

    protected $dispatchesEvents = [
        'saved' => SliderCreated::class,
        'updated' => SliderUpdated::class,
        'deleted' => SliderDeleted::class,
    ];
}
