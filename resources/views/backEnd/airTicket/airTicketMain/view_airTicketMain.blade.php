@extends('backEnd.index')
@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            @if(Session::get('message'))
                <br/>
                <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>
        @endif
        <!-- Table -->

            <div class="col-md-12">
                <div class="component-box">
                    <section class="row" style="text-align: center">
                        <h1>{{$air_ticket->name}}</h1>
                    </section>
                    <section class="row">
                        <div class="container"><h2><strong>-- Flight Days --</strong></h2> </div>
                        @include('backEnd.airTicket.airTicketMain.include.air_ticket_day_modal')
                        <br/>
                        <div class="table-responsive pmd-card pmd-z-depth">
                            <table class="table table-mc-red pmd-table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Day</th>
                                    <th style="text-align: center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($air_ticket->air_tickets_days as $air_tickets_days)
                                    <tr>
                                        <td style="text-align: center" data-title="Ticket No">{{$air_tickets_days->day->name}}</td>
                                        <td style="text-align: center" class="pmd-table-row-action">
                                            <a href="{{URL::to('/apanel/delete-air-ticket-day/'.$air_tickets_days->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Day !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                                <i class="material-icons md-dark pmd-sm">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </section>
                    <section class="row component-section">
                        <div class="container"><h2><strong>-- Package Country --</strong></h2> </div>
                        @include('backEnd.airTicket.airTicketMain.include.air_ticket_destination_modal')
                        <br/>
                        <div class="table-responsive pmd-card pmd-z-depth">
                            <table class="table table-mc-red pmd-table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Up Name</th>
                                    <th style="text-align: center">Up Time</th>
                                    <th style="text-align: center">Down Name</th>
                                    <th style="text-align: center">Down Time</th>
                                    <th style="text-align: center">Destination Price</th>
                                    <th style="text-align: center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($air_ticket->air_ticket_main_destinations as $air_ticket_main_destination)
                                    <tr>
                                        <td style="text-align: center" data-title="Ticket No">{{$air_ticket_main_destination->up_name}}</td>
                                        <td style="text-align: center" data-title="Month">{{$air_ticket_main_destination->up_time}}</td>
                                        <td style="text-align: center" data-title="Month">{{$air_ticket_main_destination->down_name}}</td>
                                        {{--<td style="text-align: center" data-title="Month">{{$air_ticket_main_destination->down_name}}</td>--}}
                                        <td style="text-align: center" data-title="Month">{{$air_ticket_main_destination->down_time}}</td>
                                        <td style="text-align: center" data-title="Month">{{$air_ticket_main_destination->destination_price}}</td>
                                        <td style="text-align: center" class="pmd-table-row-action">

                                            <a href="{{URL::to('/apanel/delete-air-ticket-main-destination/'.$air_ticket_main_destination->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Air Ticket Main Destination !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                                <i class="material-icons md-dark pmd-sm">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    {{--@include('backEnd.packages.include.tab_modal_update')--}}
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </section>

                    {{--<!-- icons of different sizes -->--}}
                    <section class="row">
                        <div class="container"><h2><strong>-- Package Information --</strong></h2> </div>
                        <div class="col-md-12">
                            <div class="pmd-card pmd-z-depth pmd-card-custom-view">
                                <div class="pmd-card-body text-center">

                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Name
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$air_ticket->name}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Air Ticket Title
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$air_ticket->air_ticket_title->name}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-6">
                                        Destination
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6">
                                    :
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-6">
                                    {{$air_ticket->destinationR->name}}
                                    </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Air Line
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$air_ticket->air_line->name}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Price
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$air_ticket->price}}
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Ticket Class
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$air_ticket->ticket_class}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Status
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$air_ticket->status == 1 ? 'Publish' : 'Unpublish'}}
                                        </div>
                                    </div>
                                    <br/>
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-5 col-sm-5 col-xs-6">--}}
                                            {{--Duration--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-2 col-sm-2 col-xs-6">--}}
                                            {{--:--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-5 col-sm-5 col-xs-6">--}}
                                            {{--{{$package->duration}}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<br/>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-5 col-sm-5 col-xs-6">--}}
                                            {{--Price--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-2 col-sm-2 col-xs-6">--}}
                                            {{--:--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-5 col-sm-5 col-xs-6">--}}
                                            {{--{{$package->price}}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<br/>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-5 col-sm-5 col-xs-6">--}}
                                            {{--Short Description--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-2 col-sm-2 col-xs-6">--}}
                                            {{--:--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-5 col-sm-5 col-xs-6">--}}
                                            {{--{{$package->short_description}}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<br/>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-5 col-sm-5 col-xs-6">--}}
                                            {{--Long Description--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-2 col-sm-2 col-xs-6">--}}
                                            {{--:--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-5 col-sm-5 col-xs-6">--}}
                                            {{--{{$package->long_description}}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<br/>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-5 col-sm-5 col-xs-6">--}}
                                            {{--Status--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-2 col-sm-2 col-xs-6">--}}
                                            {{--:--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-5 col-sm-5 col-xs-6">--}}
                                            {{--{{$package->status == 1 ? 'Published' : 'Unpublished'}}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<br/>--}}



                                </div>
                            </div>
                        </div>

                    </section>
                    <!-- icons of different sizes -->

                </div>
            </div>
            <!-- Card Footer -->

        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script>
        // MDB Lightbox Init
        $(function () {
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });
    </script>







@endsection
