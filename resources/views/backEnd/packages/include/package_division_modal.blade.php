
<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-division" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Package Divison</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-division" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Package Division</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/add-package-division')}}" method="post" class="form-horizontal">
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    {{--<label for="regular1" class="control-label">Tab Name</label>--}}
                                                    {{--<input type="text"  class="form-control" name="name" >--}}
                                                    <input type="hidden" class="form-control" name="package_id" value="{{$package->id}}">
                                                </div>
                                                @if ($errors->has('package_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('package_id') }}</strong>
                                                </span>
                                                @endif
                                                <style>
                                                    .select2-container {
                                                        width: 100% !important;
                                                    }
                                                </style>
                                                <div class="row toggle-button-custom">
                                                    <div class="col-md-12">
                                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                                            <div class="pmd-card-body">
                                                                <!--Select Multiple Tags -->
                                                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                                    <label style="color: black">Select Division</label>
                                                                    <select class="form-control select-tags pmd-select2-tags" required name="package_division[]" multiple>
                                                                        @foreach($divisions as $division)
                                                                            <option value="{{$division->id}}">{{$division->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
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

