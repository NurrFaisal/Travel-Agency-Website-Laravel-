
<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-destination" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Air Ticket Destination</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-destination" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Days</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/add-air-ticket-destination-main')}}" method="post" class="form-horizontal">
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Up Name</label>
                                                    {{--<input type="text"  class="form-control" name="name" >--}}
                                                    <input type="text" class="form-control" name="up_name">
                                                    <input type="hidden" class="form-control" name="air_ticket_id" value="{{$air_ticket->id}}">
                                                </div>
                                                @if ($errors->has('up_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('up_name') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Up Time</label>
                                                    {{--<input type="text"  class="form-control" name="name" >--}}
                                                    <input type="text" class="form-control" name="up_time">
                                                </div>
                                                @if ($errors->has('up_time'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('up_time') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Down Name</label>
                                                    {{--<input type="text"  class="form-control" name="name" >--}}
                                                    <input type="text" class="form-control" name="down_name">
                                                </div>
                                                @if ($errors->has('down_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('down_name') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Down Time</label>
                                                    {{--<input type="text"  class="form-control" name="name" >--}}
                                                    <input type="text" class="form-control" name="down_time">
                                                </div>
                                                @if ($errors->has('down_time'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('down_time') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Destination Price</label>
                                                    {{--<input type="text"  class="form-control" name="name" >--}}
                                                    <input type="number" class="form-control" name="destination_price">
                                                </div>
                                                @if ($errors->has('destination_price'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong style="color: red">{{ $errors->first('destination_price') }}</strong>
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

