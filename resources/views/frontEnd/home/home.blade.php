@extends('frontEnd.index')
@section('title') Home @endsection
@section('mainContent')

    @include('frontEnd.includes.slider.slider')
    <!--END HEADER SECTION-->

    {{--@include('frontEnd.home.afterSlider.afterSliderImage')--}}


    @include('frontEnd.home.packages.packages')

{{--    @include('frontEnd.home.visa.visa')--}}

    @include('frontEnd.home.air-tickets.air-tickets')

    @include('frontEnd.home.hotel.hotel')

    @include('frontEnd.home.packages.packages3')
@endsection
