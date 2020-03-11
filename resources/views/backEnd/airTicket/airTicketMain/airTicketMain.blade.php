@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">

            <div>
                <form method="post" action="{{URL::to('/search-air')}}">
                    <div class="pull-right table-title-top-action">
                        <div class="pmd-textfield pull-left">
                            <input type="text" id="exampleInputAmount" name="searchAirTicket" class="form-control" placeholder="Search for...">
                        </div>
                        <button  type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                    </div>
                    @csrf
                </form>

                <!-- Title -->
                <br/>
                @include('backEnd.airTicket.airTicketMain.include.air_ticket_main_modal')

                <h1 class="section-title" id="services">
                    <span>Air Tickets List</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                @if(Session::get('message'))
                <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>
                @endif
            </div>
            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Air Ticket Title</th>
                        <th>Destination</th>
                        <th>Air Line</th>
                        <th>Price</th>
                        <th>Ticket Class</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($air_tickets as $air_ticket)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Browser Name">{{$air_ticket->name}}</td>
                        <td data-title="Browser Name">{{$air_ticket->air_ticket_title->name}}</td>
                        <td data-title="Browser Name">{{$air_ticket->destinationR->name}}</td>
                        <td data-title="Browser Name">{{$air_ticket->air_line->name}}</td>
                        <td data-title="Browser Name">{{$air_ticket->price}}</td>
                        <td data-title="Browser Name">{{$air_ticket->ticket_class}}</td>

                        <td data-title="Total">{{$air_ticket->status == 1 ? 'Published' : 'Unpublished'}}</td>
                        <td class="pmd-table-row-action">
                            <a href="{{URL::to('/apanel/view-air-ticket/'.$air_ticket->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i  class="material-icons md-dark pmd-sm">search</i>
                            </a>
                            <a data-target="#form-dialog-sub{{$air_ticket->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            <a href="{{URL::to('/apanel/delete-air-ticket-info/'.$air_ticket->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Air Ticket !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                        </td>
                    </tr>
                    @include('backEnd.airTicket.airTicketMain.include.air_ticket_main_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $air_tickets->links() }}
            </div>
            <br/>
            <!-- Card Footer -->
            {{--<div class="pmd-card-footer">--}}
                {{--<ul class="pmd-pagination pull-right list-inline">--}}
                    {{--<span>Rows per page:</span> <span class="dropdown pmd-dropdown">--}}
			  {{--<button class="btn pmd-ripple-effect pmd-btn-flat btn-link dropdown-toggle" type="button" id="dropdownMenuDivider" data-toggle="dropdown" aria-expanded="false">10 <span class="caret"></span></button>--}}
			  {{--<ul aria-labelledby="dropdownMenuDivider" role="menu" class="dropdown-menu">--}}
				  {{--<li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">10</a></li>--}}
				  {{--<li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">20</a></li>--}}
				  {{--<li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">30</a></li>--}}
				  {{--<li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">40</a></li>--}}
				  {{--<li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">50</a></li>--}}
			  {{--</ul>--}}
			  {{--</span> <span>1-10 of 100</span> <a href="javascript:void(0);" aria-label="Previous"><i class="material-icons md-dark pmd-sm">keyboard_arrow_left</i></a> <a href="javascript:void(0);" aria-label="Next"><i class="material-icons md-dark pmd-sm">keyboard_arrow_right</i></a>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
    </div>


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


    <script>
        $(document).on('change','#air_ticket_title_id', function () {
            var air_ticket_title_id = $(this).val();

            var op= " ";
            op +='<option value="0">--Select Destinaiton--</option>';

            $.ajax({
                type:'get',
                url: '{!! URL::to('/manage-destination') !!}',
                data:{'id':air_ticket_title_id},
                success:function (data) {

                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $('#destination').html(op);

                }
            });

        });
    </script>

@endsection
