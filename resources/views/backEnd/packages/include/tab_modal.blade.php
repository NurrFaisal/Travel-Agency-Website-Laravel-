
<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-about" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Package Tab</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-about" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Tab</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/add-package-tab')}}" method="post" class="form-horizontal">
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Tab Name</label>
                                                    <input type="text"  class="form-control" name="name" >
                                                    <input type="hidden" class="form-control" name="package_id" value="{{$package->id}}">
                                                </div>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                                <style>
                                                    .select2-container {
                                                        width: 100% !important;
                                                    }
                                                </style>
                                                <div class="component-box">

                                                    <div class="row toggle-button-custom">
                                                        <div class="col-md-12">
                                                            <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                                                <div class="pmd-card-body">
                                                                    <!--Select Multiple Tags -->
                                                                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                                        <label style="color: black">Select Hotels (Multiple)</label>
                                                                        <select class="form-control select-tags pmd-select2-tags" required name="hotels[]" multiple>
                                                                            @foreach($hotels as $hotel)
                                                                            <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Itinerary Title</label>
                                                    <input type="text"  class="form-control" value="Minimum 2 Person Must ( Adult )" name="itinerary_title">
                                                </div>
                                                @if ($errors->has('itinerary_title'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('itinerary_title') }}</strong>
                                                </span>
                                                @endif
                                                <hr/>
                                                <div id="days">
                                                <div class="form-group">
                                                <label for="day" class="control-label">Title</label>
                                                <input type="text" id="day" required class="form-control" name="title[]">
                                                </div>

                                                <div class="form-group">
                                                <label for="day_title" class="control-label">Description</label>
                                                <input type="text" id="date" required class="form-control" name="description[]">
                                                </div>

                                                <div class="form-group">
                                                <label for="day_title" class="control-label">Price</label>
                                                <input type="text" id="overnight_stay" required class="form-control" name="price[]">
                                                </div>

                                                <!-- Default inline 1-->
                                                <div class="form-group">
                                                <button class="btn btn-primary"  id="dayBtn" >Add More</button>
                                                </div>
                                                </div>
                                                <div id="days1"></div>

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Tab Note</label>
                                                    <input type="text"  class="form-control" name="tab_note" >
                                                </div>
                                                @if ($errors->has('tab_note'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('tab_note') }}</strong>
                                                </span>
                                                @endif

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Special Note</label>
                                                    <input type="text"  class="form-control" name="special_note" >
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
                                <button  class="btn pmd-ripple-effect btn-primary" type="submit">ADD</button>
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

