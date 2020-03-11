<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/travelz/main.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 11:26:10 GMT -->
<head>
    <title>Cosmos Holiday | @yield('title') </title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <meta property="og:url" content="https://www.cosmosholiday.com.bd/" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="Cosmos Holiday &amp; Your Travel Manager | CosmosHoliday.com.bd" />
    <meta property="og:description" content="Enjoy best Traveling 2019" />


    <!-- FAV ICON -->
    <link rel="shortcut icon" href="{{asset('cosmos/favicon/cosmos.png')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">
    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="{{asset('cosmos/frontEnd/css/')}}/font-awesome.min.css">
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="{{asset('cosmos/frontEnd/css/')}}/style.css">
    <link rel="stylesheet" href="{{asset('cosmos/frontEnd/css/')}}/materialize.css">
    <link rel="stylesheet" href="{{asset('cosmos/frontEnd/css/')}}/bootstrap.css">
    <link rel="stylesheet" href="{{asset('cosmos/frontEnd/css/')}}/mob.css">
    <link rel="stylesheet" href="{{asset('cosmos/frontEnd/css/')}}/animate.css">


    {{--Gellry Start--}}

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    {{--Gellery End--}}

    <style>
        /*body{margin:0;padding: 0;}*/
        canvas{
            position:absolute;top:0;left:0;
            /*background-image: linear-gradient(bottom, rgb(105,173,212) 0%, rgb(23,82,145) 84%);*/
            /*background-image: -o-linear-gradient(bottom, rgb(105,173,212) 0%, rgb(23,82,145) 84%);*/
            /*background-image: -moz-linear-gradient(bottom, rgb(105,173,212) 0%, rgb(23,82,145) 84%);*/
            /*background-image: -webkit-linear-gradient(bottom, rgb(105,173,212) 0%, rgb(23,82,145) 84%);*/
            /*background-image: -ms-linear-gradient(bottom, rgb(105,173,212) 0%, rgb(23,82,145) 84%);*/

            /*background-image: -webkit-gradient(*/
                /*linear,*/
                /*left bottom,*/
                /*left top,*/
                /*color-stop(0, rgb(105,173,212)),*/
                /*color-stop(0.84, rgb(23,82,145))*/
            /*);*/
            /*z-index: 99;*/
        }

    </style>


    <style>
        .sw{
            box-shadow: 0 0 10px #5bbaff;
            border: 1px solid #5bbaff;
        }
        .tlg{
            background-image: linear-gradient(#5bbaff, #a6a6a66b);
        }
        .zm{
            transition: transform .2s;
        }
        .zm:hover {
            transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
        .tlb{
            background: #ffffffe8;
        }
        .footer h4{
            color: #f2fafd;
        }
        .footer p{
            color: #f2fafd;
        }
        @media  print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
            .show-print {
                display: block !important;
            }
            @page  {
                size: auto;   /* auto is the initial value */
                margin: 0;  /* this affects the margin in the printer settings */
            }
        }

    </style>
    <style>
        body{
            cursor: url({{asset('/airplane/airplane4.png')}}),auto;
        }

    </style>
    <style>
        .show-print {
            display: none;
        }
    </style>

{{--    <script src="{{asset('cosmos/frontEnd/js/')}}/html5shiv.js"></script>--}}
{{--    <script src="{{asset('cosmos/frontEnd/js/')}}/respond.min.js"></script>--}}
</head>
<style>
    @media screen and (min-width: 992px) and (max-width: 1188px) {
        .note-search{
            width:110px!important;
        }
    }
    @media screen and (min-width: 992px) and (max-width: 1044px) {
        .notelisearch{
            display: none!important;
        }
    }
    @media screen and (min-width: 230px) and (max-width: 767px) {
        .searchBtn{
            width: 100%!important;
        }
        .searchInput{
            width: 100%!important;
        }
        .searchDiv{
            float: none!important;
        }
        .searchBtn{
            width: 100%!important;
        }
        }
    }
</style>
<body id="wrap">
{{--@if(!isset($canvas))--}}
{{--<canvas id="canvas"></canvas>--}}
{{--@endif--}}
<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=526924324384363&autoLogAppEvents=1"></script>
<!-- Preloader -->
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<div class="no-print">
    @include('frontEnd.includes.header.header')
</div>

<!-- MOBILE MENU -->
{{--@include('frontEnd.includes.searchbar.searchbar')--}}
<div class="pla no-print">
    <!--<marquee width="100%" direction="left" height="30%">-->
    <!--    <h4 style="text-align: center; letter-spacing: 5px">...... This website information will be upgraded within 15th January 2020 ...... </h4>-->
    <!--</marquee>-->
</div>
@yield('mainContent')
<div class="no-print">
@include('frontEnd.includes.footer.footer_one')
<!--====== FOOTER 2 ==========-->
@include('frontEnd.includes.footer.footer_two')
<!--====== FOOTER - COPYRIGHT ==========-->
    @include('frontEnd.includes.footer.footer_three')
    @include('frontEnd.includes.share_icon.share_icon')
</div>

