<section>
    <div class="rows pla tb-space pad-bot-redu">
        <div class="container">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-6 ">
                        <h2 class="wow tada"><span style=" z-index: 99;">Visa Processing</span> </h2>
                    </div>
                    <div class="col-md-6">
                        <div class="searchDiv" style="float: right;">
                            <form method="post" action="{{URL::to('/home-search-visa')}}" class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control searchInput" placeholder="Search for visa">
                                </div>
                                <button style="background-color: #79cce1; border-color: #0c419a" type="submit" class="btn btn-danger searchBtn">Search</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                {{--<p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide. Book Hotel rooms and enjoy your holidays with distinctive experience</p>--}}
            </div>
            <!-- CITY -->
            @foreach($continents as $continent)
                @if($continent->name == 'Asia')
            <div class="col-md-3 col-sm-6 col-sm-6 wow bounceInLeft">
                <a href="{{URL::to('/continent-country/'.$continent->id)}}">
                    <div class="tour-mig-like-com sw zm">
                        <div class="tour-mig-lc-img"> <img src="{{asset($continent->box_image)}}" alt="{{$continent->name}}"> </div>
                        <div class="tour-mig-lc-con tour-mig-lc-con2">
                            <h5>{{$continent->name}}</h5>
                        </div>
                    </div>
                </a>
            </div>
                    @break
                @endif
            @endforeach
            @foreach($continents as $continent)
                @if($continent->name == 'Europe')
                    <div class="col-md-3 col-sm-6 col-sm-6 wow bounceInLeft">
                        <a href="{{URL::to('/continent-country/'.$continent->id)}}">
                            <div class="tour-mig-like-com sw zm">
                                <div class="tour-mig-lc-img"> <img src="{{asset($continent->box_image)}}" alt="{{$continent->name}}"> </div>
                                <div class="tour-mig-lc-con tour-mig-lc-con2">
                                    <h5>{{$continent->name}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @break
                @endif

            @endforeach
            @foreach($continents as $continent)
                @if($continent->name == 'Australia')
                    <div class="col-md-3 col-sm-6 col-sm-6 wow bounceInLeft">
                        <a href="{{URL::to('/continent-country/'.$continent->id)}}">
                            <div class="tour-mig-like-com sw zm">
                                <div class="tour-mig-lc-img"> <img src="{{asset($continent->box_image)}}" alt="{{$continent->name}}"> </div>
                                <div class="tour-mig-lc-con tour-mig-lc-con2">
                                    <h5>{{$continent->name}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @break
                @endif

            @endforeach
            @foreach($continents as $continent)
                @if($continent->name == 'North America')
                    <div class="col-md-3 col-sm-6 col-sm-6 wow bounceInLeft">
                        <a href="{{URL::to('/continent-country/'.$continent->id)}}">
                            <div class="tour-mig-like-com sw zm">
                                <div class="tour-mig-lc-img"> <img src="{{asset($continent->box_image)}}" alt="{{$continent->name}}"> </div>
                                <div class="tour-mig-lc-con tour-mig-lc-con2">
                                    <h5>{{$continent->name}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @break
                @endif

            @endforeach
            @foreach($continents as $continent)
                @if($continent->name == 'South America')
                    <div class="col-md-3 col-sm-6 col-sm-6 wow bounceInLeft">
                        <a href="{{URL::to('/continent-country/'.$continent->id)}}">
                            <div class="tour-mig-like-com sw zm">
                                <div class="tour-mig-lc-img"> <img src="{{asset($continent->box_image)}}" alt="{{$continent->name}}"> </div>
                                <div class="tour-mig-lc-con tour-mig-lc-con2">
                                    <h5>{{$continent->name}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @break
                @endif

            @endforeach
            @foreach($continents as $continent)
                @if($continent->name == 'Antarctica')
                    <div class="col-md-3 col-sm-6 col-sm-6 wow bounceInLeft">
                        <a href="{{URL::to('/continent-country/'.$continent->id)}}">
                            <div class="tour-mig-like-com sw zm">
                                <div class="tour-mig-lc-img"> <img src="{{asset($continent->box_image)}}" alt="{{$continent->name}}"> </div>
                                <div class="tour-mig-lc-con tour-mig-lc-con2">
                                    <h5>{{$continent->name}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @break
                @endif

            @endforeach
            @foreach($continents as $continent)
                @if($continent->name == 'Africa')
                    <div class="col-md-3 col-sm-6 col-sm-6 wow bounceInLeft">
                        <a href="{{URL::to('/continent-country/'.$continent->id)}}">
                            <div class="tour-mig-like-com sw zm">
                                <div class="tour-mig-lc-img"> <img src="{{asset($continent->box_image)}}" alt="{{$continent->name}}"> </div>
                                <div class="tour-mig-lc-con tour-mig-lc-con2">
                                    <h5>{{$continent->name}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @break
                @endif

            @endforeach
            @if(isset($honourable))
            <div class="col-md-3 col-sm-6 col-sm-6 wow bounceInLeft">
                <a href="{{URL::to('/continent-country/'.$honourable->id)}}">
                    <div class="tour-mig-like-com sw zm">
                        <div class="tour-mig-lc-img"> <img src="{{asset($honourable->box_image)}}" alt="{{$honourable->name}}"> </div>
                        <div class="tour-mig-lc-con tour-mig-lc-con2">
                            <h5>{{$honourable->name}}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endif

        </div>
    </div>
</section>
