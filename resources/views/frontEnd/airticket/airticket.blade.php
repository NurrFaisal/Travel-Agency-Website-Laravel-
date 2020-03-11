@extends('frontEnd.index')
@section('title') {{$air_ticket_destination->name}} @endsection
@section('mainContent')
    <section class="hot-page2-alp hot-page2-pa-sp-top" style="background-image: url({{asset($air_ticket_destination->background_image)}})">
        <div class="container">
            <div class="row inner_banner inner_banner_3 bg-none" >
                <div class="hot-page2-alp-tit">
                    <h1>{{$air_ticket_destination->name}}</h1>
                    {{--<ul>--}}
                    {{--<li><a href="#inner-page-title">Home</a> </li>--}}
                    {{--<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>--}}
                    {{--<li><a href="#inner-page-title" class="bread-acti">Hotels & Restaurants</a> </li>--}}
                    {{--</ul>--}}
                    {{--<p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide. </p>--}}
                </div>
            </div>
            <div class="row">
                <div class="hot-page2-alp-con" style="background: transparent;">
                    <!--LEFT LISTINGS-->

                    <!--END LEFT LISTINGS-->
                    <!--RIGHT LISTINGS-->
                    <style>
                        .airline th, td{
                            text-align: center;
                        }
                    </style>
                    <style>
                        .tableDay tr th{
                            border: 1px solid black;
                        }
                        .tableDay tr td{
                            border: 1px solid black;
                        }
                        .tableDay{
                            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffff88+0,ffff88+100;Yellow+Flat+%231 */
                            background: rgb(255,255,136); /* Old browsers */
                            background: -moz-linear-gradient(top, rgba(255,255,136,1) 0%, rgba(255,255,136,1) 100%); /* FF3.6-15 */
                            background: -webkit-linear-gradient(top, rgba(255,255,136,1) 0%,rgba(255,255,136,1) 100%); /* Chrome10-25,Safari5.1-6 */
                            background: linear-gradient(to bottom, rgba(255,255,136,1) 0%,rgba(149, 255, 136, 0.52) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffff88', endColorstr='#ffff88',GradientType=0 ); /* IE6-9 */


                        }



                    </style>
                    <div class="col-md-12 hot-page2-alp-con-right">
                        {{--<div class="hot-page2-alp-con-right-1">--}}
                            <!--LISTINGS-->
                            <div class="row">
                                <!--LISTINGS START-->

                                @foreach($air_tickets as $air_ticket)
                                <div class="hot-page2-alp-r-list sw" style="overflow-x:auto;">

                                        <table  class="tableDay sw table-responsive-sm" border="1" style="min-width: 534px">
                                            <tr>
                                                <th  style="text-align: center" ><img style="height: 30px;" alt="{{$air_ticket->name}}" width="90px" src="{{asset($air_ticket->air_line->up_image)}}"/></th>
                                                <th colspan="3" style="text-align: center" ><h3>{{$air_ticket->name}}</h3></th>
                                                <th  style="text-align: center" >{{$air_ticket->air_line->name}}</th>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <th style="text-align: center" >Days</th>
                                                <th style="text-align: center"  colspan="2" >Destination & Time</th>
                                                <th style="text-align: center" >Return Ticket Price</th>
                                                <th style="text-align: center" >Ticket Class</th>
                                            </tr>
                                            @foreach($air_ticket->air_ticket_main_destinations as $key => $main_destionation)
                                            <tr>
                                                @if($key == 0)
                                                <td rowspan="{{$key}}" style="text-align: center" >
                                                    @foreach($air_ticket->air_tickets_days as $day)
                                                    {{$day->day->name}}<br/>
                                                    @endforeach

                                                </th>
                                                @endif
                                                <td style="text-align: center"  colspan="{{$main_destionation->down_name == null ? 2 : ''}}">
                                                    <div class="row">{{$main_destionation->up_name}}</div>
                                                    <div class="row">{{$main_destionation->up_time}}</div>
                                                </th>
                                                    @if($main_destionation->down_name != null)
                                                <td style="text-align: center" >
                                                    <div class="row">{{$main_destionation->down_name}}</div>
                                                    <div class="row">{{$main_destionation->down_time}}</div>
                                                </th>
                                                    @endif
                                                <td style="text-align: center" >{{$main_destionation->destination_price}} BDT</th>
                                                <td style="text-align: center" >Economy</th>
                                            </tr>
                                                <tr>
{{--                                                    <th  style="text-align: center" ><img style="height: 30px;" alt="{{$air_ticket->name}}" width="90px" src="{{asset($air_ticket->air_line->up_image)}}"/></th>--}}
{{--                                                    <th colspan="5" style="text-align: center" ><strong>Note: Airticket Price Can Be change any time depend on seat availability</strong></th>--}}
                                                    <th colspan="5" style="text-align: center" ><strong>NOTE : AIRTICKET PRICE CAN BE CHANGE ANY TIME DEPEND ON SEAT AVAILABILITY</strong></th>
{{--                                                    <th  style="text-align: center" >{{$air_ticket->air_line->name}}</th>--}}
                                                </tr>
                                                @php $key += $key; @endphp
                                            @endforeach


                                        </table>


                                </div>
                                @endforeach
                            </div>
                            <div class="row" style="margin-left: 40%;">
                                {{ $air_tickets->render() }}
                            </div>
                        {{--</div>--}}
                    </div>
                    <!--END RIGHT LISTINGS-->
                </div>
            </div>
        </div>
    </section>
@endsection
