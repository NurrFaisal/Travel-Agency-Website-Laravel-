@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>
                <form method="post" action="{{URL::to('/search-sub-category')}}">
                    <div class="pull-right table-title-top-action">
                        <div class="pmd-textfield pull-left">
                            <input type="text" id="exampleInputAmount" name="searchSubCategory" class="form-control" placeholder="Search for...">
                        </div>
                        <button  type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                    </div>
                    @csrf
                </form>
                <!-- Title -->
                <br/>
                @include('backEnd.new-gellery.sub-category.include.gellery_sub_category_modal')

                <h1 class="section-title" id="services">
                    <span>Gellery Sub Categories List</span>
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
                        <th>Main Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($gellery_sub_categories as $gellery_sub_category)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Browser Name">{{$gellery_sub_category->name}}</td>
                        <td data-title="Month">
                            <img style="width: 100px; height: 100px" src="{{asset($gellery_sub_category->box_image)}}" />
                        </td>

                        <td data-title="Total">{{$gellery_sub_category->mainCategory->name}}</td>
                        <td data-title="Total">{{$gellery_sub_category->status == 1 ? 'Published' : 'Unpublished'}}</td>
                        <td class="pmd-table-row-action">
                            <a data-target="#form-dialog-sub{{$gellery_sub_category->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            @if(Session::get('admin') == 1)
                            <a href="{{URL::to('/apanel/gallery/delete-sub-category/'.$gellery_sub_category->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Sub Category !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @include('backEnd.new-gellery.sub-category.include.gellery_sub_category_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $gellery_sub_categories->links() }}
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