<!--========= Scripts ===========-->
<script src="{{asset('cosmos/frontEnd/js/')}}/jquery-latest.min.js"></script>
{{--<script src="{{asset('cosmos/frontEnd/js/')}}/jquery-ui.js"></script>--}}
<script src="{{asset('cosmos/frontEnd/js/')}}/bootstrap.js"></script>
<script src="{{asset('cosmos/frontEnd/js/')}}/wow.min.js"></script>
<script src="{{asset('cosmos/frontEnd/js/')}}/materialize.min.js"></script>
<script src="{{asset('cosmos/frontEnd/js/')}}/mail.js"></script>
<script src="{{asset('cosmos/frontEnd/js/')}}/custom.js"></script>

{{--Gellery Sart--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
{{--Gellery End--}}

{{--<script>--}}
{{--    (function() {--}}
{{--        var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame ||--}}
{{--            function(callback) {--}}
{{--                window.setTimeout(callback, 1000 / 60);--}}
{{--            };--}}
{{--        window.requestAnimationFrame = requestAnimationFrame;--}}
{{--    })();--}}


{{--    var flakes = [],--}}
{{--        canvas = document.getElementById("canvas"),--}}
{{--        ctx = canvas.getContext("2d"),--}}
{{--        flakeCount = 400,--}}
{{--        mX = -100,--}}
{{--        mY = -100--}}

{{--    canvas.width = window.innerWidth;--}}
{{--    canvas.height = window.innerHeight;--}}

{{--    function snow() {--}}
{{--        ctx.clearRect(0, 0, canvas.width, canvas.height);--}}

{{--        for (var i = 0; i < flakeCount; i++) {--}}
{{--            var flake = flakes[i],--}}
{{--                x = mX,--}}
{{--                y = mY,--}}
{{--                minDist = 150,--}}
{{--                x2 = flake.x,--}}
{{--                y2 = flake.y;--}}

{{--            var dist = Math.sqrt((x2 - x) * (x2 - x) + (y2 - y) * (y2 - y)),--}}
{{--                dx = x2 - x,--}}
{{--                dy = y2 - y;--}}

{{--            if (dist < minDist) {--}}
{{--                var force = minDist / (dist * dist),--}}
{{--                    xcomp = (x - x2) / dist,--}}
{{--                    ycomp = (y - y2) / dist,--}}
{{--                    deltaV = force / 2;--}}

{{--                flake.velX -= deltaV * xcomp;--}}
{{--                flake.velY -= deltaV * ycomp;--}}

{{--            } else {--}}
{{--                flake.velX *= .98;--}}
{{--                if (flake.velY <= flake.speed) {--}}
{{--                    flake.velY = flake.speed--}}
{{--                }--}}
{{--                flake.velX += Math.cos(flake.step += .05) * flake.stepSize;--}}
{{--            }--}}

{{--            ctx.fillStyle = "rgba(255,255,255," + flake.opacity + ")";--}}
{{--            flake.y += flake.velY;--}}
{{--            flake.x += flake.velX;--}}

{{--            if (flake.y >= canvas.height || flake.y <= 0) {--}}
{{--                reset(flake);--}}
{{--            }--}}


{{--            if (flake.x >= canvas.width || flake.x <= 0) {--}}
{{--                reset(flake);--}}
{{--            }--}}

{{--            ctx.beginPath();--}}
{{--            ctx.arc(flake.x, flake.y, flake.size, 0, Math.PI * 2);--}}
{{--            ctx.fill();--}}
{{--        }--}}
{{--        requestAnimationFrame(snow);--}}
{{--    };--}}

{{--    function reset(flake) {--}}
{{--        flake.x = Math.floor(Math.random() * canvas.width);--}}
{{--        flake.y = 0;--}}
{{--        flake.size = (Math.random() * 2) + 1;--}}
{{--        flake.speed = (Math.random() * 0.5) + 0.2;--}}
{{--        flake.velY = flake.speed;--}}
{{--        flake.velX = 0;--}}
{{--        flake.opacity = (Math.random() * 0.5) + 0.3;--}}
{{--    }--}}

{{--    function init() {--}}
{{--        for (var i = 0; i < flakeCount; i++) {--}}
{{--            var x = Math.floor(Math.random() * canvas.width),--}}
{{--                y = Math.floor(Math.random() * canvas.height),--}}
{{--                size = (Math.random() * 1) + 0.5,--}}
{{--                speed = (Math.random() * 1) + 0.5,--}}
{{--                opacity = (Math.random() * 0.5) + 0.3;--}}

{{--            flakes.push({--}}
{{--                speed: speed,--}}
{{--                velY: speed,--}}
{{--                velX: 0,--}}
{{--                x: x,--}}
{{--                y: y,--}}
{{--                size: size,--}}
{{--                stepSize: (Math.random()) / 30,--}}
{{--                step: 0,--}}
{{--                opacity: opacity--}}
{{--            });--}}
{{--        }--}}

{{--        snow();--}}
{{--    };--}}

{{--    canvas.addEventListener("mousemove", function(e) {--}}
{{--        mX = e.clientX,--}}
{{--            mY = e.clientY--}}
{{--    });--}}

{{--    window.addEventListener("resize",function(){--}}
{{--        canvas.width = window.innerWidth;--}}
{{--        canvas.height = window.innerHeight;--}}
{{--    })--}}

{{--    init();--}}
{{--</script>--}}


{{--gellery Start--}}

<script>
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });

        $(".zoom").hover(function(){

            $(this).addClass('transition');
        }, function(){

            $(this).removeClass('transition');
        });
    });

</script>

{{--Gellery End--}}

</body>


<!-- Mirrored from rn53themes.net/themes/demo/travelz/main.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 11:30:03 GMT -->
</html>
