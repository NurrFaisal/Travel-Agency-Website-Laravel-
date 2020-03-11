<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-sub{{$hotel->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Hotel</h2>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('/update-hotel')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Hotel Name</label>
                                                    <input type="text" id="regular1" required class="form-control" name="name" value="{{$hotel->name}}">
                                                    <input type="hidden" id="regular1" required class="form-control" name="id" value="{{$hotel->id}}">
                                                </div>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Star</label>
                                                    <input type="number" id="regular1" required class="form-control" name="star" value="{{$hotel->star}}">
                                                </div>
                                                @if ($errors->has('star'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('star') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Category</label>
                                                    <input type="text" id="regular1" required class="form-control" name="category" value="{{$hotel->category}}">
                                                </div>
                                                @if ($errors->has('category'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('category') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Web Site</label>
                                                    <input type="text" id="regular1" required class="form-control" name="web_site" value="{{$hotel->web_site}}">
                                                </div>
                                                @if ($errors->has('web_site'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('web_site') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="country_id" required class="control-label">Country</label>
                                                    <select id="country_id_{{$hotel->id}}" required class="form-control" name="country">
                                                        <option value="">--Select Country--</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <script>
                                                    document.getElementById('country_id_{{$hotel->id}}').value = '{{$hotel->country}}';
                                                </script>
                                                @if ($errors->has('country'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('country') }}</strong>
                                                </span>
                                                @endif
                                                <!--<div class="form-group">-->
                                                <!--    <label for="regular1" class="control-label">City</label>-->
                                                <!--    <select class="form-control" required id="division_id_{{$hotel->id}}" name="division">-->
                                                <!--        <option>-Select Division-</option>-->
                                                <!--        @foreach($divisions as $division)-->
                                                <!--            @if($division->country_id == $hotel->country)-->
                                                <!--            <option value="{{$division->id}}">{{$division->name}}</option>-->
                                                <!--            @endif-->
                                                <!--        @endforeach-->

                                                <!--    </select>-->
                                                <!--</div>-->
                                                <!--<script>-->
                                                <!--    document.getElementById('division_id_{{$hotel->id}}').value = '{{$hotel->division}}';-->
                                                <!--</script>-->
                                                <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
                                                <script>
                                                    $(document).on('change','#country_id_{{$hotel->id}}', function () {
                                                        var country_id = $(this).val();
                                                        var op= " ";

                                                        $.ajax({
                                                            type:'get',
                                                            url: '{!! URL::to('/manage-division') !!}',
                                                            data:{'id':country_id},
                                                            success:function (data) {
                                                                console.log(data)
                                                                // for (var i=0; i<data.length; i++) {
                                                                //     op +='<option  value="'+data[i].id+'">'+data[i].name+'</option>';
                                                                // }
                                                                $('#division_id_{{$hotel->id}}').html(data);

                                                            }
                                                        });

                                                    });
                                                </script>
                                                @if ($errors->has('division'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('division') }}</strong>
                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Address</label>
                                                    <textarea class="form-control" required name="address" >{{$hotel->address}}</textarea>
                                                    {{--<input type="text" id="regular1" class="form-control" name="name">--}}
                                                </div>
                                                @if ($errors->has('address'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('address') }}</strong>
                                                </span>
                                                @endif

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Price</label>
                                                    <input type="text" id="regular1" disabled required class="form-control" name="price" value="{{$hotel->price}}">
                                                </div>
                                                @if ($errors->has('price'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('price') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Facilities</label>
                                                    <input type="text" id="regular1" required class="form-control" name="facilities" value="{{$hotel->facilities}}">
                                                </div>
                                                @if ($errors->has('facilities'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('facilities') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Note</label>
                                                    <input type="text" id="regular1" required class="form-control" name="note" value="{{$hotel->note}}">
                                                </div>
                                                @if ($errors->has('note'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('note') }}</strong>
                                                </span>
                                                @endif

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Discount</label>
                                                    <input type="text" id="regular1" disabled required class="form-control" name="discount" value="{{$hotel->discount}}">
                                                </div>
                                                @if ($errors->has('discount'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('discount') }}</strong>
                                                </span>
                                                @endif

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">box_Image</label><br/>
                                                    <img style="width: 530px; height: 200px"  id="output_image2_{{$hotel->id}}" src="{{asset($hotel->box_image)}}">
                                                    <br/> <br/>
                                                    <input onchange="preview_image2({{$hotel->id}})" type="file"   name="box_image">
                                                </div>
                                                @if ($errors->has('box_image'))
                                                    <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('box_image') }}</strong>
                                                </span>
                                                @endif

                                                <div class="form-group">
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$hotel->status == 1 ? 'checked' : ''}} type="radio" name="status" id="inlineRadio1" value="1">
                                                        <span for="inlineRadio1">Publish</span> </label>
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$hotel->status == 0 ? 'checked' : ''}} type="radio" name="status" id="inlineRadio2" value="0" >
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
