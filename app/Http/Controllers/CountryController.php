<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Country;
use Illuminate\Http\Request;
use Image;

class CountryController extends Controller
{
    public function country(){
        $continent_name = [];
        $continent_name[0] = 'honourable';
        $continents = Continent::orderBy('name', 'asc')->where('status', 1)->whereNotIn('slug', $continent_name)->select('name', 'id')->get();
        $countries = Country::with(['continent' => function($q){$q->select('id', 'name');}])->orderBy('name', 'asc')->paginate(10);
        return view('backEnd.country.country', [
            'countries' => $countries,
            'continents' => $continents
            ]);
    }

    protected function countryValidation($request){
        $request->validate([
            'continent_id' => 'required',
            'name' => 'required',
            'capital' => 'required',
            'languages' => 'required',
            'area' => 'required',
            'population' => 'required',
            'currency' => 'required',
            'time_zone' => 'required',
            'calling_code' => 'required',
            'date_formate' => 'required',
            'independent' => 'required',
            'victory' => 'required',
            'religion' => 'required',
            'status' => 'required'
        ]);
    }

    public function saveCountryImage($request, $country){
        $image =  $request->file('image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url = 'cosmos/custom_image/country/';
        Image::make($image)->resize(253, 158)->save($image_url.$image_name);
        $country->image = $image_url.$image_name;
    }
    protected function saveConuntryBannerImage($request, $country){
        $image =  $request->file('banner_image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url = 'cosmos/custom_image/country/';
        Image::make($image)->resize(1450, 700)->save($image_url.$image_name);
        $country->banner_image = $image_url.$image_name;
    }

    protected function countryBasicInfo($request, $country){
        $country->continent_id   = $request->continent_id;
        $country->name   = $request->name;
        $country->slug   = strtolower($request->name);
        $country->capital   = $request->capital;
        $country->languages   = $request->languages;
        $country->area   = $request->area;
        $country->population   = $request->population;
        $country->currency = $request->currency;
        $country->time_zone = $request->time_zone;
        $country->calling_code = $request->calling_code;
        $country->date_formate = $request->date_formate;
        $country->independent = $request->independent;
        $country->victory = $request->victory;
        $country->religion = $request->religion;
        $country->status = $request->status;
    }

    public function addCountry(Request $request){
        $request->validate([
            'image' => 'required | image',
            'banner_image' => 'required | image'
        ]);
        $this->countryValidation($request);
        $country = new Country();
        $this->saveCountryImage($request, $country);
        $this->saveConuntryBannerImage($request, $country);
        $this->countryBasicInfo($request, $country);
        $country->save();
        session()->flash('type', 'success');
        session()->flash('message', 'Country successfully added !!!');
        return back();
    }

    public function updateCountry(Request $request){
        $this->countryValidation($request);
        $country = Country::where('id', $request->id)->first();
        if($request->image){
            if(file_exists($country->image)){
                unlink($country->image);
            }
            $this->saveCountryImage($request, $country);
        }
        if ($request->banner_image){
            if(file_exists($country->banner_image)){
                unlink($country->banner_image);
            }
            $this->saveConuntryBannerImage($request, $country);
        }
        $this->countryBasicInfo($request, $country);
        $country->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Country successfully updated !!!');
        return back();
    }
    public function deleteCountry($id){
       $country = Country::where('id', $id)->first();
       if(file_exists($country->image)){
           unlink($country->image);
       }
       if (file_exists($country->banner_image)){
           unlink($country->banner_image);
       }
       $country->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Country successfully deleted !!!');
       return back();
    }
}
