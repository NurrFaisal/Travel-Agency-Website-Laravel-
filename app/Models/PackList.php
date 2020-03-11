<?php

namespace App\Models;

use App\Events\packList\PackListCreated;
use App\Events\packList\PackListDeleted;
use App\Events\packList\PackListUpdated;
use Illuminate\Database\Eloquent\Model;

class PackList extends Model
{
    protected $fillable = ['name', 'slug', 'brand_image', 'b_status', 'box_image', 'background_image', 'status'];

    protected $dispatchesEvents = [
        'saved' => PackListCreated::class,
        'updated' => PackListUpdated::class,
        'deleted' => PackListDeleted::class,
    ];
}
