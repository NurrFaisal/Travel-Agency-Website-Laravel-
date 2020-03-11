<?php

namespace App\Listeners;

use App\Models\Package;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PackageCacheListener
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
        cache()->forget('packages_c');
        $packages_c = Package::with(['category' => function($q){$q->select('id', 'name');}])->where('status', 1)->orderBy('updated_at', 'desc')->select('id', 'name', 'box_image', 'short_description', 'category_id')->limit(4)->get();
        cache()->forever('packages_c', $packages_c);
    }
}
