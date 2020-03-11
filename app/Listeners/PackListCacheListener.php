<?php

namespace App\Listeners;

use App\Models\PackList;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PackListCacheListener
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
        cache()->forget('packLists');
        $packLists = PackList::where('status', 1)->select('id', 'name', 'slug')->get();
        cache()->forever('packLists', $packLists);

        cache()->forget('packLists_c');
        $packLists_c = PackList::where('status', 1)->limit(4)->get();
        cache()->forever('packLists_c', $packLists_c);
    }
}
