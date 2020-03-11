<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-sub" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Gallery Image</button>
        <div tabindex="-1" class="modal fade" id="form-dialog-sub" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Gallery Image</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to('/apanel/gallery/add-gallery-image')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="component-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <div class="form-group">
                                                <label for="year_id" class="control-label">Main Category</label>
                                                <select id="year_id" required class="form-control" name="year_id">
                                                    <option value="">--Select Year--</option>
                                                    @foreach($years as $year)
                                                        <option value="{{$year->name}}">{{$year->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('gellery_main_category_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('gellery_main_category_id') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="gellery_main_category_id" class="control-label">Main Category</label>
                                                <select id="gellery_main_category_id" required class="form-control" name="gellery_main_category_id">
                                                    <option value="">--Select Main Category--</option>
                                                    @foreach($gallery_main_categories as $gallery_main_categorie)
                                                        <option value="{{$gallery_main_categorie->id}}">{{$gallery_main_categorie->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('gellery_main_category_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('gellery_main_category_id') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Sub Category Name</label>
                                                <select class="form-control" id="sub_category_id" name="sub_category_id">
                                                    <option value="">-Select Sub Category-</option>

                                                </select>
                                            </div>
                                            @if ($errors->has('sub_category_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('sub_category_id') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group" id="stuff" style="display: none">
                                                <label for="our_team-staff" class="control-label">Person Name</label>
                                                <select id="our_team-staff" class="form-control" name="person_id">
                                                    <option value="">--Select Person Name--</option>
                                                    @foreach($our_team_staffs as $our_team_staff)
                                                        <option value="{{$our_team_staff->id}}">{{$our_team_staff->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('gellery_main_category_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('gellery_main_category_id') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Box Image</label>
                                                <input type="file"  name="box_image[]" multiple accept="image/*">
                                            </div>
                                            @if ($errors->has('box_image'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('box_image') }}</strong>
                                                </span>
                                            @endif
{{--                                            <div class="form-group">--}}
{{--                                                <label class="radio-inline pmd-radio">--}}
{{--                                                    <input type="radio" name="status" id="inlineRadio1" value="1">--}}
{{--                                                    <span for="inlineRadio1">Publish</span> </label>--}}
{{--                                                <label class="radio-inline pmd-radio">--}}
{{--                                                    <input type="radio" name="status" id="inlineRadio2" value="0" >--}}
{{--                                                    <span for="inlineRadio2">Unpublish</span> </label>--}}
{{--                                            </div>--}}
{{--                                            @if ($errors->has('status'))--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong style="color: red">{{ $errors->first('status') }}</strong>--}}
{{--                                    </span>--}}
{{--                                            @endif--}}
                                        </div>
                                    </div>

                                </div>
                            </div><!-- end Text fields example -->
                        </div>
                            <div class="pmd-modal-action">
                                <button  class="btn pmd-ripple-effect btn-primary" type="submit">Save</button>
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
    $(document).on('change','#gellery_main_category_id', function () {
        var gellery_main_category_id = $(this).val();

        var op= " ";

        $.ajax({
            type:'get',
            url: '{!! URL::to('/gellery-sub-category') !!}',
            data:{'id':gellery_main_category_id},
            success:function (data) {

                for (var i=0; i<data.length; i++) {
                    op +='<option  value="'+data[i].slug+'">'+data[i].name+'</option>';
                }
                $('#sub_category_id').html(op);

            }
        });

    });
</script>
<script>
    $(document).on('change','#sub_category_id', function () {
        var sub_category_name = $(this).val();
        if(sub_category_name == 'Birthday'){
            $('#stuff').show();
        }else {
            $('#stuff').hide();
        }


    });
</script>




