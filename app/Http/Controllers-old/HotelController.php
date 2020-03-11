<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Division;
use App\Models\Hotel;
use App\Models\HotelTitle;
use App\Models\Package;
use App\Models\TabHotel;
use Illuminate\Http\Request;
use Image;

class HotelController extends Controller
{
    public function hotel(){
        $countries = Country::orderBy('name', 'asc')->where('status', 1)->select('id', 'name')->get();
        $hotels = Hotel::with(['countryf' => function($q){ $q->select('id', 'name');}])->orderBy('id', 'desc')->paginate(10);
        $divisions = Division::where('status', 1)->select('id', 'name','country_id')->get();
      
        return view('backEnd.hotel.hotel', [
            'countries' => $countries,
            'hotels'    => $hotels,
            'divisions' => $divisions
            ]);
    }
    public function hotelValidation($request){
        $request->validate([
            'name' => 'required',
            'star' => 'required | numeric',
            'category' => 'required',
            'web_site' => 'required',
            'country' => 'required | numeric',
            // 'division' => 'required | numeric',
            'address' => 'required',
            // 'price' => 'required',
            'facilities' => 'required',
            'note' => 'required',
            // 'discount' => 'required',
            'box_image' => 'required',
            'status' => 'required',
        ]);
    }
    protected function box_image($request, $hotel){
        $image = $request->file('box_image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url = 'cosmos/custom_image/hotel/';
        Image::make($image)->resize(253, 158)->save($image_url.$image_name);
        $hotel->box_image = $image_url.$image_name;
    }
    protected function bannerImage($request, $package){
        $image = $request->file('banner_image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url = 'cosmos/custom_image/hotel/';
        Image::make($image)->resize(1450, 700)->save($image_url.$image_name);
        $package->banner_image = $image_url.$image_name;
    }
    protected function hotelBasic($request, $hotel){
        $hotel->name = $request->name;
        $hotel->star = $request->star;
        $hotel->category = $request->category;
        $hotel->web_site = $request->web_site;
        $hotel->country = $request->country;
        // $hotel->division = $request->division;
        $hotel->address = $request->address;
        // $hotel->price = $request->price;
        $hotel->facilities = $request->facilities;
        $hotel->note = $request->note;
        // $hotel->discount = $request->discount;
        $hotel->status = $request->status;
    }
    public function addHotel(Request $request){
        $this->hotelValidation($request);
        $hotel = new Hotel();
        $this->box_image($request, $hotel);
//        $this->bannerImage($request, $hotel);
        $this->hotelBasic($request, $hotel);
        $hotel->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Hotel Added Successfully !!!');
        return back();
    }
    protected function updatHotelValidation($request){
        $request->validate([
            'name' => 'required',
            'star' => 'required | numeric',
            'category' => 'required',
            'web_site' => 'required',
            'country' => 'required | numeric',
            // 'division' => 'required | numeric',
            'address' => 'required',
            // 'price' => 'required',
            'facilities' => 'required',
            'note' => 'required',
            // 'discount' => 'required',
            'status' => 'required',
        ]);
    }
    public function updateHotel(Request $request){
        $this->updatHotelValidation($request);
        $hotel = Hotel::where('id', $request->id)->first();
        if($request->box_image){
            if(file_exists($hotel->box_image)){
                unlink($hotel->box_image);
            }
            $this->box_image($request, $hotel);
        }
        $this->hotelBasic($request, $hotel);
        $hotel->update();
        session()->flash('type', 'info');
        session()->flash('message', 'Hotel Information Updated Successfully !!!');
        return back();
    }
    public function deleteHotel($id){
        $tabHotel = TabHotel::where('hotel_id', $id)->get();
        $hotel_count = count($tabHotel);
        if($hotel_count != 0){
            $hotel = Hotel::where('id', $id)->first();
            if(file_exists($hotel->box_image)){
                unlink($hotel->box_image);
            }
            // unlink($hotel->banner_image);
            $hotel->delete();
            session()->flash('type', 'danger');
            session()->flash('message', 'Hotel Deleted Successfully !!!');
        }else{

            session()->flash('type', 'info');
            session()->flash('message', 'Hotel can not be delete !!!');
        }

        return back();
    }
    // FrontEnd Hotel Start

    public function hotelBookingCountry(){
        $hotel_title = HotelTitle::where('id', 1)->select('name','banner_image')->first();
        $hotel_country_id = Hotel::where('status', 1)->select('country')->get();
        $hotel_country = Country::whereIn('id', $hotel_country_id)->select('id', 'name', 'image')->get();
        return view('frontEnd.hotelCountry.hotel_country', [
            'countries' => $hotel_country,
            'hotel_title' => $hotel_title
        ]);
    }
    public function hotelBookingCity($id){
        $country = Country::where('id', $id)->select('id', 'name', 'banner_image')->first();
        $hotel_city = Hotel::where('country', $id)->select('division')->get();
        $cities = Division::whereIn('id', $hotel_city)->select('id', 'name', 'box_image')->get();
        return view('frontEnd.hotelCity.hotel_city',[
            'country' => $country,
            'cities'  => $cities
        ]);
    }
    public function hotelBookingList($id){
        $city = Division::with(['country' => function($q){ $q->select('id', 'name');}])->where('id', $id)->select('id', 'name', 'background_image', 'country_id')->first();
        $hotels = Hotel::where('division', $city->id)->paginate(10);
        $releted_hotels = Hotel::with(['countryf' => function($q){$q->select('id', 'name');}, 'divisionf' => function($q){$q->select('id', 'name');}])->where('country', $city->country->id)->select('id', 'name', 'box_image', 'country', 'division')->get();
        return view('frontEnd.hotelList.hotel_list',[
            'city'   => $city,
            'hotels' => $hotels,
            'releted_hotels' => $releted_hotels
        ]);
    }
    // FrontEnd Hotel End

    // Hotel Title Start

    public function hotelTitle(){
        $hotel_title = HotelTitle::where('id', 1)->first();
        return view('backEnd.hotel.hotel-title', ['hotel_title' => $hotel_title]);
    }
    protected function hotelTitleValidation($request){
        $request->validate([
            'name' => 'required',
        ]);
    }
    public function updateHotelTitle(Request $request){
        $this->hotelTitleValidation($request);
        $hotel_title = HotelTitle::where('id', 1)->first();
        $hotel_title->name = $request->name;
        if($request->box_image){
            if(file_exists($hotel_title->box_image)){
                unlink($hotel_title->box_image);
            }
         $this->box_image($request, $hotel_title);
        }
        if($request->banner_image){
            if (file_exists($hotel_title->banner_image)){
                unlink($hotel_title->banner_image);
            }
            $this->bannerImage($request, $hotel_title);
        }
        $hotel_title->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Hotel Title Updated Successfully !!!');
        return back();
    }

    // Hotel Title End
}
