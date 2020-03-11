@extends('frontEnd.index')
@section('title') Contact Us @endsection
@section('mainContent')
    <!--====== QUICK ENQUIRY FORM ==========-->
    <section>
        <div class="form form-spac rows con-page">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title col-md-12">
                    <h2><span>Contact us</span></h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <!--<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>-->
                </div>
                <div>
                    <div class="col-sm-6 foot-spec foot-com">
{{--                        <iframe class="sw" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.7842222700347!2d90.3736270144559!3d23.75507289451578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8acc3094f31%3A0x5ac5d3adcf8942a1!2z4KaV4Ka44Kau4Ka4IOCmueCmsuCmv-CmoeCnhw!5e0!3m2!1sen!2sbd!4v1551163135245" width="100%" height="350" frameborder="0" style="border-radius: 5px" allowfullscreen></iframe>--}}
                        <h4>HEAD OFFICE ( DHANMONDI )</h4>
                        <img class="img-responsive sw" alt="Cosmos Holiday" src="{{asset($contact_us->head_office_image)}}"/>
                        <h4>Head Office:</h4>
                        <p> {{$contact->head_office}} </p>

                        @php
                            $array_package_phone = str_split($footerPhoneNumber->package, 39);
                            $array_package_phone_len = count($array_package_phone);


                            $array_visa_phone = str_split($footerPhoneNumber->visa, 39);
                            $array_visa_phone_len = count($array_visa_phone);

                            $array_air_phone = str_split($footerPhoneNumber->air_ticket, 39);
                            $array_air_phone_len = count($array_air_phone);


                        @endphp
                        <div class="row">
                            <h4> &nbsp;Head Office ( Dhanmondi )</h4>
                        </div>
                        <h5>For Package Information:</h5>
                        <p style="color: black">
                            @for($i = 0; $i < $array_package_phone_len; $i++)
                                {{$array_package_phone[$i]}}
                                <br/>
                            @endfor
                        </p>
                        <h5 >For VISA Information:</h5>
                        <p style="color: black">
                            @for($i = 0; $i < $array_visa_phone_len; $i++)
                                {{$array_visa_phone[$i]}}
                                <br/>
                            @endfor
                        </p>
                        <h5 >For Air Ticket Information:</h5>
                        <p style="color: black">
                            @for($i = 0; $i < $array_air_phone_len; $i++)
                                {{$array_air_phone[$i]}}
                                <br/>
                            @endfor
                        </p>

                    </div>
                    @php
                        $array_package_banani_phone_c = str_split($footerPhoneNumber->package_banani, 39);
                        $array_package_banani_len_c = count($array_package_banani_phone_c);


                        $array_visa_banani_phone = str_split($footerPhoneNumber->visa_banani, 39);
                        $array_visa_banani_phone_len = count($array_visa_banani_phone);

                        $array_air_ticket_banani_phone = str_split($footerPhoneNumber->air_ticket_banani, 39);
                        $array_air_ticket_banani_phone_len = count($array_air_ticket_banani_phone);


                    @endphp
                    <div class="col-sm-6 foot-spec foot-com">
{{--                        <iframe class="sw" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.7842222700347!2d90.3736270144559!3d23.75507289451578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8acc3094f31%3A0x5ac5d3adcf8942a1!2z4KaV4Ka44Kau4Ka4IOCmueCmsuCmv-CmoeCnhw!5e0!3m2!1sen!2sbd!4v1551163135245" width="100%" height="350" frameborder="0" style="border-radius: 5px" allowfullscreen></iframe>--}}
                        <h4>Branch OFFICE ( BANANI )</h4>
                        <img class="img-responsive sw" alt="cosmos holiday banani" src="{{asset($contact_us->branch_office_image)}}"/>
                        <h4>Branch Office:</h4>
                        <p> {{$contact->branch_office}} </p>
                        <div class="row">
                            <h4> &nbsp;Branch Office ( Banani )</h4>
                        </div>
                        <h5>For Package Information:</h5>
                        <p style="color: black">
                            @for($i = 0; $i < $array_package_banani_len_c; $i++)
                                {{$array_package_banani_phone_c[$i]}}
                                <br/>
                                <br/>
                                <br/>
                            @endfor
                        </p>
                        <h5>For VISA Information:</h5>
                        <p style="color: black">
                            @for($i = 0; $i < $array_visa_banani_phone_len; $i++)
                                {{$array_visa_banani_phone[$i]}}
                                <br/>
                            @endfor
                            @for($i = $array_visa_banani_phone_len; $i < $array_visa_phone_len; $i++)
                                <br/>
                            @endfor
                        </p>
                        <h5>For Air Ticket Information:</h5>
                        <p style="color: black">
                            @for($i = 0; $i < $array_air_ticket_banani_phone_len; $i++)
                                {{$array_air_ticket_banani_phone[$i]}}
                                <br/>
                            @endfor

                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
