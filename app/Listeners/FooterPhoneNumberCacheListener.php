<?php

namespace App\Listeners;

use App\Models\FooterPhoneNumber;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FooterPhoneNumberCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        cache()->forget('footerPhoneNumber');
        $footerPhoneNumber = FooterPhoneNumber::where('id', 1)->first();
        cache()->forever('footerPhoneNumber', $footerPhoneNumber);
    }
}
