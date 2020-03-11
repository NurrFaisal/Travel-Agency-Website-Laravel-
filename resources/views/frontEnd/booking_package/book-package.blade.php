@extends('frontEnd.index')

@section('mainContent')

    <section>
        <div class="pla">
            <div class="tr-regi-form v2-search-form">
                <h3>{{$package->name}}</h3>
                <h2>Book Now</h2>
{{--                <p>01912621193, 01912621193, 01912621193, 01912621193, 01912621193, 01912621193, 01912621193, 01912621193, 01912621193, 01912621193, </p>--}}
                <form class="" method="post" action="{{URL::to('/confirm-package-booking')}}">
                    @if(Session::get('message'))
                    <div class="alert alert-success contact__msg" style="display: block" role="alert">
                       {!! Session::get('message')  !!}
                    </div>
                    @endif
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text"  class="validate" name="name" required >
                            <input type="hidden" value="{{$package->id}}"  class="validate" name="id" required>
                            <label>Enter your name</label>
                        </div>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red;">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="number"  class="validate" name="phone_number" required >
                            <label>Enter your phone</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="email"  class="validate" name="email" required >
                            <label>Enter your email</label>
                        </div>
                    </div>
                    @if ($errors->has('phone_number'))
                        <span class="invalid-feedback" role="alert">
                                <strong style="color: red; float: left">{{ $errors->first('phone_number') }}</strong>
                            </span>
                    @endif
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('email') }}</strong>
                            </span>
                    @endif

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="submit" value="Book Now" class="waves-effect  tourz-sear-btn ">
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </section>

@endsection
