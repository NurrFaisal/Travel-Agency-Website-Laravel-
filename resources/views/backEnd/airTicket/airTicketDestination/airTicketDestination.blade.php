@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>
                {{--<div class="pull-right table-title-top-action">--}}
                    {{--<div class="pmd-textfield pull-left">--}}
                        {{--<input type="text" id="exampleInputAmount" class="form-control" placeholder="Search for...">--}}
                    {{--</div>--}}
                    {{--<a href="javascript:void(0);" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</a>--}}
                {{--</div>--}}
                <!-- Title -->
                <br/>
                @include('backEnd.airTicket.airTicketDestination.include.airTicketDestination_modal')
                    @if(Session::get('message'))
                <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>
                    @endif
                <h1 class="section-title" id="services">
                    <span>Air Ticket Destination</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
            </div>
            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Box Image</th>
                        <th>Background Image</th>
                        <th>Status</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @foreach($air_ticket_destinations as $air_ticket_destination)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Month">{{$air_ticket_destination->name}}</td>
                        <td data-title="Browser Name">
                            <img style="width: 100px; height: 100px" src="{{asset($air_ticket_destination->box_image)}}" />
                        </td>
                        <td data-title="Browser Name">
                            <img style="width: 200px; height: 100px" src="{{asset($air_ticket_destination->background_image)}}" />
                        </td>
                        <td data-title="Status"><span class="status-btn blue-bg">{{$air_ticket_destination->status == 1 ? 'Published' : 'Unpublished'}}</span></td>
                        <td data-title="date">{{$air_ticket_destination->air_ticket_title->name}}</td>
                        <td class="pmd-table-row-action">
                            <a data-target="#form-dialog-sub{{$air_ticket_destination->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            @if(Session::get('admin') == 1)
                            <a href="{{URL::to('/apanel/delete-air-ticket-destination/'.$air_ticket_destination->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Air Ticket Destination !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @include('backEnd.airTicket.airTicketDestination.include.airTicketDestination_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $air_ticket_destinations->links() }}
            </div>
        </div>
    </div>

    <script type='text/javascript'>
        function preview_image(id)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image_'+id);
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script type='text/javascript'>
        function preview_image2(id)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image2_'+id);
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
