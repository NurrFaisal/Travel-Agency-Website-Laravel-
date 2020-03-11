 <section>

    <div>
        <div>
            <div>
                <div class="slider fullscreen" style="z-index: -1;">
                    <ul class="slides">
                        @foreach($sliders as $slider)
                        <li> <img src="{{asset($slider->slider_image)}}" alt="Cosmos Holiday">
                            <!-- random image -->
                            <div class="caption center-align slid-cap">
{{--                                <h5 class="light grey-text text-lighten-3">Information updating....</h5>--}}
{{--                                <h3 style="color: #fcfe04">Information Updateing</h3>--}}
{{--                                <p>Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis at.Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>--}}
                            </div>
                        </li>

                        @endforeach

                    </ul>
                </div>

            </div>
        </div>
    </div>


</section>



