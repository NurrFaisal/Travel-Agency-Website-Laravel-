<section style="margin-bottom: 0px;">
    <div class="rows pla pad-bot-redu tb-space">
        <div class="container">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2 class="wow tada">Cosmos <span>Packages</span></h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                {{--<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide.</p>--}}
            </div>
            <div>
                <!-- TOUR PLACE 1 -->
                @foreach($packLists as $packList)
                <div class="col-md-3 col-sm-6 col-xs-6 b_packages wow slideInUp" data-wow-duration="0.5s">
                    <!-- OFFER BRAND -->
{{--                    <a href="{{URL::to('/packages/'.$packList->slug)}}">--}}
                    <a href="{{URL::to('/packages-pack-list/'.$packList->id)}}">
                    <div  class="zm">
                        @if($packList->b_status == 1)
                            @if($packList->brand_image != null)
                                <div class="band wow lightSpeedIn"  data-wow-duration="2s"> <img src="{{asset($packList->brand_image)}}" alt="" /> </div>
                        @endif
                    @endif
                    <!-- IMAGE -->
                        <div class="v_place_img sw"> <img src="{{asset($packList->box_image)}}" alt="{{$packList->name}}" title="{{$packList->name}}" /> </div>
                        <!-- TOUR TITLE & ICONS -->
                        <div class="b_pack rows sw tlg">
                            <!-- TOUR TITLE -->
                            <div class="col-md-12 col-sm-12" style="text-align: center">
                                <h4><a href="{{URL::to('/packages/'.$packList->slug)}}">{{$packList->name}}</a></h4>
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
