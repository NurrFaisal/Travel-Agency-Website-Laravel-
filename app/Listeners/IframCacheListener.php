<?php

namespace App\Listeners;

use App\Models\Ifram;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IframCacheListener
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
        cache()->forget('ifram');
        $ifram = Ifram::where('id', 1)->first();
        cache()->forever('ifram', $ifram);
    }
}
