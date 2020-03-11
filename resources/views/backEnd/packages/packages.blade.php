@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>
                <form method="post" action="{{URL::to('/search-package')}}">
                    <div class="pull-right table-title-top-action">
                        <div class="pmd-textfield pull-left">
                            <input type="text" id="exampleInputAmount" name="searchpackage" class="form-control" placeholder="Search for...">
                        </div>
                        <button  type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                    </div>
                    @csrf
                </form>
                <!-- Title -->
                <br/>
                @include('backEnd.packages.include.packages_modal')
                    @if(Session::get('message'))
                        <br/>
                <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>
                    @endif
                <h1 class="section-title" id="services">
                    <span>Packages Table</span>
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
                        <th>Code</th>
                        <th>Box Image</th>
                        <th>Banner Image</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @foreach($packages as $package)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Month">{{$package->name}}</td>
                        <td data-title="Month">{{$package->code}}</td>
                        <td data-title="Browser Name">
                            <img style="width: 100px; height: 100px" src="{{asset($package->box_image)}}" />
                        </td>
                        <td data-title="Browser Name">
                            <img style="width: 200px; height: 100px" src="{{asset($package->banner_image)}}" />
                        </td>
                        <td data-title="date">{{$package->price}}</td>
                        <td data-title="Status"><span class="status-btn blue-bg"></span>{{$package->status == 1 ? 'Published' : 'Unpublished'}}</td>
                        <td class="pmd-table-row-action">
                            <a href="{{URL::to('/apanel/view-package/'.$package->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i  class="material-icons md-dark pmd-sm">search</i>
                            </a>
                            <a data-target="#form-dialog-pack{{$package->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            <a href="{{URL::to('/apanel/delete-package/'.$package->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Package !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                        </td>
                    </tr>
                    @include('backEnd.packages.include.packages_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $packages->links() }}
            </div>

        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

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




    <script>
        $(document).on('change','#country_id', function () {
            var country_id = $(this).val();

            var op= " ";

            $.ajax({
                type:'get',
                url: '{!! URL::to('/manage-division') !!}',
                data:{'id':country_id},
                success:function (data) {
                    console.log(data)
                    // for (var i=0; i<data.length; i++) {
                    //     op +='<option  value="'+data[i].id+'">'+data[i].name+'</option>';
                    // }
                    $('#division_id').html(data);

                }
            });

        });
    </script>
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('#dayBtn').click(function (e) {--}}
                {{--e.preventDefault();--}}
                {{--$('#days1').append('<div id="priceParentDiv" class="form-group"><div class="form-group">\n' +--}}
                    {{--'                                                    <label for="day" class="control-label">Day</label>\n' +--}}
                    {{--'                                                    <input type="text" id="day" required class="form-control" name="day[]">\n' +--}}
                    {{--'                                                </div>\n' +--}}
                    {{--'\n' +--}}
                    {{--'                                                <div class="form-group">\n' +--}}
                    {{--'                                                    <label for="day_title" class="control-label">Date</label>\n' +--}}
                    {{--'                                                    <input type="text" id="date" required class="form-control" name="date[]">\n' +--}}
                    {{--'                                                </div>\n' +--}}
                    {{--'\n' +--}}
                    {{--'                                                <div class="form-group">\n' +--}}
                    {{--'                                                    <label for="day_title" class="control-label">Overnight Stay</label>\n' +--}}
                    {{--'                                                    <input type="text" id="overnight_stay" required class="form-control" name="overnight_stay[]">\n' +--}}
                    {{--'                                                </div>\n' +--}}
                    {{--'\n' +--}}
                    {{--'                                                <div class="form-group">\n' +--}}
                    {{--'                                                    <label for="day_description" class="control-label">Day Description</label>\n' +--}}
                    {{--'                                                    <textarea required id="day_description" name="day_description[]" class="form-control"></textarea>\n' +--}}
                    {{--'                                                </div>\n' +--}}
                    {{--'                                            <!-- Default inline 1-->\n' +--}}
                    {{--'                                                <div class="component-box">\n' +--}}
                    {{--'                                                    <!-- checkbox example -->\n' +--}}
                    {{--'                                                    <div class="row">\n' +--}}
                    {{--'                                                        <div class="col-md-12">\n' +--}}
                    {{--'                                                            <div class="pmd-card pmd-z-depth">\n' +--}}
                    {{--'                                                                <div class="pmd-card-body">\n' +--}}
                    {{--'                                                                    <!--Inline checkboxes-->\n' +--}}
                    {{--'                                                                    <form>\n' +--}}
                    {{--'                                                                        <label class="checkbox-inline pmd-checkbox pmd-checkbox-ripple-effect">\n' +--}}
                    {{--'                                                                            <input type="checkbox" name="breakfirst[]" value="1">\n' +--}}
                    {{--'                                                                            <span> Breakfast</span>\n' +--}}
                    {{--'                                                                        </label>\n' +--}}
                    {{--'                                                                        <label class="checkbox-inline pmd-checkbox pmd-checkbox-ripple-effect">\n' +--}}
                    {{--'                                                                            <input type="checkbox" name="lunch[]" value="1">\n' +--}}
                    {{--'                                                                            <span> Lunch</span>\n' +--}}
                    {{--'                                                                        </label>\n' +--}}
                    {{--'                                                                        <label class="checkbox-inline pmd-checkbox pmd-checkbox-ripple-effect">\n' +--}}
                    {{--'                                                                            <input type="checkbox" name="dinner[]" value="1">\n' +--}}
                    {{--'                                                                            <span> Dinner</span>\n' +--}}
                    {{--'                                                                        </label>\n' +--}}
                    {{--'                                                                    </form>\n' +--}}
                    {{--'                                                                </div>\n' +--}}
                    {{--'                                                            </div>\n' +--}}
                    {{--'                                                        </div>\n' +--}}
                    {{--'                                                    </div> <!-- checkbox example end-->\n' +--}}
                    {{--'                                                </div>\n' +--}}
                    {{--'\n' +--}}
                    {{--'                                                <div class="form-group">\n' +--}}
                    {{--'                                                    <button class="btn btn-primary"  id="dayBtnRemove" >Remove</button>\n' +--}}
                    {{--'                                                </div></div>');--}}
            {{--});--}}

            {{--$(document).on('click', '#dayBtnRemove', function(e){--}}
                {{--e.preventDefault();--}}
                {{--$('#priceParentDiv').remove(); //Remove field html--}}

            {{--});--}}


        {{--});--}}
    {{--</script>--}}


@endsection
