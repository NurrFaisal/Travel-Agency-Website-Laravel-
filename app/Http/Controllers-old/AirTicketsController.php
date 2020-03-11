<?php

namespace App\Http\Controllers;

use App\Models\AirLine;
use App\Models\AirTicket;
use App\Models\AirTicketDay;
use App\Models\AirTicketDestination;
use App\Models\AirTicketMainDestination;
use App\Models\AirTicketTitle;
use App\Models\Day;
use Illuminate\Http\Request;

class AirTicketsController extends Controller
{
    public function airTickets(){
        $air_tickets = AirTicket::with(['air_ticket_title' => function($q){ $q->select('id', 'name');}, 'destinationR' => function($q){$q->select('id', 'name');}, 'air_line' =>function($q){$q->select('id', 'name');}, 'air_ticket_main_destinations'])->orderBy('id', 'desc')->paginate(10);
        $air_ticket_titles = AirTicketTitle::where('status', 1)->select('id', 'name')->orderBy('id', 'asc')->get();
        $air_lines = AirLine::where('status',1)->select('id', 'name')->orderBy('id', 'desc')->get();
        $days = Day::orderBy('id', 'asc')->get();
        return view('backEnd.airTicket.airTicketMain.airTicketMain',[
            'air_ticket_titles' => $air_ticket_titles,
            'days' => $days,
            'air_lines' => $air_lines,
            'air_tickets' => $air_tickets
        ]);
    }

    public function manageDestination(Request $request){
        $air_ticket_destinations = AirTicketDestination::where('air_title', $request->id)->get();
        return response()->json($air_ticket_destinations);
    }
    protected function airTicketBasic($request, $air_ticket){
        $air_ticket->name = $request->name;
        $air_ticket->air_ticket_title_id = $request->air_ticket_title_id;
        $air_ticket->destination = $request->destination;
        $air_ticket->air_line_id = $request->air_line_id;
        $air_ticket->price = 0.00;
        $air_ticket->ticket_class = 'Economy';
        $air_ticket->status = $request->status;
    }
    protected function airTicketDay($request, $air_ticket_id){
        $day_id_arry = [];
        $day_id_arry = $request->day_id;
        $day_id_arry_len = count($day_id_arry);
        for ($i = 0; $i < $day_id_arry_len; $i++){
            $air_ticket_day = new AirTicketDay();
            $air_ticket_day->day_id = $day_id_arry[$i];
            $air_ticket_day->air_ticket_id = $air_ticket_id;
            $air_ticket_day->save();
        }
    }
    protected function airTicketMainDestination($request, $air_ticket_id){
        $request->validate([
            'up_name' => 'required',
            'up_time' => 'required',
            'destination_price' => 'required'
        ]);
        $up_name_arry = [];
        $up_name_arry = $request->up_name;
        $up_time_arry = $request->up_time;
        $down_name_arry = $request->down_name;
        $down_time_arry = $request->down_time;
        $destination_price_arry = $request->destination_price;
        $up_name_arry_len = count($up_name_arry);
        for ($i = 0; $i < $up_name_arry_len; $i++){
            $air_ticket_main_destination = new AirTicketMainDestination();
            $air_ticket_main_destination->up_name = $up_name_arry[$i];
            $air_ticket_main_destination->up_time = $up_time_arry[$i];
            $air_ticket_main_destination->down_name = $down_name_arry[$i];
            $air_ticket_main_destination->down_time = $down_time_arry[$i];
            $air_ticket_main_destination->destination_price = $destination_price_arry[$i];
            $air_ticket_main_destination->air_ticket_id = $air_ticket_id;
            $air_ticket_main_destination->save();
        }
    }
    protected function airTicketValidation($request){
        $request->validate([
            'name' => 'required',
            'air_ticket_title_id' => 'required | numeric',
            'destination' => 'required | numeric',
            'air_line_id' => 'required | numeric',
//            'price' => 'required',
//            'ticket_class' => 'required',
            'status' => 'required | numeric',
        ]);
    }
    public function addAirTicket(Request $request){
        $request->validate([
            'day_id' => 'required',
//            'air_ticket_id' => 'required'
        ]);
        $this->airTicketValidation($request);
        $air_ticket = new AirTicket();
        $this->airTicketBasic($request, $air_ticket);
        $air_ticket->save();
        $this->airTicketDay($request, $air_ticket->id);
        $this->airTicketMainDestination($request, $air_ticket->id);
        session()->flash('type', 'success');
        session()->flash('message', 'New Air Ticket Added Successfully !!!');
        return back();
    }

