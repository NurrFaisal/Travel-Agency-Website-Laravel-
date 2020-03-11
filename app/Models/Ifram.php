<?php

namespace App\Models;

use App\Events\ifram\IframUpdated;
use Illuminate\Database\Eloquent\Model;

class Ifram extends Model
{
    protected $fillable = ['facebook', 'youtube'];

    protected $dispatchesEvents = [
        'saved' => IframUpdated::class,
        'updated' => IframUpdated::class,
        'deleted' => IframUpdated::class,
    ];
}
