@extends('frontEnd.index')
@section('title') {{$continent->name}} @endsection
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

{{--    @include('frontEnd.includes.searchbar.searchbar')--}}
    <!--====== PLACES ==========-->
    <section>
        <div class="rows inn-page-bg com-colo" style="background-image: url({{asset($continent->background_image)}}); background-size: cover">
            <div style="background-color: transparent" class="container inn-page-con-bg tb-space pad-bot-redu" id="inner-page-title">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title col-md-12">
                    <h2 style="color: white">{{$continent->name}}</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    {{--<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>--}}
                </div>
                <div>
                    <!--====== PACKAGE ==========-->
                    @foreach($con_visas as $con_visa)
                    <div class="col-md-3 col-sm-6 col-xs-12 b_packages zm wow fadeInUp">
                        <a href="{{URL::to('/visa-details/'.$con_visa->id)}}">
                            <div class="zm">
                                {{--<div class="band"><img src="{{asset('cosmos/frontEnd/images/')}}/band.png" alt="" /> </div>--}}
                                <div class="v_place_img sw"><img src="{{asset($con_visa->box_image)}}" alt="{{$con_visa->country_name}}" title="{{$con_visa->country_name}}" /> </div>
                                <div class="b_pack rows sw" style="background-color: #cde9ebf0;">
                                    <div class="col-md-12">
                                        <h4 ><a href="{{URL::to('/visa-details/'.$con_visa->id)}}"><strong><span style="font-size: 15px; color: black" >{{$con_visa->country_name}}</span></strong><span style="font-size: 20px; color: black" class="ho-hot-pri">৳{{$con_visa->price}}</span></a> </h4> </div>
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
