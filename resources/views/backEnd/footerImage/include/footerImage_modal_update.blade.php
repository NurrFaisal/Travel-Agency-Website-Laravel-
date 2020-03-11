<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-footerImage{{$footer_image->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Footer Image</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/update-footerImage')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Footer Image Name</label>
                                                <input type="text"  class="form-control" name="name" value="{{$footer_image->name}}">
                                                <input type="hidden" class="form-control" name="id" value="{{$footer_image->id}}">
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Footer Image</label><br/>
                                                <img style="width: 530px; height: 200px" id="output_image_{{$footer_image->id}}" src="{{asset($footer_image->footer_image)}}">
                                                <br/> <br/>
                                                <input onchange="preview_image({{$footer_image->id}})" type="file"   name="footer_image">
                                            </div>
                                            @if ($errors->has('footer_image'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('footer_image') }}</strong>
                                                </span>
                                            @endif



                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$footer_image->status == 1 ? 'checked' : ''}} type="radio" name="status"  value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$footer_image->status == 0 ? 'checked' : ''}} type="radio" name="status"  value="0" >
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
