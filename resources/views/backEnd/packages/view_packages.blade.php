@extends('backEnd.index')
@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            @if(Session::get('message'))
                <br/>
            <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>
            @endif
            <!-- Table -->

            <div class="col-md-12">
                <div class="component-box">
                    <section class="row" style="text-align: center">
                        <h1>{{$package->name}}</h1>
                    </section>
                    <section class="row">
                        <div class="col-md-12">

                            <div id="mdb-lightbox-ui"></div>
                            <div class="mdb-lightbox no-margin">
                                <div class="container"><h2><strong>-- Gellery Images --</strong></h2> </div>
                                @foreach($gellery_images as $gellery_image)
                                    <figure class="col-md-4">
                                        <a href="{{asset($gellery_image->gellery_image)}}" data-size="1600x1067">
                                            <img alt="picture" src="{{asset($gellery_image->gellery_image)}}" class="img-thumbnail">
                                            <a href="{{URL::to('/apanel/delete-gellery-image/'.$gellery_image->id)}}"  onclick="return confirm('Are You Sure? You Want To Delete This Image !!!')" class="btn btn-danger btn-block">Delete</a>

                                        </a>
                                        <br/>
                                        <br/>
                                    </figure>
                                @endforeach

                            </div>

                        </div>
                    </section>
                    <section class="row">
                        {{--<div class="container">--}}
                        <div class="container"><h2><strong>-- Upload Images --</strong></h2> </div>
                        <form action="{{URL::to('/upload-gellery-image')}}" id="uploadImage" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="col-md-6 col-sm-12">
                                <input type="hidden"   name="package_id" value="{{$package->id}}">
                                <input type="file" id="productImagefield" multiple  name="gellery_image[]" accept="image/*">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input id="imageBtn" disabled style="float: right" type="submit" class="btn btn-success btn-block" value="Add Image">
                            </div>
                            @csrf
                        </form>
                        {{--</div>--}}
                    </section>
                    <section class="row">
                        <div class="container"><h2><strong>-- Tour Days --</strong></h2> </div>
                        @include('backEnd.packages.include.days_modal')
                        <br/>
                        <div class="table-responsive pmd-card pmd-z-depth">
                            <table class="table table-mc-red pmd-table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Day</th>
                                    <th style="text-align: center">Date</th>
                                    <th style="text-align: center">Overnight Stay</th>
                                    <th style="text-align: center">Descrtiption</th>
                                    <th style="text-align: center">Food</th>
                                    <th style="text-align: center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tour_days as $tour_day)
                                    <tr>
                                        <td style="text-align: center" data-title="Ticket No">{{$tour_day->day}}</td>
                                        @if($tour_day->date != null)
                                        <td style="text-align: center" data-title="Month">{{$tour_day->date}}</td>
                                        @else
                                        <td style="text-align: center" data-title="Month">Not Defined</td>
                                        @endif

                                        <td style="text-align: center" data-title="Month">{{$tour_day->overnight_stay}}</td>
                                        <td style="text-align: center" data-title="Month">{{$tour_day->day_description}}</td>
                                        <td style="text-align: center" data-title="Month">
                                            {{$tour_day->breakfast == 1 ? 'Breakfast ' : ''}}
                                            {{$tour_day->lunch == 1 ? '| Lunch |' : ''}}
                                            {{$tour_day->dinner == 1 ? 'Dinner' : ''}}
                                            @if($tour_day->breakfast == null )
                                               @if($tour_day->lunch == null)
                                                   @if($tour_day->dinner == null)
                                                       No Food Available
                                                   @endif
                                               @endif
                                            @endif
                                        </td>

                                        <td style="text-align: center" class="pmd-table-row-action">
                                            <a data-target="#form-dialog-days{{$tour_day->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                                <i class="material-icons md-dark pmd-sm">edit</i>
                                            </a>
                                            <a href="{{URL::to('/apanel/delete-package-day/'.$tour_day->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Day !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                                <i class="material-icons md-dark pmd-sm">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @include('backEnd.packages.include.days_modal_update')
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </section>
                    <section class="row component-section">
                        <div class="container"><h2><strong>-- Package Country --</strong></h2> </div>
                        @include('backEnd.packages.include.package_country_modal')
                        <br/>
                        <div class="table-responsive pmd-card pmd-z-depth">
                            <table class="table table-mc-red pmd-table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Country Name</th>
                                    <th style="text-align: center">Update Date</th>
                                    <th style="text-align: center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($package->packageCountries as $packageCountry)
                                    <tr>
                                        <td style="text-align: center" data-title="Ticket No">{{$packageCountry->country->name}}</td>
                                        <td style="text-align: center" data-title="Month">{{$packageCountry->updated_at}}</td>
                                        <td style="text-align: center" class="pmd-table-row-action">

                                            <a href="{{URL::to('/apanel/delete-package-country/'.$packageCountry->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Package Country !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                                <i class="material-icons md-dark pmd-sm">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    {{--@include('backEnd.packages.include.tab_modal_update')--}}
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </section>
                    <section class="row component-section">
                        <div class="container"><h2><strong>-- Package Divisions --</strong></h2> </div>
                        @include('backEnd.packages.include.package_division_modal')
                        <br/>
                        <div class="table-responsive pmd-card pmd-z-depth">
                            <table class="table table-mc-red pmd-table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Division Name</th>
                                    <th style="text-align: center">Update Date</th>
                                    <th style="text-align: center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($package->packageDivisions as $packageDivision)
                                    <tr>
                                        <td style="text-align: center" data-title="Ticket No">{{$packageDivision->division->name}}</td>
                                        <td style="text-align: center" data-title="Month">{{$packageDivision->updated_at}}</td>
                                        <td style="text-align: center" class="pmd-table-row-action">

                                            <a href="{{URL::to('/apanel/delete-package-division/'.$packageDivision->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Package Division !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                                <i class="material-icons md-dark pmd-sm">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    {{--@include('backEnd.packages.include.tab_modal_update')--}}
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </section>
                    <section class="row component-section">
                        <div class="container"><h2><strong>-- Package Tabs --</strong></h2> </div>
                        @include('backEnd.packages.include.tab_modal')
                        <br/>
                        <div class="table-responsive pmd-card pmd-z-depth">
                            <table class="table table-mc-red pmd-table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Name</th>
                                    <th style="text-align: center">Itineraty Title</th>
                                    <th style="text-align: center">Tab Note</th>
                                    <th style="text-align: center">Special Note</th>
                                    <th style="text-align: center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($packageTabs as $packageTab)
                                    <tr>
                                        <td style="text-align: center" data-title="Ticket No">{{$packageTab->name}}</td>
                                        <td style="text-align: center" data-title="Month">{{$packageTab->itinerary_title}}</td>
                                        <td style="text-align: center" data-title="Month">{{$packageTab->tab_note}}</td>
                                        <td style="text-align: center" data-title="Month">{{$packageTab->special_note}}</td>

                                        <td style="text-align: center" class="pmd-table-row-action">
                                            <a href="{{URL::to('/apanel/view-package-tab/'.$packageTab->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                                <i  class="material-icons md-dark pmd-sm">search</i>
                                            </a>
                                            <a data-target="#form-dialog-packag-tab{{$packageTab->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                                <i class="material-icons md-dark pmd-sm">edit</i>
                                            </a>
                                            <a href="{{URL::to('/apanel/delete-package-tab/'.$packageTab->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Package Tab !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                                <i class="material-icons md-dark pmd-sm">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @include('backEnd.packages.include.tab_modal_update')
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </section>
                    <!-- icons of different sizes -->
                    <section class="row">
                        <div class="container"><h2><strong>-- Package Information --</strong></h2> </div>
                        <div class="col-md-12">
                            <div class="pmd-card pmd-z-depth pmd-card-custom-view">
                                <div class="pmd-card-body text-center">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Code
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$package->code}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Name
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$package->name}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Category
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$package->category->name}}
                                        </div>
                                    </div>
                                    <br/>
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-5 col-sm-5 col-xs-6">--}}
                                            {{--Country--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-2 col-sm-2 col-xs-6">--}}
                                            {{--:--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-5 col-sm-5 col-xs-6">--}}
                                            {{--{{$package->country->name}}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    @if($package->division_id != null )
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Division
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$package->division->name}}
                                        </div>
                                    </div>
                                    @endif
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Location
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$package->location}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Duration
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$package->duration}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Price
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$package->price}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Short Description
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6" style="text-align: justify">
                                            {!! $package->short_description !!}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Long Description
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6" style="text-align: justify">
                                            {!! $package->long_description !!}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Status
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>

                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$package->status == 1 ? 'Published' : 'Unpublished'}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Box Image
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                           <img src="{{asset($package->box_image)}}"/>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Banner Image
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>

                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <img width="253"  src="{{asset($package->banner_image)}}"/>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </section>
                    <!-- icons of different sizes -->

                </div>
            </div>
            <!-- Card Footer -->

        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script>
        // MDB Lightbox Init
        $(function () {
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });
    </script>

    {{--<script>--}}
        {{--function deleteImage(id) {--}}
            {{--confirm('Are you sure?? you want to delete this image')--}}
            {{--$.ajax({--}}
                {{--type:'get',--}}
                {{--url: '{!! route('/delete-image') !!}',--}}
                {{--datatype: 'html',--}}
                {{--data:{'id':id},--}}

                {{--success:function (data) {--}}
                    {{--$('#'+id).hide();--}}
                    {{--window.location.reload();--}}
                    {{--$('#message').html('Image Deleted Successfully !!!');--}}

                {{--}--}}
            {{--});--}}
        {{--}--}}
    {{--</script>--}}

    <script>
        $(document).ready(function () {
            $('#productImagefield').change(function () {
                $('#imageBtn').removeAttr('disabled');
            });
        })
    </script>

    <script>
    $(document).ready(function () {
    $('#dayBtn').click(function (e) {
    e.preventDefault();
    $('#days1').append('<div id="priceParentDiv" class="form-group"><div class="form-group">\n' +
        '                                                <label for="day" class="control-label">Title</label>\n' +
        '                                                <input type="text" id="day" required class="form-control" name="title[]">\n' +
        '                                                </div>\n' +
        '\n' +
        '                                                <div class="form-group">\n' +
        '                                                <label for="day_title" class="control-label">Description</label>\n' +
        '                                                <input type="text" id="date" required class="form-control" name="description[]">\n' +
        '                                                </div>\n' +
        '\n' +
        '                                                <div class="form-group">\n' +
        '                                                <label for="day_title" class="control-label">Price</label>\n' +
        '                                                <input type="text" id="overnight_stay" required class="form-control" name="price[]">\n' +
        '                                                </div>\n' +
        '\n' +
        '                                                <!-- Default inline 1-->\n' +
        '                                                <div class="form-group">\n' +
        '                                                <button class="btn btn-danger"  id="dayBtnRemove" >Remove</button>\n' +
        '                                                </div></div>');
    });

    $(document).on('click', '#dayBtnRemove', function(e){
    e.preventDefault();
    $('#priceParentDiv').remove(); //Remove field html

    });


    });
    </script>

@endsection
