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
                        <h1>{{$packagetab->name}}</h1>
                    </section>
                    <section class="row component-section">
                        <div class="container"><h2><strong>-- Package Tab Itinerary --</strong></h2> </div>
                        @include('backEnd.packages.include.tabs.tab_itineraray_model')
                        <br/>
                        <div class="table-responsive pmd-card pmd-z-depth">
                            <table class="table table-mc-red pmd-table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Title</th>
                                    <th style="text-align: center">Description</th>
                                    <th style="text-align: center">Price</th>
                                    <th style="text-align: center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($packagetab->tabItineraryTitles as $packagetab->tab_itinerary_title)
                                    <tr>
                                        <td style="text-align: center" data-title="Ticket No">{{$packagetab->tab_itinerary_title->title}}</td>
                                        <td style="text-align: center" data-title="Month">{{$packagetab->tab_itinerary_title->description}}</td>
                                        <td style="text-align: center" data-title="Month">{{$packagetab->tab_itinerary_title->price}}</td>

                                        <td style="text-align: center" class="pmd-table-row-action">
                                            <a data-target="#form-dialog-itinerary{{$packagetab->tab_itinerary_title->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                                <i class="material-icons md-dark pmd-sm">edit</i>
                                            </a>
                                            <a href="{{URL::to('/apanel/delete-package-tab-itinerary/'.$packagetab->tab_itinerary_title->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Package Tab Itinerary !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                                <i class="material-icons md-dark pmd-sm">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @include('backEnd.packages.include.tabs.tab_itineraray_model_update')
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </section>

                    <section class="row component-section">
                        <div class="container"><h2><strong>-- Package Tab Hotel --</strong></h2> </div>
                        @include('backEnd.packages.include.tabs.tab_hotel_modal')
                        <br/>
                        <div class="table-responsive pmd-card pmd-z-depth">
                            <table class="table table-mc-red pmd-table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">HOtel Name</th>
                                    <th style="text-align: center">Star</th>
                                    <th style="text-align: center">Category</th>
                                    <th style="text-align: center">Website</th>
                                    <th style="text-align: center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($packagetab->hotels as $packagetab->hotel)
                                    <tr>
                                        <td style="text-align: center" data-title="Ticket No">{{$packagetab->hotel->hotel->name}}</td>
                                        <td style="text-align: center" data-title="Month">{{$packagetab->hotel->hotel->star}}</td>
                                        <td style="text-align: center" data-title="Month">{{$packagetab->hotel->hotel->category}}</td>
                                        <td style="text-align: center" data-title="Month">{{$packagetab->hotel->hotel->web_site}}</td>

                                        <td style="text-align: center" class="pmd-table-row-action">

                                            <a href="{{URL::to('/apanel/delete-package-tab-hotel/'.$packagetab->hotel->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Package Tab Hotel !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                                <i class="material-icons md-dark pmd-sm">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    {{--@include('backEnd.packages.include.about_tour_modal_update')--}}
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </section>
                    <!-- icons of different sizes -->
                    <section class="row">
                        <div class="container"><h2><strong>-- Package Tab Information --</strong></h2> </div>
                        <div class="col-md-12">
                            <div class="pmd-card pmd-z-depth pmd-card-custom-view">
                                <div class="pmd-card-body text-center">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Name
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$packagetab->name}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Itinerary Title
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$packagetab->itinerary_title}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Tab Note
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$packagetab->tab_note}}
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            Special Note
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                            :
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            {{$packagetab->special_note}}
                                        </div>
                                    </div>
                                    <br/>



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
