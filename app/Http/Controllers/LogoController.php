<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Image;

class LogoController extends Controller
{
    public function logo(){
        $logo = Logo::where('id', 1)->first();
        return view('backEnd.logo.logo', ['logo' => $logo]);
    }
    protected function savLogo($request, $logo){
        $image = $request->file('image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url  = 'cosmos/custom_image/logo/';
        Image::make($image)->resize(205, 95)->save($image_url.$image_name);
        $logo->image = $image_url.$image_name;
    }
    public function updateLogo(Request $request){
        $request->validate([
            'image' => 'required | image'
        ]);
        $logo = Logo::where('id', 1)->first();
        if($request->image){
            if(file_exists($logo->image)){
                unlink($logo->image);
            }
            $this->savLogo($request, $logo);
        }
        $logo->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Logo Updated Successfull !!!');
        return back();
    }
}
