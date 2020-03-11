<?php

namespace App\Models;

use App\Events\FooterPhoneNumber\FooterPhoneNumberCreated;
use App\Events\FooterPhoneNumber\FooterPhoneNumberDeleted;
use App\Events\FooterPhoneNumber\FooterPhoneNumberUpdated;
use Illuminate\Database\Eloquent\Model;

class FooterPhoneNumber extends Model
{
    protected $fillable = ['package', 'package_branch', 'visa', 'visa_banani', 'air_ticket', 'air_ticket_banani'];

    protected $dispatchesEvents = [
        'saved' => FooterPhoneNumberCreated::class,
        'updated' => FooterPhoneNumberUpdated::class,
        'deleted' => FooterPhoneNumberDeleted::class,
    ];
}
