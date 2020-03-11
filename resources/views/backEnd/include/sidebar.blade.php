<div class="pmd-sidebar-overlay"></div>

<!-- Left sidebar -->
<aside id="basicSidebar" class="pmd-sidebar  sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
    <ul class="nav pmd-sidebar-nav">

        <!-- User info -->
        <li class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" aria-expandedhref="javascript:void(0);">
                <div class="media-left">
{{--                    <img src="{{asset('cosmos/backEnd/themes/')}}/images/user-icon.png" alt="New User">--}}
                </div>
                <div class="media-body media-middle"><p style="text-align: center">Admin : {{Session::get('admin_name')}}</p></div>
                <div class="media-right media-middle"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li><a onclick="return confirm('Are you sure ??? you want to logout from this application ....')" href="{{URL::to('/apanel/logout')}}">Logout</a></li>
            </ul>
        </li><!-- End user info -->

        <li>
            <a class="pmd-ripple-effect" href="{{URL::to('/apanel/dashboard')}}">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
<g>
    <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
                <span class="media-body">Dashboard</span>
            </a>
        </li>
        <li class="dropdown pmd-dropdown">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
<g>
    <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
                <span class="media-body">Packages</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{URL::to('/apanel/packages')}}">Package</a></li>
                <li><a href="{{URL::to('/apanel/package-order')}}">Package Order</a></li>
                {{--                <li><a href="{{URL::to('/continent')}}">Continent</a></li>--}}
            </ul>
        </li>
        <li>
            <a class="pmd-ripple-effect" href="{{URL::to('/apanel/air-tickets')}}">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
<g>
    <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
                <span class="media-body">Air Tickets</span>
            </a>
        </li>
        <li>
            <a class="pmd-ripple-effect" href="{{URL::to('/apanel/hotel')}}">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
<g>
    <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
                <span class="media-body">Hotel</span>
            </a>
        </li>
        <li class="dropdown pmd-dropdown">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
<g>
    <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
                <span class="media-body">Visa</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{URL::to('/apanel/visa')}}">Visa</a></li>
                <li><a href="{{URL::to('/apanel/visa-order')}}">Visa Order</a></li>
                {{--                <li><a href="{{URL::to('/continent')}}">Continent</a></li>--}}
            </ul>
        </li>

        <li class="dropdown pmd-dropdown">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
<g>
    <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
                <span class="media-body">Setteing</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{URL::to('/apanel/logo')}}">Logo</a></li>
                <li><a href="{{URL::to('/slider')}}">Slider</a></li>
                <li><a href="{{URL::to('/about-slider')}}">About Slider</a></li>
                <li><a href="{{URL::to('/apanel/about-us')}}">About Us</a></li>
                <li><a href="{{URL::to('/apanel/contact-us')}}">Contact Us</a></li>
                <li><a href="{{URL::to('/apanel/continents')}}">Continents</a></li>
                <li><a href="{{URL::to('/country')}}">Countries</a></li>
                <li><a href="{{URL::to('/apanel/division')}}">Division</a></li>
                <li><a href="{{URL::to('/apanel/pack-list')}}">Pack List</a></li>
                <li><a href="{{URL::to('/apanel/air-ticket-title')}}">Air Ticket Title</a></li>
                <li><a href="{{URL::to('/apanel/air-ticket-destination')}}">Air Ticket Destination</a></li>
                <li><a href="{{URL::to('/apanel/air-lines')}}">Air Lines</a></li>
                <li><a href="{{URL::to('/apanel/hotel-title')}}">Hotel Title</a></li>
            </ul>
        </li>
        <li class="dropdown pmd-dropdown">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
<g>
    <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
                <span class="media-body">Footer</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{URL::to('/footer-image')}}">Footer Image</a></li>
                <li><a href="{{URL::to('/footer-phone-number')}}">Footer Phone Number</a></li>
                <li><a href="{{URL::to('/ifram')}}">Footer ifram</a></li>
                <li><a href="{{URL::to('/apanel/contact')}}">Contact</a></li>
                <li><a href="{{URL::to('/apanel/contact-us')}}">Contact US</a></li>
            </ul>
        </li>
        <li class="dropdown pmd-dropdown">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
