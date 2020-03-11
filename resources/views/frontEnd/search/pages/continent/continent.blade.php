@extends('frontEnd.index')
@section('title') {{$search}} @endsection
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
        <div class="rows inn-page-bg pla">
            <div style="background-color: transparent" class="container inn-page-con-bg tb-space pad-bot-redu" id="inner-page-title">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title col-md-12">
                    <h2>{{$search}} Result</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    {{--<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>--}}
                </div>
                <div>
                    @php
                    $continent_len = count($continents);
                    @endphp
                    <!--====== PACKAGE ==========-->
                    @if($continent_len != 0)
                    @foreach($continents as $continent)
                        <div class="col-md-3 col-sm-6 col-xs-12 b_packages zm wow fadeInUp">
                            {{--<a href="{{URL::to('/package-list/'.$country->id.'/'.$packList->id)}}">--}}
                            <a href="{{URL::to('/search-country/'.$continent->id)}}">
                                <div class="zm">
                                    <div class="v_place_img sw"><img src="{{asset($continent->box_image)}}" alt="{{$continent->name}}" title="{{$continent->name}}" /> </div>
                                    <div class="b_pack rows sw" style="background-color: #cde9ebf0;">
                                        <div class="col-md-12" style="text-align: center">
                                            <h4 ><a href="{{URL::to('/seacrch-country/'.$continent->id)}}"><strong>{{$continent->name}}</strong></a> </h4> </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                @endforeach
                @else
                            <div class="row">
                                <h3 style="text-align: center">Data Not Found</h3>
                            </div>
                @endif



                <!--====== PACKAGE ==========-->

                </div>
            </div>
        </div>
    </section>
@endsection
