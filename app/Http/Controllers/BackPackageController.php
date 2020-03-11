<?php

namespace App\Http\Controllers;

use App\Models\AboutTour;
use App\Models\Country;
use App\Models\Division;
use App\Models\Hotel;
use App\Models\Package;
use App\Models\PackageCountry;
use App\Models\PackageDivision;
use App\Models\PackageGellery;
use App\Models\PackageOrder;
use App\Models\PackageTab;
use App\Models\PackList;
use App\Models\TabHotel;
use App\Models\TabItineraryTitle;
use App\Models\TourDay;
use Illuminate\Http\Request;
use Image;
use phpDocumentor\Reflection\File;

class BackPackageController extends Controller
{
    // Package Title Start

    public function packList(){
        $packLists = PackList::orderBY('id', 'asc')->get();
        return view('backEnd.packList.packList', ['packLists' => $packLists]);
    }
    protected function packListValidation($request){
        $request->validate([
            'name' => 'required',
//            'brand_image' => 'required | image',
            'box_image' => 'required | image',
            'b_status'  => 'required',
            'background_image' => 'required | image',
            'status'    => 'required | numeric'
        ]);
    }
    protected function savePackBrandImage($request, $packList){
        $brand_image = $request->file('brand_image');
        $brand_image_name = time();
        $brand_image_url = 'cosmos/custom_image/packList/';
        Image::make($brand_image)->resize(50,75)->save($brand_image_url.$brand_image_name);
        $packList->brand_image = $brand_image_url.$brand_image_name;
    }
    protected function savePackBoxImage($request, $packList){
        $box_image = $request->file('box_image');
        $box_image_name = time();
        $box_image_url = 'cosmos/custom_image/packList/';
        Image::make($box_image)->resize(253, 144)->save($box_image_url.$box_image_name);
        $packList->box_image = $box_image_url.$box_image_name;
    }
    protected function savePackBackgroundImage($request, $packList){
        $background_image = $request->file('background_image');
        $background_image_name = time();
        $background_image_url = 'cosmos/custom_image/packList/';
        Image::make($background_image)->resize(1300, 400)->save($background_image_url.$background_image_name);
        $packList->background_image = $background_image_url.$background_image_name;
    }
    protected function savePackBasicInfo($request, $packList){
        $packList->name = $request->name;
        $packList->slug = strtolower($request->name);
        $packList->status = $request->status;
        $packList->b_status = $request->b_status;
    }
    public function AddpackList(Request $request){
        $this->packListValidation($request);
        $brand_image = $request->file('brand_image');
        $packList = new PackList();
        $this->savePackBasicInfo($request, $packList);
        if ($brand_image){
            $this->savePackBrandImage($request, $packList);
        }
        $this->savePackBoxImage($request, $packList);
        $this->savePackBackgroundImage($request, $packList);
        $packList->save();
        session()->flash('type', 'success');
        session()->flash('message', 'Package Title Info Saved Successfully !!!');
        return back();
    }

    protected function packListUpdateValidation($request){
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
    }

    public function updatePackList(Request $request){
        $this->packListUpdateValidation($request);
        $packList = PackList::where('id', $request->id)->first();
        $this->savePackBasicInfo($request, $packList);
        $brand_image = $request->file('brand_image');
        if ($brand_image){
            if (file_exists($packList->brand_image)){
                unlink($packList->brand_image);
            }
            $this->savePackBrandImage($request, $packList);
        }
        $box_image = $request->file('box_image');
        if($box_image){
            if (file_exists($packList->box_image)){
                unlink($packList->box_image);
            }
            $this->savePackBoxImage($request, $packList);
        }
        $background_image = $request->file('background_image');
        if ($background_image){
            if (file_exists($packList->background_image)){
                unlink($packList->background_image);
            }
            $this->savePackBackgroundImage($request, $packList);
        }
        $packList->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Package Title Updated Successfully !!!');
        return back();
    }

