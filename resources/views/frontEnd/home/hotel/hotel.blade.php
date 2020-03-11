<section style="margin-top: 80px">
    {{--rows tips tips-home tb-space home_title--}}
    <div class="rows tb-space pad-top-o pad-bot-redu foot-mob-sec">
        <div class="container">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2 class="wow tada">Services</h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                {{--<p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide. Book Hotel rooms and enjoy your holidays with distinctive experience</p>--}}
            </div>
            <!-- HOTEL GRID -->
            <div class="to-ho-hotel">
                <!-- HOTEL GRID -->
                <div class="col-md-3 wow rollIn">
                    <a href="{{URL::to('/visa-country')}}">
                        <div class="to-ho-hotel-con sw zm" style="border-radius: 7px">
                            <div class="to-ho-hotel-con-1">
                                <div class="hot-page2-hli-3"> <img src="{{asset('cosmos/static/hotdeals.jpg')}}" alt=""> </div>
                                <img src="{{asset('cosmos/frontEnd/visa/visa_box.jpg')}}" alt="VISA"> </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="{{URL::to('/visa-country')}}"><h4>VISA</h4></a> </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 wow rollIn">
                    <a href="{{URL::to('/hotel-booking-country')}}">
                        <div class="to-ho-hotel-con sw zm" style="border-radius: 7px">
                            <div class="to-ho-hotel-con-1">
                                <div class="hot-page2-hli-3"> <img src="{{asset($hotel_title->box_image)}}" alt="{{$hotel_title->name}}" title="{{$hotel_title->name}}"> </div>
                                <img src="{{asset($hotel_title->box_image)}}" alt="{{$hotel_title->name}}" title="{{$hotel_title->name}}"> </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="{{URL::to('/hotel-booking-country')}}"><h4>{{$hotel_title->name}}</h4></a> </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 wow rollIn">
                    <a href="{{URL::to('/under-constuction')}}">
                    <div class="to-ho-hotel-con sw zm" style="border-radius: 7px">
                        <div class="to-ho-hotel-con-1">
                            <div class="hot-page2-hli-3"> <img src="{{asset('cosmos/static/transport.png')}}" alt=""> </div>
                            <img src="{{asset('cosmos/static/transport.png')}}" alt="Transport"> </div>
                        <div class="to-ho-hotel-con-23">
                            <div class="to-ho-hotel-con-2"> <a href="{{URL::to('/under-constuction')}}"><h4>Transport</h4></a> </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 wow rollIn">
                    <a href="{{URL::to('/under-constuction')}}">
                    <div class="to-ho-hotel-con sw zm" style="border-radius: 7px">
                        <div class="to-ho-hotel-con-1">
                            <div class="hot-page2-hli-3"> <img src="{{asset('cosmos/static/tours.jpg')}}" alt=""> </div>
                            <img src="{{asset('cosmos/static/tours.jpg')}}" alt="Tours and Attactions"> </div>
                        <div class="to-ho-hotel-con-23">
                            <div class="to-ho-hotel-con-2"> <a href="{{URL::to('/under-constuction')}}"><h4>Tours and Attactions</h4></a> </div>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- HOTEL GRID -->


            </div>
        </div>
    </div>
</section>
