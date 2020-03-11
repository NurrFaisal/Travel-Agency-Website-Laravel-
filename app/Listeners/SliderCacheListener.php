<?php

namespace App\Listeners;

use App\Models\Slider;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SliderCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        cache()->forget('sliders_c');
        $sliders = Slider::where('status', 1)->orderBy('updated_at', 'desc')->limit(4)->get();
        cache()->forever('sliders_c', $sliders);
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
