<?php

namespace App\Http\Controllers;

use App\Models\AirLine;
use App\Models\AirTicket;
use Illuminate\Http\Request;
use Image;
use phpDocumentor\Reflection\File;

class AirLinesController extends Controller
{
    public function airLines(){
        $air_lines = AirLine::orderBy('id', 'desc')->paginate(10);
        return view('backEnd.airTicket.airLines.airLines', [
            'air_lines' => $air_lines
        ]);
    }
    protected function airLineValidation($request){
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
    }
    protected function up_image($request, $air_line){
        $image = $request->file('up_image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url = 'cosmos/custom_image/air-ticket/air-line/';
        Image::make($image)->resize(253, 158)->save($image_url.$image_name);
        $air_line->up_image = $image_url.$image_name;
    }
    protected function down_image($request, $air_line){
        $image = $request->file('down_image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url = 'cosmos/custom_image/air-ticket/air-line/';
        Image::make($image)->resize(253, 158)->save($image_url.$image_name);
        $air_line->down_image = $image_url.$image_name;
    }
    public function addAirLine(Request $request){
        $request->validate([
            'up_image' => 'required',
            'down_image' => 'required',
        ]);
        $this->airLineValidation($request);
        $air_line = new AirLine();
        $air_line->name = $request->name;
        $this->up_image($request, $air_line);
        $this->down_image($request, $air_line);
        $air_line->status = $request->status;
        $air_line->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Air Line Added Successfully !!!');
        return back();
    }
    public function updateAirLine(Request $request){
        $this->airLineValidation($request);
        $air_line = AirLine::where('id', $request->id)->first();
        $air_line->name = $request->name;
        $air_line->status = $request->status;
        if($request->up_image){
            if(file_exists($air_line->up_image)){
                unlink($air_line->up_image);
            }
            $this->up_image($request, $air_line);
        }
        if ($request->down_image){
            if(file_exists($air_line->down_image)){
                unlink($air_line->down_image);
            }
            $this->down_image($request, $air_line);
        }
        session()->flash('type', 'success');
        session()->flash('message', 'Air Line Updated Successfully !!!');
        return back();
    }
    public function deleteAirLine($id){
        $airtickets = AirTicket::where('air_line_id', $id)->get();
        $airtickets_count = count($airtickets);
        if($airtickets_count == 0){
            $air_line = AirLine::where('id', $id)->first();
            if(file_exists($air_line->up_image)){
                unlink($air_line->up_image);
            }
            if(file_exists($air_line->down_image)){
                unlink($air_line->down_image);
            }
            $air_line->delete();
            session()->flash('type', 'danger');
            session()->flash('message', 'Air Line Deleted Successfully !!!');
        }else{
            session()->flash('type', 'info');
            session()->flash('message', 'This Air Line can not be Delete !!!');
        }

        return back();
    }
}
