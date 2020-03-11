{{--<div class="tour_head1 l-info-pack-days days">--}}
    {{--<h3>Detailed Day Wise Itinerary</h3>--}}
    {{--<ul>--}}
        {{--@foreach($package->tourDays as $day)--}}
            {{--<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>--}}
                {{--<h4><span>Day : {{$day->day}}</span> {{$day->day_title}}</h4>--}}
                {{--<p>{{$day->day_description}}</p>--}}
            {{--</li>--}}
        {{--@endforeach--}}

    {{--</ul>--}}
{{--</div>--}}


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

<style>
    .hdd{
        background: rgb(255,255,136); /* Old browsers */
        background: -moz-linear-gradient(top, rgba(255,255,136,1) 0%, rgba(255,255,136,1) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(top, rgba(255,255,136,1) 0%,rgba(255,255,136,1) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to bottom, rgba(255,255,136,1) 0%,rgba(149, 255, 136, 0.52) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffff88', endColorstr='#ffff88',GradientType=0 ); /* IE6-9 */
        border-radius: 5px;

    }
    .hdd h3{
        margin-top: 15px;
        margin-bottom: 15px;
        background: url("");
    }
</style>

<div class="tour_head1 l-info-pack-days days" style="margin-top: -25px; margin: 7px;">
    {{--<h3>Detailed Day Wise Itinerary</h3>--}}
    @if($package->fixed_date != null)
    <div class="row hdd sw" style="text-align: center; ">
        <h3 style="padding: 0;margin: 10px">{{$package->fixed_date}}</h3>
    </div>
    @endif
    <div class="row hdd sw" style="text-align: center; margin-top: 6px;">
        <h3 style="padding: 0;margin: 10px">{{$package->destination_location}}</h3>
    </div>
    <div class="row hdd sw" style="text-align: center; margin-top: 6px;">
        <h3 style="padding: 0;margin: 10px">{{$package->duration}}</h3>
    </div>


</div>


<style>
    .act > a:focus{
        background: #dddddd;
    }
    .tc_color *{
        color: black !important;
    }
</style>
<div class="tour_head1" style="    margin-top: 20px;" >
    <div class="book-tab-inn" style="width: 100%">
        <ul class="nav nav-tabs" style="margin-bottom: -6px;">
            {{--@foreach($package->packageCountries as $key => $country)--}}
                <li class="active act"><a data-toggle="tab" href="#tour_details" aria-expanded="true">Tour Details</a></li>
                <li class="act"><a data-toggle="tab" href="#important_note" aria-expanded="true">Important Notes</a></li>
                <li class="act"><a data-toggle="tab" href="#term_and_condition" aria-expanded="true">Terms & Conditions</a></li>
            {{--@endforeach--}}
        </ul>

        <div class="tab-content book-tab-body"; style="background-color: #f3f3f3; padding-bottom: 1px;padding-top: 1px;" >
            {{--@foreach($package->packageCountries as $key => $country)--}}
                <div id="tour_details"  class="tab-pane fade  in active" style="margin:15px; margin-top: 15px">
                    <h4 style="font-weight: bold">Tour Details</h4>
{{--                        <div class="tc_color" style="text-align: justify; color: black!important; margin-bottom: 20px; margin-top: 12px;">{!! $package->tour_details !!}</div>--}}
                        <div class="tc_color" style="text-align: justify; color: black!important; margin-bottom: 20px; margin-top: 12px;">
                            <div class="tour_head1 l-info-pack-days days">
                                {{--<h3 style="margin-top: 18px;">Detailed Day Wise Itinerary</h3>--}}


                                <table class="tableDay sw" style="text-align: center;">
                                    <tr>
                                        <th style="text-align: center">Day</th>
                                        <th style="text-align: center" >Date</th>
                                        <th style="text-align: center" >Tour Itinerary</th>
                                        <th style="text-align: center" >Overnight Stay</th>
                                    </tr>
                                    @foreach($package->tourDays as $tour_day)
                                        <tr>
                                            <td style="width: 72px; text-align: center; color: black"><strong>Day - {{$tour_day->day}}</strong></td>
                                            <td style="width: 92px; text-align: center; color: black" ><strong>{{$tour_day->date != Null ? $tour_day->date : 'Not Defined'  }}</strong></td>
                                            <td>
                                                <div class="row" style="text-align: justify; margin: 2px">
                                                    <p style="line-height: 24px; color: black">{{$tour_day->day_description}}</p>
                                                </div>
                                                <div class="row" style="text-align: center">
                                                    <div class="ticket">
                                                        <ul>
                                                            <li style="padding: 2px 15px;">Breakfast : {{$tour_day->breakfast != Null ? 'Yes' : 'No'}}</li>
                                                            <li style="padding: 2px 27px;">Lunch : {{$tour_day->lunch != Null ? 'Yes' : 'No'}}</li>
                                                            <li style="padding: 2px 25px;">Dinner : {{$tour_day->dinner != Null ? 'Yes' : 'No'}}</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </td>
                                            <td style="width: 93px; text-align: center; color: black" ><strong>{{$tour_day->overnight_stay}}</strong></td>
                                        </tr>
                                    @endforeach


                                </table>
                                <div class="no-print" style="float: right">
                                    <button style="margin-top: 5px" class=" btn btn-success" onclick="pdfG()" >Print and Download</button>
                                </div>

                            </div>
                        </div>

                </div>
                <div id="important_note"  class="tab-pane fade  in" style="margin:15px; margin-top: 15px">
                    <h4 style="font-weight: bold">Important Notes</h4>
                    <div class="tc_color" style="text-align: justify; color: black!important; margin-bottom: 20px; margin-top: 12px;">{!! $package->important_note !!}</div>                </div>
                <div id="term_and_condition"  class="tab-pane fade  in " style="margin:15px; margin-top: 15px">
                    <h4 style="font-weight: bold">Terms & Conditions</h4>
                    <div class="tc_color" style="text-align: justify; color: black!important; margin-bottom: 20px; margin-top: 12px;">{!! $package->terms_and_condition !!}</div>                </div>
            {{--@endforeach--}}
        </div>
    </div>
</div>





<script>
    function pdfG() {
        window.print()
    }
</script>
