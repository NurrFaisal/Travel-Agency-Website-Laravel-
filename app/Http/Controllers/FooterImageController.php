<?php

namespace App\Http\Controllers;

use App\Models\FooterImage;
use Illuminate\Http\Request;
use Image;

class FooterImageController extends Controller
{
    public function footerImage(){
        $footer_images = FooterImage::orderBy('name', 'asc')->paginate(10);
        return view('backEnd.footerImage.footerImage',['footer_images' => $footer_images]);
    }
    protected function footerImageValidation($request){
        $request->validate([
            'name' => 'required',
            'footer_image' => 'required | image',
            'status' => 'required',
        ]);
    }
    protected function saveFooterImage($request, $footerImage){
        $footer_image = $request->file('footer_image');
        $footer_image_name = time().'_'.$footer_image->getClientOriginalName();
        $footer_image_url = 'cosmos/custom_image/footer_image/';
        Image::make($footer_image)->resize(366, 320)->save($footer_image_url.$footer_image_name);
        $footerImage->footer_image = $footer_image_url.$footer_image_name;
    }
    protected function saveFooterImageBasic($request, $footerImage){
        $footerImage->name = $request->name;
        $footerImage->slug = strtolower($request->name);
        $footerImage->status = $request->status;
    }
    public function addFooterImage(Request $request){
        $this->footerImageValidation($request);
        $footerImage = new FooterImage();
        $this->saveFooterImage($request, $footerImage);
        $this->saveFooterImageBasic($request, $footerImage);
        $footerImage->save();
        session()->flash('type', 'success');
        session()->flash('message', 'Footer Image Added Successfully !!!');
        return back();
    }
    protected function updateFooterImageValidation($request){
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
    }
    public function updateFooterImage(Request $request){
        $this->updateFooterImageValidation($request);
        $footerImage = FooterImage::where('id', $request->id)->first();
        $footer_image = $request->file('footer_image');
        if ($footer_image != null){
            if (file_exists($footerImage->footer_image)){
                unlink($footerImage->footer_image);
            }
            $this->saveFooterImage($request, $footerImage);
        }
        $this->saveFooterImageBasic($request, $footerImage);
        $footerImage->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Footer Image Updated Successfully !!!');
        return back();
    }
    public function deleteFooterImage($id){
        $footerImage = FooterImage::where('id', $id)->first();
        if(file_exists($footerImage->footer_image)){
            unlink($footerImage->footer_image);
        }
        $footerImage->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Footer Image Deleted Successfully !!!');
        return back();
    }
}
