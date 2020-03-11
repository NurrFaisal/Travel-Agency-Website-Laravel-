<?php

namespace App\Models;

use App\Events\FooterImageCreated;
use App\Events\FooterImageDeleted;
use App\Events\FooterImageUpdated;
use Illuminate\Database\Eloquent\Model;

class FooterImage extends Model
{
    protected $fillable = ['name', 'slug', 'footer_image', 'status'];

    protected $dispatchesEvents = [
        'saved' => FooterImageCreated::class,
        'updated' => FooterImageUpdated::class,
        'deleted' => FooterImageDeleted::class,
    ];
}
