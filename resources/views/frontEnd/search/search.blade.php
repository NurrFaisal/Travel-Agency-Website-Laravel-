@extends('frontEnd.index')
@section('title') Search @endsection
@section('mainContent')
    <section class="pla hot-page2-pa-sp-top">
        <div class="container">

            <div class="row">
                <div class="hot-page2-alp-con" style="background: transparent;">
                    <!--LEFT LISTINGS-->
                    <div class="col-md-3 hot-page2-alp-con-left">
                        <!--PART 1 : LEFT LISTINGS-->
                        <div class="hot-page2-alp-con-left-1 wow fadeInLeft">
                            <h3>Suggesting Packages</h3> </div>
                        <!--PART 2 : LEFT LISTINGS-->
                        <div class="hot-page2-hom-pre hot-page2-alp-left-ner-notb wow fadeInLeft">
                            <ul>
                                <!--LISTINGS-->
                                @foreach($releted_packages as $releted_package)
                                <li>
                                    <a href="{{URL::to('/package-detail/'.$releted_package->id)}}">
                                        <div class="hot-page2-hom-pre-1 hot-page2-alp-cl-1-1"> <img src="{{asset($releted_package->box_image)}}/" alt="{{$releted_package->name}}" title="{{$releted_package->name}}"> </div>
                                        <div class="hot-page2-hom-pre-2 hot-page2-alp-cl-1-2">
                                            <h5>{{$releted_package->location}}</h5> <span style="text-align: justify">{{str_limit($releted_package->short_description, 40)}}</span> </div>
                                        <div class="hot-page2-hom-pre-3 hot-page2-alp-cl-1-3"> </div>
                                    </a>
                                </li>
                                @endforeach
                                <!--LISTINGS-->

                            </ul>
                        </div>
                    </div>
                    <!--END LEFT LISTINGS-->
                    <!--RIGHT LISTINGS-->
                    <div class="col-md-9 hot-page2-alp-con-right">
                        <div class="hot-page2-alp-con-right-1">
                            <!--LISTINGS-->
                            <div class="row">
                                <!--LISTINGS START-->
                                    @php
                                    $package_array_len = count($packages)
                                    @endphp
                                @if($package_array_len != 0)
                                @foreach($packages as $package)
                                    <div class="hot-page2-alp-r-list sw wow fadeInUp">
                                        <div class="col-md-3 hot-page2-alp-r-list-re-sp">
                                            <a href="javascript:void(0);">
                                                {{--<div class="hotel-list-score">4.5</div>--}}
                                                <div class="hot-page2-hli-1"> <img src="{{asset($package->box_image)}}" alt="{{$package->name}}"> </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="trav-list-bod">
                                                <a href="{{URL::to('/package-detail/'.$package->id)}}"><h3>{{$package->name}}</h3></a>
                                                <p>{{$package->short_description}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
                                                {{--<div class="hot-page2-alp-r-hot-page-rat">25%Off</div> --}}
                                                <span class="hot-list-p3-1">Prices Starting</span> <span class="hot-list-p3-2">BDT {{$package->price}}</span><span class="hot-list-p3-4">
												<a href="{{URL::to('/package-detail/'.$package->id)}}" class="hot-page2-alp-quot-btn">View Details</a>
											</span> </div>
                                        </div>
                                        <div>
                                            <div class="trav-ami">
                                                <h4>Detail and Includes</h4>
                                                <ul>
                                                    <li><img src="{{asset('cosmos/frontEnd/images/')}}/icon/a14.png" alt="Cosmos Holiday"> <span>Sightseeing</span></li>
                                                    <li><img src="{{asset('cosmos/frontEnd/images/')}}/icon/a15.png" alt="Cosmos Holiday"> <span>Hotel</span></li>
                                                    <li><img src="{{asset('cosmos/frontEnd/images/')}}/icon/a16.png" alt="Cosmos Holiday"> <span>Transfer</span></li>
                                                    <li><img src="{{asset('cosmos/frontEnd/images/')}}/icon/a17.png" alt="Cosmos Holiday"> <span>Luggage</span></li>
                                                    <li><img src="{{asset('cosmos/frontEnd/images/')}}/icon/a18.png" alt="Cosmos Holiday"> <span>Duration {{$package->duration}}</span></li>
                                                    <li><img src="{{asset('cosmos/frontEnd/images/')}}/icon/a19.png" alt="Cosmos Holiday"> <span>Location : {{$package->location}}</span></li>
                                                    <li><img src="{{asset('cosmos/frontEnd/images/')}}/icon/dbl4.png" alt="Cosmos Holiday"> <span>Stay Plan</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @else
                                    <div class="row">
                                        <h3 style="text-align: center">Data Not Found</h3>
                                    </div>>
                                @endif



                            </div>

                        </div>
                    </div>
                    <!--END RIGHT LISTINGS-->
                </div>
            </div>

        </div>
        </br>
    </section>

@endsection
