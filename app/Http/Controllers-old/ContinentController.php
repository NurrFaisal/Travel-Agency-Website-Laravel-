<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use Illuminate\Http\Request;
use Image;

class ContinentController extends Controller
{
    public function continent(){
        $continents = Continent::orderBy('name', 'asc')->get();
        return view('backEnd.continent.continent', ['continents' => $continents]);
    }
    protected function continentValidation($request){
        $request->validate([
            'name'      => 'required',
            'box_image' => 'required | image',
            'background_image' => 'required | image',
            'status'  => 'required'
        ]);
    }
    protected function continentUpdateValidation($request){
        $request->validate([
            'name'      => 'required',
            'status'  => 'required'
        ]);
    }
    protected function boxImage($request){
        $box_image =  $request->file('box_image');
        $box_image_name = time().'_'.$box_image->getClientOriginalName();
        $box_image_url = 'cosmos/custom_image/continent/box_image/';
        Image::make($box_image)->resize(253, 158)->save($box_image_url.$box_image_name);
        $box_image_link = $box_image_url.$box_image_name;
        return $box_image_link;
    }
    protected function backgroundImage($request){
        $background_image = $request->file('background_image');
        $background_image_name = time().'_'.$background_image->getClientOriginalName();
        $background_image_url = 'cosmos/custom_image/continent/background_image/';
        Image::make($background_image)->resize(1450, 700)->save($background_image_url.$background_image_name);
        $background_image_link = $background_image_url.$background_image_name;
        return $background_image_link;
    }
    public function addContinent(Request $request){
        $this->continentValidation($request);
        $box_image_link = $this->boxImage($request);
        $background_image_link = $this->backgroundImage($request);
        $continent = new Continent();
        $continent->name = $request->name;
        $continent->slug = strtolower($request->name);
        $continent->box_image = $box_image_link;
        $continent->background_image = $background_image_link;
        $continent->status = $request->status;
        $continent->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Continent added Succussfully !!!');
        return back();
    }

    public function UpdateContinent(Request $request){
        $this->continentUpdateValidation($request);
        $continent = Continent::where('id', $request->id)->first();
        $box_image =  $request->file('box_image');
        $background_image = $request->file('background_image');
        if($box_image){
            if(file_exists($continent->box_image)){
                unlink($continent->box_image);
            }
            $box_image_link = $this->boxImage($request);
            $continent->box_image = $box_image_link;
        }
        if ($background_image){
            if(file_exists($continent->background_image)){
                unlink($continent->background_image);
            }
            $background_image = $this->backgroundImage($request);
            $continent->background_image = $background_image;
        }
        $continent->name = $request->name;
        $continent->status = $request->status;
        $continent->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Continent Updated Succussfully !!!');
        return back();
    }
    public function deleteContinent($id){
       $continent = Continent::where('id', $id)->first();
       if(file_exists($continent->box_image)){
           unlink($continent->box_image);
       }
       if (file_exists($continent->background_image)){
           unlink($continent->background_image);
       }
       $continent->delete();
       session()->flash('type', 'danger');
       session()->flash('message', 'Continent Deleted Successfully !!!');
       return back();
    }

}
