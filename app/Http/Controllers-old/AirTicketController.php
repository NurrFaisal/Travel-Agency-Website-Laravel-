<?php

namespace App\Http\Controllers;

use App\Models\AirTicket;
use App\Models\AirTicketDestination;
use App\Models\AirTicketTitle;
use Illuminate\Http\Request;

class AirTicketController extends Controller
{
    public function airTicket($cat_id, $slug){
        $air_ticket_title = AirTicketTitle::where('slug', $slug)->first();
//        return $air_ticket_title;
        $air_ticket_destinations = AirTicketDestination::where('status', 1)->where('air_title', $cat_id)->get();
        return view('frontEnd.airticket.airticketdestination', [
            'air_ticket_title' => $air_ticket_title,
            'air_ticket_destinations' => $air_ticket_destinations
        ]);
    }

    public function airTicketList($id){
        $air_ticket_destination = AirTicketDestination::where('id', $id)->first();
        $air_tickets = AirTicket::where('status', 1)->with(['air_ticket_title' => function($q){ $q->select('id', 'name');}, 'destinationR' => function($q){$q->select('id', 'name');}, 'air_line'=> function($q){$q->select('id', 'name', 'up_image');}, 'air_tickets_days.day' => function($q){$q->select('id', 'name');}, 'air_ticket_main_destinations'])->where('destination', $id)->paginate(10);
        return view('frontEnd.airticket.airticket', [
            'air_tickets' => $air_tickets,
            'air_ticket_destination' => $air_ticket_destination
            ]);
    }
}
