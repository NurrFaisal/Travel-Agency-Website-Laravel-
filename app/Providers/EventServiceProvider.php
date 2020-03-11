<?php

namespace App\Providers;

use App\Events\airTicketTitle\AirTicketTitleCreated;
use App\Events\airTicketTitle\AirTicketTitleDeleted;
use App\Events\airTicketTitle\AirTicketTitleUpdated;
use App\Events\contact\ContactUpdated;
use App\Events\continent\ContinentCreated;
use App\Events\continent\ContinentDeleted;
use App\Events\continent\ContinentUpdated;
use App\Events\FooterImageCreated;
use App\Events\FooterImageDeleted;
use App\Events\FooterImageUpdated;
use App\Events\FooterPhoneNumber\FooterPhoneNumberCreated;
use App\Events\FooterPhoneNumber\FooterPhoneNumberDeleted;
use App\Events\FooterPhoneNumber\FooterPhoneNumberUpdated;
use App\Events\hotel_title\HotelTitleUpdated;
use App\Events\ifram\IframUpdated;
use App\Events\logo\LogoUpdated;
use App\Events\package\PackageCreated;
use App\Events\package\PackageDeleted;
use App\Events\package\PackageUpdated;
use App\Events\packList\PackListCreated;
use App\Events\packList\PackListDeleted;
use App\Events\packList\PackListUpdated;
use App\Events\slider\SliderCreated;
use App\Events\slider\SliderDeleted;
use App\Events\slider\SliderUpdated;
use App\Listeners\AirTicketTitleCacheListener;
use App\Listeners\ContactCacheListener;
use App\Listeners\ContinentCacheListener;
use App\Listeners\FooterImageCacheListener;
use App\Listeners\FooterPhoneNumberCacheListener;
use App\Listeners\HotelTitleCacheListener;
use App\Listeners\IframCacheListener;
use App\Listeners\LogoCacheListener;
use App\Listeners\PackageCacheListener;
use App\Listeners\PackListCacheListener;
use App\Listeners\SliderCacheListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        FooterImageCreated::class => [
            FooterImageCacheListener::class,
            ],
        FooterImageUpdated::class => [
            FooterImageCacheListener::class,
        ],
        FooterImageDeleted::class => [
            FooterImageCacheListener::class,
        ],

        FooterPhoneNumberCreated::class => [
            FooterPhoneNumberCacheListener::class,
        ],
        FooterPhoneNumberUpdated::class => [
            FooterPhoneNumberCacheListener::class,
        ],
        FooterPhoneNumberDeleted::class => [
            FooterPhoneNumberCacheListener::class,
        ],

        IframUpdated::class => [
            IframCacheListener::class,
        ],

        ContactUpdated::class => [
            ContactCacheListener::class,
        ],

        AirTicketTitleCreated::class => [
            AirTicketTitleCacheListener::class,
        ],
        AirTicketTitleUpdated::class => [
            AirTicketTitleCacheListener::class,
        ],
        AirTicketTitleDeleted::class => [
            AirTicketTitleCacheListener::class,
        ],

        ContinentCreated::class => [
            ContinentCacheListener::class,
        ],
        ContinentUpdated::class => [
            ContinentCacheListener::class,
        ],
        ContinentDeleted::class => [
            ContinentCacheListener::class,
        ],


        PackListCreated::class => [
            PackListCacheListener::class,
        ],
        PackListUpdated::class => [
            PackListCacheListener::class,
        ],
        PackListDeleted::class => [
            PackListCacheListener::class,
        ],

        LogoUpdated::class => [
            LogoCacheListener::class,
        ],

        SliderCreated::class => [
            SliderCacheListener::class
        ],
        SliderUpdated::class => [
            SliderCacheListener::class
        ],
        SliderDeleted::class => [
            SliderCacheListener::class
        ],

        PackageCreated::class => [
            PackageCacheListener::class,
        ],
        PackageUpdated::class => [
            PackageCacheListener::class,
        ],
        PackageDeleted::class => [
            PackageCacheListener::class,
        ],

        HotelTitleUpdated::class => [
            HotelTitleCacheListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
