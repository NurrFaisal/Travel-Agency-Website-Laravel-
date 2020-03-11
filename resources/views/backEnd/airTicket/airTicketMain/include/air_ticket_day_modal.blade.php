
<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-country" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Flight Days</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-country" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Days</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/add-air-ticket-days')}}" method="post" class="form-horizontal">
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
                                                    <input type="hidden" class="form-control" name="air_ticket_id" value="{{$air_ticket->id}}">
                                                </div>
                                                @if ($errors->has('air_ticket_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('air_ticket_id') }}</strong>
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
                                                                    <label style="color: black">Select Day</label>
                                                                    <select class="form-control select-tags pmd-select2-tags" required name="days_id[]" multiple>
                                                                        @foreach($days as $day)
                                                                            <option value="{{$day->id}}">{{$day->name}}</option>
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

