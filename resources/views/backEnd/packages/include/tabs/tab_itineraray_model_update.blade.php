<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-itinerary{{$packagetab->tab_itinerary_title->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Package Tab Itinerary</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/update-package-tab-itinerary')}}" method="post" class="form-horizontal">
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Title</label>
                                                    <input type="text"  class="form-control" name="title" value="{{$packagetab->tab_itinerary_title->title}}">
                                                    <input type="hidden"  class="form-control" name="id" value="{{$packagetab->tab_itinerary_title->id}}">
                                                    <input type="hidden" id="date" required class="form-control" value="{{$packagetab->id}}" name="tab_id">
                                                    <input type="hidden" id="date" required class="form-control" value="{{$packagetab->package_id}}" name="package_id">
                                                    {{--<input type="hidden" class="form-control" name="package_id" value="{{$package->id}}">--}}
                                                </div>
                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('title') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="day_title" class="control-label">Description</label>
                                                    <input type="text" id="date" required class="form-control" value="{{$packagetab->tab_itinerary_title->description}}" name="description">
                                                </div>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('description') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="day_title" class="control-label">Price</label>
                                                    <input type="text" id="overnight_stay" required class="form-control" value="{{$packagetab->tab_itinerary_title->price}}" name="price">
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
