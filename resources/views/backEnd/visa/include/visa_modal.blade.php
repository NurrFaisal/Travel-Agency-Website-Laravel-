<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-sub" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Visa</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-sub" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Visa</h2>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('/add-visa')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Continent</label>
                                                <select id="product_cat" required class="form-control" name="continent_id">
                                                    <option value="">--Select Continent--</option>
                                                    @foreach($continents as $continent)
                                                        <option value="{{$continent->id}}">{{$continent->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('continent_id'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('continent_id') }}</strong>
                                                        </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Country Name</label>
                                                <input required type="text" id="regular1" class="form-control" name="country_name">
                                            </div>
                                            @if ($errors->has('country_name'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('country_name') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Price</label>
                                                <input required type="number" id="regular1" class="form-control" name="price">
                                            </div>
                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('price') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Embassy Fee</label>
                                                <input required type="number" id="regular1" class="form-control" name="embassy_fee">
                                            </div>
                                            @if ($errors->has('embassy_fee'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('embassy_fee') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Cosmos Fee</label>
                                                <input required type="number" id="regular1" class="form-control" name="cosmos_fee">
                                            </div>
                                            @if ($errors->has('cosmos_fee'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('cosmos_fee') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">E-VISA Price</label>
                                                <input type="text" id="regular1" class="form-control" name="e_price">
                                            </div>
                                            @if ($errors->has('e_price'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('e_price') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form-group">
                                                <label class="control-label">Short Description</label>
                                                <textarea required name="short_description" class="form-control"></textarea>
                                            </div>
                                            @if ($errors->has('short_description'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('short_description') }}</strong>
                                            </span>
                                            @endif
                                            <div class="form-group">
                                                <label class="control-label">Duration</label>
                                                <input required type="text"  class="form-control" name="duration">
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
                                                    <li role="presentation" class="active"><a href="#bootstrap-professional" aria-controls="home" role="tab" data-toggle="tab">P Service</a></li>
                                                    <li role="presentation"><a href="#bootstrap-professional2" aria-controls="home" role="tab" data-toggle="tab">G Service</a></li>
                                                    <li role="presentation"><a href="#bootstrap-lawyer" aria-controls="home" role="tab" data-toggle="tab">Lawyer</a></li>
                                                    <li role="presentation"><a href="#bootstrap-business" aria-controls="about" role="tab" data-toggle="tab">Business</a></li>
                                                    <li role="presentation"><a href="#bootstrap-spouse" aria-controls="work" role="tab" data-toggle="tab">Spouse</a></li>
                                                    <li role="presentation"><a href="#bootstrap-student" aria-controls="work" role="tab" data-toggle="tab">Student</a></li>
                                                    <li role="presentation"><a href="#bootstrap-child" aria-controls="work" role="tab" data-toggle="tab">Retired</a></li>
                                                </ul>
                                            {{--<div class="pmd-card">--}}
                                            {{--<div class="pmd-card-body">--}}
                                            <!-- Tab panes -->
                                                <div class="tab-content">
                                                    @include('backEnd.visa.include.include.professional')
                                                    @include('backEnd.visa.include.include.professional2')
                                                    @include('backEnd.visa.include.include.lawyer')
                                                    @include('backEnd.visa.include.include.business')
                                                    @include('backEnd.visa.include.include.spouse')
                                                    @include('backEnd.visa.include.include.student')
                                                    @include('backEnd.visa.include.include.child')
                                                </div>
                                            </div>
                                            <div>
                                                <h4>E - VISA</h4>
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li role="presentation" class="active"><a href="#bootstrap-professional-evisa" aria-controls="home" role="tab" data-toggle="tab">P Service</a></li>
                                                    <li role="presentation"><a href="#bootstrap-professional2-evisa" aria-controls="home" role="tab" data-toggle="tab">G Service</a></li>
                                                    <li role="presentation"><a href="#bootstrap-lawyer-evisa" aria-controls="home" role="tab" data-toggle="tab">Lawyer</a></li>
                                                    <li role="presentation"><a href="#bootstrap-business-evisa" aria-controls="about" role="tab" data-toggle="tab">Business</a></li>
                                                    <li role="presentation"><a href="#bootstrap-spouse-evisa" aria-controls="work" role="tab" data-toggle="tab">Spouse</a></li>
                                                    <li role="presentation"><a href="#bootstrap-student-evisa" aria-controls="work" role="tab" data-toggle="tab">Student</a></li>
                                                    <li role="presentation"><a href="#bootstrap-child-evisa" aria-controls="work" role="tab" data-toggle="tab">Retired</a></li>
                                                </ul>
                                            {{--<div class="pmd-card">--}}
                                            {{--<div class="pmd-card-body">--}}
                                            <!-- Tab panes -->
                                                <div class="tab-content">
                                                    @include('backEnd.visa.include.include.evisa.professional')
                                                    @include('backEnd.visa.include.include.evisa.professional2')
                                                    @include('backEnd.visa.include.include.evisa.lawyer')
                                                    @include('backEnd.visa.include.include.evisa.business')
                                                    @include('backEnd.visa.include.include.evisa.spouse')
                                                    @include('backEnd.visa.include.include.evisa.student')
                                                    @include('backEnd.visa.include.include.evisa.child')
                                                </div>
                                            </div>

                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            <div class="form-group">
                                                <label class="control-label">Embassy Information</label>
                                                {{--<textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>--}}
                                                <textarea required id="embassy" name="embassy" class="form-control"></textarea>
                                            </div>
                                            @if ($errors->has('embassy'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('embassy') }}</strong>
                                            </span>
                                            @endif

                                            <div class="form-group">
                                                <label class="control-label">Terms & Condition</label>
                                                {{--<textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>--}}
                                                <textarea required id="t&c" name="terms_and_condition" class="form-control"></textarea>
                                            </div>
                                            @if ($errors->has('terms_and_condition'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('terms_and_condition') }}</strong>
                                            </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Box Image</label>
                                                <input required type="file"  name="box_image"  accept="image/*">
                                            </div>
                                            @if ($errors->has('box_image'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('box_image') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Banner Image</label>
                                                <input required type="file"  name="banner_image"  accept="image/*">
                                            </div>
                                            @if ($errors->has('banner_image'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('banner_image') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input checked type="radio" name="status" id="inlineRadio1" value="1">
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

<script>
    CKEDITOR.replace( 'embassy' );
    CKEDITOR.replace( 't&c' );
</script>
