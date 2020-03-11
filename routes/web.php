<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

// FrontEnd FrontEnd FrontEnd  FrontEnd  FrontEnd  FrontEnd  FrontEnd  FrontEnd
// FrontEnd FrontEnd FrontEnd  FrontEnd  FrontEnd  FrontEnd  FrontEnd  FrontEnd
// FrontEnd FrontEnd FrontEnd  FrontEnd  FrontEnd  FrontEnd  FrontEnd  FrontEnd

Route::get('/', 'FrontEndHomeController@index');
//Route::get('/package/{id}', 'FrontEndHomeController@package');
Route::get('/under-constuction', 'FrontEndHomeController@underConstuction');


Route::get('/gellery', 'FrontEndHomeController@gellery');
Route::get('/gellery-sub-category/{id}', 'FrontEndHomeController@gellerySubCategory');
Route::get('/gellery-sub-category-by-slug/{slug}', 'FrontEndHomeController@gellerySubCategoryBySlug');
Route::get('/gellery-image/{sub}/{year}', 'FrontEndHomeController@gelleryImage');
Route::get('/gellery-image-bd/{slug}/{staff}', 'FrontEndHomeController@gelleryImageBd');
Route::get('/gellery-image-by-bd/{staff}/{year}', 'FrontEndHomeController@gelleryImageByBd');





Route::get('/contact-us', 'FrontEndHomeController@contactUs');
Route::get('/about-us', 'FrontEndHomeController@aboutUs');
Route::get('/our-team', 'FrontEndHomeController@ourTeam');




//FrontEndPackageController Start/package-division/

Route::get('/packages/{slug}', 'FrontEndPackageController@packagesBySlug');
Route::get('/package-country/{cid}/{pid}', 'FrontEndPackageController@packagesCountry');
Route::get('/package-division/{cid}/{pid}', 'FrontEndPackageController@packagesDivision');
Route::get('/package-list/{did}/{cid}/{pid}', 'FrontEndPackageController@packageListByCountry');
Route::get('/package-list/{cid}/{pid}', 'FrontEndPackageController@packageListByCountry2');

Route::get('/package-detail/{id}', 'FrontEndPackageController@packageDetailById');
Route::get('/book-package/{id}', 'FrontEndPackageController@bookPackage');
Route::post('/confirm-package-booking', 'FrontEndPackageController@confirmPackageBooking');

//06.08.19 start

Route::get('/packages-pack-list/{id}', 'FrontEndPackageController@packagesPackList');
//06.08.19 end
//ForntEndPackageController End


// VisaController for FrontEnd Start

Route::get('/continent-country/{id}', 'VisaController@ContinentCountry');
Route::get('/visa-details/{id}', 'VisaController@visaDetails');

Route::get('/book-visa/{id}', 'VisaController@bookVisa');
Route::post('/confirm-visa-booking', 'VisaController@confirmVisaBooking');
Route::get('/confirm-visa-booking', function () {
    return back();
});

// 06.08.19 start
Route::get('/visa-country', 'VisaController@visaCountry');
// 06.08.19 end

// VisaController for FrontEnd End

// AirTicketController Start

Route::get('/air-ticket/{cat_id}/{slug}', 'AirTicketController@airTicket');
Route::get('/air-ticket-list/{id}', 'AirTicketController@airTicketList');

// AirTicketController End



// SearchController Starat

Route::post('/search', 'SearchController@search');
Route::get('/search', function () {
    return redirect('/');
});
Route::get('/search-country/{id}', 'SearchController@searchCountry');
Route::get('/search-country-package/{id}', 'SearchController@searchCountryPackage');
Route::get('/search-division-package/{id}', 'SearchController@searchDivisionPackage');


//search Visa

Route::post('/home-search-visa', 'SearchController@HomeSearchVisa');
Route::get('/home-search-visa', function () {
    return redirect('/');
});
// SearchController End

// FrontEnd Start

