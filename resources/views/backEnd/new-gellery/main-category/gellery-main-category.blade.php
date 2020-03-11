@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>
{{--                <div class="pull-right table-title-top-action">--}}
{{--                    <div class="pmd-textfield pull-left">--}}
{{--                        <input type="text" id="exampleInputAmount" class="form-control" placeholder="Search for...">--}}
{{--                    </div>--}}
{{--                    <a href="javascript:void(0);" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</a>--}}
{{--                </div>--}}
                <!-- Title -->
                <br/>
                @if(Session::get('admin') == 1)
                @include('backEnd.new-gellery.main-category.include.gellery_main_category_modal')
                @endif
                <h1 class="section-title" id="services">
                    <span>Gallery Main Categories List</span>
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
                        <th>Status</th>
                        <th>Last Updated On</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($gellery_main_categories as $gellery_main_categorie)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Browser Name">{{$gellery_main_categorie->name}}</td>
                        <td data-title="Month">
                            <img style="width: 100px; height: 100px" src="{{asset($gellery_main_categorie->box_image)}}" />
                        </td>
                        <td data-title="Total">{{$gellery_main_categorie->status == 1 ? 'Published' : 'Unpublished'}}</td>

                        <td data-title="date">{{$gellery_main_categorie->updated_at}}</td>
                        <td class="pmd-table-row-action">
                            <a data-target="#form-dialog-sub{{$gellery_main_categorie->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            @if(Session::get('admin') == 1)
                            <a href="{{URL::to('/apanel/gallery/delete-main-category/'.$gellery_main_categorie->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Division !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                             @endif
                        </td>
                    </tr>
                    @include('backEnd.new-gellery.main-category.include.gellery_main_category_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $gellery_main_categories->links() }}
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
