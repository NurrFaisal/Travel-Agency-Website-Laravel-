<?php

namespace App\Http\Controllers;

use App\Models\AboutSlider;
use Illuminate\Http\Request;
use Image;
use mysql_xdevapi\Session;

class AboutSliderController extends Controller
{
    public function aboutSlider(){
        $about_sliders = AboutSlider::orderBy('updated_at', 'desc')->paginate(10);
        return view('backEnd.about-slider.about_slider',[
            'about_sliders' => $about_sliders
        ]);
    }

    protected function aboutSliderValidation($request){
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'status' => 'required'
        ]);
    }
    protected function saveAboutImage($about_slider, $request){
        $image = $request->file('image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url = 'cosmos/custom_image/about-slider/';
        Image::make($image)->resize(1250, 550)->save($image_url.$image_name);
        $about_slider->image = $image_url.$image_name;
    }

    public function addAboutSlider(Request $request){
        $this->aboutSliderValidation($request);
        $about_slider = new AboutSlider();
        $this->saveAboutImage($about_slider, $request);
        $about_slider->name = $request->name;
        $about_slider->status = $request->status;
        $about_slider->save();
        session()->flash('type', 'success');
        session()->flash('message', 'About Slider Image Added Successfully !!!');
        return back();
    }

    public function updateAboutSlider(Request $request){
        $image = $request->file('image');
        $about_slider = AboutSlider::where('id', $request->id)->first();
        if ($image){
            if(file_exists($about_slider->image)){
                unlink($about_slider->image);
            }
            $this->saveAboutImage($about_slider, $request);
        }
        $about_slider->name = $request->name;
        $about_slider->status  = $request->status;
        $about_slider->update();
        session()->flash('type', 'success');
        session()->flash('message', 'About Slider Image Updated Successfully !!!');
        return back();
    }

    public function deleteAboutSlider($id){
        $about_slider = AboutSlider::where('id', $id)->first();
        if ($about_slider){
            if(file_exists($about_slider->image)){
                unlink($about_slider->image);
            }
            $about_slider->delete();
            session()->flash('type', 'danger');
            session()->flash('message', 'About Slider Deleted Successfully !!!');
        }
        return back();
    }
}
