<?php

namespace App\Http\Controllers;

use App\Events\package\PackageCreated;
use App\Models\AirTicket;
use App\Models\AirTicketDestination;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Division;
use App\Models\Package;
use App\Models\PackageCountry;
use App\Models\PackageDivision;
use App\Models\Visa;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        if (strpos($request->search, 'visa') !== false) {
            $visa_s = preg_split("/[\s,]+/", $request->search);
            $visas = Visa::whereIn('country_name', $visa_s)
                ->where('status', 1)
                ->orwhere('country_name', 'like', '%'.$visa_s[0].'%')
                ->orwhere('country_name', 'like', '%'.isset($visa_s[1]) != null ? isset($visa_s[1]) : ''.'%')
                ->orwhere('country_name', 'like', '%'.isset($visa_s[2]) != null ? isset($visa_s[2]) : ''.'%')
                ->orwhere('country_name', 'like', '%'.isset($visa_s[3]) != null ? isset($visa_s[3]) : ''.'%')
                ->orwhere('country_name', 'like', '%'.isset($visa_s[4]) != null ? isset($visa_s[4]) : ''.'%')
                ->with(['continent' => function($q){$q->select('id', 'name', 'background_image');}])
                ->select('id', 'continent_id', 'country_name', 'price', 'box_image', 'status')
                ->get();
//            return $visas;
            return view('frontEnd.search.pages.visa.visa', ['visas' => $visas, 'search' => $request->search]);
        }elseif(strpos($request->search, 'ticket') !== false){
            $ticket_s = preg_split("/[\s,]+/", $request->search);
            $air_ticket_destinations = AirTicketDestination::whereIn('name', $ticket_s)
                ->orwhere('name', 'like', '%'.$ticket_s[0].'%')
                ->orwhere('name', 'like', '%'.isset($ticket_s[1]) != null ? isset($ticket_s[1]) : ''.'%')
                ->orwhere('name', 'like', '%'.isset($ticket_s[2]) != null ? isset($ticket_s[3]) : ''.'%')
                ->orwhere('name', 'like', '%'.isset($ticket_s[3]) != null ? isset($ticket_s[3]) : ''.'%')
                ->orwhere('name', 'like', '%'.isset($ticket_s[4]) != null ? isset($ticket_s[4]) : ''.'%')
                ->where('status', 1)
                ->select('id', 'name', 'box_image')
                ->get();
//            return $air_ticket_destinations;
            return view('frontEnd.search.pages.air-ticket.air-ticket',['search' => $request->search, 'air_ticket_destinations' => $air_ticket_destinations]);
        }elseif(strpos($request->search, 'regular') !== false){
            return redirect('/packages/regular package');
        }elseif(strpos($request->search, 'group') !== false){
            return redirect('/packages/group package');
        }elseif (strpos($request->search, 'eid') !== false){
            return redirect('/packages/eid package');
        }elseif (strpos($request->search, 'umrah') !== false){
            return redirect('/packages/umrah package');
        }else{
            $continents = Continent::where('name', 'like', '%'.$request->search.'%')->where('status', 1)->get();
            $continent_array_len = count($continents);
            if($continent_array_len != 0){
                return view('frontEnd.search.pages.continent.continent', [ 'continents' => $continents, 'search' => $request->search]);
            }else{
                $countries = Country::where('name', 'like', '%'.$request->search.'%')->select('id', 'name', 'image')->where('status', 1)->get();
                $countries_array_len = count($countries);
                if($countries_array_len != 0){
                    return view('frontEnd.search.pages.country.country', ['countries' => $countries, 'search' => $request->search]);
                }else{
                    $divisions = Division::where('name', 'like', '%'.$request->search.'%')->select('id', 'name', 'box_image')->where('status', 1)->get();
                    $division_array_len = count($divisions);
                    if($division_array_len != 0){
                        return view('frontEnd.search.pages.division.division',['divisions' => $divisions, 'search' => $request->search]);
                    }else{
                        $releted_packages = Package::orderBy('id', 'desc')->select('id','name','location', 'short_description', 'box_image')->where('status', 1)->limit(10)->get();
                        $packages = Package::where('name', 'LIKE', '%'. $request->search .'%')->orwhere('code', 'LIKE', '%'. $request->search .'%')->where('status' , 1)->select('id', 'name', 'short_description', 'box_image', 'price', 'location', 'duration')->get();
                        return view('frontEnd.search.search', [
                            'packages' => $packages,
                            'releted_packages' => $releted_packages
                        ]);
                    }
                }
            }

        }
    }


    public function searchCountry($id){
        $continent = Continent::where('id', $id)->select('id', 'name')->first();
        $continent_name = $continent->name;
        $countries = Country::where('continent_id', $id)->where('status', 1)->select('id', 'continent_id', 'name', 'image')->where('status', 1)->get();
        return view('frontEnd.search.pages.country.search_country', ['countries' => $countries, 'search' => $continent_name]);
    }

    public function searchCountryPackage($id){
        $package_id = [];
        $package_countries = PackageCountry::where('country_id', $id)->get();
        foreach ($package_countries as $key => $package_country){
            $package_id[$key] = $package_country->package_id;
        }
        $releted_packages = Package::orderBy('id', 'desc')->select('id','name','location', 'short_description', 'box_image')->where('status', 1)->limit(10)->get();
        $packages = Package::whereIn('id', $package_id)->where('status', 1)->select('id', 'name', 'short_description', 'box_image', 'price', 'location', 'duration')->get();
        return view('frontEnd.search.search', [
            'packages' => $packages,
            'releted_packages' => $releted_packages
        ]);

    }
    public function searchDivisionPackage($id){
        $package_id = [];
        $package_divisions = PackageDivision::where('division_id', $id)->get();
        foreach ($package_divisions as $key => $package_division){
            $package_id[$key] = $package_division->package_id;
        }
        $releted_packages = Package::orderBy('id', 'desc')->select('id','name','location', 'short_description', 'box_image')->where('status', 1)->limit(10)->get();
        $packages = Package::whereIn('id', $package_id)->where('status', 1)->select('id', 'name', 'short_description', 'box_image', 'price', 'location', 'duration')->get();
        return view('frontEnd.search.search', [
            'packages' => $packages,
            'releted_packages' => $releted_packages
        ]);
    }

    public function HomeSearchVisa(Request $request){
        $visas = Visa::where('country_name', 'like', '%'.$request->search.'%')->where('status', 1)->select('id', 'continent_id', 'country_name', 'price', 'box_image')->get();
        return view('frontEnd.search.pages.visa.visa', ['visas' => $visas, 'search' => $request->search]);
    }
}
