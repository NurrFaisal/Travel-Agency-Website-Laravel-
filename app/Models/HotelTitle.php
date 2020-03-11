<?php

namespace App\Models;

use App\Events\hotel_title\HotelTitleUpdated;
use Illuminate\Database\Eloquent\Model;

class HotelTitle extends Model
{
    protected $fillable =['title', 'box_image', 'banner_image'];

    protected $dispatchesEvents = [
        'saved' => HotelTitleUpdated::class,
        'updated' => HotelTitleUpdated::class,
        'deleted' => HotelTitleUpdated::class,
    ];
}
