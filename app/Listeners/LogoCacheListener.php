<?php

namespace App\Listeners;

use App\Models\Logo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogoCacheListener
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
       cache()->forget('logo');
       $logo = Logo::where('id', 1)->first();
       cache()->forever('logo', $logo);
    }
}
