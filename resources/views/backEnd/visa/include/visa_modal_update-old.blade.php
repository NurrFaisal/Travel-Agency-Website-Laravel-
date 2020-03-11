<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-sub{{$visa->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Country</h2>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('/update-visa')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Continent</label>
                                                    <select id="continet_id_{{$visa->id}}" required class="form-control" name="continent_id">
                                                        <option value="">--Select Continent--</option>
                                                        @foreach($continents as $continent)
                                                            <option value="{{$continent->id}}">{{$continent->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <script>
                                                        document.getElementById("continet_id_{{$visa->id}}").value = '{{$visa->continent_id}}';
                                                    </script>
                                                </div>
                                                @if ($errors->has('continent_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('continent_id') }}</strong>
                                                        </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Country Name</label>
                                                    <input required type="text" id="regular1" value="{{$visa->country_name}}" class="form-control" name="country_name">
                                                    <input type="hidden" id="regular1" value="{{$visa->id}}" class="form-control" name="visa_id">
                                                </div>
                                                @if ($errors->has('country_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('country_name') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Price</label>
                                                    <input required type="text" id="regular1" value="{{$visa->price}}" class="form-control" name="price">
                                                </div>
                                                @if ($errors->has('price'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('price') }}</strong>
                                                </span>
                                                @endif

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">E-VISA Price</label>
                                                    <input type="text" id="regular1" value="{{$visa->e_price}}" class="form-control" name="e_price">
                                                </div>
                                                @if ($errors->has('e_price'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('e_price') }}</strong>
                                                </span>
                                                @endif

                                                <div class="form-group">
                                                    <label class="control-label">Short Description</label>
                                                    <textarea required name="short_description" class="form-control">{{$visa->short_description}}</textarea>
                                                </div>
                                                @if ($errors->has('short_description'))
                                                    <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('short_description') }}</strong>
                                            </span>
                                                @endif
                                                <div class="form-group">
                                                    <label class="control-label">Duration</label>
                                                    <input required type="text" value="{{$visa->duration}}"  class="form-control" name="duration">
                                                </div>
                                                @if ($errors->has('duration'))
                                                    <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('duration') }}</strong>
                                            </span>
                                                @endif
                                                {{--<div>--}}
                                            <!-- Nav tabs -->
                                                <div>
                                                    <h4>Sticker VISA</h4>
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li role="presentation" class="active"><a href="#bootstrap-professional_up_{{$visa->id}}" aria-controls="home" role="tab" data-toggle="tab">P Service</a></li>
                                                        <li role="presentation"><a href="#bootstrap-professional2_up_{{$visa->id}}" aria-controls="home" role="tab" data-toggle="tab">G Service</a></li>
                                                        <li role="presentation"><a href="#bootstrap-lawyer_up_{{$visa->id}}" aria-controls="home" role="tab" data-toggle="tab">Lawyer</a></li>
                                                        <li role="presentation"><a href="#bootstrap-business_up_{{$visa->id}}" aria-controls="about" role="tab" data-toggle="tab">Business</a></li>
                                                        <li role="presentation"><a href="#bootstrap-spouse_up_{{$visa->id}}" aria-controls="work" role="tab" data-toggle="tab">Spouse</a></li>
                                                        <li role="presentation"><a href="#bootstrap-student_up_{{$visa->id}}" aria-controls="work" role="tab" data-toggle="tab">Student</a></li>
                                                        <li role="presentation"><a href="#bootstrap-child_up_{{$visa->id}}" aria-controls="work" role="tab" data-toggle="tab">Retired</a></li>
                                                    </ul>
                                                {{--<div class="pmd-card">--}}
                                                {{--<div class="pmd-card-body">--}}
                                                <!-- Tab panes -->
                                                    <div class="tab-content">
                                                        @include('backEnd.visa.include.include.professional_up')
                                                        @include('backEnd.visa.include.include.professional2_up')
                                                        @include('backEnd.visa.include.include.lawyer_up')
                                                        @include('backEnd.visa.include.include.child_up')
                                                        @include('backEnd.visa.include.include.business_up')
                                                        @include('backEnd.visa.include.include.spouse_up')
                                                        @include('backEnd.visa.include.include.student_up')
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4>E-VISA</h4>
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li role="presentation" class="active"><a href="#bootstrap-professional-evisa_up_{{$visa->id}}" aria-controls="home" role="tab" data-toggle="tab">P Service</a></li>
                                                        <li role="presentation"><a href="#bootstrap-professional2-evisa_up_{{$visa->id}}" aria-controls="home" role="tab" data-toggle="tab">G Service</a></li>
                                                        <li role="presentation"><a href="#bootstrap-lawyer-evisa_up_{{$visa->id}}" aria-controls="home" role="tab" data-toggle="tab">Lawyer</a></li>
                                                        <li role="presentation"><a href="#bootstrap-business-evisa_up_{{$visa->id}}" aria-controls="about" role="tab" data-toggle="tab">Business</a></li>
                                                        <li role="presentation"><a href="#bootstrap-spouse-evisa_up_{{$visa->id}}" aria-controls="work" role="tab" data-toggle="tab">Spouse</a></li>
                                                        <li role="presentation"><a href="#bootstrap-student-evisa_up_{{$visa->id}}" aria-controls="work" role="tab" data-toggle="tab">Student</a></li>
                                                        <li role="presentation"><a href="#bootstrap-child-evisa_up_{{$visa->id}}" aria-controls="work" role="tab" data-toggle="tab">Retired</a></li>
                                                    </ul>
                                                {{--<div class="pmd-card">--}}
                                                {{--<div class="pmd-card-body">--}}
                                                <!-- Tab panes -->
                                                    <div class="tab-content">
                                                        @include('backEnd.visa.include.include.evisa.professional_up')
                                                        @include('backEnd.visa.include.include.evisa.professional2_up')
                                                        @include('backEnd.visa.include.include.evisa.lawyer_up')
                                                        @include('backEnd.visa.include.include.evisa.child_up')
                                                        @include('backEnd.visa.include.include.evisa.business_up')
                                                        @include('backEnd.visa.include.include.evisa.spouse_up')
                                                        @include('backEnd.visa.include.include.evisa.student_up')
                                                    </div>
                                                </div>

                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}

                                                <div class="form-group">
                                                    <label class="control-label">Embassy Information</label>
                                                    <textarea required id="lg_des_{{$visa->id}}" name="embassy" class="form-control">{{$visa->embassy}}</textarea>
                                                </div>
                                                @if ($errors->has('embassy'))
                                                    <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('embassy') }}</strong>
                                            </span>
                                                @endif
                                                <div class="form-group">
                                                    <label class="control-label">Terms & Condition</label>
                                                    <textarea required id="lg_des2_{{$visa->id}}" name="terms_and_condition" class="form-control">{{$visa->terms_and_condition}}</textarea>
                                                </div>
                                                @if ($errors->has('terms_and_condition'))
                                                    <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('terms_and_condition') }}</strong>
                                            </span>
                                                @endif

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Box Image</label>
                                                    <img style="width: 530px; height: 200px"  id="output_image_{{$visa->id}}" src="{{asset($visa->box_image)}}">
                                                    <br/> <br/>
                                                    <input onchange="preview_image({{$visa->id}})" type="file"   name="box_image" accept="image/*">
                                                </div>
                                                @if ($errors->has('box_image'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('box_image') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Banner Image</label>
                                                    <img style="width: 530px; height: 200px"  id="output_image2_{{$visa->id}}" src="{{asset($visa->banner_image)}}">
                                                    <br/> <br/>
                                                    <input onchange="preview_image2({{$visa->id}})" type="file"   name="banner_image" accept="image/*">
                                                </div>
                                                @if ($errors->has('banner_image'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('banner_image') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$visa->status == 1 ? 'Checked' : ' '}} type="radio" name="status" id="inlineRadio1" value="1">
                                                        <span for="inlineRadio1">Publish</span> </label>
                                                    <label class="radio-inline pmd-radio">
                                                        <input  {{$visa->status == 0 ? 'Checked' : ' '}} type="radio" name="status" id="inlineRadio2" value="0" >
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
                                <button  class="btn pmd-ripple-effect btn-primary" type="submit">Update</button>
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
    CKEDITOR.replace( 'lg_des_{{$visa->id}}' );
    CKEDITOR.replace( 'lg_des2_{{$visa->id}}' );
</script>

