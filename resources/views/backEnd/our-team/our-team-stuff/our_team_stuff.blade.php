@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>

                <br/>

                @include('backEnd.our-team.our-team-stuff.include.our_team_stuff_modal')
                @if(Session::get('message'))
                    <br/>
                <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>
                @endif
                <h1 class="section-title" id="services">
                    <span>Our Team Staff Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
            </div>
            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Branch</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @foreach($our_team_staffs as $our_team_staff)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Browser Name">
                            <img style="width: 100px; height: 100px" src="{{asset($our_team_staff->image)}}" />
                        </td>
                        <td data-title="date">{{$our_team_staff->name}}</td>
                        <td data-title="date">{{$our_team_staff->designation}}</td>
                        <td data-title="date">{{$our_team_staff->phone_number}}</td>
                        <td data-title="date">{{$our_team_staff->email}}</td>
                        <td data-title="date">{{$our_team_staff->branch}}</td>
                        <td data-title="Status"><span class="status-btn blue-bg">{{$our_team_staff->status == 1 ? 'Published' : 'Unpublished'}}</span></td>
                        <td class="pmd-table-row-action">
                            <a data-target="#form-dialog-slider{{$our_team_staff->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            <a href="{{URL::to('/apanel/delete-our-team-staff/'.$our_team_staff->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Staff !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                        </td>
                    </tr>
                    @include('backEnd.our-team.our-team-stuff.include.our_team_stuff_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $our_team_staffs->links() }}
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

@endsection
