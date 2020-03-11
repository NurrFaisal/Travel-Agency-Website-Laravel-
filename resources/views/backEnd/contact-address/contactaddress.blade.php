@extends('backEnd.index')

@section('mainContent')
    <div class="pmd-content pmd-content-custom" id="content">

        <div class="container-fluid">


            <h1 class="section-title" id="services">
                <span>Contact Info</span>
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
                        <form action="{{URL::to('/apnel/update-contact')}}" method="POST" class="form-horizontal" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pmd-card pmd-z-depth pmd-card-custom-form col-md-8" style="margin-left: 15%; margin-right: 15%;" >
                                    <div class="pmd-card-body">
                                        <!-- Regular Input -->
                                        <!-- Textarea -->

                                        <div class="form-group">
                                            <label class="control-label">Head Office</label>
                                            <textarea name="head_office" required class="form-control">{{$contact->head_office}}</textarea>
                                        </div>
                                        @if ($errors->has('head_office'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('head_office') }}</strong>
                                                </span>
                                        @endif
                                        <div class="form-group">
                                            <label class="control-label">Banani Office</label>
                                            <textarea name="branch_office" required class="form-control">{{$contact->branch_office}}</textarea>
                                        </div>
                                        @if ($errors->has('branch_office'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('branch_office') }}</strong>
                                                </span>
                                        @endif
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <textarea name="email" required class="form-control">{{$contact->email}}</textarea>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('email') }}</strong>
                                                </span>
                                        @endif
                                        <div class="form-group">
                                            <label class="control-label">Map Dhanmondi</label>
                                            <textarea name="map" required class="form-control">{{$contact->map}}</textarea>
                                        </div>
                                        @if ($errors->has('map'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('map') }}</strong>
                                                </span>
                                        @endif
                                        <div class="form-group">
                                            <label class="control-label">Map Banani</label>
                                            <textarea name="map_banani" required class="form-control">{{$contact->map_banani}}</textarea>
                                        </div>
                                        @if ($errors->has('map_banani'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('map_banani') }}</strong>
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
