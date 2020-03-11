@extends('backEnd.index')

@section('mainContent')
    <div class="pmd-content pmd-content-custom" id="content">

        <div class="container-fluid">


            <h1 class="section-title" id="services">
                <span>Hotel Title</span>
            </h1><!-- End Title -->
            @if(Session::get('message'))
            <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>
            @endif
            <!--breadcrum start-->

            <!-- Bootstrap Fields -->
            <section class="row component-section">
                <!-- Text fields title and description -->
                <!-- Text fields code, example -->
                <div class="col-md-12">
                    <div class="component-box">

                        <!-- Text fields example -->
                        <form action="{{URL::to('/apnel/update-hotel-title')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pmd-card pmd-z-depth pmd-card-custom-form col-md-8" style="margin-left: 15%; margin-right: 15%;" >
                                    <div class="pmd-card-body">
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Title</label>
                                            <input type="text" id="regular1" class="form-control" name="name" value="{{$hotel_title->name}}">
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">box_Image</label><br/>
                                            <img style="width: 100%; height: 200px"  id="output_image2" src="{{asset($hotel_title->box_image)}}">
                                            <br/> <br/>
                                            <input onchange="preview_image2()" type="file"   name="box_image">
                                        </div>
                                        @if ($errors->has('box_image'))
                                            <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('box_image') }}</strong>
                                                </span>
                                        @endif
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Banner Image</label><br/>
                                            <img style="width: 100%; height: 200px"  id="output_image" src="{{asset($hotel_title->banner_image)}}">
                                            <br/> <br/>
                                            <input onchange="preview_image()" type="file"   name="banner_image">
                                        </div>
                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback" role="alert">
                                                   <strong style="color: red">{{ $errors->first('image') }}</strong>
                                                </span>
                                        @endif
                                        <div class="form-group">
                                            {{--<div class="pmd-modal-action">--}}
                                            <button  class="btn btn-primary btn-block" type="submit">Update</button>
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @csrf
                        </form><!-- end Text fields example -->
                    </div>
                </div><!--end Text fields code, example -->
            </section><!-- Bootstrap Fields end -->
            <!-- Text Fields-->
        </div> <!--container end -->
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script type='text/javascript'>
        function preview_image2()
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image2');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script type='text/javascript'>
        function preview_image()
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
