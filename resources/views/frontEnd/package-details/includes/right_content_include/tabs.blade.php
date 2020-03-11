<style>
    .nav-tabs li{
        margin-bottom: 5px;
    }
    .book-tab-inn ul li a {
        background: #253d52;
        color: white;
    }

</style>
<div class="tour_head1">
    <h3>Land Package and Airticket Prices</h3>
    <div class="book-tab-inn" style="width: 100%">
        <ul class="nav nav-tabs" style="margin-bottom: -6px;">
            @foreach($package->packageTabs as $key => $package_tab)
            <li  class="{{$key == 0 ? 'active' : ''}}"><a data-toggle="tab" href="#menutab{{$package_tab->id}}" aria-expanded="true">{{$package_tab->name}}</a></li>
            @endforeach
        </ul>

        <div class="tab-content book-tab-body"; >
            @foreach($package->packageTabs as $key => $package_tab)
            <div id="menutab{{$package_tab->id}}" style="background-color:#f3f3f3;padding-top: 15px; " class="tab-pane fade {{$key == 0 ? 'active' : ''}} in back_{{$key}}">
                <div class="row">
                    @foreach($package_tab->hotels as $hotel)
                    <div class="col-md-6" title="{{$hotel->hotel->name}}">
                        <div class="hot-page2-alp-r-list sw" style="border: 2px solid #25435a87; border-radius: 5px; background-color: #ebeeed ">
                            <div class="col-md-4 hot-page2-alp-r-list-re-sp" style="background-color: #8393a0">
                                <a href="javascript:void(0);">
                                    <div class="" style="height: 118px"> <img style="height: 100%;width: 100%; border-radius: 5px; border: 2px solid #25435a87" src="{{asset($hotel->hotel->box_image)}}" alt="Cosmos Holiday"> </div>
                                </a>
                            </div>
                            <div class="col-md-8" style="background-color: #ebeeed">
                                <div class="hot-page2-alp-ri-p2" style="overflow: hidden">
                                    {{--<a href="hotel-details.html"><h3>Barcelona Grand Pales</h3></a>--}}
                                    <div class="row">
                                        <h4 style="margin: 0">{{str_limit($hotel->hotel->name, 19)}}</h4>
                                        <span class="tour_star">
                                            @for($i = 0; $i < $hotel->hotel->star; $i++ )
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            @endfor
                                        </span>
                                        <h5 style="margin: 0">{{$hotel->hotel->category}}</h5>
                                        <style>
                                            .webzm:hover{
                                                transform: scale(1.04);
                                                position: relative;
                                                transition: all 0.5s ease;


                                            }
                                        </style>
                                        <p class="webzm" title="Visit -{{$hotel->hotel->name}}- Website"><a  href="http://{{$hotel->hotel->web_site}}/" style="margin: 0; color: red">{{$hotel->hotel->web_site}}</a></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="row">
                    <!--====== DISCOUNT ==========-->
                    <style>
                        tr th{
                            font-weight:bold;
                        }
                        tr th, tr td{
                            padding:5px;
                        }
                        .mytable tr th{
                            border: 1px solid black;
                        }
                        .mytable tr td{
                            border: 1px solid black;
                        }
                        .c1{
                            /*background:#4b8c74;*/
                            /*background: #f1334c;*/
                            background: #4b8c740d;

                        }

                    </style>
                    <div style="margin: 16px">
                        <h3 >Land Package Cost</h3>
                        <table class="mytable">
                            <tr>
                                <th colspan="4" class="c1" style=" text-align: center">{{$package_tab->itinerary_title}}</th>
                            </tr>
                            @foreach($package_tab->tabItineraryTitles as $tab_itinerary_title)
                            <tr>
                                <th class="c1" style=" text-align: center">{{$tab_itinerary_title->title}}</th>
                                <th class="c1" style=" text-align: center">{{$tab_itinerary_title->description}}</th>
                                <th class="c1" style=" text-align: center">Land Package Cost</th>
                                <th class="c1" style=" text-align: center">{{$tab_itinerary_title->price}}</th>
                            </tr>
                            @endforeach
                        </table>
                        <br/>
                        <h3 >Air Ticket Price (Approx)</h3>
                        <table class="mytable">
                            <tr>
                                <th colspan="4" class="c1" style=" text-align: center">{{$package_tab->tab_note}}</th>
                            </tr>
                        </table>

                        <br/>
                        <blockquote>
                            <p  style="text-align: justify; color: red;">{{$package_tab->special_note}}</p>
                        </blockquote>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
