<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs(){
        $about_us = AboutUs::where('id', 1)->first();
        return view('backEnd.about-slider.about_us',[
            'about_us' => $about_us
        ]);
    }

    public function updateAboutUs(Request $request){
        $request->validate([
            'about_us' => 'required'
        ]);
        $about_us = AboutUs::where('id', 1)->first();
        $about_us->about_us = $request->about_us;
        $about_us->update();
        session()->flash('type', 'success');
        session()->flash('message', 'About-us Info Updated Successfully !!!');
        return back();
    }
}
