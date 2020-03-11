<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-slider" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Gellery Image</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-slider" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Gellery Image</h2>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('/add-gellery')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Gellery Image</label>
                                                <input type="file"  name="gellery_image[]" multiple>
                                            </div>
                                            @if ($errors->has('gellery_image'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('gellery_image') }}</strong>
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
