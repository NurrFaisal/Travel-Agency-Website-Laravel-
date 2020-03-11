<?php

namespace App\Listeners;

use App\Models\FooterImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FooterImageCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        cache()->forget('footer_images');
        $footer_images = FooterImage::where('status', 1)->orderBy('name', 'asc')->limit(3)->get();
        cache()->forever('footer_images', $footer_images);
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
