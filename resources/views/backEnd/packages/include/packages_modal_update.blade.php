<div class="row">
    <div class="col-md-6 col-sm-6">
        <div tabindex="-1" class="modal fade" id="form-dialog-pack{{$package->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Package Title</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/update-package')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="component-box">
                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Category</label>
                                                    <select id="category_id_{{$package->id}}" required class="form-control" name="category_id">
                                                        <option value="">--Select Category--</option>
                                                        @foreach($packLists as $packList)
                                                            <option value="{{$packList->id}}">{{$packList->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <script>
                                                        document.getElementById("category_id_{{$package->id}}").value = '{{$package->category_id}}';
                                                    </script>
                                                </div>
                                                @if ($errors->has('category_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('category_id') }}</strong>
                                                        </span>
                                                @endif
                                                {{--<div class="form-group">--}}
                                                    {{--<label for="regular1" class="control-label">Country</label>--}}
                                                    {{--<select id="country_id_{{$package->id}}" required class="form-control" name="country_id">--}}
                                                        {{--<option value="">--Select Country--</option>--}}
                                                        {{--@foreach($countries as $country)--}}
                                                            {{--<option value="{{$country->id}}">{{$country->name}}</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}
                                                    {{--<script>--}}
                                                        {{--document.getElementById("country_id_{{$package->id}}").value = '{{$package->country_id}}';--}}
                                                    {{--</script>--}}
                                                {{--</div>--}}
                                                {{--@if ($errors->has('category_id'))--}}
                                                    {{--<span class="invalid-feedback" role="alert">--}}
                                                        {{--<strong style="color: red">{{ $errors->first('category_id') }}</strong>--}}
                                                        {{--</span>--}}
                                                {{--@endif--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label for="regular1" class="control-label">Division</label>--}}
                                                    {{--<select id="division_id{{$package->id}}"  class="form-control" name="division_id">--}}
                                                        {{--<option value="">--Select Country--</option>--}}
                                                        {{--@foreach($divisions as $division)--}}
                                                            {{--<option value="{{$division->id}}">{{$division->name}}</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}
                                                    {{--<script>--}}
                                                        {{--document.getElementById("division_id{{$package->id}}").value = '{{$package->division_id}}';--}}
                                                    {{--</script>--}}
                                                {{--</div>--}}
                                                {{--@if ($errors->has('category_id'))--}}
                                                    {{--<span class="invalid-feedback" role="alert">--}}
                                                        {{--<strong style="color: red">{{ $errors->first('category_id') }}</strong>--}}
                                                        {{--</span>--}}
                                                {{--@endif--}}
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Code</label>
                                                    <input type="text" class="form-control" value="{{$package->code}}" name="code">
                                                    <input type="hidden"  class="form-control" value="{{$package->id}}" name="id">
                                                </div>
                                                @if ($errors->has('code'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('code') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Name</label>
                                                    <input type="text" class="form-control" value="{{$package->name}}" name="name">
                                                </div>
                                                @if ($errors->has('code'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('code') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Name Color</label>
                                                    <input type="text" class="form-control" value="{{$package->name_color}}" name="name_color">
                                                </div>
                                                @if ($errors->has('name_color'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('name_color') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Location</label>
                                                    <input type="text" class="form-control" value="{{$package->location}}" name="location">
                                                </div>
                                                @if ($errors->has('location'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('location') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Duration</label>
                                                    <input type="text" class="form-control" value="{{$package->duration}}" name="duration">
                                                </div>
                                                @if ($errors->has('duration'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('duration') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Price</label>
                                                    <input type="text" class="form-control" value="{{$package->price}}" name="price">
                                                </div>
                                                @if ($errors->has('price'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('price') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Short Description</label>
                                                    <textarea  class="form-control" name="short_description" >{{$package->short_description}}</textarea>
                                                </div>
                                                @if ($errors->has('short_description'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('short_description') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Short Description Color</label>
                                                    <input type="text"  class="form-control" value="{{$package->short_description_color}}" name="short_description_color">
                                                </div>
                                                @if ($errors->has('short_description_color'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('short_description_color') }}</strong>
                                                    </span>
                                                @endif
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="regular1" class="control-label">Long Description</label>--}}
{{--                                                    <textarea  class="form-control" id="long_description_{{$package->id}}" name="long_description" >{{$package->long_description}}</textarea>--}}
{{--                                                </div>--}}
{{--                                                @if ($errors->has('long_description'))--}}
{{--                                                    <span class="invalid-feedback" role="alert">--}}
{{--                                                        <strong style="color: red">{{ $errors->first('long_description') }}</strong>--}}
{{--                                                    </span>--}}
{{--                                                @endif--}}
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Includes</label>
                                                    <textarea  class="form-control" id="includes_up_{{$package->id}}" name="includes" >{{$package->includes}}</textarea>
                                                </div>
                                                @if ($errors->has('includes'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('includes') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Excludes</label>
                                                    <textarea  class="form-control" id="excludes_up_{{$package->id}}" name="excludes" >{{$package->excludes}}</textarea>
                                                </div>
                                                @if ($errors->has('excludes'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('excludes') }}</strong>
                                                    </span>
                                                @endif

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Fixed Date</label>
                                                    <input type="text" class="form-control" value="{{$package->fixed_date}}" name="fixed_date">
                                                </div>
                                                @if ($errors->has('fixed_date'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('fixed_date') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Destination Location</label>
                                                    <input type="text" class="form-control" value="{{$package->destination_location}}" name="destination_location">
                                                </div>
                                                @if ($errors->has('destination_location'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('destination_location') }}</strong>
                                                    </span>
                                                @endif

                                                <!--<div class="form-group">-->
                                                <!--    <label for="tour_details_up_{{$package->id}}" class="control-label">Tour Details</label>-->
                                                <!--    <textarea required id="tour_details_up_{{$package->id}}" name="tour_details" class="form-control">{!! $package->tour_details !!}</textarea>-->
                                                <!--</div>-->
                                                <!--@if ($errors->has('tour_details'))-->
                                                <!--    <span class="invalid-feedback" role="alert">-->
                                                <!-- <strong style="color: red">{{ $errors->first('tour_details') }}</strong>-->
                                                <!--</span>-->
                                                <!--@endif-->
                                                <div class="form-group">
                                                    <label for="important_note_up_{{$package->id}}" class="control-label">Important Note</label>
                                                    <textarea required id="important_note_up_{{$package->id}}" name="important_note" class="form-control">{!! $package->important_note !!}</textarea>
                                                </div>
                                                @if ($errors->has('important_note'))
                                                    <span class="invalid-feedback" role="alert">
                                                 <strong style="color: red">{{ $errors->first('important_note') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="terms_and_condition_up_{{$package->id}}" class="control-label">Terms & Condition</label>
                                                    <textarea required id="terms_and_condition_up_{{$package->id}}" name="terms_and_condition" class="form-control">{!! $package->terms_and_condition !!}</textarea>
                                                </div>
                                                @if ($errors->has('terms_and_condition'))
                                                    <span class="invalid-feedback" role="alert">
                                                 <strong style="color: red">{{ $errors->first('terms_and_condition') }}</strong>
                                                </span>
                                                @endif

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Box Image</label>
                                                    <img style="width: 530px; height: 200px" id="output_image2_{{$package->id}}" src="{{asset($package->box_image)}}">
                                                    <br/> <br/>
                                                    <input onchange="preview_image2({{$package->id}})" type="file" accept="image/*"   name="box_image">
                                                </div>
                                                @if ($errors->has('box_image'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('box_image') }}</strong>
                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Background Image</label>
                                                    <img style="width: 530px; height: 200px" id="output_image3_{{$package->id}}" src="{{asset($package->banner_image)}}">
                                                    <br/> <br/>
                                                    <input onchange="preview_image3({{$package->id}})" type="file" accept="image/*"   name="banner_image">
                                                </div>
                                                @if ($errors->has('background_image'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('background_image') }}</strong>
                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$package->combo == 1 ? 'checked' : ' '}} type="radio" name="combo" id="inlineRadio1" value="1">
                                                        <span for="inlineRadio1">Combo</span> </label>
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$package->combo == 0 ? 'checked' : ' '}} type="radio" name="combo" id="inlineRadio2" value="0" >
                                                        <span for="inlineRadio2">Single</span> </label>
                                                </div>
                                                @if ($errors->has('combo'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('combo') }}</strong>
                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$package->status == 1 ? 'checked' : ' '}} type="radio" name="status" id="inlineRadio1" value="1">
                                                        <span for="inlineRadio1">Publish</span> </label>
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$package->status == 0 ? 'checked' : ' '}} type="radio" name="status" id="inlineRadio2" value="0" >
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
    CKEDITOR.replace( 'includes_up_{{$package->id}}' );
    CKEDITOR.replace( 'excludes_up_{{$package->id}}' );
    // CKEDITOR.replace( 'long_description_{{$package->id}}' );
    // CKEDITOR.replace( 'tour_details_up_{{$package->id}}' );
    CKEDITOR.replace( 'important_note_up_{{$package->id}}' );
    CKEDITOR.replace( 'terms_and_condition_up_{{$package->id}}' );
</script>
