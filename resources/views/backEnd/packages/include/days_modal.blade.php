<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-days" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Day</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-days" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Days</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/add-package-day')}}" method="post" class="form-horizontal">
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Day</label>
                                                    <input type="text"  class="form-control" name="day">
                                                    <input type="hidden" class="form-control" name="package_id" value="{{$package->id}}">
                                                </div>
                                                @if ($errors->has('day'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('day') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="day_title" class="control-label">Date</label>
                                                    <input type="text" id="date"  class="form-control" name="date">
                                                </div>
                                                @if ($errors->has('date'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('date') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="day_title" class="control-label">Overnight Stay</label>
                                                    <input type="text" id="overnight_stay" required class="form-control" name="overnight_stay">
                                                </div>
                                                @if ($errors->has('overnight_stay'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('overnight_stay') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Description</label>
                                                    {{--<input type="text"  class="form-control" name="day_description" >--}}
                                                    <textarea class="form-control" name="day_description"></textarea>
                                                </div>
                                                @if ($errors->has('day_description'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('day_description') }}</strong>
                                                </span>
                                                @endif
                                                <div class="component-box">
                                                    <!-- checkbox example -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="pmd-card pmd-z-depth">
                                                                <div class="pmd-card-body">
                                                                    <!--Inline checkboxes-->
                                                                        <label class="checkbox-inline pmd-checkbox pmd-checkbox-ripple-effect">
                                                                            <input type="checkbox" name="breakfast" value="1">
                                                                            <span> Breakfast</span>
                                                                        </label>
                                                                        <label class="checkbox-inline pmd-checkbox pmd-checkbox-ripple-effect">
                                                                            <input type="checkbox" name="lunch" value="1">
                                                                            <span> Lunch</span>
                                                                        </label>
                                                                        <label class="checkbox-inline pmd-checkbox pmd-checkbox-ripple-effect">
                                                                            <input type="checkbox" name="dinner" value="1">
                                                                            <span> Dinner</span>
                                                                        </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- checkbox example end-->
                                                </div>

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
