<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Division;
use Illuminate\Http\Request;
use Image;

class DivisionController extends Controller
{
    public function division(){
        $countries = Country::orderBy('name', 'asc')->get();
        $divisions = Division::with(['country' => function ($q){ $q->select('id', 'name');}])->orderBy('updated_at', 'desc')->paginate(10);
        return view('backEnd.division.division', [
            'countries' => $countries,
            'divisions' => $divisions,
            ]);
    }

    protected function divisionValidation($request){
        $request->validate([
            'country_id' => 'required | numeric',
            'name' => 'required',
            'box_image' => 'required | image',
            'background_image' => 'required | image',
            'status' => 'required',
        ]);
    }
    protected function box_image($request, $division){
        $image = $request->file('box_image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url = 'cosmos/custom_image/division/';
        Image::make($image)->resize(253,144)->save($image_url.$image_name);
        $division->box_image = $image_url.$image_name;
    }
    protected function background_image($request, $division){
        $image = $request->file('background_image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url = 'cosmos/custom_image/division/';
        Image::make($image)->resize(1450,700)->save($image_url.$image_name);
        $division->background_image = $image_url.$image_name;
    }
    protected function basicInfo($request, $division){
        $division->country_id = $request->country_id;
        $division->name = $request->name;
        $division->slug = strtolower($request->name);
        $division->status = $request->status;
    }
    public function addDivision(Request $request){
        $this->divisionValidation($request);
        $division = new Division();
        $this->box_image($request, $division);
        $this->background_image($request, $division);
        $this->basicInfo($request, $division);
        $division->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Division Added Successfully !!!');
        return back();
    }
    protected function divisionUpdateValidation($request){
        $request->validate([
            'country_id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);
    }

    public function updateDivision(Request $request){
        $this->divisionUpdateValidation($request);
        $box_image = $request->file('box_image');
        $background_image = $request->file('background_image');
        $division = Division::where('id', $request->id)->first();
        if($box_image){
            if(file_exists($division->box_image)){
                unlink($division->box_image);
            }
            $this->box_image($request, $division);
        }
        if($background_image){
            if(file_exists($division->background_image)){
                unlink($division->background_image);
            }
            $this->background_image($request, $division);
        }
        $this->basicInfo($request, $division);
        $division->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Division Updated Successfully !!!');
        return back();
    }
    public function deleteDivision($id){
        $division = Division::where('id', $id)->first();
        if(file_exists($division->box_image)){
            unlink($division->box_image);
        }
        if (file_exists($division->background_image)){
            unlink($division->background_image);
        }
        $division->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Division Deleted Successfully !!!');
        return back();
    }
}
