<?php

namespace App\Listeners;

use App\Models\Continent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContinentCacheListener
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
        cache()->forget('continents');
        $continents = Continent::where('status', 1)->orderBy('name', 'asc')->get();
        cache()->forever('continents', $continents);


        $continent_name = [];
        $continent_name[0] = 'honourable';
        cache()->forget('continents_c');
        $continents_c = Continent::orderBy('name', 'asc')->where('status', 1)->whereNotIn('slug', $continent_name)->select('name', 'id', 'box_image')->get();
        cache()->forever('continents_c', $continents_c);

        cache()->forget('honourable');
        $honourable = Continent::where('slug', 'honourable')->where('status', 1)->select('name', 'id', 'box_image')->first();
        cache()->forever('honourable', $honourable);

    }
}
