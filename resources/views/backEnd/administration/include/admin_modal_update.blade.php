<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-sub{{$cosmosAdmin->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Admin</h2>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('/apanel/update-admin')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <label class="radio-inline pmd-radio">
                                                        <input  {{$cosmosAdmin->admin == 1 ? 'checked' : ''}} type="radio" name="admin" id="inlineRadio1" value="1">
                                                        <span for="inlineRadio1">Super Admin</span> </label>
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$cosmosAdmin->admin == 2 ? 'checked' : ''}} type="radio" name="admin" id="inlineRadio2" value="2" >
                                                        <span for="inlineRadio2">Admin</span> </label>
                                                </div>
                                                @if ($errors->has('admin'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('admin') }}</strong>
                                    </span>
                                                @endif

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Name</label>
                                                    <input type="text" value="{{$cosmosAdmin->name}}"  class="form-control" name="name">
                                                    <input type="hidden" value="{{$cosmosAdmin->id}}"  class="form-control" name="id">
                                                </div>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Email</label>
                                                    <input type="email" value="{{$cosmosAdmin->email}}" class="form-control" name="email">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Phone Number</label>
                                                    <input type="text" value="{{$cosmosAdmin->phone_number}}" class="form-control" name="phone_number">
                                                </div>
                                                @if ($errors->has('phone_number'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('phone_number') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Password</label>
                                                    <input type="password"  class="form-control" name="password">
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Confirm Password</label>
                                                    <input type="password"  class="form-control" name="confirm_password">
                                                </div>
                                                @if ($errors->has('confirm_password'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('confirm_password') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$cosmosAdmin->status == 1 ? 'checked' : ''}} type="radio" name="status" id="inlineRadio1" value="1">
                                                        <span for="inlineRadio1">Publish</span> </label>
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$cosmosAdmin->status == 1 ? ' ' : 'checked'}} type="radio" name="status" id="inlineRadio2" value="0" >
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
