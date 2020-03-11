<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Image;

class ContactUsController extends Controller
{
    public function contactUs(){
        $contact_us = ContactUs::where('id', 1)->first();
       return view('backEnd.contact.contact', [
           'contact_us' => $contact_us
       ]);
    }
    public function updateContactImage(Request $request){
        $head_office_image = $request->file('head_office_image');
        $branch_office_image = $request->file('branch_office_image');
        $contact_us = ContactUs::where('id', 1)->first();
        if($head_office_image){
            if(file_exists($contact_us->head_office_image)){
                unlink($contact_us->head_office_image);
            }
            $image = $request->file('head_office_image');
            $image_name = time().'_'.$image->getClientOriginalName();
            $image_url = 'cosmos/custom_image/contact-us/';
            Image::make($image)->resize(538, 285)->save($image_url.$image_name);
            $contact_us->head_office_image = $image_url.$image_name;
        }
        if ($branch_office_image){
            if(file_exists($contact_us->branch_office_image)){
                unlink($contact_us->branch_office_image);
            }
            $image = $request->file('branch_office_image');
            $image_name = time().'_'.$image->getClientOriginalName();
            $image_url = 'cosmos/custom_image/contact-us/';
            Image::make($image)->resize(538, 285)->save($image_url.$image_name);
            $contact_us->branch_office_image = $image_url.$image_name;
        }
        $contact_us->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Contact-Us Image Updated Successfully !!!');
        return back();
    }
}
