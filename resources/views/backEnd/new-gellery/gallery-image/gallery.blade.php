@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>
                <form method="post" action="{{URL::to('/search-gallery')}}">
                    <div class="pull-right table-title-top-action">
                        <div class="pmd-textfield pull-left">
                            <input type="text" id="exampleInputAmount" name="searchGallery" class="form-control" placeholder="Search for...">
                        </div>
                        <button  type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                    </div>
                    @csrf
                </form>
                <!-- Title -->
                <br/>
                @include('backEnd.new-gellery.gallery-image.include.gallery_modal')

                <h1 class="section-title" id="services">
                    <span>Gallery Images List</span>
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
                        <th>Year</th>
                        <th>Box Image</th>
                        <th>Gallery Image</th>
                        <th>Main Category</th>
                        <th>Sub Category</th>
                        <th>Person</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($new_gallery_images as $new_gallery_image)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Browser Name">{{$new_gallery_image->year}}</td>
                        <td data-title="Month">
                            <img style="width: 100px; height: 100px" src="{{asset($new_gallery_image->box_image)}}" />
                        </td>
                        <td data-title="Month">
                            <img style="width: 100px; height: 100px" src="{{asset($new_gallery_image->full_image)}}" />
                        </td>
                        <td data-title="Total">{{$new_gallery_image->main_category->name}}</td>
                        <td data-title="Total">{{$new_gallery_image->sub_category_id}}</td>

                        <td data-title="date">@if(isset($new_gallery_image->person->name)) {{$new_gallery_image->person->name}} @endif</td>
                        <td class="pmd-table-row-action">
                            <a href="{{URL::to('/apanel/new-gallery/delete-gallery-image/'.$new_gallery_image->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Image !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                        </td>
                    </tr>
{{--                    @include('backEnd.new-gellery.year.include.year_main_category_modal_update')--}}
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $new_gallery_images->links() }}
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
