@extends('frontEnd.index')
@section('title') Gellery @endsection
@section('mainContent')
    <style>
        body {
            background-color:#1d1d1d !important;
            font-family: "Asap", sans-serif;
            color:#989898;
            /*margin:10px;*/
            font-size:16px;
        }

        #demo {
            height:100%;
            position:relative;
            overflow:hidden;
        }


        .green{
            background-color:#6fb936;
        }
        .thumb{
            margin-bottom: 30px;
        }

        .page-top{
            margin-top:85px;
        }


        img.zoom {
            width: 100%;
            height: 200px;
            border-radius:5px;
            object-fit:cover;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
        }


        .transition {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }
        .modal-header {

            border-bottom: none;
        }
        .modal-title {
            color:#000;
        }
        .modal-footer{
            display:none;
        }

    </style>


    <div class="container page-top">



        <div class="row">
            @foreach($gellery_images as $gellery_image)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="{{asset($gellery_image->gellery_image)}}" class="fancybox" rel="ligthbox">
                    <img  src="{{asset($gellery_image->box_image)}}" class="zoom img-fluid "  alt="Comos Holiday">
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
