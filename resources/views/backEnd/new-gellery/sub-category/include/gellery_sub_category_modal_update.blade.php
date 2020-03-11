<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-sub{{$gellery_sub_category->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Sub Category</h2>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('/apanel/gallery/update-sub-category')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <label for="category_id" class="control-label">Main Category</label>
                                                    <select id="country_id_{{$gellery_sub_category->id}}" required class="form-control" name="gellery_main_category_id">
                                                        <option value="">--Select Main Category--</option>
                                                        @foreach($gellery_main_categories as $gellery_main_category)
                                                            <option value="{{$gellery_main_category->id}}">{{$gellery_main_category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <script>
                                                    document.getElementById("country_id_{{$gellery_sub_category->id}}").value = '{{$gellery_sub_category->gellery_main_category_id}}';
                                                </script>
                                                @if ($errors->has('gellery_main_catgegory_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('gellery_main_catgegory_id') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Name</label>
                                                    <input type="text"  class="form-control" name="name" value="{{$gellery_sub_category->name}}">
                                                    <input type="hidden"  class="form-control" name="id" value="{{$gellery_sub_category->id}}">
                                                </div>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Box Image</label><br/>
                                                    <img style="width: 530px; height: 200px"  id="output_image2_{{$gellery_sub_category->id}}" src="{{asset($gellery_sub_category->box_image)}}">
                                                    <br/> <br/>
                                                    <input onchange="preview_image2({{$gellery_sub_category->id}})" type="file"   name="box_image">
                                                </div>
                                                @if ($errors->has('box_image'))
                                                    <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('box_image') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$gellery_sub_category->status == 1 ? 'checked' : ''}} type="radio" name="status"  value="1">
                                                        <span for="inlineRadio1">Publish</span> </label>
                                                    <label class="radio-inline pmd-radio">
                                                        <input {{$gellery_sub_category->status == 0 ? 'checked' : ''}} type="radio" name="status"  value="0" >
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
