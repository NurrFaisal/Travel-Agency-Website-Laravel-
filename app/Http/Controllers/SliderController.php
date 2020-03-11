<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function slider(){
        $sliders = Slider::orderBy('id', 'desc')->paginate(10);
        return view('backEnd.slider.slider', ['sliders' => $sliders]);
    }
    protected function sliderValidation($request){
        $request->validate([
            'name' => 'required',
            'slider_image' => 'required | image',
            'status' => 'required'

        ]);
    }
    protected function saveSliderImage($request, $slider){
        $slider_image = $request->file('slider_image');
        $slider_image_name = time().'_'.$slider_image->getClientOriginalName();
        $slider_image_url = 'cosmos/custom_image/slider/';
        Image::make($slider_image)->resize(1350, 500)->save($slider_image_url.$slider_image_name);
        $slider->slider_image = $slider_image_url.$slider_image_name;
    }
    protected function saveSliderBasic($request, $slider){
        $slider->name = $request->name;
        $slider->slug = strtolower($request->name);
        $slider->status = $request->status;
    }
    public function addSlider(Request $request){
        $this->sliderValidation($request);
        $slider = new Slider();
        $this->saveSliderBasic($request, $slider);
        $this->saveSliderImage($request, $slider);
        $slider->save();
        session()->flash('type', 'success');
        session()->flash('message', 'Slider Image Added Successfully !!!');
        return back();
    }
    protected function sliderValidationUpdate($request){
        $request->validate([
            'name' => 'required',
            'status' => 'required'

        ]);
    }
    public function updateSlider(Request $request){
        $this->sliderValidationUpdate($request);
        $slider_image = $request->slider_image;
        $slider = Slider::where('id', $request->id)->first();
        if ($slider_image){
            if(file_exists($slider->slider_image)){
                unlink($slider->slider_image);
            }
            $this->saveSliderImage($request, $slider);
        }
        $this->saveSliderBasic($request, $slider);
        $slider->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Slider Image Updated Successfully !!!');
        return back();
    }
    public function deleteSlider($id){
        $slider = Slider::where('id', $id)->first();
        if(file_exists($slider->slider_image)){
            unlink($slider->slider_image);
        }
        $slider->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Slider Image Deleted Successfully !!!');
        return back();
    }
}
