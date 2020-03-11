<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\FooterPhoneNumber;
use App\Models\Visa;
use App\Models\VisaOrder;
use Illuminate\Http\Request;
use Image;

class VisaController extends Controller
{
    // FrontEnd Start

    public function ContinentCountry($id){
        $continent = Continent::where('id', $id)->first();
        $con_visas = Visa::orderBy('country_name', 'asc')->where('continent_id', $id)->where('status', 1)->select('country_name', 'price', 'id', 'box_image')->get();
        return view('frontEnd.visa.visa', ['continent' => $continent, 'con_visas' => $con_visas]);
    }
    public function visaDetails($id){
        $visa_detail = Visa::with('continent')->where('id', $id)->first();
        $visa_phone_number = FooterPhoneNumber::where('id', 1)->first();
        $phone_number =  str_replace(',',  '', $visa_phone_number->visa);
        $phone_number2 =  str_replace(',',  '', $visa_phone_number->visa_banani);
        $arry = str_split($phone_number, 12);
        $arry2 = str_split($phone_number2, 12);
        $arry_len = count($arry);
        $arry_len2 = count($arry2);
        return view('frontEnd.visa.visa_details',[
            'visa_detail' => $visa_detail,
            'arry' => $arry,
            'arry_len' => $arry_len,
            'arry2'    => $arry2,
            'arry_len2'    => $arry_len2,
        ]);
    }
    public function bookVisa($id){
        $visa = Visa::where('id', $id)->select('country_name', 'id')->first();
        return view('frontEnd.booking.book-visa', ['visa' => $visa]);
    }
    protected function visaBookingValidaion($request){
        $request->validate([
            'id'  => 'required',
            'name'  => 'required',
            'email' => 'required',
            'phone_number' => 'required|min:11|numeric'
        ]);
    }
    public function confirmVisaBooking(Request $request){
        $this->visaBookingValidaion($request);
        $visa = Visa::where('id', $request->id)->first();
        $visa_order = new VisaOrder();
        $visa_order->visa_name = $visa->country_name;
        $visa_order->name = $request->name;
        $visa_order->email = $request->email;
        $visa_order->phone_number = $request->phone_number;
        $visa_order->price = $visa->price;
        $visa_order->save();
        session()->flash('message', 'You Have Successfully Booked '.$visa->country_name.' Visa ..... <br/> we will contact you soon !!!');
        return back();
    }

    //FrontEnd End

