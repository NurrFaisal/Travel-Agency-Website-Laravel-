@extends('frontEnd.index')
@section('title') About US @endsection
@section('mainContent')
    <section>
        <div>
            <div>
                <div>
                    <div class="slider fullscreen" style="z-index: -1; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                        <ul class="slides">
                            @foreach($sliders as $slider)
                                <li> <img style="height: 550px" src="{{asset($slider->image)}}" alt="">
                                    <!-- random image -->
                                    <div class="caption center-align slid-cap">
                                        {{--<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>--}}
                                        {{--<h3>{{$slider->name}}</h3>--}}
                                        {{--<p>Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis at.Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>--}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tourb2-ab-p-2 com-colo-abou">
        <div class="container">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2><span>About Us</span></h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                {{--<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>--}}
            </div>
            <div class="row tourb2-ab-p1">
                <div class="col-md-12 col-sm-12">
                    <div class="tourb2-ab-p1-left">
{{--                        <h3>Hi! Welcome to Cosmos Holiday</h3><br/>--}}
                        <div style="text-align: justify">{!! $about_us->about_us !!}</div>
                        {{--<p style="text-align: justify">Aliquam blandit nisl sem. Mauris quis enim purus. Vivamus nec tortor bibendum risus placerat vulputate at gravida ante. Nam sit amet tellus enim. Phasellus consectetur porttitor lobortis. Integer cursus odio at mattis porttitor. In hac habitasse platea dictumst. Nunc sit amet cursus felis. Etiam venenatis auctor metus, et lacinia elit dignissim non. Aenean auctor semper erat porta dictum.</p>--}}
                        {{--<a href="#" class="link-btn">Call to us: 13654 87898</a> </div>--}}
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
