<div class="col-md-3 tour_r">
    <!--====== SPECIAL OFFERS ==========-->

<!--====== PACKAGE SHARE ==========-->
    <div class="tour_right head_right tour_social tour-ri-com">
        <h3>Share This Package</h3>
        <ul>
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
            <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
        </ul>
    </div>
    <!--====== HELP PACKAGE ==========-->
    <div class="tour_right head_right tour_help tour-ri-com">
        <h3>Head Office ( Dhanmondi )</h3>
        <div class="tour_help_1">
            <h4 style="font-size: 21px" class="tour_help_1_call">Call Bangladesh Time</h4>
            <p>Please Call at Office Time <br/><strong>10:30</strong> am to <strong>6:00</strong> pm</p>
            @for($i = 0; $i < $arry_len; $i++)
                <h4>(+88) {{$arry[$i]}}</h4>
            @endfor
        </div>

    </div>
    <div class="tour_right head_right tour_help tour-ri-com">
        <h3>Branch Office ( Banani )</h3>
        <div class="tour_help_1">
            <h4 style="font-size: 21px" class="tour_help_1_call">Call Bangladesh Time</h4>
            <p>Please Call at Office Time <br/><strong>10:30</strong> am to <strong>6:00</strong> pm</p>
            @for($i = 0; $i < $arry_len2; $i++)
                <h4>(+88) {{$arry2[$i]}}</h4>
            @endfor
        </div>

    </div>
    <!--====== PUPULAR TOUR PACKAGES ==========-->
    <div class="tour_right tour_rela tour-ri-com">
        <h3>Popular Packages</h3>
        @foreach($releted_packages as $releted_packge)
        <div class="tour_rela_1"> <img src="{{asset($releted_packge->box_image)}}" height="90" alt="{{$releted_packge->name}}" />
            <h4>{{$releted_packge->name}}</h4>
            <p style="text-align: justify">{{str_limit($releted_packge->short_description, 40)}}</p>
            <a href="{{URL::to('/package-detail/'.$releted_packge->id)}}" class="link-btn">View this Package</a>
        </div>
        @endforeach
    </div>
</div>