<g>
    <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
                <span class="media-body">Gallery</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{URL::to('/apanel/gallery/main-category')}}">Main Categories</a></li>
                <li><a href="{{URL::to('/apanel/gallery/sub-category')}}">Sub Categories</a></li>
                <li><a href="{{URL::to('/apanel/gallery/year')}}">Years</a></li>
                <li><a href="{{URL::to('/apanel/gallery/gallery-image')}}">Gallery Image</a></li>
            </ul>
        </li>


        @if(Session::get('admin') == 1)
        <li>
            <a class="pmd-ripple-effect" href="{{URL::to('/apanel/transport')}}">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
<g>
    <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
                <span class="media-body">Transport</span>
            </a>
        </li>

        <li>
            <a class="pmd-ripple-effect" href="{{URL::to('/apanel/dashboard')}}">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
           <g>
            <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		     M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
           </g>
           </svg></i>
                <span class="media-body">Others</span>
            </a>
        </li>

        <li>
            <a class="pmd-ripple-effect" href="{{URL::to('/apanel/admin')}}">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
           <g>
               <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		     M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
           </g>
           </svg></i>
                <span class="media-body">Administration</span>
            </a>
        </li>
        @endif

        @if(Session::get('admin') == 1)

        <li class="dropdown pmd-dropdown">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="18px" height="18.001px" viewBox="0 0 18 18.001" enable-background="new 0 0 18 18.001" xml:space="preserve">
<path fill="#C9C8C8" d="M6.188,0.001C5.232,0.001,4.5,0.732,4.5,1.688c0,0.394,0.166,0.739,0.334,1.02L5.45,3.71
	c0.113,0.113,0.176,0.341,0.176,0.51v0.281c0,0.619-0.506,1.125-1.125,1.125H0.282c-0.169,0-0.281,0.112-0.281,0.281V17.72
	c0,0.168,0.112,0.281,0.281,0.281h4.219c0.619,0,1.125-0.506,1.125-1.125v-0.281c0-0.168-0.063-0.397-0.176-0.509
	c0,0-0.615-0.946-0.615-1.002C4.666,14.802,4.5,14.457,4.5,14.063c0-0.956,0.731-1.688,1.688-1.688s1.688,0.731,1.688,1.688
	c0,0.394-0.166,0.739-0.334,1.02l-0.616,1.002c-0.056,0.112-0.176,0.341-0.176,0.509v0.281c0,0.619,0.506,1.125,1.125,1.125h4.219
	c0.168,0,0.281-0.113,0.281-0.281V13.5c0-0.619,0.506-1.125,1.125-1.125h0.281c0.169,0,0.396,0.063,0.51,0.176
	c0,0,0.945,0.616,1.002,0.616c0.337,0.168,0.626,0.334,1.02,0.334c0.956,0,1.687-0.731,1.687-1.687c0-0.957-0.731-1.688-1.687-1.688
	c-0.394,0-0.738,0.166-1.02,0.334l-1.002,0.616c-0.113,0.056-0.341,0.176-0.51,0.176H13.5c-0.619,0-1.125-0.506-1.125-1.125V5.908
	c0-0.168-0.113-0.281-0.281-0.281H7.875c-0.619,0-1.125-0.506-1.125-1.125V4.221c0-0.168,0.063-0.397,0.176-0.51
	c0,0,0.616-0.945,0.616-1.001c0.168-0.281,0.334-0.626,0.334-1.02C7.875,0.733,7.144,0.002,6.188,0.001L6.188,0.001z"/>
</svg></i>
                <span class="media-body">Our Team</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{URL::to('/apanel/our-team-banner')}}">Banner</a></li>
                <li><a href="{{URL::to('/apanel/our-team-staff')}}">Staff</a></li>
            </ul>
        </li>
            @endif

    </ul>
</aside>
