



<div class="col-md-9">
    <!--====== TOUR TITLE ==========-->
    <style>
        .tableCountry tr td{
            border: 1px solid black;
        }
    </style>
    <div class="no-print">
        <div class="tour_head">
            <h2>{{$package->name}} <span style="color: #3cb4d2; font-size: 20px"><strong>( Code : {{$package->code }} )</strong></span> </h2>
        </div>
        <!--====== TOUR DESCRIPTION ==========-->

        <div class="tour_head1">
            <div class="book-tab-inn" style="width: 100%">
                <ul class="nav nav-tabs" style="margin-bottom: -6px;">
                    @foreach($package->packageCountries as $key => $country)
                        @if($country->country->id != 42)
                        @if($country->country->id != 43)
                        @if($country->country->id != 44)
                        @if($country->country->id != 45)
                        <li class="{{$key == 0 ? 'active' : ''}}"><a data-toggle="tab" href="#menu{{$country->country->id}}" aria-expanded="true">{{$country->country->name}}</a></li>
                        @endif
                        @endif
                        @endif
                        @endif
                    @endforeach
                </ul>

                <div class="tab-content book-tab-body"; >
                    @foreach($package->packageCountries as $key => $country)
                        @if($country->country->id != 42)
                        @if($country->country->id != 43)
                        @if($country->country->id != 43)
                        @if($country->country->id != 45)
                        <div id="menu{{$country->country->id}}" style="background-color:#f3f3f3;padding-top: 15px; " class="tab-pane fade {{$key == 0 ? 'active' : ''}} in back_{{$key}}">
                            <div class="row sw" style="background-color: #f3f3f3; margin-top: 25px;margin: 5px;">
                                <div class="col-md-8" style="padding: 0; margin-bottom: -20px;">
                                    <table class="tableCountry table table-sm " style="font-size:88%; background-color: #f3f3f3">
                                        <tr>
                                            <td style="text-align: center; padding: 0px; color: black" colspan="2" >
                                                <h5 style="margin: 5px">{{$country->country->name}}</h5>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td style="text-align: center; padding: 0px; color: black" >
                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-5" style="font-size: 10px;font-weight: bold;">Capital</div>
                                                    <div class="col-md-2">:</div>
                                                    <div class="col-md-5" style="font-size: 10px;font-weight: bold;">{{$country->country->capital}}</div>
                                                </div>
                                            </td>
                                            <td style="text-align: center; padding: 0px; color: black" >
                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-5" style="font-size: 10px;font-weight: bold;">Languages</div>
                                                    <div class="col-md-2">:</div>
                                                    <div class="col-md-5" style="font-size: 10px;font-weight: bold;">{{$country->country->languages}}</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center; padding: 0px; color: black" >
                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-5" style="font-size: 10px;font-weight: bold;">Area</div>
                                                    <div class="col-md-2">:</div>
                                                    <div class="col-md-5" style="font-size: 10px;font-weight: bold;">{{$country->country->area}}</div>
                                                </div>
                                            </td>
                                            <td style="text-align: center; padding: 0px; color: black" >
                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-5"  style="font-size: 10px;font-weight: bold;">Population</div>
                                                    <div class="col-md-2">:</div>
                                                    <div class="col-md-5"  style="font-size: 10px;font-weight: bold;">{{$country->country->porulation}}</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center; padding: 0px; color: black" >
                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-5"  style="font-size: 10px;font-weight: bold;">Currency</div>
                                                    <div class="col-md-2">:</div>
                                                    <div class="col-md-5"  style="font-size: 10px;font-weight: bold;">{{$country->country->currency}}</div>
                                                </div>
                                            </td>
                                            <td style="text-align: center; padding: 0px; color: black" >
                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-5" style="font-size: 10px;font-weight: bold;">Time Zone</div>
                                                    <div class="col-md-2">:</div>
                                                    <div class="col-md-5"  style="font-size: 10px;font-weight: bold;">UTC {{$country->country->time_zone}}</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center; padding: 0px; color: black" >
                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-5"  style="font-size: 10px;font-weight: bold;">Calling Code</div>
                                                    <div class="col-md-2">:</div>
                                                    <div class="col-md-5"  style="font-size: 10px;font-weight: bold;">{{$country->country->calling_code}}</div>
                                                </div>
                                            </td>
                                            <td style="text-align: center; padding: 0px; color: black" >
                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-5"  style="font-size: 10px;font-weight: bold;">Date Formate</div>
                                                    <div class="col-md-2">:</div>
                                                    <div class="col-md-5"  style="font-size: 10px;font-weight: bold;">{{$country->country->date_formate}}</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center; padding: 0px; color: black" >
                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-5"  style="font-size: 10px;font-weight: bold;"> Independent</div>
                                                    <div class="col-md-2">:</div>
                                                    <div class="col-md-5"  style="font-size: 10px;font-weight: bold;" >{{$country->country->independent}}</div>
                                                </div>
                                            </td>
                                            <td style="text-align: center; padding: 0px; color: black" >
                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-5"  style="font-size: 10px;font-weight: bold;">Victory</div>
                                                    <div class="col-md-2">:</div>
                                                    <div class="col-md-5" style="font-size: 10px;font-weight: bold;">{{$country->country->victory}}</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center; padding: 0px; color: black" colspan="2" >
                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-2"  style="font-size: 10px;font-weight: bold;">Religion</div>
                                                    <div class="col-md-2">:</div>
                                                    <div class="col-md-8"  style="font-size: 10px;font-weight: bold;">{{$country->country->religion}}</div>
                                                </div>
                                            </td>

                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-4" style="overflow: hidden; padding: 0">
                                    <img style="width: 100%; height: 183px"  src="{{asset($country->country->image)}}" alt="{{$country->country->name}}">
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                        @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!--====== Gellery ==========-->
        @include('frontEnd.package-details.includes.right_content_include.gellery')

    </div>

    <!--====== TOUR LOCATION ==========-->
{{--<div class="tour_head1 tout-map map-container">--}}
{{--<h3>Location</h3>--}}
{{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6290415.157581651!2d-93.99661009218904!3d39.661150926343694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880b2d386f6e2619%3A0x7f15825064115956!2sIllinois%2C+USA!5e0!3m2!1sen!2sin!4v1467884030780" allowfullscreen></iframe>--}}
{{--</div>--}}
<!--====== ABOUT THE TOUR ==========-->

    <!--====== DURATION ==========-->
    <div class="show-print" style="margin-top: -70px; margin-bottom: 20px" >
        <img style="height: 95px; width: 205px; " src="{{asset('/cosmos/custom_image/logo/1557219150_cosmos-logo.gif')}}" alt="" />
    </div>
    @include('frontEnd.package-details.includes.right_content_include.days')
    <div class="no-print">
        @include('frontEnd.package-details.includes.right_content_include.itinerary')
        @include('frontEnd.package-details.includes.right_content_include.tabs')
    </div>




    <div>
    </div>
</div>
