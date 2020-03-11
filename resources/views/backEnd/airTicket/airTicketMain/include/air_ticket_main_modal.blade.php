<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-sub" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Air ticket</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-sub" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Air Ticket Information</h2>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('/add-air-ticket')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Name</label>
                                                <input type="text"  class="form-control" name="name">
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="air_ticket_title_id" class="control-label">Category</label>
                                                <select id="air_ticket_title_id" required class="form-control" name="air_ticket_title_id">
                                                    <option value="">--Select Air Ticket Category--</option>
                                                    @foreach($air_ticket_titles as $air_ticket_title)
                                                        <option value="{{$air_ticket_title->id}}">{{$air_ticket_title->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('air_ticket_title_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('air_ticket_title_id') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="destination" class="control-label">Destination</label>
                                                <select class="form-control" id="destination" name="destination">
                                                    <option>-Select Destination-</option>

                                                </select>
                                            </div>
                                            @if ($errors->has('division_id'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('division_id') }}</strong>
                                    </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="category_id" class="control-label">Air Line</label>
                                                <select id="country_id" required class="form-control" name="air_line_id">
                                                    <option value="">--Select Air Line--</option>
                                                    @foreach($air_lines as $air_line)
                                                        <option value="{{$air_line->id}}">{{$air_line->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('air_line_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('air_line_id') }}</strong>
                                                </span>
                                            @endif


                                            <style>
                                                .select2-container {
                                                    width: 100% !important;
                                                }
                                            </style>

                                            <div class="row toggle-button-custom">
                                                <div class="col-md-12">
                                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                                        <div class="pmd-card-body">
                                                            <!--Select Multiple Tags -->
                                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                                <label style="color: black">Select Day</label>
                                                                <select class="form-control select-tags pmd-select2-tags" required name="day_id[]" multiple>
                                                                    @foreach($days as $day)
                                                                        <option value="{{$day->id}}">{{$day->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($errors->has('day_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('day_id') }}</strong>
                                                </span>
                                            @endif
                                            <br/>
                                            <hr/>
                                            <div id="days">
                                                <div class="form-group">
                                                    <label for="day" class="control-label">Up Name</label>
                                                    <input type="text" id="day" required class="form-control" name="up_name[]">
                                                </div>

                                                <div class="form-group">
                                                    <label for="day_title" class="control-label">Up Time</label>
                                                    <input type="text" id="date" required class="form-control" name="up_time[]">
                                                </div>
                                                <div class="form-group">
                                                    <label for="day" class="control-label">Down Name</label>
                                                    <input type="text" id="day"  class="form-control" name="down_name[]">
                                                </div>

                                                <div class="form-group">
                                                    <label for="day_title" class="control-label">Down Time</label>
                                                    <input type="text" id="date"  class="form-control" name="down_time[]">
                                                </div>
                                                <div class="form-group">
                                                    <label for="day_title" class="control-label">Destination Price</label>
                                                    <input type="number" id="date"  required class="form-control" name="destination_price[]">
                                                </div>
                                                <!-- Default inline 1-->
                                                <div class="form-group">
{{--                                                    <button class="btn btn-primary"  id="dayBtn" >Add More</button>--}}
                                                </div>
                                            </div>
                                            <div id="days1"></div>

                                            <hr/>

{{--                                            <div class="form-group">--}}
{{--                                                <label for="regular1" class="control-label">Price</label>--}}
{{--                                                <input type="number"  class="form-control" name="price">--}}
{{--                                            </div>--}}
{{--                                            @if ($errors->has('price'))--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong style="color: red">{{ $errors->first('price') }}</strong>--}}
{{--                                                </span>--}}
{{--                                            @endif--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="regular1" class="control-label">Ticket Class</label>--}}
{{--                                                <input type="text"  class="form-control" name="ticket_class">--}}
{{--                                            </div>--}}
{{--                                            @if ($errors->has('ticket_class'))--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong style="color: red">{{ $errors->first('ticket_class') }}</strong>--}}
{{--                                                </span>--}}
{{--                                            @endif--}}
                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="inlineRadio1" value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="inlineRadio2" value="0" >
                                                    <span for="inlineRadio2">Unpublish</span> </label>
                                            </div>
                                            @if ($errors->has('status'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('status') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div><!-- end Text fields example -->

                        </div>
                            <div class="pmd-modal-action">
                                <button  class="btn pmd-ripple-effect btn-primary" type="submit">Save</button>
                                <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--Form dialog example end -->

</div>


<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<script>
    $(document).ready(function () {
        $('#dayBtn').click(function (e) {
            e.preventDefault();
            $('#days1').append('<div id="priceParentDiv" class="form-group"><div class="form-group">\n' +
                '                                                    <label for="day" class="control-label">Up Name</label>\n' +
                '                                                    <input type="text" id="day" required class="form-control" name="up_name[]">\n' +
                '                                                </div>\n' +
                '\n' +
                '                                                <div class="form-group">\n' +
                '                                                    <label for="day_title" class="control-label">Up Time</label>\n' +
                '                                                    <input type="text" id="date" required class="form-control" name="up_time[]">\n' +
                '                                                </div>\n' +
                '                                                <div class="form-group">\n' +
                '                                                    <label for="day" class="control-label">Down Name</label>\n' +
                '                                                    <input type="text" id="day"  class="form-control" name="down_name[]">\n' +
                '                                                </div>\n' +
                '\n' +
                '                                                <div class="form-group">\n' +
                '                                                    <label for="day_title" class="control-label">Down Time</label>\n' +
                '                                                    <input type="text" id="date"  class="form-control" name="down_time[]">\n' +
                '                                                </div>\n' +
                '                                                <div class="form-group">\n' +
                '                                                    <label for="day_title" class="control-label">Destination Price</label>\n' +
                '                                                    <input type="number" id="date" required class="form-control" name="destination_price[]">\n' +
                '                                                </div>\n' +
                '                                                <!-- Default inline 1-->\n' +
                '                                                <div class="form-group">\n' +
                '                                                    <button class="btn btn-danger"  id="dayBtnRemove" >Remove</button>\n' +
                '                                                </div></div>');
        });

        $(document).on('click', '#dayBtnRemove', function(e){
            e.preventDefault();
            $('#priceParentDiv').remove(); //Remove field html

        });


    });
</script>
