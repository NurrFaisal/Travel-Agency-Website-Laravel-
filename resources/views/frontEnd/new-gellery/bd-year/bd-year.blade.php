@extends('frontEnd.index')
@section('title') Gellery @endsection
@section('mainContent')
    <section style="margin-bottom: 0px;">
        <div class="rows pla pad-bot-redu tb-space">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2 class="wow tada">Cosmos <span>Gellery</span></h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    {{--<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide.</p>--}}
                </div>
                <div>
                    <!-- TOUR PLACE 1 -->
                    @foreach($years as $years)
                        <div class="col-md-3 col-sm-6 col-xs-6 b_packages wow slideInUp" data-wow-duration="0.5s">
                            <!-- OFFER BRAND -->
                            <a href="{{URL::to('/gellery-image-by-bd/'.$staff.'/'.$years->name)}}">
                                <div  class="zm">
                                <!-- IMAGE -->
{{--                                    <div class="v_place_img sw"> <img style="height: 147px" src="{{asset($years->box_image)}}" alt="Tour Booking" title="{{$years->name}}" /> </div>--}}
                                    <!-- TOUR TITLE & ICONS -->
                                    <div class="b_pack rows sw tlg">
                                        <!-- TOUR TITLE -->
                                        <div class="col-md-12 col-sm-12" style="text-align: center">
                                            <h4><a href="{{URL::to('/gellery-image-by-bd/'.$staff.'/'.$years->name)}}">{{$years->name}}</a></h4>
                                        </div>
                                        <!-- TOUR ICONS -->
                                    </div>
                                </div>
                            </a>


                        </div>
                @endforeach
                <!-- TOUR PLACE 2 -->

                    <!-- TOUR PLACE 5 -->

                </div>
            </div>
        </div>
    </section>
@endsection