    public function updateAirTicket(Request $request){
        $this->airTicketValidation($request);
        $air_ticket = AirTicket::where('id', $request->id)->first();
        $air_ticket->name = $request->name;
        $air_ticket->air_ticket_title_id = $request->air_ticket_title_id;
        $air_ticket->destination = $request->destination;
        $air_ticket->air_line_id = $request->air_line_id;
        $air_ticket->price = 0.00;
        $air_ticket->ticket_class = 'Economy';
        $air_ticket->status = $request->status;
        $air_ticket->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Air Ticket Info Updatd Successfully !!!');
        return back();
    }

    public function viewAirTicket($id){
        $days = Day::orderBy('id', 'asc')->get();
        $air_ticket = AirTicket::with(['air_ticket_title' => function($q){ $q->select('id', 'name');}, 'destinationR' => function($q){$q->select('id', 'name');}, 'air_line' =>function($q){$q->select('id', 'name');}, 'air_tickets_days.day' =>function($q){$q->select('id', 'name');}, 'air_ticket_main_destinations'])->orderBy('id', 'desc')->where('id', $id)->first();
        return view('backEnd.airTicket.airTicketMain.view_airTicketMain', [
            'air_ticket' => $air_ticket,
            'days'       => $days
        ]);
    }

    public function addAirTicketDays(Request $request){
        $request->validate([
            'days_id' => 'required',
            'air_ticket_id' => 'required'
        ]);
        $days_id_arry = [];
        $days_id_arry = $request->days_id;
        $days_id_arry_len = count($days_id_arry);
        for ($i = 0; $i < $days_id_arry_len; $i++){
            $air_ticket_day = new AirTicketDay();
            $air_ticket_day->day_id = $days_id_arry[$i];
            $air_ticket_day->air_ticket_id = $request->air_ticket_id;
            $air_ticket_day->save();
        }
        session()->flash('type', 'success');
        session()->flash('message', 'New Air Ticket Day Added');
        return back();
    }

    public function deleteAirTicketDay($id){
        $air_ticket_day = AirTicketDay::where('id', $id)->first();
        $air_ticket_day->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Air Ticket Day Deleted Successfully !!!');
        return back();
    }

    protected function airTicketDestinationValidation($request){
        $request->validate([
            'up_name' => 'required',
            'up_time' => 'required',
            'air_ticket_id' => 'required'
        ]);
    }
    public function addAirTicketDestination(Request $request){
        $this->airTicketDestinationValidation($request);
        $air_ticket_destination = new  AirTicketMainDestination();
        $air_ticket_destination->up_name = $request->up_name;
        $air_ticket_destination->up_time = $request->up_time;
        $air_ticket_destination->down_name = $request->down_name;
        $air_ticket_destination->down_time = $request->down_time;
        $air_ticket_destination->air_ticket_id = $request->air_ticket_id;
        $air_ticket_destination->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Air Ticket Destination Added Successfully !!!');
        return back();
    }

    public function deleteAirTicketMainDestination($id){
        $air_ticket_destination = AirTicketMainDestination::where('id', $id)->first();
        $air_ticket_destination->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Air Ticket Destination Deleted Successfully !!!');
        return back();
    }

    public function deleteAirTicket($id){
        $air_ticket = AirTicket::where('id', $id)->first();
        $air_ticket_main_destinations = AirTicketMainDestination::where('air_ticket_id', $id)->get();
        foreach ($air_ticket_main_destinations as $air_ticket_main_destination){
            $air_ticket_main_destination->delete();
        }
        $air_ticket_days = AirTicketDay::where('air_ticket_id', $id)->get();
        foreach ($air_ticket_days as $air_ticket_day){
            $air_ticket_day->delete();
        }
        $air_ticket->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Air Ticket Deleted Successfully !!!');
        return back();
    }


    public function addAirTicketDestinationMain(Request $request){
        $request->validate([
            'up_name' => 'required',
            'up_time' => 'required',
            'destination_price' => 'required'
        ]);
        $air_ticket_destination_main = new AirTicketMainDestination();
        $air_ticket_destination_main->up_name = $request->up_name;
        $air_ticket_destination_main->up_time = $request->up_time;
        $air_ticket_destination_main->down_name = $request->down_name;
        $air_ticket_destination_main->down_time = $request->down_time;
        $air_ticket_destination_main->destination_price = $request->destination_price;
        $air_ticket_destination_main->air_ticket_id = $request->air_ticket_id;
        $air_ticket_destination_main->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Destination Added Successfully !!!');
        return back();

    }
}
