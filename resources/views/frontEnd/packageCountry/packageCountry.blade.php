@extends('frontEnd.index')
@section('title') {{$packList->name}} in {{$continent->name}} @endsection
@section('mainContent')
    <style>
        .inner_banner::before {
            content: '';
            position: absolute;
            background: linear-gradient(to top, rgba(29, 36, 42, 0) 15%, rgba(0, 0, 0, 0) 100%);
            top: 0px;
            bottom: 0px;
            left: 0px;
            width: 100%;
        }
    </style>
    {{--<section>--}}
        {{--<div class="rows inner_banner" style="background-image: url('bgvisa5.png'); background-size: cover; box-shadow:inset 0 0 0 2000px #9ac3d740;">--}}
            {{--<div class="container">--}}
                {{--<h2 style="color: black">- Regular Package -</h2>--}}
                {{--<ul>--}}
                    {{--<li><a href="#inner-page-title">Home</a>--}}
                    {{--</li>--}}
                    {{--<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>--}}
                    {{--<li><a href="#inner-page-title" class="bread-acti">Sight Seeing</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<p style="color: black">Book travel packages and enjoy your holidays with distinctive experience</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--@include('frontEnd.includes.searchbar.searchbar')--}}
    <!--====== PLACES ==========-->
    <section>
        <div class="rows inn-page-bg com-colo" style="background-image: url({{asset($continent->background_image)}}); background-size: cover">
            <div style="background-color: transparent" class="container inn-page-con-bg tb-space pad-bot-redu" id="inner-page-title">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title col-md-12">
                    <h2 style="color: white">{{$packList->name}} in {{$continent->name}}</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    {{--<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>--}}
                </div>
                <div>
                    <!--====== PACKAGE ==========-->
                    @foreach($countries as $country)
                    <div class="col-md-3 col-sm-6 col-xs-12 b_packages zm wow fadeInUp">
                        {{--<a href="{{URL::to('/package-list/'.$country->id.'/'.$packList->id)}}">--}}
                        <a href="{{URL::to('/package-division/'.$country->id.'/'.$packList->id)}}">
                            <div class="zm">
                                <div class="v_place_img sw"><img src="{{asset($country->image)}}" alt="{{$country->name}}" title="{{$country->name}}" /> </div>
                                <div class="b_pack rows sw" style="background-color: #cde9ebf0;">
                                    <div class="col-md-12" style="text-align: center">
                                        <h4 ><a href="{{URL::to('/package-division/'.$country->id.'/'.$packList->id)}}"><strong>{{$country->name}}</strong></a> </h4> </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach


                    <!--====== PACKAGE ==========-->

                </div>
            </div>
        </div>
    </section>
@endsection
