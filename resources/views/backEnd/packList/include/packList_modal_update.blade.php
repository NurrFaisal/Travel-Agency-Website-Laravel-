<div class="row">
    <div class="col-md-6 col-sm-6">
        <div tabindex="-1" class="modal fade" id="form-dialog-pack{{$packList->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Package Title</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/apnel/update-pack-list')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="component-box">
                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Package Title Name</label>
                                                    <input type="text" id="regular1" class="form-control" value="{{$packList->name}}" name="name">
                                                    <input type="hidden" id="regular1" class="form-control" value="{{$packList->id}}" name="id">
                                                </div>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Brand Image</label>
                                                    <br/>
                                                    <img style="width: 100px; height: 100px" id="output_image_{{$packList->id}}" src="{{asset($packList->brand_image)}}">
                                                    <br/> <br/>
                                                    <input onchange="preview_image({{$packList->id}})" type="file"  accept="image/*"  name="brand_image">
                                                </div>
                                                @if ($errors->has('brand_image'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('brand_image') }}</strong>
                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$packList->b_status == 1 ? 'Checked' : ' '}} type="radio" name="b_status" id="inlineRadio1" value="1">
                                                        <span for="inlineRadio1">Active</span> </label>
                                                    <label class="radio-inline pmd-radio">
                                                        <input  {{$packList->b_status == 0 ? 'Checked' : ' '}}  type="radio" name="b_status" id="inlineRadio2" value="0" >
                                                        <span for="inlineRadio2">Unactive</span> </label>
                                                </div>
                                                @if ($errors->has('status'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('status') }}</strong>
                                         </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Box Image</label>
                                                    <img style="width: 530px; height: 200px" id="output_image2_{{$packList->id}}" src="{{asset($packList->box_image)}}">
                                                    <br/> <br/>
                                                    <input onchange="preview_image2({{$packList->id}})" type="file" accept="image/*"   name="box_image">
                                                </div>
                                                @if ($errors->has('box_image'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('box_image') }}</strong>
                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Background Image</label>
                                                    <img style="width: 530px; height: 200px" id="output_image3_{{$packList->id}}" src="{{asset($packList->background_image)}}">
                                                    <br/> <br/>
                                                    <input onchange="preview_image3({{$packList->id}})" type="file" accept="image/*"   name="background_image">
                                                </div>
                                                @if ($errors->has('background_image'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('background_image') }}</strong>
                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$packList->status == 1 ? 'checked' : ' '}} type="radio" name="status" id="inlineRadio1" value="1">
                                                        <span for="inlineRadio1">Publish</span> </label>
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$packList->status == 0 ? 'checked' : ' '}} type="radio" name="status" id="inlineRadio2" value="0" >
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



