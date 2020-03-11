<section>
    <div class="rows pla pad-bot-redu tb-space">
        <div class="pla1 p-home container">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title spe-title-1">
                <h2 class="wow tada"><span>Last Update </span><span>Packages</span> </h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                {{--<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>--}}
            </div>
            <div class="popu-places-home">
                <!-- POPULAR PLACES 1 -->
                @foreach($packages as $package)
                <div class="col-md-6 col-sm-6 col-xs-12 place wow bounceInDown">
                    <div class="col-md-6 col-sm-12 col-xs-12"><a href="{{URL::to('/package-detail/'.$package->id)}}"> <img class="sw zm" width="234" height="210" src="{{asset($package->box_image)}}" alt="{{$package->name}}" /> </a></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <a href="{{URL::to('/package-detail/'.$package->id)}}"><h3><span>{{$package->category->name}}</span>{{str_limit($package->name, 20)}}</h3></a>
                        <p>{{str_limit($package->short_description, 80)}}</p> <a href="{{URL::to('/package-detail/'.$package->id)}}" class="link-btn">more info</a> </div>
                </div>
                @endforeach
                <!-- POPULAR PLACES 2 -->

            </div>

        </div>
    </div>
</section>
