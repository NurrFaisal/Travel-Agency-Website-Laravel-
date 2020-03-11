<section>
    <div class="ed-mob-menu" style="background-color: #f2fafd; box-shadow: 0 4px 15px 0 #1aa5d8;">
        <div class="ed-mob-menu-con">
            <div class="ed-mm-left">
                <div class="wed-logo wow tada">
                    <a href="{{URL::to('/')}}"><img  style="height: 95px; width: 205px" src="{{asset($logo->image)}}" alt="Cosmos Holiday" />
                    </a>
                </div>
            </div>
            <div class="ed-mm-right">
                <div class="ed-mm-menu">
                    <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                    <div class="ed-mm-inn">
                        <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                        <h4>Pages</h4>
                        <ul>
                            <li><a href="{{URL::to('/')}}">Home</a></li>
                            <li><a href="{{URL::to('/about-us')}}">About</a></li>
                            <li><a href="{{URL::to('/gellery')}}">Gallery</a></li>
                            <li><a href="{{URL::to('/contact-us')}}">Contact Us</a></li>
                        </ul>
                        <h4>Packages</h4>
                        <ul>
                            @foreach($packLists as $packList)
                            <li><a href="{{URL::to('/packages/'.$packList->slug)}}">{{$packList->name}}</a></li>
                            @endforeach
                        </ul>
                        <h4>VISA</h4>
                        <ul>
                            @foreach($continents as $continent)
                            <li><a href="{{URL::to('/continent-country/'.$continent->id)}}">{{$continent->name}}</a></li>
                            @endforeach
                        </ul>
                        <h4>Air Ticket</h4>
                        <ul>
                            @foreach($air_ticket_titles as $air_ticket_title)
                            <li><a href="{{URL::to('/air-ticket/'.$air_ticket_title->id.'/'.$air_ticket_title->slug)}}">{{$air_ticket_title->name}}</a></li>
                            @endforeach
                        </ul>
                        <h4>Others</h4>
                        <ul>
                            <li><a href="{{URL::to('/visa-country')}}">VISA</a></li>
                            <li><a href="{{URL::to('/hotel-booking-country')}}">Hotel Booking</a></li>
                            <li><a href="{{URL::to('/under-constuction')}}">Transport</a></li>
                            <li><a href="{{URL::to('/under-constuction')}}">Tours and Acttactions</a></li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--HEADER SECTION-->
<section>
    <!-- TOP BAR -->


    <!-- LOGO AND MENU SECTION -->
    <div class="top-logo" data-spy="affix" data-offset-top="250" style="background-color: #f2fafd; box-shadow: 0 4px 15px 0 #1aa5d8;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wed-logo wow tada">
                        <a href="{{URL::to('/')}}"><img style="height: 95px; width: 205px" src="{{asset($logo->image)}}" alt="" />
                        </a>
                    </div>
                    <div class="main-menu" style="z-index: 99">
                        <ul class="note-menu" style="padding: 0px">
                            <li><a href="{{URL::to('/')}}">Home</a></li>
                            <li class="about-menu">
                                <a href="#" class="mm-arr">Services</a>
                                <!-- MEGA MENU 1 -->
                                <div class="mm-pos">
                                    <div class="about-mm m-menu">
                                        <div class="m-menu-inn">
                                            <div class="mm1-com mm1-s1">
                                                <h4 style="text-align: center">Packages</h4>
                                                <ul>
                                                    @foreach($packLists as $packList)
                                                    <li><a href="{{URL::to('/packages/'.$packList->slug)}}">{{$packList->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="mm1-com mm1-s2">
                                                <h4 style="text-align: center">VISA</h4>
                                                <ul>
                                                    @foreach($continents as $continent)
                                                    <li><a href="{{URL::to('/continent-country/'.$continent->id)}}">{{$continent->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="mm1-com mm1-s3">
                                                <h4 style="text-align: center">Air Tickets</h4>
                                                <ul>
                                                    @foreach($air_ticket_titles as $air_ticket_title)
                                                    <li><a href="{{URL::to('/air-ticket/'.$air_ticket_title->id.'/'.$air_ticket_title->slug)}}">{{$air_ticket_title->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="mm1-com mm1-s4">
                                                <h4 style="text-align: center">Others</h4>
                                                <ul>
                                                    <li><a href="{{URL::to('/visa-country')}}">VISA</a></li>
                                                    <li><a href="{{URL::to('/hotel-booking-country')}}">Hotel Booking</a></li>
                                                    <li><a href="{{URL::to('/under-constuction')}}">Transport</a></li>
                                                    <li><a href="{{URL::to('/under-constuction')}}">Tours ans Attactions</a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="{{URL::to('/about-us')}}">About Us</a></li>
                            <li><a href="{{URL::to('/our-team')}}">Our Team</a></li>
                            <li><a href="{{URL::to('/gellery')}}">Gallery</a></li>
                            <li><a href="{{URL::to('/contact-us')}}">Contact Us</a></li>
                            <li class="notelisearch">
                                <form method="post" action="{{URL::to('/search')}}" class="navbar-form navbar-left" role="search">
                                    <div class="form-group">
                                        <input style="width: 200px;" type="text" name="search" class="form-control note-search" placeholder="Search for all">
                                    </div>
                                    <button style="background-color: #79cce1; border-color: #0c419a" type="submit" class="btn btn-danger">Search</button>
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TOP SEARCH BOX -->

    <!-- END TOP SEARCH BOX -->
</section>
