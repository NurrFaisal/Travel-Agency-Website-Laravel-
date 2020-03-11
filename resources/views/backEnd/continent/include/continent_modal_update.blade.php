<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-sub{{$continent->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Continent</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/update-continent')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Continent Name</label>
                                                <input type="text"  class="form-control" name="name" value="{{$continent->name}}">
                                                <input type="hidden" class="form-control" name="id" value="{{$continent->id}}">
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Box Image</label><br/>
                                                <img style="width: 530px; height: 200px" id="output_image_{{$continent->id}}" src="{{asset($continent->box_image)}}">
                                                <br/> <br/>
                                                <input onchange="preview_image({{$continent->id}})" type="file"   name="box_image">
                                            </div>
                                            @if ($errors->has('box_image'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('box_image') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Background Image</label><br/>
                                                <img style="width: 530px; height: 200px"  id="output_image2_{{$continent->id}}" src="{{asset($continent->background_image)}}">
                                                <br/> <br/>
                                                <input onchange="preview_image2({{$continent->id}})" type="file"   name="background_image">
                                            </div>
                                            @if ($errors->has('background_image'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('background_image') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$continent->status == 1 ? 'checked' : ''}} type="radio" name="status"  value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$continent->status == 0 ? 'checked' : ''}} type="radio" name="status"  value="0" >
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
