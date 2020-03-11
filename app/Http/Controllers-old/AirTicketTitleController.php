<?php

namespace App\Http\Controllers;

use App\Models\AirTicketTitle;
use Illuminate\Http\Request;
use Image;

class AirTicketTitleController extends Controller
{
    public function airTicketTitle(){
        $airTicketTitles = AirTicketTitle::orderBy('name', 'asc')->get();
        return view('backEnd.airTicket.airTicketTitle', ['airTicketTitles' => $airTicketTitles]);
    }
    protected function airTicketTitleValidation($request){
        $request->validate([
            'name' => 'required',
            'box_image' => 'required',
            'background_image' => 'required | image',
            'status'          => 'required'
        ]);
    }
    protected function boxImage($request){
        $box_image =  $request->file('box_image');
        $box_image_name = time().'_'.$box_image->getClientOriginalName();
        $box_image_url = 'cosmos/custom_image/airTicketTitle/box_image/';
        Image::make($box_image)->resize(253, 158)->save($box_image_url.$box_image_name);
        $box_image_link = $box_image_url.$box_image_name;
        return $box_image_link;
    }
    protected function backgroundImage($request){
        $background_image = $request->file('background_image');
        $background_image_name = time().'_'.$background_image->getClientOriginalName();
        $background_image_url = 'cosmos/custom_image/airTicketTitle/background_image/';
        Image::make($background_image)->resize(1450, 700)->save($background_image_url.$background_image_name);
        $background_image_link = $background_image_url.$background_image_name;
        return $background_image_link;
    }
    public function AddAirTicketTitle(Request $request){
//        return $request;
        $this->airTicketTitleValidation($request);
        $airTicketTitle = new  AirTicketTitle();
        $box_image_link = $this->boxImage($request);
        $background_image_link = $this->backgroundImage($request);
        $airTicketTitle->name = $request->name;
        $airTicketTitle->slug = strtolower($request->name);
        $airTicketTitle->status = $request->status;
//        $airTicketTitle->category = $request->category;
        $airTicketTitle->box_image = $box_image_link;
        $airTicketTitle->background_image = $background_image_link;
        $airTicketTitle->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Air Ticket Title added Succussfully !!!');
        return redirect('/apanel/air-ticket-title');
    }
    protected function updateAirTicketTitleValidation($request){
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
    }

    public function UpdateAirTicketTitle(Request $request){
        $this->updateAirTicketTitleValidation($request);
        $airTicketTitle = AirTicketTitle::where('id', $request->id)->first();
        if($request->box_image){
            if (file_exists($airTicketTitle->box_image)){
                unlink($airTicketTitle->box_image);
            }
            $box_image_link = $this->boxImage($request);
            $airTicketTitle->box_image = $box_image_link;
        }
        if ($request->background_image){
            if(file_exists($airTicketTitle->background_image)){
                unlink($airTicketTitle->background_image);
            }
            $background_image_link = $this->backgroundImage($request);
            $airTicketTitle->background_image = $background_image_link;
        }
        $airTicketTitle->name = $request->name;
        $airTicketTitle->slug = strtolower($request->name);
        $airTicketTitle->category = $request->category;
        $airTicketTitle->status = $request->status;
        $airTicketTitle->update();
        session()->flash('type', 'success');
        session()->flash('message', 'New Air Ticket Title Updated Succussfully !!!');
        return redirect('/apanel/air-ticket-title');
    }

    public function deleteAirTicketTitle($id){
        $air_ticket_title = AirTicketTitle::where('id', $id)->first();
        if (file_exists($air_ticket_title->box_image)){
            unlink($air_ticket_title->box_image);
        }
        if (file_exists($air_ticket_title->background_image)){
            unlink($air_ticket_title->background_image);
        }
        $air_ticket_title->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Air Ticket Title Successfully Deleted !!!');
        return back();
    }
}
