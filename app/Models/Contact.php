<?php

namespace App\Models;

use App\Events\contact\ContactUpdated;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['head_office', 'branch_office', 'email', 'map'];


    protected $dispatchesEvents = [
        'saved' => ContactUpdated::class,
        'updated' => ContactUpdated::class,
        'deleted' => ContactUpdated::class,
    ];
}
