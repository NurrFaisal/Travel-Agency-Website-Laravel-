<?php

namespace App\Listeners;

use App\Models\AirTicketTitle;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AirTicketTitleCacheListener
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
        cache()->forget('air_ticket_titles');
        $air_ticket_titles = AirTicketTitle::where('status', 1)->orderBy('name', 'asc')->get();
        cache()->forever('air_ticket_titles', $air_ticket_titles);

        cache()->forget('air_ticket_titles_c');
        $air_ticket_titles_c = AirTicketTitle::orderBy('name', 'asc')->where('status', 1)->limit(4)->get();
        cache()->forever('air_ticket_titles_c', $air_ticket_titles_c);
    }
}
