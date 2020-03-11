<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-slider{{$our_team_staff->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Staff</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/apanel/update-our-team-staff')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="component-box">
                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Name</label>
                                                <input type="hidden" id="regular1" class="form-control" name="id" value="{{$our_team_staff->id}}">
                                                <input type="text" id="regular1" class="form-control" name="name" value="{{$our_team_staff->name}}">
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Designation</label>
                                                <input type="text" id="regular1" class="form-control" name="designation" value="{{$our_team_staff->designation}}">
                                            </div>
                                            @if ($errors->has('designation'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('designation') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Phone Number</label>
                                                <input type="text" id="regular1" class="form-control" name="phone_number" value="{{$our_team_staff->phone_number}}">
                                            </div>
                                            @if ($errors->has('phone_number'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('phone_number') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Email</label>
                                                <input type="text" id="regular1" class="form-control" name="email" value="{{$our_team_staff->email}}">
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Branch</label>
                                                <input type="text" id="regular1" class="form-control" name="branch" value="{{$our_team_staff->branch}}">
                                            </div>
                                            @if ($errors->has('branch'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('branch') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Image</label><br/>
                                                <img style="width: 530px; height: 200px" id="output_image_{{$our_team_staff->id}}" src="{{asset($our_team_staff->image)}}">
                                                <br/> <br/>
                                                <input onchange="preview_image({{$our_team_staff->id}})" type="file"   name="image">
                                            </div>
                                            @if ($errors->has('image'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif



                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$our_team_staff->status == 1 ? 'checked' : ''}} type="radio" name="status"  value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$our_team_staff->status == 0 ? 'checked' : ''}} type="radio" name="status"  value="0" >
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
