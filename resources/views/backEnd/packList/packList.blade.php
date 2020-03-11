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
                    @if(Session::get('admin') == 1)
                @include('backEnd.packList.include.packList_modal')
                    @endif
                <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>
                <h1 class="section-title" id="services">
                    <span>Pack List</span>
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

                        <th>Brand Image</th>
                        <th>Brand Activation</th>

                        <th>Box Image</th>
                        <th>Background Image</th>
                        <th>Last Updated On</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @foreach($packLists as $packList)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Month">{{$packList->name}}</td>
                        <td data-title="Browser Name">
                            @if($packList->brand_image != null)
                            <img style="width: 100px; height: 100px" src="{{asset($packList->brand_image)}}" />
                            @else
                                No Brand Image
                            @endif
                        </td>
                        <td data-title="Month">{{$packList->b_status == 1 ? 'Active' : 'Unactive'}}</td>
                        <td data-title="Browser Name">
                            <img style="width: 100px; height: 100px" src="{{asset($packList->box_image)}}" />
                        </td>
                        <td data-title="Browser Name">
                            <img style="width: 200px; height: 100px" src="{{asset($packList->background_image)}}" />
                        </td>
                        <td data-title="date">{{$packList->updated_at}}</td>
                        <td data-title="Status"><span class="status-btn blue-bg"></span>{{$packList->status == 1 ? 'Published' : 'Unpublished'}}</td>
                        <td class="pmd-table-row-action">
                            <a data-target="#form-dialog-pack{{$packList->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            @if(Session::get('admin') == 1)
                            <a href="{{URL::to('/apanel/delete-pack-list/'.$packList->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Package Title !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @include('backEnd.packList.include.packList_modal_update')
                    @endforeach

                    </tbody>
                </table>
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
    <script type='text/javascript'>
        function preview_image3(id)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image3_'+id);
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
