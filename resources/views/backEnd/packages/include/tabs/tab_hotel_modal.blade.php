
<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-about" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Package Tab Hotel</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-about" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add package Tab Hotel</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/add-package-tab-hotel')}}" method="post" class="form-horizontal">
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->

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
                                                                            <option value="{{$hotel->id}}">{{$hotel->name}} - {{$hotel->star}} Star</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" id="tab_id" required class="form-control" value="{{$packagetab->id}}" name="tab_id">
                                                    <input type="hidden" id="package_id" required class="form-control" value="{{$packagetab->package_id}}" name="package_id">
                                                    {{--<input type="hidden" class="form-control" name="package_id" value="{{$package->id}}">--}}
                                                </div>
                                                <hr/>
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

