<section style="margin-bottom: -80px;">
    <div class="rows">
        <div class="footer" style="background:#34af2359;">
            <div class="container">
                <div class="foot-sec2">
                    <div>
                        <br/>
                        @php
                            $array_package_phone = str_split($footerPhoneNumber->package, 39);
                            $array_package_phone_len = count($array_package_phone);


                            $array_visa_phone = str_split($footerPhoneNumber->visa, 39);
                            $array_visa_phone_len = count($array_visa_phone);

                            $array_air_phone = str_split($footerPhoneNumber->air_ticket, 39);
                            $array_air_phone_len = count($array_air_phone);


                        @endphp
                        <div class="row">
                            <div class="col-sm-6 foot-spec foot-com">
                                <div class="row">
                                    <h4 style="color: black"> &nbsp;Head Office ( Dhanmondi )</h4>
                                </div>
                                <h5 style="color: black;margin-top: -10px;">For Package Information:</h5>
                                <p style="color: black">
                                    @for($i = 0; $i < $array_package_phone_len; $i++)
                                        {{$array_package_phone[$i]}}
                                        <br/>
                                    @endfor
                                </p>
                                <br/>
                                <h5 style="color: black;margin-top: -22px;">For VISA Information:</h5>
                                <p style="color: black">
                                    @for($i = 0; $i < $array_visa_phone_len; $i++)
                                        {{$array_visa_phone[$i]}}
                                        <br/>
                                    @endfor
                                </p>
                                <br/>
                                <h5 style="color: black;margin-top: -22px;">For Air Ticket Information:</h5>
                                <p style="color: black">
                                    @for($i = 0; $i < $array_air_phone_len; $i++)
                                        {{$array_air_phone[$i]}}
                                        <br/>
                                    @endfor
                                </p>
                            </div>
                            <div class="col-sm-6 foot-spec foot-com">
                                <div class="row">
                                    <h4 style="color: black"> &nbsp;Branch Office ( Banani )</h4>
                                </div>
                                @php
                                    $array_package_banani_phone = str_split($footerPhoneNumber->package_banani, 39);
                                    $array_package_banani_len = count($array_package_banani_phone);


                                    $array_visa_banani_phone = str_split($footerPhoneNumber->visa_banani, 39);
                                    $array_visa_banani_phone_len = count($array_visa_banani_phone);

                                    $array_air_ticket_banani_phone = str_split($footerPhoneNumber->air_ticket_banani, 39);
                                    $array_air_ticket_banani_phone_len = count($array_air_ticket_banani_phone);


                                @endphp

                                <h5 style="color: black;margin-top: -10px">For Package Information:</h5>
                                <p style="color: black">
                                    @for($i = 0; $i < $array_package_banani_len; $i++)
                                        {{$array_package_banani_phone[$i]}}
                                        <br/>
                                        <br/>
                                        <br/>
                                    @endfor
                                </p>
                                <br/>
                                <h5 style="color: black;margin-top: -22px" >For VISA Information:</h5>
                                <p style="color: black">
                                    @for($i = 0; $i < $array_visa_banani_phone_len; $i++)
                                        {{$array_visa_banani_phone[$i]}}
                                        <br/>
                                    @endfor
                                    @for($i = $array_visa_banani_phone_len; $i < $array_visa_phone_len; $i++)
                                        <br/>
                                    @endfor
                                </p>
                                <br/>
                                <h5 style="color: black;margin-top: -22px">For Air Ticket Information:</h5>
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
            </div>
        </div>
    </div>
</section>
<section style="margin-bottom: -71px;">
    <div class="rows">
        <div class="footer" style="background:#72bd67;">
            <div class="container">
                <div class="foot-sec2" style="margin-top: 10px!important;">
                    @if(isset($map))
                    <div>
                            <div class="col-sm-6 foot-spec foot-com">
                                {{--<iframe class="sw" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.7842222700347!2d90.3736270144559!3d23.75507289451578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8acc3094f31%3A0x5ac5d3adcf8942a1!2z4KaV4Ka44Kau4Ka4IOCmueCmsuCmv-CmoeCnhw!5e0!3m2!1sen!2sbd!4v1551163135245" width="100%" height="350" frameborder="0" style="border-radius: 5px" allowfullscreen></iframe>--}}
                                <h4>HEAD OFFICE MAP ( DHANMONDI )</h4>
                                @php echo $contact->map @endphp

                            </div>
                            <div class="col-sm-6 foot-spec foot-com">
                                {{--<iframe class="sw" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.7842222700347!2d90.3736270144559!3d23.75507289451578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8acc3094f31%3A0x5ac5d3adcf8942a1!2z4KaV4Ka44Kau4Ka4IOCmueCmsuCmv-CmoeCnhw!5e0!3m2!1sen!2sbd!4v1551163135245" width="100%" height="350" frameborder="0" style="border-radius: 5px" allowfullscreen></iframe>--}}
                                <h4>Branch OFFICE MAP ( BANANI )</h4>
                                @php echo $contact->map_banani @endphp

                            </div>

                    </div>
                    @endif
                    <div>
                        <div class="row">
                        <div class="col-sm-6 foot-spec foot-com">
                            {{--<iframe class="sw" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.7842222700347!2d90.3736270144559!3d23.75507289451578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8acc3094f31%3A0x5ac5d3adcf8942a1!2z4KaV4Ka44Kau4Ka4IOCmueCmsuCmv-CmoeCnhw!5e0!3m2!1sen!2sbd!4v1551163135245" width="100%" height="350" frameborder="0" style="border-radius: 5px" allowfullscreen></iframe>--}}
                            <h4 style="margin-bottom: -7px;">Head Office:</h4>
                            <p> {{$contact->head_office}} </p>

                        </div>
                        <div class="col-sm-6 foot-spec foot-com">
                            {{--<iframe class="sw" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.7842222700347!2d90.3736270144559!3d23.75507289451578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8acc3094f31%3A0x5ac5d3adcf8942a1!2z4KaV4Ka44Kau4Ka4IOCmueCmsuCmv-CmoeCnhw!5e0!3m2!1sen!2sbd!4v1551163135245" width="100%" height="350" frameborder="0" style="border-radius: 5px" allowfullscreen></iframe>--}}
                            <h4 style="margin-bottom: -7px;">Branch Office:</h4>
                            <p> {{$contact->branch_office}} </p>

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="rows">
        <div class="footer" style="background: #63aa58">
            <div class="container">
                <div class="foot-sec2" style="margin-top: 10px!important;">
                    <div>
                        <br/>
                        <div class="row">
                            @foreach($footer_images as $footer_image)
                            <div class="col-sm-4 foot-spec foot-com">
                                <img class="sw" alt="Cosmos Holiday" style="border-radius: 5px" src="{{asset($footer_image->footer_image)}}" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
