<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-orderVisa{{$visa_order->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Visa Order</h2>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('/update-visa-order')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Country Name</label>
                                                    <input type="text"  class="form-control" name="visa_name" value="{{$visa_order->visa_name}}">
                                                    <input type="hidden" class="form-control" name="id" value="{{$visa_order->id}}">
                                                </div>
                                                @if ($errors->has('visa_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('visa_name') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Name</label>
                                                    <input type="text"  class="form-control" name="name" value="{{$visa_order->name}}">
                                                </div>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Email</label>
                                                    <input type="email"  class="form-control" name="email" value="{{$visa_order->email}}">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Phone Number</label>
                                                    <input type="text"  class="form-control" name="phone_number" value="{{$visa_order->phone_number}}">
                                                </div>
                                                @if ($errors->has('phone_number'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('phone_number') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Price</label>
                                                    <input type="number"  class="form-control" name="price" value="{{$visa_order->price}}">
                                                </div>
                                                @if ($errors->has('price'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('price') }}</strong>
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
