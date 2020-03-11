@extends('backEnd.index')

@section('mainContent')
    <div class="pmd-content pmd-content-custom" id="content">

        <div class="container-fluid">


            <h1 class="section-title" id="services">
                <span>Footer Phone Number</span>
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
                        <form action="{{URL::to('/update-footer-phone-number')}}" method="POST" class="form-horizontal" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pmd-card pmd-z-depth pmd-card-custom-form col-md-8" style="margin-left: 15%; margin-right: 15%;" >
                                    <div class="pmd-card-body">
                                        <!-- Regular Input -->
                                        <!-- Textarea -->

                                        <div class="form-group">
                                            <label class="control-label">Package Dhanmodi</label>
                                            <textarea name="package" required class="form-control">{{$footerPhoneNumber->package}}</textarea>
                                        </div>
                                        @if ($errors->has('package'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('package') }}</strong>
                                                </span>
                                        @endif
                                        <div class="form-group">
                                            <label class="control-label">Package Banani</label>
                                            <textarea name="package_banani" required class="form-control">{{$footerPhoneNumber->package_banani}}</textarea>
                                        </div>
                                        @if ($errors->has('package'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('package') }}</strong>
                                                </span>
                                        @endif
                                        <div class="form-group">
                                            <label class="control-label">Visa Dhanmondi</label>
                                            <textarea name="visa" required class="form-control">{{$footerPhoneNumber->visa}}</textarea>
                                        </div>
                                        @if ($errors->has('visa'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('visa') }}</strong>
                                                </span>
                                        @endif
                                        <div class="form-group">
                                            <label class="control-label">Visa Banani</label>
                                            <textarea name="visa_banani" required class="form-control">{{$footerPhoneNumber->visa_banani}}</textarea>
                                        </div>
                                        @if ($errors->has('visa_banani'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('visa_banani') }}</strong>
                                                </span>
                                        @endif
                                        <div class="form-group">
                                            <label class="control-label">Air Ticket Dhanmodi</label>
                                            <textarea name="air_ticket" required class="form-control">{{$footerPhoneNumber->air_ticket}}</textarea>
                                        </div>
                                        @if ($errors->has('air_ticket'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('air_ticket') }}</strong>
                                                </span>
                                        @endif
                                        <div class="form-group">
                                            <label class="control-label">Air Ticket Banani</label>
                                            <textarea name="air_ticket_banani" required class="form-control">{{$footerPhoneNumber->air_ticket_banani}}</textarea>
                                        </div>
                                        @if ($errors->has('air_ticket_banani'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('air_ticket_banani') }}</strong>
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