    //Back End Start
    public function visa(){
        $continents = Continent::orderBy('name', 'asc')->where('status', 1)->get();
        $visas = Visa::with('continent')->orderBy('country_name', 'asc')->paginate(10);
        return view('backEnd.visa.visa', [
            'continents' => $continents,
            'visas' => $visas
        ]);
    }
    protected function visaValidation($request){
        $request->validate([
            'continent_id'      => 'required | numeric',
            'country_name'      => 'required',
            'price'             => 'required',
            'short_description' => 'required',
            'duration'          => 'required',
            'professional'      => 'required',
            'professional2'      => 'required',
            'lawyer'      => 'required',
            'child'      => 'required',
            'business'          => 'required',
            'spouse'            => 'required',
            'student'           => 'required',
            'embassy'           => 'required',
            'terms_and_condition'  => 'required',
            'box_image'         => 'required | image',
            'banner_image'      => 'required | image',
            'status'            => 'required'
        ]);
    }
    protected function saveBoxImage($request, $visa){
        $box_image = $request->file('box_image');
        $box_image_name = time().'_'.$box_image->getClientOriginalName();
        $box_image_url = 'cosmos/custom_image/visa/box_image/';
        Image::make($box_image)->resize(253, 158)->save($box_image_url.$box_image_name);
        $visa->box_image = $box_image_url.$box_image_name;
    }
    protected function saveBannerImage($request, $visa){
        $banner_image = $request->file('banner_image');
        $banner_image_name = time().'_'.$banner_image->getClientOriginalName();
        $banner_image_url = 'cosmos/custom_image/visa/banner_image/';
        Image::make($banner_image)->resize(1350, 500)->save($banner_image_url.$banner_image_name);
        $visa->banner_image = $banner_image_url.$banner_image_name;
    }
    protected function saveVisaBasic($request, $visa){
        $visa->continent_id = $request->continent_id;
        $visa->country_name = $request->country_name;
        $visa->price = $request->price;
        $visa->e_price = $request->e_price;
        $visa->short_description = $request->short_description;
        $visa->duration = $request->duration;
        $visa->professional = $request->professional;
        $visa->professional2 = $request->professional2;
        $visa->lawyer = $request->lawyer;
        $visa->business = $request->business;
        $visa->spouse = $request->spouse;
        $visa->student = $request->student;
        $visa->child = $request->child;

        $visa->professional_evisa = $request->professional_evisa;
        $visa->professional2_evisa = $request->professional2_evisa;
        $visa->lawyer_evisa = $request->lawyer_evisa;
        $visa->business_evisa = $request->business_evisa;
        $visa->spouse_evisa = $request->spouse_evisa;
        $visa->student_evisa = $request->student_evisa;
        $visa->child_evisa = $request->child_evisa;

        $visa->embassy = $request->embassy;
        $visa->terms_and_condition = $request->terms_and_condition;
        $visa->status = $request->status;
    }
    public function addVisa(Request $request){
        $this->visaValidation($request);
        $visa = new  Visa();
        $this->saveBoxImage($request, $visa);
        $this->saveBannerImage($request, $visa);
        $this->saveVisaBasic($request, $visa);
        $visa->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Visa Info Added Successfully !!!');
        return back();
    }
    protected function updateVisaValidation($request){
        $request->validate([
            'continent_id' => 'required | numeric',
            'visa_id' => 'required',
            'country_name' => 'required',
            'price' => 'required',
            'short_description' => 'required',
            'duration' => 'required',
            'professional' => 'required',
            'professional2'      => 'required',
            'lawyer'      => 'required',
            'child'      => 'required',
            'business' => 'required',
            'spouse' => 'required',
            'student' => 'required',
            'embassy' => 'required',
            'terms_and_condition' => 'required',
            'status' => 'required',
        ]);
    }
    public function updateVisa(Request $request){
        $this->updateVisaValidation($request);
        $visa = Visa::where('id', $request->visa_id)->first();
        if($request->box_image){
            if(file_exists($visa->box_image)){
                unlink($visa->box_image);
            }
            $this->saveBoxImage($request, $visa);
        }
        if ($request->banner_image){
            if(file_exists($visa->banner_image)){
                unlink($visa->banner_image);
            }
            $this->saveBannerImage($request, $visa);
        }
        $this->saveVisaBasic($request, $visa);
        $visa->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Visa Info Updated Successfully !!!');
        return back();
    }
    public function deleteVisa($id){
       $visa = Visa::where('id', $id)->first();
       if(file_exists($visa->box_image)){
           unlink($visa->box_image);
       }
       if(file_exists($visa->banner_image)){
           unlink($visa->banner_image);
       }
       $visa->delete();
       session()->flash('type', 'danger');
       session()->flash('message', 'Visa Info Deleted Successfully !!!');
       return back();
    }
    public function visaOrder(){
        $visa_orders = VisaOrder::orderBy('id', 'desc')->paginate(10);
        return view('backEnd.visa_order.visa_order', ['visa_orders' => $visa_orders]);
    }
    protected function updateVisaOrderValidation($request){
        $request->validate([
            'id' => 'required',
            'visa_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'price' => 'required ',
        ]);
    }
    public function updateVisaOrder(Request $request){
        $this->updateVisaOrderValidation($request);
        $visa_order = VisaOrder::where('id', $request->id)->first();
        $visa_order->visa_name = $request->visa_name;
        $visa_order->name = $request->name;
        $visa_order->email = $request->email;
        $visa_order->phone_number = $request->phone_number;
        $visa_order->price = $request->price;
        $visa_order->update();
        session()->flash('type', 'success');
        session()->flash('message', 'VISA Order Successfully Updated !!!');
        return back();
    }
    public function deleteVisaOrder($id){
       $visa_order = VisaOrder::where('id', $id)->first();
       $visa_order->delete();
       session()->flash('type', 'danger');
       session()->flash('message', 'VISA Order Successfully Deleted !!!');
       return back();
    }

    // BackEnd End
}
