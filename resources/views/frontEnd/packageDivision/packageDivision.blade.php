@extends('frontEnd.index')
@section('title') {{$packList->name}} in {{$country->name}} @endsection
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

    {{--@include('frontEnd.includes.searchbar.searchbar')--}}
    <!--====== PLACES ==========-->
    <section>
        <div class="rows inn-page-bg com-colo" style="background-image: url({{asset($country->banner_image)}}); background-size: cover">
            <div style="background-color: transparent" class="container inn-page-con-bg tb-space pad-bot-redu" id="inner-page-title">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title col-md-12">
                    <h2 style="color: white;">{{$packList->name}} in {{$country->name}}</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    {{--<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>--}}
                </div>
                <div>
                    <!--====== PACKAGE ==========-->
                    @foreach($divisions as $division)
                    <div class="col-md-3 col-sm-6 col-xs-12 b_packages zm wow fadeInUp">
                        {{--<a href="{{URL::to('/package-list/'.$country->id.'/'.$packList->id)}}">--}}
                        <a href="{{URL::to('/package-list/'.$division->id.'/'.$country->id.'/'.$packList->id)}}">
                            <div class="zm">
                                <div class="v_place_img sw"><img src="{{asset($division->box_image)}}" alt="{{$division->name}}" title="{{$division->name}}" /> </div>
                                <div class="b_pack rows sw" style="background-color: #cde9ebf0;">
                                    <div class="col-md-12" style="text-align: center">
                                        <h4 ><a href="{{URL::to('/package-list/'.$division->id.'/'.$country->id.'/'.$packList->id)}}"><strong>{{$division->name}}</strong></a> </h4> </div>
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
