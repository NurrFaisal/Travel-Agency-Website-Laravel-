<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-packag-tab{{$packageTab->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Package Tab</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/update-package-tab')}}" method="post" class="form-horizontal">
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Tab Name</label>
                                                <input type="text"  class="form-control" name="name" value="{{$packageTab->name}}" >
                                                <input type="hidden"  class="form-control" name="id" value="{{$packageTab->id}}" >
                                                <input type="hidden" class="form-control" name="package_id" value="{{$package->id}}">
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Itinerary Title</label>
                                                <input type="text"  class="form-control" value="{{$packageTab->itinerary_title}}" name="itinerary_title">
                                            </div>
                                            @if ($errors->has('itinerary_title'))
                                                <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('itinerary_title') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Tab Note</label>
                                                <input type="text"  class="form-control" name="tab_note" value="{{$packageTab->tab_note}}" >
                                            </div>
                                            @if ($errors->has('tab_note'))
                                                <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('tab_note') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Special Note</label>
                                                <input type="text"  class="form-control" name="special_note" value="{{$packageTab->special_note}}" >
                                            </div>
                                            @if ($errors->has('special_note'))
                                                <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('special_note') }}</strong>
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
