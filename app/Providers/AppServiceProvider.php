<?php

namespace App\Providers;

use App\Models\AirTicketTitle;
use App\Models\Contact;
use App\Models\Continent;
use App\Models\FooterImage;
use App\Models\FooterPhoneNumber;
use App\Models\Ifram;
use App\Models\Logo;
use App\Models\PackList;
use Illuminate\Support\ServiceProvider;
use Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontEnd.includes.footer.footer_two', function ($view) {
            $footer_images = Cache::get('footer_images', function () {
                return FooterImage::where('status', 1)->orderBy('name', 'asc')->limit(3)->get();
            });
            $view->with('footer_images',  $footer_images);
        });

        view()->composer('frontEnd.includes.footer.footer_two', function ($view) {
            $footerPhoneNumber = Cache::get('footerPhoneNumber', function (){
                return FooterPhoneNumber::where('id', 1)->first();
            });
            $view->with('footerPhoneNumber',  $footerPhoneNumber);
        });
        view()->composer('frontEnd.includes.footer.footer_one', function ($view) {
            $ifram = Cache::get('ifram', function (){
                return Ifram::where('id', 1)->first();
            });
            $view->with('ifram',  $ifram);
        });
        view()->composer('frontEnd.includes.footer.footer_two', function ($view) {
            $contact = Cache::get('contact', function (){
                return Contact::where('id', 1)->first();
            });
            $view->with('contact', $contact);
        });

        view()->composer('frontEnd.includes.header.header', function ($view) {
            $air_ticket_titles = Cache::get('air_ticket_titles', function (){
                return AirTicketTitle::where('status', 1)->orderBy('name', 'asc')->get();
            });
            $view->with('air_ticket_titles', $air_ticket_titles);
        });
        view()->composer('frontEnd.includes.header.header', function ($view) {
            $continents = Cache::get('continents', function (){
                return Continent::where('status', 1)->orderBy('name', 'asc')->get();
            });
            $view->with('continents', $continents);
        });
        view()->composer('frontEnd.includes.header.header', function ($view) {
            $packLists = Cache::get('packLists', function (){
                return PackList::where('status', 1)->select('id', 'name', 'slug')->get();
            });
            $view->with('packLists', $packLists);
        });
        view()->composer('frontEnd.includes.header.header', function ($view) {
            $logo = Cache::get('logo', function (){
                return Logo::where('id', 1)->first();
            });
            $view->with('logo', $logo);
        });
        view()->composer('backEnd.include.header', function ($view) {
            $logo = Cache::get('logo', function (){
                return Logo::where('id', 1)->first();
            });
            $view->with('logo', $logo);
        });
        view()->composer('backEnd.login', function ($view) {
            $logo = Cache::get('logo', function (){
                return Logo::where('id', 1)->first();
            });
            $view->with('logo', $logo);
        });
    }
}