Route::get('/hotel-booking-country', 'HotelController@hotelBookingCountry');
Route::get('/hotel-booking-city/{id}', 'HotelController@hotelBookingCity');
Route::get('/hotel-booking-list/{id}', 'HotelController@hotelBookingList');

// FrontEnd End

// After this line all route and controller created for backend
// After this line all route and controller created for backend
// After this line all route and controller created for backend


Route::middleware(['admin'])->group(function () {
    Route::get('/apanel/dashboard', 'BackEndController@dashBoard');

    // SearchAdminController Strat


// AirTicketDestination Controller Star

Route::get('/apanel/air-ticket-destination', 'AirTicketDestinationController@airTicketDestination');
Route::post('/add-air-ticket-destination', 'AirTicketDestinationController@addAirTicketDestination');
Route::get('/add-air-ticket-destination', function () {
    return back();
});
// AirTicketDestination Controller End

    Route::post('/search-air', 'SearchAdminController@searchAir');
    Route::get('/search-air', function () {
        return redirect('/apanel/air-tickets');
    });
    Route::post('/search-package', 'SearchAdminController@searchPackage');
    Route::get('/search-package', function () {
        return redirect('/apanel/packages');
    });
    Route::post('/search-hotel', 'SearchAdminController@searchHotel');
    Route::get('/search-hotel', function () {
        return redirect('/apanel/hotel');
    });
    Route::post('/search-visa', 'SearchAdminController@searchVisa');
    Route::get('/search-visa', function () {
        return redirect('/apanel/visa');
    });
    Route::post('/search-visa-order', 'SearchAdminController@searchVisaOrder');
    Route::get('/search-visa-order', function () {
        return redirect('/apanel/visa-order');
    });
    Route::post('/search-country', 'SearchAdminController@searchCountry');
    Route::get('/search-country', function () {
        return redirect('/country');
    });
    Route::post('/search-division', 'SearchAdminController@searchDivision');
    Route::get('/search-division', function () {
        return redirect('/apanel/division');
    });
    Route::post('/search-sub-category', 'SearchAdminController@searchSubCategory');
    Route::get('/search-sub-category', function () {
        return redirect('/apanel/gallery/sub-category');
    });
    Route::post('/search-gallery', 'SearchAdminController@searchGallery');
    Route::get('/search-gallery', function () {
        return redirect('/apanel/gallery/gallery-image');
    });



    // SearchAdminController End


    // CountryController Start

    Route::get('/country', 'CountryController@country');
    Route::post('/add-country', 'CountryController@addCountry');
    Route::get('/add-country', function () {
        return view('/country');
    });
    Route::post('/update-country', 'CountryController@updateCountry');
    Route::get('/update-country', function () {
        return view('/country');
    });
    Route::get('/delete-country/{id}', 'CountryController@deleteCountry')->middleware('superAdmin');

    // CountryController End

    // ContinentController Start

    Route::get('/apanel/continents', 'ContinentController@continent');
    Route::post('/add-continent', 'ContinentController@addContinent')->middleware('superAdmin');
    Route::get('/add-continent', function () {
        return back();
    });
    Route::post('/update-continent', 'ContinentController@UpdateContinent');
    Route::get('/update-continent', function () {
        return back();
    });
    Route::get('/delete-continent/{id}', 'ContinentController@deleteContinent')->middleware('superAdmin');

// ContinentController End

    // SliderController Start

    Route::get('/slider', 'SliderController@slider');
    Route::post('/add-slider', 'SliderController@addSlider');
    Route::get('/add-slider', function () {
        return redirect('/slider');
    });
    Route::post('/update-slider', 'SliderController@updateSlider');
    Route::get('/delete-slider/{id}', 'SliderController@deleteSlider');

// SliderController End

    // FooterImageController Start

    Route::get('/footer-image', 'FooterImageController@footerImage');
    Route::post('/add-footerImage', 'FooterImageController@addFooterImage');
    Route::get('/add-footerImage', function () {
        return redirect('/footer-image');
    });
    Route::post('/update-footerImage', 'FooterImageController@updateFooterImage');
    Route::get('/update-footerImage', function () {
        return redirect('/footer-image');
    });
    Route::get('/delete-footerImage/{id}', 'FooterImageController@deleteFooterImage');

// FooterImageController End

    // FooterPhoneNumberController Start

    Route::get('/footer-phone-number', 'FooterPhoneNumberController@footerPhoneNumber');
    Route::post('/update-footer-phone-number', 'FooterPhoneNumberController@updateFooterPhoneNumber');
    Route::get('/update-footer-phone-number', function () {
        return back();
    });

// FooterPhoneNumberController End

    // IframController Start

    Route::get('/ifram', 'IframController@ifram');
    Route::post('/update-ifram', 'IframController@updateIfram');
    Route::get('/update-ifram', function () {
        return redirect('/ifram');
    });

// IframController End

    // ContactController Start

    Route::get('/apanel/contact', 'ContactController@apanelContact');
    Route::post('/apnel/update-contact', 'ContactController@apanelUpdateContact');
    Route::get('/apanel/update-contact', function () {
        return redirect('/apanel/contact');
    });

// ContactController End


    // BackPackageController Start

// Pakage Title Start

    Route::get('/apanel/pack-list', 'BackPackageController@packList');
    Route::post('/apnel/add-pack-list', 'BackPackageController@AddpackList')->middleware('superAdmin');
    Route::get('/apanel/add-pack-list', function () {
        return redirect('/apanel/pack-list');
    });
    Route::post('/apnel/update-pack-list', 'BackPackageController@updatePackList');
    Route::get('/apnel/update-pack-list', function () {
        return redirect('/apanel/pack-list');
    });
    Route::get('/apanel/delete-pack-list/{id}', 'BackPackageController@deletePackList')->middleware('superAdmin');

// Package Title End

    // Main Package Start

    Route::get('/apanel/packages', 'BackPackageController@packages');
    Route::post('/apnel/add-package', 'BackPackageController@addPackages');
    Route::get('/apnel/add-package', function () {
        return redirect('/apanel/packages');
    });

    Route::get('/apanel/view-package/{id}', 'BackPackageController@viewPackage');

    Route::post('/update-package', 'BackPackageController@updatePackages');
    Route::get('/update-package', function () {
        return redirect('/apanel/packages');
    });
    Route::get('/apanel/delete-package/{id}', 'BackPackageController@deletePackage');

    Route::post('/add-package-day', 'BackPackageController@addPackageDay');
    Route::get('/add-package-day', function () {
        return back();
    });
    Route::post('/update-package-day', 'BackPackageController@updatePackageDay');
    Route::get('/update-package-day', function () {
        return back();
    });
    Route::get('/apanel/delete-package-day/{id}', 'BackPackageController@deletePackageDay');

    Route::post('/add-package-about', 'BackPackageController@addPackageAbout');
    Route::get('/add-package-about', function () {
        return back();
    });
    Route::post('/update-package-about', 'BackPackageController@updatePackageAbout');
    Route::get('/update-package-about', function () {
        return back();
    });
    Route::get('/apanel/delete-package-about/{id}', 'BackPackageController@deletePackageAbout');

    Route::post('/upload-gellery-image', 'BackPackageController@uploadGelleryImage');
    Route::get('/upload-gellery-image', function () {
        return back();
    });
    Route::get('/apanel/delete-gellery-image/{id}', 'BackPackageController@deleteGelleryImage');


    Route::get('/manage-division', 'BackPackageController@manageDivision');
// Main Package End

    // package Country Start

    Route::post('/add-package-country', 'BackPackageController@addPackageCountry');
    Route::get('/add-package-country', function () {
        return back();
    });
    Route::get('/apanel/delete-package-country/{id}', 'BackPackageController@deletePackageCountry');
// package Country End

    // package Division Strat

    Route::post('/add-package-division', 'BackPackageController@addPackageDivision');
    Route::get('/add-package-division', function () {
        return back();
    });
    Route::get('/apanel/delete-package-division/{id}', 'BackPackageController@deletePackageDivision');
// package Divison End

    //AirTicketTitleController Start

    Route::get('/apanel/air-ticket-title', 'AirTicketTitleController@airTicketTitle');
    Route::post('/add-air-ticket-title', 'AirTicketTitleController@AddAirTicketTitle')->middleware('superAdmin');
    Route::get('/add-air-ticket-title', function () {
        return redirect('/apanel/air-ticket-title');
    });
    Route::post('/update-air-ticket-title', 'AirTicketTitleController@UpdateAirTicketTitle');
    Route::get('/update-air-ticket-title', function () {
        return redirect('/apanel/air-ticket-title');
    });
    Route::get('/apanel/delete-air-ticket-title/{id}', 'AirTicketTitleController@deleteAirTicketTitle')->middleware('superAdmin');

// AirTicketTitleController End

    // VisaController Start


    Route::get('/apanel/visa', 'VisaController@visa');
    Route::post('/add-visa', 'VisaController@addVisa');
    Route::get('/add-visa', function () {
        return redirect('/apanel/visa');
    });
    Route::post('/update-visa', 'VisaController@updateVisa');
    Route::get('/update-visa', function () {
        return redirect('/apanel/visa');
    });
    Route::get('/delete-visa/{id}', 'VisaController@deleteVisa');


    Route::get('/apanel/visa-order', 'VisaController@visaOrder');
    Route::post('/update-visa-order', 'VisaController@updateVisaOrder');
    Route::get('/update-visa-order', function () {
        return redirect('/apanel/visa-order');
    });
    Route::get('/delete-visa-order/{id}', 'VisaController@deleteVisaOrder');

// VisaController End

    // DivisionController Start

    Route::get('/apanel/division', 'DivisionController@division');

    Route::post('/add-division', 'DivisionController@addDivision');
    Route::get('/add-division', function () {
        return redirect('/apanel/division');
    });
    Route::post('/update-division', 'DivisionController@updateDivision');
    Route::get('/update-division', function () {
        return redirect('/apanel/division');
    });
    Route::get('/delete-division/{id}', 'DivisionController@deleteDivision')->middleware('superAdmin');

// DivisionController End

    // HotelController Start

// strat-title

    Route::get('/apanel/hotel-title', 'HotelController@hotelTitle');
    Route::post('/apnel/update-hotel-title', 'HotelController@updateHotelTitle');
    Route::get('/apnel/update-hotel-title', function () {
        return back();
    });

// end-title

    Route::get('/apanel/hotel', 'HotelController@hotel');
    Route::post('/add-hotel', 'HotelController@addHotel');
    Route::get('/add-hotel', function () {
        return back();
    });
    Route::post('/update-hotel', 'HotelController@updateHotel');
    Route::get('/update-hotel', function () {
        return back();
    });
    Route::get('/delete-hotel/{id}', 'HotelController@deleteHotel');

    // Package TabController Start

    Route::post('/add-package-tab', 'TabController@addPackageTab');
    Route::post('/update-package-tab', 'TabController@updatePackageTab');
    Route::get('/apanel/delete-package-tab/{id}', 'TabController@deletePackageTab');

    Route::get('/apanel/view-package-tab/{id}', 'TabController@viewPackageTab');
    Route::post('/add-package-tab-itinerary', 'TabController@addPackageTabItinerary');
    Route::post('/update-package-tab-itinerary', 'TabController@updatePackageTabItinerary');
    Route::get('/apanel/delete-package-tab-itinerary/{id}', 'TabController@deletePackageTabIrinerary');

// Tab Hotel Start

    Route::post('/add-package-tab-hotel', 'TabController@addPackageTabHotel');
    Route::get('/apanel/delete-package-tab-hotel/{id}', 'TabController@deletePackageTabHotel');

// Tab Hotel End



// Package TabController End

    //airLinesController Start

    Route::get('/apanel/air-lines', 'AirLinesController@airLines');
    Route::post('/add-air-line', 'AirLinesController@addAirLine');
    Route::get('/add-air-line', function () {
        return back();
    });
    Route::post('/update-air-line', 'AirLinesController@updateAirLine');
    Route::get('/update-air-line', function () {
        return back();
    });

    Route::get('/apanel/delete-air-line/{id}', 'AirLinesController@deleteAirLine')->middleware('superAdmin');

//airLinesController End

    // AirticketsController Start

    Route::get('/apanel/air-tickets', 'AirTicketsController@airTickets');
    Route::get('/manage-destination', 'AirTicketsController@manageDestination');

// Air Ticket Main Start

    Route::post('/add-air-ticket', 'AirTicketsController@addAirTicket');
    Route::get('/add-air-ticket', function () {
        return back();
    });
    Route::post('/update-air-ticket', 'AirTicketsController@updateAirTicket');
    Route::get('/update-air-ticket', function () {
        return back();
    });
    Route::get('/apanel/delete-air-ticket-info/{id}', 'AirTicketsController@deleteAirTicket');



    Route::get('/apanel/view-air-ticket/{id}', 'AirTicketsController@viewAirTicket');

    Route::post('/add-air-ticket-days', 'AirTicketsController@addAirTicketDays');
    Route::get('/add-air-ticket-days', function () {
        return back();
    });
    Route::get('/apanel/delete-air-ticket-day/{id}', 'AirTicketsController@deleteAirTicketDay');



    Route::get('/apanel/delete-air-ticket-main-destination/{id}', 'AirTicketsController@deleteAirTicketMainDestination');
// Air Ticket Main End

// Air Ticket Main Destination Start

    Route::post('/add-air-ticket-destination-main', 'AirTicketsController@addAirTicketDestinationMain');

// Air Ticket Main Destination End

// Air Ticket Destination Start
    Route::post('/add-air-ticket-destination', 'AirTicketDestinationController@addAirTicketDestination');
    Route::get('/add-air-ticket-destination', function () {
        return back();
    });

    Route::post('/update-air-ticket-destination', 'AirTicketDestinationController@updateAirTicketDestination');
    Route::get('/update-air-ticket-destination', function () {
        return back();
    });
    Route::get('/apanel/delete-air-ticket-destination/{id}', 'AirTicketDestinationController@deleteAirTicketDestination')->middleware('superAdmin');
// Air Ticket Destination End
// AirticketsController End


// new GellleryController Start

    Route::get('/apanel/gallery/main-category', 'GelleryController@mainCategory');
    Route::post('/apanel/gallery/add-main-category', 'GelleryController@addMainCategory')->middleware('superAdmin');
    Route::get('/apanel/gallery/add-main-category', function () {
        return back();
    });
    Route::post('/apanel/gallery/update-main-category', 'GelleryController@updateMianCategory');
    Route::get('/apanel/gallery/update-main-category', function () {
        return back();
    });
    Route::get('/apanel/gallery/delete-main-category/{id}', 'GelleryController@deleteMainCategory')->middleware('superAdmin');

    Route::get('/apanel/gallery/sub-category', 'GelleryController@subCategory');
    Route::post('/apanel/gallery/add-sub-category', 'GelleryController@addSubCategory');
    Route::get('/apanel/gallery/add-sub-category', function () {
        return back();
    });
    Route::post('/apanel/gallery/update-sub-category', 'GelleryController@updateSubCategory');
    Route::get('/apanel/gallery/update-sub-category', function () {
        return back();
    });
    Route::get('/apanel/gallery/delete-sub-category/{id}', 'GelleryController@deleteSubCategory')->middleware('superAdmin');

    Route::get('/apanel/gallery/year', 'GelleryController@year');
    Route::post('/apanel/gallery/add-year', 'GelleryController@addYear');
    Route::get('/apanel/gallery/add-year', function () {
        return back();
    });

    Route::post('/apanel/gallery/update-year', 'GelleryController@updateYear');
    Route::get('/apanel/gallery/update-year', function () {
        return back();
    });
    Route::get('/apanel/gallery/delete-year/{id}', 'GelleryController@deleteYear')->middleware('superAdmin');

    Route::get('/apanel/gallery/gallery-image', 'GelleryController@galleryImage');
    Route::get('/gellery-sub-category', 'GelleryController@gellerySubCategory');
    Route::post('/apanel/gallery/add-gallery-image', 'GelleryController@addGalleryImage');
    Route::get('/apanel/new-gallery/delete-gallery-image/{id}', 'GelleryController@deleteGalleryImage');

// new GelleryController End

// pre GelleryController Start


    Route::get('/apanel/gellery', 'GelleryController@gellery');
    Route::post('/add-gellery', 'GelleryController@addGellery');
    Route::get('/add-gellery', function () {
        return back();
    });
    Route::get('/delete-gellery-image/{id}', 'GelleryController@deleteGelleryImage');
//pre  GelleryController End

    // AboutSliderController Start

    Route::get('/about-slider', 'AboutSliderController@aboutSlider');
    Route::post('/add-about-slider', 'AboutSliderController@addAboutSlider');
    Route::get('/add-about-slider', function () {
        return back();
    });
    Route::post('/update-about-slider', 'AboutSliderController@updateAboutSlider');
    Route::get('/update-about-slider', function () {
        return back();
    });
    Route::get('/delete-about-slider/{id}', 'AboutSliderController@deleteAboutSlider');

// AboutSliderController End

// AboutUsController Start

    Route::get('/apanel/about-us', 'AboutUsController@aboutUs');
    Route::post('/apnel/update-about-us', 'AboutUsController@updateAboutUs');
    Route::get('/update-about-slider', function () {
        return back();
    });
    Route::get('/apanel/contact-us', 'ContactUsController@contactUs');
    Route::post('/apanel/update-contact-image', 'ContactUsController@updateContactImage');
    Route::get('/apanel/update-contact-image', function () {
        return back();
    });
// AboutUsController End


// OurTeamController Start

    Route::get('/apanel/our-team-banner', 'OurTeamController@ourTeamBanner');
    Route::post('/apanel/update-our-team-banner', 'OurTeamController@updateOurTeamBanner');
    Route::get('/apanel/update-our-team-banner', function () {
        return back();
    });
    Route::get('/apanel/our-team-staff', 'OurTeamController@ourTeamStaff');
    Route::post('/apanel/add-staff', 'OurTeamController@addStaff');
    Route::get('/apanel/add-staff', function () {
        return back();
    });
    Route::post('/apanel/update-our-team-staff', 'OurTeamController@updateOurTeamStaff');
    Route::get('/apanel/update-our-team-staff', function () {
        return back();
    });
    Route::get('/apanel/delete-our-team-staff/{id}', 'OurTeamController@deleteOurTeamStaff');
// OurTeamController End

// logo Controller Start

    Route::get('/apanel/logo', 'LogoController@logo');
    Route::post('/apanel/update-logo', 'LogoController@updateLogo');
    Route::get('/apanel/update-logo', function () {
        return back();
    });
// Logo Controller End

});

// AdminController Start

Route::middleware(['admin', 'superAdmin'])->group(function () {

    Route::get('/apanel/admin', 'AdminController@showAdmin');
    Route::post('/apanel/register-admin', 'AdminController@registerAdmin');
    Route::get('/apanel/register-admin', function () {
        return back();
    });

    Route::post('/apanel/update-admin', 'AdminController@updateAdmin');
    Route::get('/apanel/delete-admin/{id}', 'AdminController@deleteAdmin');

});


// Login Route Start

Route::get('/cosmosapanel', 'AdminController@showLogin')->middleware('loginPage');
Route::post('/apanel/auth-login', 'AdminController@authLogin');
Route::get('/apanel/auth-login', function () {
    return back();
});
Route::get('/apanel/logout', 'AdminController@logout');
// Login Route End

// AdminController End
