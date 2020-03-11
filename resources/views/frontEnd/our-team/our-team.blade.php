@extends('frontEnd.index')
@section('title') Our Team @endsection
@section('mainContent')
    <section>
        <div class="rows inner_banner inner_banner_2" style="background: url({{$our_team_banner->our_team_banner}}); z-index: -1; height: 400px">
            <div class="container">
                <h2><span>- Our Professional Team -</span></h2>
                {{--<p>Book travel packages and enjoy your holidays with distinctive experience</p>--}}
            </div>
        </div>
    </section>

    <section class="tourb2-ab-p-2 com-colo-abou pla">
        <div class="container">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2><span>Our Professional Team</span></h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                {{--<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>--}}
            </div>
            @foreach($our_team_staffs as $our_team_staff)
            <div class="col-md-4">
                <div class="hot-page2-alp-r-list sw" style="border: 2px solid #25435a87; border-radius: 5px; background-color: #ebeeed ">
                    <div class="col-md-4 hot-page2-alp-r-list-re-sp" style="background-color: #8393a0">
                        <a href="javascript:void(0);">
                            <div class="" style="height: 118px"> <img style="height: 100%;width: 100%; border-radius: 5px; border: 2px solid #25435a87" src="{{asset($our_team_staff->image)}}" alt="Cosmos Holiday"> </div>
                        </a>
                    </div>
                    <div class="col-md-8" style="background-color: #ebeeed">
                        <div class="hot-page2-alp-ri-p2" style="overflow: hidden">
                            {{--<a href="hotel-details.html"><h3>Barcelona Grand Pales</h3></a>--}}
                            <div class="row">
                                <h4 style="margin: 0; font-size: 16px;">{{$our_team_staff->name}}</h4>
                                <h5 style="font-size: 13px; margin-bottom: -3px">{{$our_team_staff->designation}}</h5>
                                <h5 style="font-size: 13px; margin-bottom: -3px">+88{{$our_team_staff->phone_number}}</h5>
                                <h5 style="font-size: 13px; margin-bottom: -3px">{{str_limit($our_team_staff->email, 26)}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="background-color: #afc9de">
                        <p style="text-align: center;font-weight: bold; margin-top: 5px; margin-bottom: 5px;">{{$our_team_staff->branch}}</p>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
