@extends('backEnd.index')

@section('mainContent')
    <div class="pmd-content pmd-content-custom" id="content">

        <div class="container-fluid">


            <h1 class="section-title" id="services">
                <span>Footer Ifram</span>
            </h1><!-- End Title -->
            <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>

            <!--breadcrum start-->

            <!-- Bootstrap Fields -->
            <section class="row component-section">
                <!-- Text fields title and description -->


                <!-- Text fields code, example -->
                <div class="col-md-12">
                    <div class="component-box">

                        <!-- Text fields example -->
                        <form action="{{URL::to('/update-ifram')}}" method="POST" class="form-horizontal" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pmd-card pmd-z-depth pmd-card-custom-form col-md-8" style="margin-left: 15%; margin-right: 15%;" >
                                    <div class="pmd-card-body">
                                        <!-- Regular Input -->
                                        <!-- Textarea -->

                                        <div class="form-group">
                                            <label class="control-label">Facebook</label>
                                            <textarea name="facebook" required class="form-control">{{$ifram->facebook}}</textarea>
                                        </div>
                                        @if ($errors->has('facebook'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('facebook') }}</strong>
                                                </span>
                                        @endif
                                        <div class="form-group">
                                            <label class="control-label">Youtube</label>
                                            <textarea name="youtube" required class="form-control">{{$ifram->youtube}}</textarea>
                                        </div>
                                        @if ($errors->has('youtube'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('youtube') }}</strong>
                                                </span>
                                        @endif
                                        <!-- Bootstrap Selectbox -->
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
@endsection
