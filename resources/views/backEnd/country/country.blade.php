@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>
                <form method="post" action="{{URL::to('/search-country')}}">
                    <div class="pull-right table-title-top-action">
                        <div class="pmd-textfield pull-left">
                            <input type="text" id="exampleInputAmount" name="searchCountry" class="form-control" placeholder="Search for...">
                        </div>
                        <button  type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                    </div>
                    @csrf
                </form>
                <!-- Title -->
                <br/>
                @include('backEnd.country.include.country_modal')

                <h1 class="section-title" id="services">
                    <span>Country List</span>
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
                        <th>Image</th>
                        <th>Banner Image</th>
                        <th>Status</th>
                        <th>Continent</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($countries as $country)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Browser Name">{{$country->name}}</td>
                        <td data-title="Month">
                            <img style="width: 100px; height: 100px" src="{{asset($country->image)}}" />
                        </td>
                        <td data-title="Month">
                            <img style="width: 200px; height: 100px" src="{{asset($country->banner_image)}}" />
                        </td>
                        <td data-title="Total">{{$country->status == 1 ? 'Published' : 'Unpublished'}}</td>
                        <td data-title="date">{{$country->continent->name}}</td>
                        <td class="pmd-table-row-action">
                            <a data-target="#form-dialog-sub{{$country->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            @if(Session::get('admin') == 1)
                            <a href="{{URL::to('/delete-country/'.$country->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Country !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @include('backEnd.country.include.country_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $countries->links() }}
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
