<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-sub" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Hotel</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-sub" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Hotel</h2>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('/add-hotel')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Hotel Name</label>
                                                <input type="text" id="regular1" required  class="form-control" name="name">
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Star</label>
                                                <input type="number" id="regular1" required class="form-control" name="star">
                                            </div>
                                            @if ($errors->has('star'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('star') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Category</label>
                                                <input type="text" id="regular1" required class="form-control" name="category">
                                            </div>
                                            @if ($errors->has('category'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('category') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Web Site</label>
                                                <input type="text" id="regular1" required class="form-control" name="web_site">
                                            </div>
                                            @if ($errors->has('web_site'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('web_site') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="country_id" class="control-label">Country</label>
                                                <select id="country_id" required class="form-control" name="country">
                                                    <option value="">--Select Country--</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('country'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('country') }}</strong>
                                                </span>
                                            @endif
                                    <!--        <div class="form-group">-->
                                    <!--            <label for="regular1" class="control-label">City</label>-->
                                    <!--            <select class="form-control" id="division_id" name="division">-->
                                    <!--                <option>-Select Division-</option>-->

                                    <!--            </select>-->
                                    <!--        </div>-->
                                    <!--        @if ($errors->has('division'))-->
                                    <!--            <span class="invalid-feedback" role="alert">-->
                                    <!--    <strong style="color: red">{{ $errors->first('division') }}</strong>-->
                                    <!--</span>-->
                                    <!--        @endif-->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Address</label>
                                                <textarea class="form-control" required name="address" ></textarea>
                                                {{--<input type="text" id="regular1" class="form-control" name="name">--}}
                                            </div>
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Price</label>
                                                <input type="text" id="regular1" disabled required value="0" class="form-control" name="price">
                                            </div>
                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('price') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Facilities</label>
                                                <input type="text" id="regular1" required class="form-control" name="facilities">
                                            </div>
                                            @if ($errors->has('facilities'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('facilities') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Note</label>
                                                <input type="text" id="regular1" required class="form-control" name="note">
                                            </div>
                                            @if ($errors->has('note'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('note') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Discount</label>
                                                <input type="number" id="regular1" value="0" disabled required class="form-control" name="discount">
                                            </div>
                                            @if ($errors->has('discount'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('discount') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Box Image</label>
                                                <input type="file"  name="box_image"  accept="image/*">
                                            </div>
                                            @if ($errors->has('box_image'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('box_image') }}</strong>
                                    </span>
                                            @endif

                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" checked name="status" id="inlineRadio1" value="1">
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
