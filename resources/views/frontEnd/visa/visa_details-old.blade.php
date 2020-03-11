@extends('frontEnd.index')
@section('title') VISA of {{$visa_detail->country_name}} @endsection
@section('mainContent')
    <style>
        .inner_banner::before {
            content: '';
            position: absolute;
            /*background: linear-gradient(to top, rgb(29, 36, 42) 15%, rgba(0, 0, 0, 0) 100%);*/
            background: linear-gradient(to top, rgba(29, 36, 42, 0.45) 15%, rgba(0, 0, 0, 0) 100%);
            top: 0px;
            bottom: 0px;
            left: 0px;
            width: 100%;
        }
    </style>
    <section>
        <div class="rows inner_banner inner_banner_4" style="background-image: url({{asset($visa_detail->banner_image)}}); z-index: -1;">
            <div class="container">
                <h2><span>{{$visa_detail->country_name}}-</span></h2>
                <p>{{$visa_detail->short_description}}</p>
            </div>
        </div>
    </section>
    <!--====== TOUR DETAILS - BOOKING ==========-->
    <section>
        <div class="rows banner_book" id="inner-page-title">
            <div class="container">
                <div class="banner_book_1">
                    <ul>
                        @if($visa_detail->e_price == null)
                        <li class="dl1">Location : {{$visa_detail->country_name}} </li>
                        @else
                        <li class="dl1">E - VISA Price : {{$visa_detail->e_price}} BDT</li>
                        @endif
                        <li class="dl2">Sticker VISA Price : {{$visa_detail->price}} BDT</li>
                        <li class="dl3">Duration :  {{$visa_detail->duration}}</li>
                        <li class="dl4"><a href="{{URL::to('/book-visa/'.$visa_detail->id)}}">Appoint Now</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== TOUR DETAILS ==========-->
    <section>
        <div class="rows inn-page-bg com-colo">
            <div class="container inn-page-con-bg tb-space">
                <div class="col-md-9">
                    <!--====== TOUR TITLE ==========-->
                    <div class="tour_head col-md-12">
                       <div class="col-md-9"><h2>{{$visa_detail->country_name}} Visa Service</h2></div>
                        @if($visa_detail->e_price != null)
                        <div class="col-md-3"><button id="togglebtn" onclick="e_token()" style="background: linear-gradient(to bottom,#3cb4d2,#0d439b); color: white; float: right" class="btn btn-block">E-VISA</button></div>
                        @endif
                    </div>

                    <!--====== TOUR DESCRIPTION ==========-->
                    {{--<div class="tour_head1" style="text-align: justify">--}}

                        {{--@php echo $visa_detail->long_description @endphp--}}

                    {{--</div>--}}


                    <div>
                        <div class="dir-rat">
                            <div id="hideandshow" class="tour_head " style="text-align: justify" >
                                <h4>Sticker VISA</h4>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#menu4">Govtment Service</a></li>
                                    <li><a data-toggle="tab" href="#home">Private Service</a></li>
                                    <li><a data-toggle="tab" href="#menu5">Lawyer</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Business</a></li>
                                    <li><a data-toggle="tab" href="#menu2">Spouse</a></li>
                                    <li><a data-toggle="tab" href="#menu3">Student</a></li>
                                    <li><a data-toggle="tab" href="#menu6">Retired</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade ">
                                        <br/>
                                        <h3>Private Service</h3>
                                        <br/>
                                        @php echo $visa_detail->professional @endphp
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <h3>Business</h3>
                                        <br/>
                                        @php echo $visa_detail->business @endphp
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <h3>Spouse</h3>
                                        <br/>
                                        @php echo $visa_detail->spouse @endphp
                                    </div>
                                    <div id="menu3" class="tab-pane fade">
                                        <h3>Studenet</h3>
                                        <br/>
                                        @php echo $visa_detail->student @endphp
                                    </div>
                                    <div id="menu4" class="tab-pane fade in active">
                                        <h3>Govtment Service</h3>
                                        <br/>
                                        @php echo $visa_detail->professional2 @endphp
                                    </div>
                                    <div id="menu5" class="tab-pane fade">
                                        <h3>Lawyer</h3>
                                        <br/>
                                        @php echo $visa_detail->lawyer @endphp
                                    </div>
                                    <div id="menu6" class="tab-pane fade">
                                        <h3>Retired</h3>
                                        <br/>
                                        @php echo $visa_detail->child @endphp
                                    </div>
                                </div>
                                <br/>

                            </div>
                            <div id="hideandshow2" class="tour_head " style="text-align: justify; display: none" >
                                <h4>E-VISA</h4>

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#menu4-evisa">Govtment Service</a></li>
                                    <li><a data-toggle="tab" href="#home-evisa">Private Service</a></li>
                                    <li><a data-toggle="tab" href="#menu5-evisa">Lawyer</a></li>
                                    <li><a data-toggle="tab" href="#menu1-evisa">Business</a></li>
                                    <li><a data-toggle="tab" href="#menu2-evisa">Spouse</a></li>
                                    <li><a data-toggle="tab" href="#menu3-evisa">Student</a></li>
                                    <li><a data-toggle="tab" href="#menu6-evisa">Retired</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="home-evisa" class="tab-pane fade">
                                        <br/>
                                        <h3>Private Service</h3>
                                        <br/>
                                        @php echo $visa_detail->professional_evisa @endphp
                                    </div>
                                    <div id="menu1-evisa" class="tab-pane fade">
                                        <h3>Business</h3>
                                        <br/>
                                        @php echo $visa_detail->business_evisa @endphp
                                    </div>
                                    <div id="menu2-evisa" class="tab-pane fade">
                                        <h3>Spouse</h3>
                                        <br/>
                                        @php echo $visa_detail->spouse_evisa @endphp
                                    </div>
                                    <div id="menu3-evisa" class="tab-pane fade">
                                        <h3>Studenet</h3>
                                        <br/>
                                        @php echo $visa_detail->student_evisa @endphp
                                    </div>
                                    <div id="menu4-evisa" class="tab-pane fade in active">
                                        <h3>Govtment Service</h3>
                                        <br/>
                                        @php echo $visa_detail->professional2_evisa @endphp
                                    </div>
                                    <div id="menu5-evisa" class="tab-pane fade">
                                        <h3>Lawyer</h3>
                                        <br/>
                                        @php echo $visa_detail->lawyer_evisa @endphp
                                    </div>
                                    <div id="menu6-evisa" class="tab-pane fade">
                                        <h3>Retired</h3>
                                        <br/>
                                        @php echo $visa_detail->child_evisa @endphp
                                    </div>
                                </div>
                                <br/>

                            </div>
                            <!--COMMENT RATING-->

                            <!--COMMENT RATING-->
                            <div class="dir-rat-inn dir-rat-review">
                                <div class="row">
                                    {{--<div class="col-md-3 dir-rat-left"> <img src="images/reviewer/3.jpg" alt="">--}}
                                        {{--<p>Orange Fab & Weld <span>19th January, 2017</span> </p>--}}
                                    {{--</div>--}}
                                    <div class="col-md-12 dir-rat-right">
                                        <div class="dir-rat-star"><h4>Embassy Information</h4></div>
                                        <div>@php echo $visa_detail->embassy @endphp</div>
                                        <br/>
                                        <div class="dir-rat-star" style="color: #0e76a8; float: right"><h4>Last Updated : {{date_format($visa_detail->updated_at,"d-m-Y")}}</h4></div>
                                    </div>
                                </div>
                            </div>

                            <div class="dir-rat-inn dir-rat-review">
                                <div class="row">
                                    {{--<div class="col-md-3 dir-rat-left"> <img src="images/reviewer/3.jpg" alt="">--}}
                                    {{--<p>Orange Fab & Weld <span>19th January, 2017</span> </p>--}}
                                    {{--</div>--}}
                                    <div class="col-md-12 dir-rat-right">
                                        <div class="dir-rat-star"><h4>Terms & Condition</h4></div>
                                        @php echo $visa_detail->terms_and_condition @endphp

                                    </div>
                                </div>
                            </div>
                            <!--COMMENT RATING-->

                        </div>
                    </div>
                    <!--====== ROOMS: HOTEL BOOKING ==========-->

                    <!--====== TOUR LOCATION ==========-->

                    <!--====== DURATION ==========-->

                    <div>

                    </div>
                </div>
                <div class="col-md-3 tour_r">
                    <!--====== SPECIAL OFFERS ==========-->

                    <!--====== TRIP INFORMATION ==========-->

                    <!--====== PACKAGE SHARE ==========-->
                    <!--====== HELP PACKAGE ==========-->
                    <div class="tour_right head_right tour_social tour-ri-com">
                        <h3>Share This Service</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                            <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                        </ul>
                    </div>
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
                        <h3>Brach Office ( Banani )</h3>
                        <div class="tour_help_1">
                            <h4 style="font-size: 21px" class="tour_help_1_call">Call Bangladesh Time</h4>
                            <p>Please Call at Office Time <br/><strong>10:30</strong> am to <strong>6:00</strong> pm</p>
                            @for($i = 0; $i < $arry_len2; $i++)
                                <h4>(+88) {{$arry2[$i]}}</h4>
                            @endfor
                        </div>

                    </div>


                    <!--====== PUPULAR TOUR PACKAGES ==========-->

                </div>
            </div>
        </div>
    </section>

   <script>
       function e_token() {
           $('#hideandshow').toggle();
           $('#hideandshow2').toggle();
           if($('#togglebtn').text() === 'E-VISA'){
               $('#togglebtn').text('Sticker VISA')
           }else {
               $('#togglebtn').text('E-VISA')
           }

       }
   </script>

@endsection
