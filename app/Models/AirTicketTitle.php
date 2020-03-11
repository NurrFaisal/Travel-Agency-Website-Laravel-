<?php

namespace App\Models;

use App\Events\airTicketTitle\AirTicketTitleCreated;
use App\Events\airTicketTitle\AirTicketTitleDeleted;
use App\Events\airTicketTitle\AirTicketTitleUpdated;
use Illuminate\Database\Eloquent\Model;

class AirTicketTitle extends Model
{
    protected $fillable = ['name', 'slug','box_image', 'background_image', 'status'];

    protected $dispatchesEvents = [
        'saved' => AirTicketTitleCreated::class,
        'updated' => AirTicketTitleUpdated::class,
        'deleted' => AirTicketTitleDeleted::class,
    ];
}
