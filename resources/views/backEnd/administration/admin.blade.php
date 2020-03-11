@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>
                <div class="pull-right table-title-top-action">
                    <div class="pmd-textfield pull-left">
                        <input type="text" id="exampleInputAmount" class="form-control" placeholder="Search for...">
                    </div>
                    <a href="javascript:void(0);" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</a>
                </div>
                <!-- Title -->
                <br/>
                @include('backEnd.administration.include.admin_modal')

                <h1 class="section-title" id="services">
                    <span>Admin List</span>
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
                        <th>Admin</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Last Updated On</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($cosmosAdmins as $cosmosAdmin)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Browser Name">{{$cosmosAdmin->admin == 1 ? 'Super Admin' : 'Admin'}}</td>
                        <td data-title="Browser Name">{{$cosmosAdmin->name}}</td>
                        <td data-title="Total">{{$cosmosAdmin->email}}</td>
                        <td data-title="Total">{{$cosmosAdmin->phone_number}}</td>
                        <td data-title="Total">{{$cosmosAdmin->status == 1 ? 'Published' : 'Unpublished'}}</td>

                        <td data-title="date">{{$cosmosAdmin->updated_at}}</td>
                        <td class="pmd-table-row-action">
                            <a data-target="#form-dialog-sub{{$cosmosAdmin->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            <a href="{{URL::to('/apanel/delete-admin/'.$cosmosAdmin->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Admin !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                        </td>
                    </tr>
                    @include('backEnd.administration.include.admin_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
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
@endsection
