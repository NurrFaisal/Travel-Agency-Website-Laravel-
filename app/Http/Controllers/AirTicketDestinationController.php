<?php

namespace App\Http\Controllers;

use App\Models\AirTicketDestination;
use App\Models\AirTicketMainDestination;
use App\Models\AirTicketTitle;
use Illuminate\Http\Request;
use Image;

class AirTicketDestinationController extends Controller
{
    public function airTicketDestination(){
        $air_ticket_destinations = AirTicketDestination::with(['air_ticket_title' => function($q){$q->select('id','name');}])->orderBy('id', 'desc')->paginate(10);
        $air_ticket_titles = AirTicketTitle::orderBy('id', 'desc')->where('status',1)->get();
        return view('backEnd.airTicket.airTicketDestination.airTicketDestination',[
            'air_ticket_destinations' => $air_ticket_destinations,
            'air_ticket_titles' => $air_ticket_titles
        ]);
    }
    protected function airTicketDestinationValidation($request){
        $request->validate([
            'name' => 'required',
            'air_title' => 'required',
            'status'   => 'required'
        ]);
    }
    protected function boxImage($request, $air_ticket_destination){
        $box_image =  $request->file('box_image');
        $box_image_name = time().'_'.$box_image->getClientOriginalName();
        $box_image_url = 'cosmos/custom_image/air-ticket/airTicketDestination/';
        Image::make($box_image)->resize(253, 158)->save($box_image_url.$box_image_name);
        $air_ticket_destination->box_image = $box_image_url.$box_image_name;

    }
    protected function backgroundImage($request, $air_ticket_destination){
        $background_image = $request->file('background_image');
        $background_image_name = time().'_'.$background_image->getClientOriginalName();
        $background_image_url = 'cosmos/custom_image/air-ticket/airTicketDestination/';
        Image::make($background_image)->resize(1450, 700)->save($background_image_url.$background_image_name);
        $air_ticket_destination->background_image = $background_image_url.$background_image_name;

    }
    public function addAirTicketDestination(Request $request){
//        return $request;
        $this->airTicketDestinationValidation($request);
        $request->validate([
            'box_image' => 'required',
            'background_image' => 'required',
        ]);
        $air_ticket_destination = new AirTicketDestination();
        $this->boxImage($request, $air_ticket_destination);
        $this->backgroundImage($request, $air_ticket_destination);
        $air_ticket_destination->name = $request->name;
        $air_ticket_destination->air_title = $request->air_title;
        $air_ticket_destination->status = $request->status;
        $air_ticket_destination->save();
        session()->flash('type', 'success');
        session()->flash('message', 'Air Ticket Destination Added Successfully !!!');
        return back();
    }

    public function updateAirTicketDestination(Request $request){
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'air_title' => 'required',
            'status' => 'required'
        ]);
        $air_ticket_destination = AirTicketDestination::where('id', $request->id)->first();
        $air_ticket_destination->name = $request->name;
        $air_ticket_destination->air_title = $request->air_title;
        if ($request->box_image){
            if(file_exists($air_ticket_destination->box_image)){
                unlink($air_ticket_destination->box_image);
            }
            $this->boxImage($request, $air_ticket_destination);
        }
        if($request->background_image){
            if (file_exists($air_ticket_destination->background_image)){
                unlink($air_ticket_destination->background_image);
            }
            $this->backgroundImage($request, $air_ticket_destination);
        }
        $air_ticket_destination->status = $request->status;
        $air_ticket_destination->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Air Ticket Destination Updated Successfully !!!');
        return back();
    }

    public function deleteAirTicketDestination($id){

        $airtickets = AirTicket::where('destination', $id)->get();
        $airtickets_count = count($airtickets);
        if ($airtickets_count == 0) {
            $air_ticket_destination = AirTicketDestination::where('id', $id)->first();
            if (file_exists($air_ticket_destination->box_image)) {
                unlink($air_ticket_destination->box_image);
            }
            if (file_exists($air_ticket_destination->background_image)) {
                unlink($air_ticket_destination->background_image);
            }
            $air_ticket_destination->delete();
            session()->flash('type', 'danger');
            session()->flash('message', 'Air Ticket Destination Deleted Successfully !!!');
        }else{
            session()->flash('type', 'info');
            session()->flash('message', 'This Air Line can not be Delete !!!');
        }
        return back();
    }
}
