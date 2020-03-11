<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-sub{{$air_ticket->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Country</h2>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('/update-air-ticket')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Name</label>
                                                    <input type="text"  class="form-control" name="name" value="{{$air_ticket->name}}">
                                                    <input type="hidden"  class="form-control" name="id" value="{{$air_ticket->id}}">
                                                </div>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="air_ticket_title_id_up_{{$air_ticket->id}}" class="control-label">Title</label>
                                                    <select id="air_ticket_title_id_up_{{$air_ticket->id}}" required class="form-control" name="air_ticket_title_id">
                                                        <option value="">--Select Air Ticket Category--</option>
                                                        @foreach($air_ticket_titles as $air_ticket_title)
                                                            <option value="{{$air_ticket_title->id}}">{{$air_ticket_title->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <script>
                                                    document.getElementById('air_ticket_title_id_up_{{$air_ticket->id}}').value = '{{$air_ticket->air_ticket_title_id}}';
                                                </script>
                                                @if ($errors->has('air_ticket_title_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('air_ticket_title_id') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="destination_up_{{$air_ticket->id}}" class="control-label">Destination</label>
                                                    <select class="form-control" id="destination_up_{{$air_ticket->id}}" name="destination">
                                                        {{--<option>-Select Destination-</option>--}}
                                                        <option value="{{$air_ticket->destination}}">{{$air_ticket->destinationR->name}}</option>

                                                    </select>
                                                </div>

                                                @if ($errors->has('division_id'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('division_id') }}</strong>
                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="air_line_id{{$air_ticket->id}}" class="control-label">Air Line</label>
                                                    <select id="air_line_id{{$air_ticket->id}}" required class="form-control" name="air_line_id">
                                                        <option value="">--Select Air Line--</option>
                                                        @foreach($air_lines as $air_line)
                                                            <option value="{{$air_line->id}}">{{$air_line->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <script>
                                                    document.getElementById('air_line_id{{$air_ticket->id}}').value = '{{$air_ticket->air_line_id}}';
                                                </script>
                                                @if ($errors->has('air_line_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('air_line_id') }}</strong>
                                                </span>
                                                @endif
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="regular1" class="control-label">Price</label>--}}
{{--                                                    <input type="number"  class="form-control" name="price" value="{{$air_ticket->price}}">--}}
{{--                                                </div>--}}
{{--                                                @if ($errors->has('price'))--}}
{{--                                                    <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong style="color: red">{{ $errors->first('price') }}</strong>--}}
{{--                                                </span>--}}
{{--                                                @endif--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="regular1" class="control-label">Ticket Class</label>--}}
{{--                                                    <input type="text"  class="form-control" name="ticket_class" value="{{$air_ticket->ticket_class}}">--}}
{{--                                                </div>--}}
{{--                                                @if ($errors->has('ticket_class'))--}}
{{--                                                    <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong style="color: red">{{ $errors->first('ticket_class') }}</strong>--}}
{{--                                                </span>--}}
{{--                                                @endif--}}
                                                <div class="form-group">
                                                    <label class="radio-inline pmd-radio">
                                                        <input type="radio" {{$air_ticket->status == 1 ? 'checked' : ''}} name="status" id="inlineRadio1" value="1">
                                                        <span for="inlineRadio1">Publish</span> </label>
                                                    <label class="radio-inline pmd-radio">
                                                        <input type="radio" {{$air_ticket->status == 0 ? 'checked' : ''}} name="status" id="inlineRadio2" value="0" >
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
<script>
    $(document).on('change','#air_ticket_title_id_up_{{$air_ticket->id}}', function () {
        var air_ticket_title_id = $(this).val();

        var op= " ";
        op +='<option value="0">--Select Destinaiton--</option>';

        $.ajax({
            type:'get',
            url: '{!! URL::to('/manage-destination') !!}',
            data:{'id':air_ticket_title_id},
            success:function (data) {

                for (var i=0; i<data.length; i++) {
                    op +='<option  value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#destination_up_{{$air_ticket->id}}').html(op);

            }
        });

    });
</script>
