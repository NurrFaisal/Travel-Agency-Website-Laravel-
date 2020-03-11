<section style="margin-bottom: -81px">
    <div class="rows pad-bot-redu tb-space " style='background-image: url("bgair2.jpg"); background-size: cover; box-shadow: inset 0 0 0 2000px rgba(4, 10, 120, 0.08);'>
        <div class="container">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2 class="wow tada">Air Tickets</h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                {{--<p style="text-align: center">World's leading tour and travels Booking website,Over 30,000 packages worldwide.</p>--}}
            </div>
            <div>
                <!-- TOUR PLACE 1 -->
                @foreach($air_ticket_titles as $air_ticket_title)
                <div class="col-md-3 col-sm-6 col-xs-12 b_packages wow slideInUp" data-wow-duration="0.5s">
                    <!-- OFFER BRAND -->
                    {{--<div class="band"> <img src="{{asset('cosmos/frontEnd/images/')}}/band.png" alt="" /> </div>--}}
                    <!-- IMAGE -->

                    <a href="{{URL::to('/air-ticket/'.$air_ticket_title->id.'/'.$air_ticket_title->slug)}}">
                        <div class="zm">


                        <div class="v_place_img sw "> <img src="{{asset($air_ticket_title->box_image)}}" alt="{{$air_ticket_title->name}}" title="{{$air_ticket_title->name}}" /> </div>
                        <!-- TOUR TITLE & ICONS -->
                        <div class="b_pack rows sw tlb">
                            <!-- TOUR TITLE -->
                            <div class="col-md-12 col-sm-12"  style="text-align: center">
                                <h4><a href="{{URL::to('/air-ticket/'.$air_ticket_title->id.'/'.$air_ticket_title->slug)}}">{{$air_ticket_title->name}}</a></h4>
                            </div>
                            <!-- TOUR ICONS -->
                        </div>
                        </div>
                    </a>

                </div>
                @endforeach

                <!-- TOUR PLACE 5 -->

            </div>
        </div>
    </div>
</section>
