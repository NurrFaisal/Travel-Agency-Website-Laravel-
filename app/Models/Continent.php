<?php

namespace App\Models;

use App\Events\continent\ContinentCreated;
use App\Events\continent\ContinentDeleted;
use App\Events\continent\ContinentUpdated;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $fillable = ['name', 'slug', 'box_image', 'background_image', 'status'];

    protected $dispatchesEvents = [
        'saved' => ContinentCreated::class,
        'updated' => ContinentUpdated::class,
        'deleted' => ContinentDeleted::class,
    ];

}
