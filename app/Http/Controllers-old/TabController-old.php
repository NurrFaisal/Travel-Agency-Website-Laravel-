<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\PackageTab;
use App\Models\TabHotel;
use App\Models\TabItineraryTitle;
use Illuminate\Http\Request;

class TabController extends Controller
{
    protected function validationAddPackageTab($request){
        $request->validate([
            'name' => 'required',
            'package_id' => 'required | numeric',

            'hotels' => 'required',

            'itinerary_title' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',

            'tab_note' => 'required',
            'special_note' => 'required',
        ]);
    }
    protected function packageTabBasic($request, $packagetab){
        $packagetab->name = $request->name;
        $packagetab->package_id = $request->package_id;
        $packagetab->itinerary_title = $request->itinerary_title;
        $packagetab->tab_note = $request->tab_note;
        $packagetab->special_note = $request->special_note;
    }
    protected function savePackageTabInfo($request){
        $packagetab = new PackageTab();
        $this->packageTabBasic($request, $packagetab);
        $packagetab->save();
        return $packagetab->id;
    }
    protected function saveTabHotelInfo($request, $packagetab_id){
        $hotel_id_arry = $request->hotels;
        foreach ($hotel_id_arry as $key => $hotel_id){
            $tab_hotel = new TabHotel();
            $tab_hotel->hotel_id = $hotel_id;
            $tab_hotel->tab_id = $packagetab_id;
            $tab_hotel->package_id = $request->package_id;
            $tab_hotel->save();
        }
    }
    protected function saveTabItineraryTitleInfo($request, $packagetab_id){
        $tab_itinerary_title_arry =  $request->title;
        $tab_itinerary_title_arry_len = count($tab_itinerary_title_arry);
        for ($i =0; $i < $tab_itinerary_title_arry_len; $i++){
            $tab_itinerary_title = new  TabItineraryTitle();
            $tab_itinerary_title->tab_id = $packagetab_id;
            $tab_itinerary_title->title = $request->title[$i];
            $tab_itinerary_title->description = $request->description[$i];
            $tab_itinerary_title->price = $request->price[$i];
            $tab_itinerary_title->package_id = $request->package_id;
            $tab_itinerary_title->save();
        }
    }
    public function addPackageTab(Request $request){
        $this->validationAddPackageTab($request);
        $packagetab_id = $this->savePackageTabInfo($request);
        $this->saveTabHotelInfo($request, $packagetab_id);
        $this->saveTabItineraryTitleInfo($request, $packagetab_id);
        session()->flash('type', 'success');
        session()->flash('message', 'New Package Tab Added Successfully !!!');
        return back();
    }
    protected function updatePackageTabValidation($request){
        $request->validate([
            'name' => 'required',
            'id' => 'required | numeric',
            'package_id' => 'required | numeric',
            'itinerary_title' => 'required',
            'tab_note' => 'required',
            'special_note' => 'required'
        ]);
    }
    public function updatePackageTab(Request $request){
        $this->updatePackageTabValidation($request);
        $packagetab = PackageTab::where('id', $request->id)->first();
        $this->packageTabBasic($request, $packagetab);
        $packagetab->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Package Tab Info Updated Successfully !!!');
        return back();
    }
    public function deletePackageTab($id){
        $packagetab = PackageTab::where('id', $id)->first();
        $tab_hotels = TabHotel::where('tab_id', $id)->get();
        if($tab_hotels){
            foreach ($tab_hotels as $tab_hotel){
                $tab_hotel->delete();
            }
        }
        $tab_itinerary_titles = TabItineraryTitle::where('tab_id', $id)->get();
        if($tab_itinerary_titles){
            foreach ($tab_itinerary_titles as $tab_itinerary_title){
                $tab_itinerary_title->delete();
            }
        }
        $packagetab->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Package Tab Info Deleted Successfully !!!');
        return back();
    }
    public function viewPackageTab($id){
        $packagetab = PackageTab::with(['hotels.hotel' => function($q){ $q->select('id', 'name', 'star', 'category', 'web_site');},'tabItineraryTitles', 'package' =>function($q){$q->select('id','country_id');}])->where('id', $id)->first();
        $hotels = Hotel::where('country', $packagetab->package->country_id)->select('id', 'name', 'star')->get();
        return view('backEnd.packages.view_package_tab', [
            'packagetab' => $packagetab,
            'hotels' => $hotels
        ]);
    }
    protected function addPackageTabItineraryValidation($request){
        $request->validate([
            'title' => 'required',
            'tab_id' => 'required | numeric',
            'package_id' => 'required | numeric',
            'description' => 'required',
            'price'   => 'required'
        ]);
    }
    protected function savePackageTabItineraryBasic($request, $tabItineraryTitle){
        $tabItineraryTitle->title = $request->title;
        $tabItineraryTitle->tab_id = $request->tab_id;
        $tabItineraryTitle->package_id = $request->package_id;
        $tabItineraryTitle->description = $request->description;
        $tabItineraryTitle->price = $request->price;
    }
    public function addPackageTabItinerary(Request $request){
        $this->addPackageTabItineraryValidation($request);
        $tabItineraryTitle = new TabItineraryTitle();
        $this->savePackageTabItineraryBasic($request, $tabItineraryTitle);
        $tabItineraryTitle->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Package Tab Itinerary Added Successfully !!!');
        return back();
    }
    public function updatePackageTabItinerary(Request $request){
        $this->addPackageTabItineraryValidation($request);
        $request->validate(['id' => 'required | numeric']);
        $tabItineraryTitle = TabItineraryTitle::where('id', $request->id)->first();
        $this->savePackageTabItineraryBasic($request, $tabItineraryTitle);
        $tabItineraryTitle->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Package Tab Itineraray Updated Successfully !!!');
        return back();
    }
    public function deletePackageTabIrinerary($id){
        $tabItineraryTitle = TabItineraryTitle::where('id', $id)->first();
        $tabItineraryTitle->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Package Tab Itinerary Info Deleted Successfully !!!');
        return back();
    }
    protected function addPackageTabHotelValidation($request){
        $request->validate([
            'hotels' => 'required',
            'tab_id' => 'required | numeric',
            'package_id' => 'required | numeric',
        ]);
    }
    public function addPackageTabHotel(Request $request){
        $this->addPackageTabHotelValidation($request);
        $packagetab_id = $request->tab_id;
        $this->saveTabHotelInfo($request, $packagetab_id);
        session()->flash('type', 'success');
        session()->flash('message', 'New Tab Hotel Info Added Successfully !!!');
        return back();
    }
    public function deletePackageTabHotel($id){
        $tab_hotel = TabHotel::where('id', $id)->first();
        $tab_hotel->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Package Tab Hotel Info Deleted Successfully !!!');
        return back();
    }
}
