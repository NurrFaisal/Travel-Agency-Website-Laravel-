<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-sub{{$air_ticket_destination->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Air Ticket Title</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/update-air-ticket-destination')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Air Ticket Destination</label>
                                                <input type="text"  class="form-control" name="name" value="{{$air_ticket_destination->name}}">
                                                <input type="hidden" class="form-control" name="id" value="{{$air_ticket_destination->id}}">
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif

                                            {{--<div class="form-group">--}}
                                            {{--<label class="radio-inline pmd-radio">--}}
                                                {{--<input {{$air_ticket_destination->category == 1 ? 'checked' : ''}} type="radio" name="category"  value="1">--}}
                                                {{--<span for="inlineRadio1">Domestic</span> </label>--}}
                                            {{--<label class="radio-inline pmd-radio">--}}
                                                {{--<input {{$air_ticket_destination->category == 0 ? 'checked' : ''}} type="radio" name="category"  value="0" >--}}
                                                {{--<span for="inlineRadio2">International</span> </label>--}}
                                        {{--</div>--}}
                                        {{--@if ($errors->has('category'))--}}
                                            {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong style="color: red">{{ $errors->first('category') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}

                                            <div class="form-group">
                                                <label for="air_title{{$air_ticket_destination->id}}" class="control-label">Air Ticket Title</label>
                                                <select id="air_title{{$air_ticket_destination->id}}" required class="form-control" name="air_title">
                                                    <option value="">--Select Title--</option>
                                                    @foreach($air_ticket_titles as $air_ticket_title)
                                                        <option value="{{$air_ticket_title->id}}">{{$air_ticket_title->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('air_title'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('air_title') }}</strong>
                                                </span>
                                            @endif
                                            <script>
                                                document.getElementById('air_title{{$air_ticket_destination->id}}').value = '{{$air_ticket_destination->air_title}}';
                                            </script>

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Box Image</label><br/>
                                                <img style="width: 530px; height: 200px" id="output_image_{{$air_ticket_destination->id}}" src="{{asset($air_ticket_destination->box_image)}}">
                                                <br/> <br/>
                                                <input onchange="preview_image({{$air_ticket_destination->id}})" type="file"   name="box_image">
                                            </div>
                                            @if ($errors->has('box_image'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('box_image') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Background Image</label><br/>
                                                <img style="width: 530px; height: 200px"  id="output_image2_{{$air_ticket_destination->id}}" src="{{asset($air_ticket_destination->background_image)}}">
                                                <br/> <br/>
                                                <input onchange="preview_image2({{$air_ticket_destination->id}})" type="file"   name="background_image">
                                            </div>
                                            @if ($errors->has('background_image'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('background_image') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$air_ticket_destination->status == 1 ? 'checked' : ''}} type="radio" name="status"  value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$air_ticket_destination->status == 0 ? 'checked' : ''}} type="radio" name="status"  value="0" >
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
