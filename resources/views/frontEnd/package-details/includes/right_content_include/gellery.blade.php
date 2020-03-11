

<div class="tour_head1 hotel-book-room">
    <h3 style="margin-top: 10px;margin-bottom: 10px">Photo Gallery</h3>
    <div id="myCarousel1" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators carousel-indicators-1">
            @foreach($package->images as $key => $image)
                <li data-target="#myCarousel1" data-slide-to="{{$key}}"><img src="{{asset($image->gellery_image)}}" alt="{{$package->name}}">
                </li>
            @endforeach

        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner carousel-inner1" role="listbox">
            {{--<div class="item active"> <img src="{{asset('cosmos/frontEnd/images/')}}/gallery/t1.jpg" alt="Chania" width="460" height="345"> </div>--}}
            @foreach($package->images as $key => $image)
                <div class="item {{$key == 0 ? 'active' : ''}}"> <img src="{{asset($image->gellery_image)}}" alt="{{$package->name}}" width="460" height="345"> </div>
            @endforeach
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span> </a>
        <a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1" aria-hidden="true"></i></span> </a>
    </div>
</div>
