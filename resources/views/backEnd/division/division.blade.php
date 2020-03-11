@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>
                <form method="post" action="{{URL::to('/search-division')}}">
                    <div class="pull-right table-title-top-action">
                        <div class="pmd-textfield pull-left">
                            <input type="text" id="exampleInputAmount" name="searchDivision" class="form-control" placeholder="Search for...">
                        </div>
                        <button  type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                    </div>
                    @csrf
                </form>
                <!-- Title -->
                <br/>
                @include('backEnd.division.include.division_modal')

                <h1 class="section-title" id="services">
                    <span>Division List</span>
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
                        <th>Box Image</th>
                        <th>Backgound Image</th>
                        <th>Country Name</th>
                        <th>Status</th>
                        <th>Last Updated On</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($divisions as $division)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Browser Name">{{$division->name}}</td>
                        <td data-title="Month">
                            <img style="width: 100px; height: 100px" src="{{asset($division->box_image)}}" />
                        </td>
                        <td data-title="Month">
                            <img style="width: 200px; height: 100px" src="{{asset($division->background_image)}}" />
                        </td>
                        <td data-title="Total">{{$division->country->name}}</td>
                        <td data-title="Total">{{$division->status == 1 ? 'Published' : 'Unpublished'}}</td>

                        <td data-title="date">{{$division->updated_at}}</td>
                        <td class="pmd-table-row-action">
                            <a data-target="#form-dialog-sub{{$division->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            @if(Session::get('admin') == 1)
                            <a href="{{URL::to('/delete-division/'.$division->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Division !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                             @endif
                        </td>
                    </tr>
                    @include('backEnd.division.include.division_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $divisions->links() }}
            </div>
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

@endsection
