<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Country;
use App\Models\Division;
use App\Models\FooterPhoneNumber;
use App\Models\Package;
use App\Models\PackageCountry;
use App\Models\PackageDivision;
use App\Models\PackList;
use Illuminate\Http\Request;

class FrontEndPackageController extends Controller
{
    public function packagesBySlug($slug){
        $packList = PackList::where('slug', $slug)->select('id', 'name', 'background_image')->first();

        if($slug != 'umrah'){
            $continent_name = [];
            $continent_name[0] = 'honourable';
            $continents = Continent::where('status', 1)->whereNotIn('slug', $continent_name)->select('name', 'id', 'box_image')->get();
            return view('frontEnd.packageContinent.packageContinent', [
                'packList' => $packList,
                'continents' => $continents
            ]);
        }else{
            $packages = Package::where('category_id', $packList->id)->where('status', 1)->paginate(10);
            $country = Country::where('slug', 'saudi arabia')->select('id', 'name', 'banner_image')->first();
            $releted_packages = Package::select('id', 'box_image', 'location', 'short_description')->where('status', 1)->limit(10)->orderBy('id', 'desc')->get();
            return view('frontEnd.package-list-c.package-list', [
                'packages' => $packages,
                'packList' => $packList,
                'country'  => $country,
                'releted_packages' => $releted_packages

            ]);
        }

    }

    public function packagesCountry($cid, $pid){
        $country_id = [28,42];
        $packList = PackList::where('id', $pid)->select('id', 'name')->first();
        $continent = Continent::where('id', $cid)->select('id', 'name', 'background_image')->first();
        $countries = Country::where('continent_id', $cid)->select('id', 'name', 'image')->orderBy('position', 'asc')->get();
        $releted_packages = Package::where('category_id', $pid)->where('status', 1)->select('id', 'box_image', 'location', 'short_description')->limit(15)->orderBy('id', 'desc')->get();
        if($cid == 3){
            $countries = Country::where('continent_id', $cid)->whereIn('id', $country_id)->select('id', 'name', 'image')->orderBy('position', 'asc')->get();
        }
            return view('frontEnd.packageCountry.packageCountry', [
                'packList'  => $packList,
                'continent' => $continent,
                'countries' => $countries
            ]);

    }
    public function packagesDivision($cid, $pid){
            $packList = PackList::where('id', $pid)->select('id', 'name')->first();
            $country = Country::where('id', $cid)->select('id', 'name', 'banner_image')->first();
            $divisions = Division::where('country_id', $cid)->where('status', 1)->orderBy('position', 'asc')->get();
            $releted_packages = Package::where('category_id', $pid)->where('status', 1)->select('id', 'box_image', 'location', 'short_description')->limit(10)->orderBy('id', 'desc')->get();
            $division_count = count($divisions);
            if($division_count == 0){
                $package_country_id = [];
                $packList = PackList::where('id', $pid)->select('name', 'id')->first();
                $country = Country::where('id', $cid)->select('id', 'name', 'banner_image')->first();
                $package_countries = PackageCountry::where('country_id', $cid)->get();
                foreach ($package_countries as $key => $package_country){
                    $package_country_id[$key] = $package_country->package_id;
                }

                $packages = Package::where('category_id', $pid)->where('status', 1)->whereIn('id', $package_country_id)->orderBy('price', 'asc')->paginate(10);
                return view('frontEnd.package-list-c.package-list', [
                    'packages' => $packages,
                    'packList' => $packList,
                    'country'  => $country,
                    'releted_packages' => $releted_packages
                ]);
            }else{
                return view('frontEnd.packageDivision.packageDivision',[
                    'country' => $country,
                    'divisions' => $divisions,
                    'packList'  => $packList,
                ]);
            }
    }
    public function packageListByCountry($did,$cid, $pid){
        $package_id_array = [];
        $releted_packages = Package::where('category_id', $pid)->select('id', 'box_image', 'location', 'short_description')->where('status', 1)->limit(10)->orderBy('id', 'desc')->get();
        $packList = PackList::where('id', $pid)->select('name', 'id')->first();
        $country = Country::where('id', $cid)->select('id', 'name')->first();
        $division = Division::where('id', $did)->select('id', 'name', 'background_image')->first();
        $division_ids = PackageDivision::where('division_id', $did)->get();
        foreach ($division_ids as $key => $division_id){
            $package_id_array[$key] = $division_id->package_id;
        }
//        return $division_id;
        $packages = Package::where('category_id', $pid)->where('status', 1)->orderBy('price', 'asc')->whereIn('id', $package_id_array)->paginate(10);
        return view('frontEnd.package-list.package-list', [
            'packages' => $packages,
            'packList' => $packList,
            'country'  => $country,
            'division' => $division,
            'releted_packages' => $releted_packages
        ]);
    }
    public function packageListByCountry2($cid, $pid){
        $releted_packages = Package::where('category_id', $pid)->select('id', 'box_image', 'location', 'short_description')->limit(10)->orderBy('id', 'desc')->get();
        $packList = PackList::where('id', $pid)->select('name', 'id')->first();
        $country = Country::where('id', $cid)->select('id', 'name')->first();
        $packages = Package::where('category_id', $pid)->where('country_id', $cid)->where('status', 1)->orderBy('price', 'ASC')->paginate(10);
        return view('frontEnd.package-list-c.package-list', [
            'packages' => $packages,
            'packList' => $packList,
            'country'  => $country,
            'releted_packages' => $releted_packages
        ]);
    }

    public function packageDetailById($id){
        $package = Package::with(['category' => function($q){$q->select('id', 'name');}, 'images' => function($q){$q->select('package_id', 'gellery_image');}, 'tourDays', 'packageCountries.country', 'packageTabs.tabItineraryTitles', 'packageTabs.hotels.hotel' =>function($q){$q->select('id', 'name', 'star', 'category', 'web_site', 'price', 'facilities', 'box_image');}])->where('id', $id)->first();
        $package_phone_numbers = FooterPhoneNumber::where('id', 1)->select('package', 'package_banani')->first();
        $phone_number =  str_replace(',',  '', $package_phone_numbers->package);
        $phone_number2 =  str_replace(',',  '', $package_phone_numbers->package_banani);
        $arry = str_split($phone_number, 12);
        $arry2 = str_split($phone_number2, 12);
        $arry_len = count($arry);
        $arry_len2 = count($arry2);
        $package_id[0] = $id;
        $releted_packages = Package::where('category_id', $package->category_id)->whereNotIn('id',$package_id)->where('status', 1)->select('id', 'name', 'short_description', 'box_image')->limit(4)->get();
        return view('frontEnd.package-details.package-detail',[
            'package' => $package,
            'releted_packages' => $releted_packages,
            'package_phone_numbers' => $package_phone_numbers,
            'arry' => $arry,
            'arry_len' => $arry_len,
            'arry2'    => $arry2,
            'arry_len2'    => $arry_len2,
        ]);
    }
    public function bookPackage($id){
      $package = Package::where('id', $id)->select('name')->first();
      return view('frontEnd.booking_package.book-package', ['package' => $package]);
    }


    // 06.08.19 Start
    public function packagesPackList($id){
        $continent_id = [];
        $pack_list = PackList::where('id', $id)->first();
        $countries = Country::where('status', 1)->select('id', 'name', 'image')->orderBy('position', 'asc')->get();
        return view('frontEnd.packageCountry.packageCountry', [
            'packList'  => $pack_list,
            'continent' => $pack_list,
            'countries' => $countries
        ]);
    }
    // 06.08.19 End
}
