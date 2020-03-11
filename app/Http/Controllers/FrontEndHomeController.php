<?php

namespace App\Http\Controllers;

use App\Model\NewGelleryImage;
use App\Models\AboutSlider;
use App\Models\AboutUs;
use App\Models\AirTicketTitle;
use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\Continent;
use App\Models\FooterPhoneNumber;
use App\Models\Gellery;
use App\Models\GelleryMainCategory;
use App\Models\GellerySubCategory;
use App\Models\HotelTitle;
use App\Models\OurTeamBanner;
use App\Models\OurTeamStaff;
use App\Models\Package;
use App\Models\PackList;
use App\Models\Slider;
use App\Models\Year;
use Cache;
use Illuminate\Http\Request;

class FrontEndHomeController extends Controller
{
    public function index(){
        $continents = Cache::get('continents_c', function (){
            $continent_name = [];
            $continent_name[0] = 'honourable';
            return Continent::orderBy('name', 'asc')->where('status', 1)->whereNotIn('slug', $continent_name)->select('name', 'id', 'box_image')->get();
        });
        $sliders = Cache::get('sliders_c', function (){
            return Slider::where('status', 1)->orderBy('updated_at', 'desc')->limit(4)->get();
        });
        $packLists = Cache::get('packLists_c', function (){
            return PackList::where('status', 1)->limit(4)->get();
        });
        $air_ticket_titles = Cache::get('air_ticket_titles_c', function (){
            return AirTicketTitle::orderBy('name', 'asc')->where('status', 1)->limit(4)->get();
        });
        $honourable = Cache::get('honourable', function (){
            return Continent::where('slug', 'honourable')->where('status', 1)->select('name', 'id', 'box_image')->first();
        });
        $packages = Cache::get('packages_c', function (){
            return Package::with(['category' => function($q){$q->select('id', 'name');}])->where('status', 1)->orderBy('updated_at', 'desc')->select('id', 'name', 'box_image', 'short_description', 'category_id')->limit(4)->get();
        });
        $hotel_title = Cache::get('hotel_title_c', function (){
            return HotelTitle::where('id', 1)->first();
        });
        return view('frontEnd.home.home', [
            'sliders' => $sliders,
            'continents' => $continents,
            'packLists'  => $packLists,
            'air_ticket_titles' => $air_ticket_titles,
            'honourable' => $honourable,
            'packages'  => $packages,
            'hotel_title' => $hotel_title
        ]);
    }
    public function visa(){
        return view('frontEnd.visa.visa');
    }

    public function underConstuction(){
        return view('frontEnd.under-constaction.under-constaction');
    }

    public function gellery(){
//        $gellery_images = Gellery::orderBy('id', 'desc')->get();
        $gallery_main_categories = GelleryMainCategory::where('status', 1)->get();
//        return $gallery_main_category;
        return view('frontEnd.new-gellery.main-category.main-category', [
            'gallery_main_categories' => $gallery_main_categories
        ]);
    }

    public function gellerySubCategory($id){
        $gellery_sub_categories = GellerySubCategory::where('status', 1)->where('gellery_main_category_id', $id)->get();
//        return $gellery_sub_categories;
        return view('frontEnd.new-gellery.sub-category.sub-category', [
            'gellery_sub_categories' => $gellery_sub_categories
        ]);
    }

    public function gellerySubCategoryBySlug($slug){
        if($slug == 'birthday'){
            $our_staffs = OurTeamStaff::where('status', 1)->get();
            return view('frontEnd.new-gellery.stuff.stuff', [
                'our_staffs' => $our_staffs,
                'slug'       => $slug
            ]);
        }else{
            $years =Year::where('status', 1)->orderBy('name', 'desc')->get();
            return view('frontEnd.new-gellery.year.year', [
                'years' => $years,
                'slug'  => $slug
            ]);
        }
    }
    public function gelleryImageBd($slug, $staff){
        $years = Year::where('status', 1)->orderBy('name', 'desc')->get();
        return view('frontEnd.new-gellery.bd-year.bd-year', [
            'years' => $years,
            'slug'  => $slug,
            'staff' => $staff
        ]);
    }

    public function gelleryImageByBd($staff,$year){
        $gellery_images = NewGelleryImage::where('year_id', $year)->where('person_id', $staff)->where('sub_category_id', 'birthday')->get();
        return view('frontEnd.new-gellery.gellery.gellery', [
            'gellery_images' => $gellery_images
        ]);
    }

    public function gelleryImage($sub, $year){
        $gellery_images = NewGelleryImage::where('year_id', $year)->orderBy('id', 'desc')->where('sub_category_id', $sub)->get();
        return view('frontEnd.new-gellery.gellery.gellery', ['gellery_images' => $gellery_images]);
    }

    public function contactUs(){
        $contact = Contact::where('id', 1)->first();
        $contact_us = ContactUs::where('id', 1)->first();
        $footerPhoneNumber = FooterPhoneNumber::where('id', 1)->first();
        $canvas = 0;
        $map = 1;
//        return $footer_phone_number;
//        return $contact;
        return view('frontEnd.contact.contact', [
            'contact' => $contact,
            'footerPhoneNumber' => $footerPhoneNumber,
            'canvas' => $canvas,
            'contact_us' => $contact_us,
            'map'       => $map
        ]);
    }

    public function aboutUs(){
        $sliders = AboutSlider::where('status', 1)->get();
        $about_us = AboutUs::where('id', 1)->first();
        $canvas = 0;
        return view('frontEnd.about-us.about-us',[
            'sliders'  => $sliders,
            'canvas'   => $canvas,
            'about_us' => $about_us
        ]);
    }
    public function ourTeam(){
        $our_team_banner = OurTeamBanner::where('id', 1)->first();
        $our_team_staffs  = OurTeamStaff::where('status', 1)->get();
        $canvas = 0;
        return view('frontEnd.our-team.our-team', [
            'canvas' => $canvas,
            'our_team_banner' => $our_team_banner,
            'our_team_staffs'  => $our_team_staffs
        ]);
    }


}