    public function deletePackList($id){
        $packList = PackList::where('id', $id)->first();
        if($packList->brand_image != null){
            if (file_exists($packList->brand_image)){
                unlink($packList->brand_image);
            }
        }
        if (file_exists($packList->box_image)){
            unlink($packList->box_image);
        }
        if (file_exists($packList->background_image)){
            unlink($packList->background_image);
        }
        $packList->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Package Title deleted Successfully !!!');
        return back();
    }

    // Package Title End

    // Main Package Start

    public function packages(){
        $packLists = PackList::where('status', 1)->get();
        $countries = Country::where('status', 1)->orderBy('name', 'asc')->get();
        $divisions = Division::where('status', 1)->get();
        $packages = Package::orderBy('id', 'desc')->paginate(10);
        return view('backEnd.packages.packages', [
            'packLists' => $packLists,
            'countries' => $countries,
            'divisions' => $divisions,
            'packages'  => $packages
        ]);
    }

    protected function packagesValidation($request){
        $request->validate([
            'category_id' => 'required | numeric',
            'package_country' => 'required',
            'code' => 'required',
            'name' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'short_description' => 'required',
//            'long_description' => 'required',
            'includes' => 'required',
            'excludes' => 'required',
            'destination_location' => 'required',
            // 'tour_details' => 'required',
            'important_note' => 'required',
            'terms_and_condition' => 'required',
            'status' => 'required',
            'combo' => 'required',
            'box_image' => 'required | image',
            'banner_image' => 'required | image',
            'gellery_image' => 'required',
        ]);
    }
    protected function packageBasicInfo($request, $package){
        $package->category_id = $request->category_id;
//        $package->country_id = $request->country_id;
        $package->division_id = $request->division_id;
        $package->code = $request->code;
        $package->name = $request->name;
        $package->name_color = $request->name_color;
        $package->location = $request->location;
        $package->duration = $request->duration;
        $package->price = $request->price;
        $package->short_description = $request->short_description;
        $package->short_description_color = $request->short_description_color;
//        $package->long_description = $request->long_description;
        $package->long_description = 'long_description';
        $package->includes = $request->includes;
        $package->excludes = $request->excludes;
        $package->fixed_date = $request->fixed_date;
        $package->destination_location = $request->destination_location;
        $package->tour_details = 'tour_details';
        $package->important_note = $request->important_note;
        $package->terms_and_condition = $request->terms_and_condition;
        $package->combo = $request->combo;
        $package->status = $request->status;
    }
    protected function packageBoxImage($request, $package){
        $image = $request->file('box_image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url = 'cosmos/custom_image/package/';
        Image::make($image)->resize(253, 158)->save($image_url.$image_name);
        $package->box_image = $image_url.$image_name;
    }
    protected function packageBannerImage($request, $package){
        $image = $request->file('banner_image');
        $image_name = time().'b.'.$image->getClientOriginalExtension();
        $image_url = 'cosmos/custom_image/package/';
        Image::make($image)->resize(1450, 700)->save($image_url.$image_name);
        $package->banner_image = $image_url.$image_name;
    }

    protected function packageAboutTour($request, $id){
        $places_covered_arry = $request->places_covered;
        $places_covered_arry_len = count($places_covered_arry);
        $inclusions_arry = $request->inclusions;
        $exclusions_arry = $request->exclusions;
        $others_arry = $request->others;
        for ($i = 0; $i < $places_covered_arry_len; $i++){
            $about_tour = new AboutTour();
            $about_tour->package_id = $id;
            $about_tour->places_covered = $places_covered_arry[$i];
            $about_tour->inclusions = $inclusions_arry[$i];
            $about_tour->exclusions = $exclusions_arry[$i];
            $about_tour->others = $others_arry[$i];
            $about_tour->save();
        }
    }

    protected function packageDay($request, $id){
        $day_arry = $request->day;
        $day_arry_len = count($day_arry);
        $day_title_arry = $request->day_title;
        $day_description_arry = $request->day_description;
        for ($i = 0; $i < $day_arry_len; $i++){
            $tour_day = new TourDay();
            $tour_day->package_id = $id;
            $tour_day->day = $day_arry[$i];
            $tour_day->day_title = $day_title_arry[$i];
            $tour_day->day_description = $day_description_arry[$i];
            $tour_day->save();
        }
    }
    protected function packageGelleryImage($request, $id){
        $image_arry = [];
        $image_arry = $request->gellery_image;
        $image_arry_len = count($image_arry);
        for($i = 0; $i < $image_arry_len; $i++){
            $image = $image_arry[$i];
            $image_name = time().'_'.$image->getClientOriginalName();
            $image_url = 'cosmos/custom_image/package/';
            Image::make($image)->resize(850, 450)->save($image_url.$image_name);
            $package_gellery = new PackageGellery();
            $package_gellery->package_id = $id;
            $package_gellery->gellery_image = $image_url.$image_name;
            $package_gellery->save();
        }
    }
    protected function savePackgeCountry($request, $package_id){
        $package_country_arry = [];
        $package_country_arry = $request->package_country;
        $package_country_arry_len = count($request->package_country);
        for ($i = 0; $i < $package_country_arry_len; $i++){
            $package_country = new PackageCountry();
            $package_country->country_id = $package_country_arry[$i];
            $package_country->package_id = $package_id;
            $package_country->save();
        }
    }

    public function addPackages(Request $request){
        $this->packagesValidation($request);
        $package = new Package();
        $this->packageBoxImage($request, $package);
        $this->packageBannerImage($request, $package);
        $this->packageBasicInfo($request, $package);
        $package->save();
        $this->savePackgeCountry($request, $package->id);
//        $this->packageAboutTour($request, $package->id);
//        $this->packageDay($request, $package->id);
        $this->packageGelleryImage($request, $package->id);
        session()->flash('type', 'success');
        session()->flash('message', 'New Package Successfully Added !!!');
        return redirect('/apanel/packages');
    }

    public function viewPackage($id){
        $package_country_id = [];
        $package = Package::with(['category', 'packageCountries.country' =>function($q){$q->select('id', 'name', 'updated_at');}, 'packageDivisions.division' => function($q){ $q->select('id','name');}])->where('id', $id)->first();
//        return $package;
//        return $package->packageCountries;
        $package_country = PackageCountry::where('package_id', $id)->select('id', 'country_id')->get();
        foreach ($package_country as $key => $packageCountry){
            $package_country_id[$key] = $packageCountry->country_id;
        }
        $divisions = Division::whereIn('country_id', $package_country_id)->select('id', 'name')->get();
        $hotels = Hotel::whereIn('country', $package_country_id)->select('id', 'name', 'star')->get();
//        $about_tours = AboutTour::where('package_id', $id)->get();
        $tour_days = TourDay::orderBy('day', 'asc')->where('package_id', $id)->get();
        $gellery_images = PackageGellery::where('package_id', $id)->get();
        $packageTabs = PackageTab::where('package_id', $id)->orderBy('id', 'desc')->get();
        $countries = Country::where('status', 1)->orderBy('name', 'asc')->get();
        return view('backEnd.packages.view_packages',[
            'package' => $package,
//            'about_tours' => $about_tours,
            'tour_days' => $tour_days,
            'gellery_images' => $gellery_images,
            'hotels' => $hotels,
            'packageTabs' => $packageTabs,
            'countries'   => $countries,
            'divisions'   => $divisions
        ]);
    }

    protected function updatePackageValidation($request){
        $request->validate([
            'category_id' => 'required | numeric',
            'code' => 'required',
            'id' => 'required | numeric',
            'name' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'short_description' => 'required',
//            'long_description' => 'required',
            'includes' => 'required',
            'excludes' => 'required',
            'destination_location' => 'required',
            // 'tour_details' => 'required',
            'important_note' => 'required',
            'terms_and_condition' => 'required',
            'status' => 'required',
        ]);
    }

    public function updatePackages(Request $request){
        $this->updatePackageValidation($request);
        $package = Package::where('id', $request->id)->first();
        $this->packageBasicInfo($request, $package);
        if($request->box_image){
            if(file_exists($package->box_image)){
                unlink($package->box_image);
            }
            $this->packageBoxImage($request, $package);
        }
        if($request->banner_image){
            if (file_exists($package->banner_image)){
                unlink($package->banner_image);
            }
            $this->packageBannerImage($request, $package);
        }
        $package->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Package Basic Info Updated Successfully !!!');
        return back();
    }
    public function deletePackage($id){
        $tab_itinerary_titles = TabItineraryTitle::where('package_id', $id)->get();
        $tab_hotels = TabHotel::where('package_id', $id)->get();
        $package_tabs = PackageTab::where('package_id', $id)->get();
        foreach ($tab_hotels as $tab_hotel){
            $tab_hotel->delete();
        }
        foreach ($tab_itinerary_titles as $itinerary_title){
            $itinerary_title->delete();
        }
        foreach ($package_tabs as $package_tab){
            $package_tab->delete();
        }
        $gellery_images = PackageGellery::where('package_id', $id)->get();
        if($gellery_images){
            foreach ($gellery_images as $gellery_image){
                if (file_exists($gellery_image->gellery_image)){
                    unlink($gellery_image->gellery_image);
                }
                $gellery_image->delete();
            }
        }
        $tour_days = TourDay::where('package_id', $id)->get();
        if($tour_days){
            foreach ($tour_days as $tour_day){
                $tour_day->delete();
            }
        }
//
        $package = Package::where('id', $id)->first();
        if($package){
            if(file_exists($package->box_image)){
                unlink($package->box_image);
            }
            if (file_exists($package->banner_image)){
                unlink($package->banner_image);
            }
            $package->delete();
        }
        session()->flash('type', 'danger');
        session()->flash('message', 'Package all Info Deleted Successfully !!!');
        return back();
    }

    protected function addPackageDayValidation($request){
        $request->validate([
            'day' => 'required | numeric',
            'package_id' => 'required',
            'overnight_stay' => 'required',
            'day_description' => 'required',

        ]);
    }

    protected function packageDayBasic($request, $tour_day){
        $tour_day->day = $request->day;
        $tour_day->package_id = $request->package_id;
        $tour_day->date = $request->date;
        $tour_day->overnight_stay = $request->overnight_stay;
        $tour_day->day_description = $request->day_description;
        $tour_day->breakfast = $request->breakfast;
        $tour_day->lunch = $request->lunch;
        $tour_day->dinner = $request->dinner;
    }

    public function addPackageDay(Request $request){
        $this->addPackageDayValidation($request);
        $tour_day = new TourDay();
        $this->packageDayBasic($request, $tour_day);
        $tour_day->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Tour Day Added Successfully !!!');
        return back();
    }

    public function updatePackageDay(Request $request){
        $this->addPackageDayValidation($request);
        $tour_day = TourDay::where('id', $request->id)->first();
        $this->packageDayBasic($request, $tour_day);
        $tour_day->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Tour Day Updated Successfully !!!');
        return back();
    }
    public function deletePackageDay($id){
        $tour_day = TourDay::where('id', $id)->first();
        $tour_day->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Tour Day Successfully Deleted !!!');
        return back();
    }

    protected function addPackageAboutValidation($request){
        $request->validate([
            'places_covered' => 'required',
            'package_id' => 'required | numeric',
            'inclusions' => 'required',
            'exclusions' => 'required',
            'others' => 'required',
        ]);
    }
    protected function packageAboutBasic($request, $about_tour){
        $about_tour->places_covered = $request->places_covered;
        $about_tour->package_id = $request->package_id;
        $about_tour->inclusions = $request->inclusions;
        $about_tour->exclusions = $request->exclusions;
        $about_tour->others = $request->others;
    }

    public function addPackageAbout(Request $request){
        $this->addPackageAboutValidation($request);
        $about_tour = new AboutTour();
        $this->packageAboutBasic($request, $about_tour);
        $about_tour->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Tour About Successfully Added !!!');
        return back();
    }

    public function updatePackageAbout(Request $request){
        $this->addPackageAboutValidation($request);
        $about_tour = AboutTour::where('id', $request->id)->first();
        $this->packageAboutBasic($request, $about_tour);
        $about_tour->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Tour About Successfully Updated !!!');
        return back();
    }

    public function deletePackageAbout($id){
        $about_tour = AboutTour::where('id', $id)->first();
        $about_tour->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Tour About Successfully Deleted !!!');
        return back();
    }
    protected function uploadGelleryImageValidation($request){
        $request->validate([
            'package_id' => 'required | numeric',
            'gellery_image' => 'required'
        ]);
    }
    public function uploadGelleryImage(Request $request){
        $this->uploadGelleryImageValidation($request);
        $this->packageGelleryImage($request, $request->package_id);

        session()->flash('type', 'success');
        session()->flash('message', 'New Gellery Images Uploaded Successfully !!!');
        return back();
    }

    public function deleteGelleryImage($id){
        $gellery_image = PackageGellery::where('id', $id)->first();
        if (file_exists($gellery_image->gellery_image)){
            unlink($gellery_image->gellery_image);
        }
        $gellery_image->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Gellery Image Deleted Successfully !!!');
        return back();
    }
    public function manageDivision(Request $request){
        $divisions = Division::where('country_id', $request->id)->get();
//        for (var i=0; i<data.length; i++) {
            //     op +='<option  value="'+data[i].id+'">'+data[i].name+'</option>';
            // }
            foreach ($divisions as $division) {
                echo '<option value="';
                echo $division->id.'">';
                echo $division->name.'</option>';
            }
    }
    // Main Package End


    // package Country Start

    public function addPackageCountry(Request $request){
        $request->validate([
            'package_country' => 'required',
            'package_id' => 'required'
        ]);
       $this->savePackgeCountry($request, $request->package_id);
       session()->flash('type', 'success');
       session()->flash('message', 'New Package Country Added Successfully !!!');
       return back();
    }

    public function deletePackageCountry($id){
        $package_country = PackageCountry::where('id', $id)->first();
        $package_country->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Package Country Deteled Successfully !!!');
        return back();
    }

    // Package Country End


    // package Division Strat

    public function addPackageDivision(Request $request){
//        return $request;
        $package_division_id_arry = [];
        $package_division_id_arry = $request->package_division;
        $package_division_id_arry_len = count($package_division_id_arry);
        for ($i = 0; $i < $package_division_id_arry_len; $i++){
            $package_division = new PackageDivision();
            $package_division->division_id = $package_division_id_arry[$i];
            $package_division->package_id = $request->package_id;
            $package_division->save();
        }
        session()->flash('type', 'success');
        session()->flash('message', 'Package Division Added Successfully !!!');
        return back();
    }

    public function deletePackageDivision($id){
        $package_division = PackageDivision::where('id', $id)->first();
        $package_division->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Package Division Deleted Successfully !!!');
        return back();
    }

    // package Division End

    public function packageOrder(){
        $package_orders = PackageOrder::orderBy('id', 'desc')->paginate(10);
        return view('backEnd.package_order.package_order', ['package_orders' => $package_orders]);
    }

    public function updatePackageOrder(Request $request){
        $request->validate([
            'id' => 'required',
            'package_name' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'email_address' => 'required',
        ]);
        $package_order = PackageOrder::where('id', $request->id)->first();
        $package_order->package_name = $request->package_name;
        $package_order->name = $request->name;
        $package_order->phone_number = $request->phone_number;
        $package_order->email_address = $request->email_address;
        $package_order->update();
        return back()->with('message', 'Package Order Updated Successfully!!!');
    }
    public function deletePackageOrder($id){
        $package_order = PackageOrder::where('id', $id)->first();
        $package_order->delete();
        return back()->with('message', 'Package Order Deleted Successfully');
    }
}
