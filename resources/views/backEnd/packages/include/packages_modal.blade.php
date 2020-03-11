<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-sub" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Package</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-sub" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Package</h2>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('/apnel/add-package')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="category_id" class="control-label">Category</label>
                                                <select id="category_id" required class="form-control" name="category_id">
                                                    <option value="">--Select Category--</option>
                                                    @foreach($packLists as $packList)
                                                        <option value="{{$packList->id}}">{{$packList->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('category_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('category_id') }}</strong>
                                                </span>
                                            @endif

                                            <style>
                                                .select2-container {
                                                    width: 100% !important;
                                                }
                                            </style>
                                            <div class="component-box">

                                                <div class="row toggle-button-custom">
                                                    <div class="col-md-12">
                                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                                            <div class="pmd-card-body">
                                                                <!--Select Multiple Tags -->
                                                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                                    <label style="color: black">Select Country</label>
                                                                    <select class="form-control select-tags pmd-select2-tags" required name="package_country[]" multiple>
                                                                        @foreach($countries as $country)
                                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--<div class="form-group">--}}
                                                {{--<label for="country_id" class="control-label">Country</label>--}}
                                                {{--<select id="country_id" required class="form-control" name="country_id">--}}
                                                    {{--<option value="">--Select Country--</option>--}}
                                                    {{--@foreach($countries as $country)--}}
                                                        {{--<option value="{{$country->id}}">{{$country->name}}</option>--}}
                                                    {{--@endforeach--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                            {{--@if ($errors->has('country_id'))--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                                    {{--<strong style="color: red">{{ $errors->first('country_id') }}</strong>--}}
                                                {{--</span>--}}
                                            {{--@endif--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="regular1" class="control-label">Division Name</label>--}}
                                                {{--<select class="form-control" id="division_id" name="division_id">--}}
                                                    {{--<option>-Select Division-</option>--}}

                                                {{--</select>--}}
                                            {{--</div>--}}
                                            {{--@if ($errors->has('division_id'))--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong style="color: red">{{ $errors->first('division_id') }}</strong>--}}
                                    {{--</span>--}}
                                            {{--@endif--}}
                                            <div class="form-group">
                                                <label for="code" class="control-label">Code</label>
                                                <input type="text" id="code" required class="form-control" name="code">
                                            </div>
                                            @if ($errors->has('code'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('code') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="name" class="control-label">Name</label>
                                                <input type="text" id="name" required class="form-control" name="name">
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="name_color" class="control-label">Name Color</label>
                                                <input type="text" value="#ffff" id="name_color" required class="form-control" name="name_color">
                                            </div>
                                            @if ($errors->has('name_color'))
                                                <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('name_color') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="location" class="control-label">Location</label>
                                                <input type="text" id="location" required class="form-control" name="location">
                                            </div>
                                            @if ($errors->has('location'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('location') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="duration" class="control-label">Duration</label>
                                                <input type="text" id="duration" required class="form-control" name="duration">
                                            </div>
                                            @if ($errors->has('duration'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('duration') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="price" class="control-label">Price</label>
                                                <input type="text" id="price" required class="form-control" name="price">
                                            </div>
                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('price') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="short_description" class="control-label">Short Description</label>
                                                <textarea required id="short_description" name="short_description" class="form-control"></textarea>
                                            </div>
                                            @if ($errors->has('short_description'))
                                                <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('short_description') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="short_description_color" class="control-label">Short Description Color</label>
                                                <input type="text" value="#ffff" id="short_description_color" required class="form-control" name="short_description_color">
                                            </div>
                                            @if ($errors->has('short_description_color'))
                                                <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('short_description_color') }}</strong>
                                                </span>
                                            @endif
{{--                                            <div class="form-group">--}}
{{--                                                <label for="long_description" class="control-label">Long Description</label>--}}
{{--                                                <textarea required id="long_description" name="long_description" class="form-control"></textarea>--}}
{{--                                            </div>--}}
{{--                                            @if ($errors->has('long_description'))--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                 <strong style="color: red">{{ $errors->first('long_description') }}</strong>--}}
{{--                                                </span>--}}
{{--                                            @endif--}}
                                            <div class="form-group">
                                                <label for="long_description" class="control-label">Includes</label>
                                                <textarea required id="include" name="includes" class="form-control"></textarea>
                                            </div>
                                            @if ($errors->has('includes'))
                                                <span class="invalid-feedback" role="alert">
                                                 <strong style="color: red">{{ $errors->first('includes') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="long_description" class="control-label">Excludes</label>
                                                <textarea required id="exclude" name="excludes" class="form-control"></textarea>
                                            </div>
                                            @if ($errors->has('excludes'))
                                                <span class="invalid-feedback" role="alert">
                                                 <strong style="color: red">{{ $errors->first('excludes') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="duration" class="control-label">Fixed Date</label>
                                                <input type="text" id="duration" required class="form-control" name="fixed_date">
                                            </div>
                                            @if ($errors->has('fixed_date'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('fixed_date') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="duration" class="control-label">Destination Location</label>
                                                <input type="text" id="duration" required class="form-control" name="destination_location">
                                            </div>
                                            @if ($errors->has('destination_location'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('destination_location') }}</strong>
                                                </span>
                                            @endif
                                            <!--<div class="form-group">-->
                                            <!--    <label for="tour_details" class="control-label">Tour Details</label>-->
                                            <!--    <textarea required id="tour_details" name="tour_details" class="form-control"></textarea>-->
                                            <!--</div>-->
                                            <!--@if ($errors->has('tour_details'))-->
                                            <!--    <span class="invalid-feedback" role="alert">-->
                                            <!--     <strong style="color: red">{{ $errors->first('tour_details') }}</strong>-->
                                            <!--    </span>-->
                                            <!--@endif-->
                                            <div class="form-group">
                                                <label for="important_note" class="control-label">Important Note</label>
                                                <textarea required id="important_note" name="important_note" class="form-control"></textarea>
                                            </div>
                                            @if ($errors->has('important_note'))
                                                <span class="invalid-feedback" role="alert">
                                                 <strong style="color: red">{{ $errors->first('important_note') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="terms_and_condition" class="control-label">Terms & Condition</label>
                                                <textarea required id="terms_and_condition" name="terms_and_condition" class="form-control"></textarea>
                                            </div>
                                            @if ($errors->has('terms_and_condition'))
                                                <span class="invalid-feedback" role="alert">
                                                 <strong style="color: red">{{ $errors->first('terms_and_condition') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="box_image" class="control-label">Box Image</label>
                                                <input type="file" id="box_image"  required name="box_image" accept="image/*">
                                            </div>
                                            @if ($errors->has('box_image'))
                                                <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('box_image') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="banner_image" class="control-label">Banner Image</label>
                                                <input type="file" id="banner_image" required  name="banner_image" accept="image/*">
                                            </div>
                                            @if ($errors->has('banner_image'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('banner_image') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="gellery_image" class="control-label">Gellery Image (multiple)</label>
                                                <input type="file" multiple id="gellery_image"  required name="gellery_image[]" accept="image/*">
                                            </div>
                                            @if ($errors->has('gellery_image'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('gellery_image') }}</strong>
                                                </span>
                                            @endif
                                            {{--<hr/>--}}
                                            {{--<h2>Detailed Day Wise Itinerary</h2>--}}
                                            {{--<hr/>--}}
                                            {{--<div id="days">--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label for="day" class="control-label">Day</label>--}}
                                                    {{--<input type="text" id="day" required class="form-control" name="day[]">--}}
                                                {{--</div>--}}

                                                {{--<div class="form-group">--}}
                                                    {{--<label for="day_title" class="control-label">Date</label>--}}
                                                    {{--<input type="text" id="date" required class="form-control" name="date[]">--}}
                                                {{--</div>--}}

                                                {{--<div class="form-group">--}}
                                                    {{--<label for="day_title" class="control-label">Overnight Stay</label>--}}
                                                    {{--<input type="text" id="overnight_stay" required class="form-control" name="overnight_stay[]">--}}
                                                {{--</div>--}}

                                                {{--<div class="form-group">--}}
                                                    {{--<label for="day_description" class="control-label">Day Description</label>--}}
                                                    {{--<textarea required id="day_description" name="day_description[]" class="form-control"></textarea>--}}
                                                {{--</div>--}}
                                            {{--<!-- Default inline 1-->--}}
                                                {{--<div class="component-box">--}}
                                                    {{--<!-- checkbox example -->--}}
                                                    {{--<div class="row">--}}
                                                        {{--<div class="col-md-12">--}}
                                                            {{--<div class="pmd-card pmd-z-depth">--}}
                                                                {{--<div class="pmd-card-body">--}}
                                                                    {{--<!--Inline checkboxes-->--}}
                                                                    {{--<form>--}}
                                                                        {{--<label class="checkbox-inline pmd-checkbox pmd-checkbox-ripple-effect">--}}
                                                                            {{--<input type="checkbox" name="breakfirst[]" value="1">--}}
                                                                            {{--<span> Breakfast</span>--}}
                                                                        {{--</label>--}}
                                                                        {{--<label class="checkbox-inline pmd-checkbox pmd-checkbox-ripple-effect">--}}
                                                                            {{--<input type="checkbox" name="lunch[]" value="1">--}}
                                                                            {{--<span> Lunch</span>--}}
                                                                        {{--</label>--}}
                                                                        {{--<label class="checkbox-inline pmd-checkbox pmd-checkbox-ripple-effect">--}}
                                                                            {{--<input type="checkbox" name="dinner[]" value="1">--}}
                                                                            {{--<span> Dinner</span>--}}
                                                                        {{--</label>--}}
                                                                    {{--</form>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div> <!-- checkbox example end-->--}}
                                                {{--</div>--}}

                                                {{--<div class="form-group">--}}
                                                    {{--<button class="btn btn-primary"  id="dayBtn" >Add More</button>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="combo" id="status1" value="1">
                                                    <span for="inlineRadio1">Combo</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input checked type="radio" name="combo" id="status2" value="0" >
                                                    <span for="inlineRadio2">Single</span> </label>
                                            </div>
                                            @if ($errors->has('combo'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('combo') }}</strong>
                                                </span>
                                            @endif


                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input checked type="radio" name="status" id="status1" value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="status2" value="0" >
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


<script>
    CKEDITOR.replace( 'include' );
    CKEDITOR.replace( 'exclude' );
    // CKEDITOR.replace( 'long_description' );
    // CKEDITOR.replace( 'tour_details' );
    CKEDITOR.replace( 'important_note' );
    CKEDITOR.replace( 'terms_and_condition' );
</script>
