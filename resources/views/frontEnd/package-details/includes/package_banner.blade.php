<section>
    <div class="rows inner_banner " style="background: url({{asset($package->banner_image)}}); z-index: -1;">
        <div class="container">
            <h2 ><span style="color: {{$package->name_color}}">- {{$package->name}} -</span> {{$package->category->name}} </h2>
            <p style="color: {{$package->short_description_color}}">{{$package->short_description}}</p>
        </div>
    </div>
</section>

<!--====== TOUR DETAILS - BOOKING ==========-->
<section>
    <div class="rows banner_book" id="inner-page-title">
        <div class="container">
            <div class="banner_book_1">
                <ul>
                    <li class="dl1">Location : {{$package->location}}</li>
                    <li class="dl2">Price : {{$package->price}} BDT</li>
                    <li class="dl3">Duration : {{$package->duration}}</li>
                    <li class="dl4"><a href="{{URL::to('/book-package/'.$package->id)}}">Appoint Now</a> </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--====== TOUR DETAILS ==========-->
