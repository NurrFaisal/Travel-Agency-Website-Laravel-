<section>
    <!-- TOP SEARCH BOX -->
    <div class="search-top" style="background-color: #47b7d4; border-top: 0px solid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-form">
                        <form class="tourz-search-form" method="post" action="{{URL::to('/home-search-visa')}}">
                                <div class="input-field">
                                    <input style="background-color: #47b7d4; border: 0px solid;" type="text" id="select-city" disabled class="autocomplete">
                                </div>
                                <div class="input-field">
                                    <input type="text" name="search" id="select-search" class="autocomplete">
                                    <label for="select-search" class="search-hotel-type">Search for VISA</label>
                                </div>
                                <div class="input-field">
                                    <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn">
                                </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END TOP SEARCH BOX -->
</section>
