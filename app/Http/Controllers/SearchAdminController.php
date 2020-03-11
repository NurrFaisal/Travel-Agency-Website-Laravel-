<?php

namespace App\Http\Controllers;

use App\Model\NewGelleryImage;
use App\Models\AirLine;
use App\Models\AirTicket;
use App\Models\AirTicketTitle;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Day;
use App\Models\Division;
use App\Models\GelleryMainCategory;
use App\Models\GellerySubCategory;
use App\Models\Hotel;
use App\Models\OurTeamStaff;
use App\Models\Package;
use App\Models\PackList;
use App\Models\Visa;
use App\Models\VisaOrder;
use App\Models\Year;
use Illuminate\Http\Request;

class SearchAdminController extends Controller
{
    public function searchAir(Request $request){
        $searchString = $request->searchAirTicket;
        $air_tickets = AirTicket::whereHas('air_ticket_title', function ($query) use ($searchString){$query->where('name', 'like', '%'.$searchString.'%');})->orWhere('name', 'LIKE', '%'.$searchString.'%')->with(['air_ticket_title' => function($q){ $q->select('id', 'name');}, 'destinationR' => function($q){$q->select('id', 'name');}, 'air_line' =>function($q){$q->select('id', 'name');}, 'air_ticket_main_destinations'])->orderBy('id', 'desc')->paginate(10);
        $air_ticket_titles = AirTicketTitle::where('status', 1)->select('id', 'name')->orderBy('id', 'asc')->get();
        $air_lines = AirLine::where('status',1)->select('id', 'name')->orderBy('id', 'desc')->get();
        $days = Day::orderBy('id', 'asc')->get();
        return view('backEnd.airTicket.airTicketMain.airTicketMain',[
            'air_ticket_titles' => $air_ticket_titles,
            'days' => $days,
            'air_lines' => $air_lines,
            'air_tickets' => $air_tickets
        ]);
    }
    public function searchPackage(Request $request){
        $searchString = $request->searchpackage;
        $packLists = PackList::where('status', 1)->get();
        $countries = Country::where('status', 1)->orderBy('name', 'asc')->get();
        $divisions = Division::where('status', 1)->get();
        $packages = Package::where('name', 'LIKE', '%'.$searchString.'%')->orderBy('id', 'desc')->paginate(1);
        return view('backEnd.packages.packages', [
            'packLists' => $packLists,
            'countries' => $countries,
            'divisions' => $divisions,
            'packages'  => $packages
        ]);
    }
    public function searchHotel(Request $request){
        $searchString = $request->searchHotel;
        $countries = Country::orderBy('name', 'asc')->where('status', 1)->select('id', 'name')->get();
        $hotels = Hotel::where('name', 'LIKE', '%'.$searchString.'%')->with(['countryf' => function($q){ $q->select('id', 'name');}, 'divisionf' => function($q){$q->select('id', 'name');}])->orderBy('id', 'desc')->paginate(10);
        $divisions = Division::where('status', 1)->select('id', 'name','country_id')->get();
        return view('backEnd.hotel.hotel', [
            'countries' => $countries,
            'hotels'    => $hotels,
            'divisions' => $divisions
        ]);
    }

    public function searchVisa(Request $request){
        $searchString = $request->searchVisa;
        $continents = Continent::orderBy('name', 'asc')->where('status', 1)->get();
        $visas = Visa::where('country_name', 'LIKE', '%'.$searchString.'%')->with('continent')->orderBy('country_name', 'asc')->paginate(10);
        return view('backEnd.visa.visa', [
            'continents' => $continents,
            'visas' => $visas
        ]);
    }
    public function searchVisaOrder(Request $request){
        $searchString = $request->searchVisaOrder;
        $visa_orders = VisaOrder::where('visa_name', 'LIKE', '%'.$searchString.'%')->orderBy('id', 'desc')->paginate(10);
        return view('backEnd.visa_order.visa_order', ['visa_orders' => $visa_orders]);
    }
    public function searchCountry(Request $request){
        $searchString = $request->searchCountry;
        $continent_name = [];
        $continent_name[0] = 'honourable';
        $continents = Continent::orderBy('name', 'asc')->where('status', 1)->whereNotIn('slug', $continent_name)->select('name', 'id')->get();
        $countries = Country::where('name', 'LIKE', '%'.$searchString.'%')->with(['continent' => function($q){$q->select('id', 'name');}])->orderBy('name', 'asc')->paginate(10);
        return view('backEnd.country.country', [
            'countries' => $countries,
            'continents' => $continents
        ]);
    }
    public function searchDivision(Request $request){
        $searchString = $request->searchDivision;
        $countries = Country::orderBy('name', 'asc')->get();
        $divisions = Division::where('name', 'LIKE', '%'.$searchString.'%')->with(['country' => function ($q){ $q->select('id', 'name');}])->orderBy('updated_at', 'desc')->paginate(10);
        return view('backEnd.division.division', [
            'countries' => $countries,
            'divisions' => $divisions,
        ]);
    }
    public function searchSubCategory(Request $request){
        $searchString = $request->searchSubCategory;
        $gellery_main_categories = GelleryMainCategory::where('status', 1)->get();
        $gellery_sub_categories = GellerySubCategory::where('name', 'LIKE', '%'.$searchString.'%')->with(['mainCategory' => function($q){$q->select('id', 'name');}])->orderBy('id', 'desc')->paginate(10);
        return view('backEnd.new-gellery.sub-category.gellery_sub_category', [
            'gellery_main_categories' => $gellery_main_categories,
            'gellery_sub_categories' => $gellery_sub_categories
        ]);
    }
    public function searchGallery(Request $request){
        $searchString = $request->searchGallery;
        $gallery_main_categories = GelleryMainCategory::where('status', 1)->get();
        $years = Year::where('status', 1)->get();
        $our_team_staffs = OurTeamStaff::where('status', 1)->get();
        $new_gallery_images = NewGelleryImage::whereHas('main_category', function ($query) use ($searchString){$query->where('name', 'like', '%'.$searchString.'%');})->orWhere('sub_category_id', 'LIKE', '%'.$searchString.'%')->with(['main_category' => function($q){$q->select('id', 'name');}, 'person' => function($q){$q->select('id', 'name');}])->orderBy('id', 'desc')->paginate(10);
//        return $new_gallery_images;
        return view('backEnd.new-gellery.gallery-image.gallery', [
            'gallery_main_categories' => $gallery_main_categories,
            'years' => $years,
            'our_team_staffs' => $our_team_staffs,
            'new_gallery_images' => $new_gallery_images
        ]);
    }
}
