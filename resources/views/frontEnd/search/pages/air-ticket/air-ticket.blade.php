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
    <!--====== PLACES ==========-->
    <section>
        <div class="rows inn-page-bg com-colo pla">
            <div style="background-color: transparent" class="container inn-page-con-bg tb-space pad-bot-redu" id="inner-page-title">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title col-md-12">
                    <h2 >{{$search}} Result</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    {{--<p style="color:white"><strong>Please Select Your Destination Country to Book Your Preferred Hotel</strong></p>--}}
                </div>
                <div>
                    @php
                    $air_ticket_destinations_len = count($air_ticket_destinations);
                    @endphp
                    <!--====== PACKAGE ==========-->
                    @if($air_ticket_destinations_len != 0)
                    @foreach($air_ticket_destinations as $air_ticket_destination)
                        @if($air_ticket_destination->status == 1)
                        <div class="col-md-3 col-sm-6 col-xs-12 b_packages zm wow fadeInUp">
                            {{--<a href="{{URL::to('/package-list/'.$country->id.'/'.$packList->id)}}">--}}
                            <a href="{{URL::to('/air-ticket-list/'.$air_ticket_destination->id)}}">
                                <div class="zm">
                                    <div class="v_place_img sw"><img src="{{asset($air_ticket_destination->box_image)}}" alt="{{$air_ticket_destination->name}}" title="Tour {{$air_ticket_destination->name}}" /> </div>
                                    <div class="b_pack rows sw" style="background-color: #cde9ebf0;">
                                        <div class="col-md-12" style="text-align: center">
                                            <h4 ><a href="{{URL::to('/air-ticket-list/'.$air_ticket_destination->id)}}"><strong>{{$air_ticket_destination->name}}</strong></a> </h4> </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                                @else
                                    <div class="row">
                                        <h3 style="text-align: center">Data Not Found</h3>
                                    </div>
                            @break
                                @endif
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
