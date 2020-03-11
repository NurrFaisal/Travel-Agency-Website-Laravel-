<?php

namespace App\Models;

use App\Events\logo\LogoUpdated;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable = ['imgage'];

    protected $dispatchesEvents = [
        'saved' => LogoUpdated::class,
        'updated' => LogoUpdated::class,
        'deleted' => LogoUpdated::class,
    ];
}
