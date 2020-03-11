<?php

namespace App\Listeners;

use App\Models\HotelTitle;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HotelTitleCacheListener
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
       cache()->forget('hotel_title_c');
       $hotel_title = HotelTitle::where('id', 1)->first();
       cache()->forever('hotel_title_c', $hotel_title);

    }
}
