@extends('frontEnd.index')
@section('title') Hotel of {{$city->name}} @endsection
@section('mainContent')
    <section class="hot-page2-alp hot-page2-pa-sp-top all-hot-bg" style="background-image: url({{asset($city->banner_image)}}); background-size: cover">
        <div class="container">
            <div class="row inner_banner inner_banner_3 bg-none" >
                <div class="hot-page2-alp-tit">
                    <h1>Hotel Booking in {{$city->name}} </h1>
                    <p style="color: white"><strong>Please Choose Your Preferred Hotel.</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="hot-page2-alp-con" style="background: transparent;">
                    <!--LEFT LISTINGS-->
                    <div class="col-md-3 hot-page2-alp-con-left">
                        <!--PART 1 : LEFT LISTINGS-->
                        <div class="hot-page2-alp-con-left-1">
                            <h3>Suggesting Hotels</h3> </div>
                        <!--PART 2 : LEFT LISTINGS-->
                        <div class="hot-page2-hom-pre hot-page2-alp-left-ner-notb">
                            <ul>
                                <!--LISTINGS-->
                                @foreach($releted_hotels as $releted_hotel)
                                <li>
                                    <a href="#">
                                        <div class="hot-page2-hom-pre-1 hot-page2-alp-cl-1-1"> <img src="{{asset($releted_hotel->box_image)}}" alt="{{$releted_hotel->name}}"> </div>
                                        <div class="hot-page2-hom-pre-2 hot-page2-alp-cl-1-2">
                                            <h5>{{$releted_hotel->name}}</h5>
                                            <span>Country: {{$releted_hotel->countryf->name}}</span>
                                        </div>
                                        <div class="hot-page2-hom-pre-3 hot-page2-alp-cl-1-3"></div>
                                    </a>
                                </li>
                                @endforeach
                                <!--LISTINGS-->
                            </ul>
                        </div>
                        <!--PART 7 : LEFT LISTINGS-->

                        <!--PART 4 : LEFT LISTINGS-->

                        <!--END PART 4 : LEFT LISTINGS-->
                        <!--PART 5 : LEFT LISTINGS-->

                        <!--END PART 5 : LEFT LISTINGS-->
                        <!--PART 6 : LEFT LISTINGS-->

                        <!--END PART 5 : LEFT LISTINGS-->
                        <!--PART 6 : LEFT LISTINGS-->

                        <!--END PART 7 : LEFT LISTINGS-->
                    </div>
                    <!--END LEFT LISTINGS-->
                    <!--RIGHT LISTINGS-->

                    <div class="col-md-9 hot-page2-alp-con-right">
                        <div class="hot-page2-alp-con-right-1">
                            <!--LISTINGS-->
                            <div class="row">
                                <!--LISTINGS START-->
                                @foreach($hotels as $hotel)
                                <div class="hot-page2-alp-r-list sw">
                                    <div class="col-md-3 hot-page2-alp-r-list-re-sp">
                                        <a href="javascript:void(0);">
                                            {{--<div class="hotel-list-score">4.5</div>--}}
                                            <div class="hot-page2-hli-1"> <img style="width: 209px; height: 179px" src="{{asset($hotel->box_image)}}" alt="{{$hotel->name}}"> </div>
                                            {{--<div class="hom-hot-av-tic hom-hot-av-tic-list"> Available Rooms: 42 </div>--}}
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="hot-page2-alp-ri-p2"> <a href="#"><h3 style="margin-bottom: -4px">{{str_limit($hotel->name,20)}} &nbsp <span class="tour_star">@for($i=0; $i<$hotel->star; $i++)<i class="fa fa-star" aria-hidden="true"></i> @endfor</span></h3></a>
                                            <h4 style="color: #3cb4d2; margin-bottom: -6px;">{{$hotel->category}}</h4>                                            <ul>
                                                <li style="margin-bottom: -5px;">{{$hotel->address}}, {{$city->name}}.</li>
                                            </ul>
                                            <a href="http://{{$hotel->web_site}}/" style="color: red">{{$hotel->web_site}}</a>
                                            <h5 style="margin-top: 3px;">{{$hotel->facilities}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="hot-page2-alp-ri-p3">
                                            <div class="hot-page2-alp-r-hot-page-rat">{{$hotel->discount}}%Off</div>
                                            <span class="hot-list-p3-1">Price Per Night</span>
                                            <div class="row">
                                                <h3 class="hot-list-p3-2" style="text-align: center">{{$hotel->price}} BDT</h3>
                                            </div>
                                            <span class="hot-list-p3-4">
												<a href="#" class="hot-page2-alp-quot-btn">Call & Book Now</a>
											</span> </div>
                                    </div>
                                    <div class="col-md-12">
                                            <p style="text-align: justify; margin-top: -9px; margin-bottom: 5px">{{$hotel->note}}</p>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="row" style="margin-left: 40%;">
                                {{ $hotels->render() }}
                            </div>
                        </div>
                    </div>
                    <!--END RIGHT LISTINGS-->
                </div>
            </div>
        </div>
        <br/>
    </section>

@endsection
