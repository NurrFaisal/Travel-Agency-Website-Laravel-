<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Propeller Admin Dashboard">
    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">

    <title>Admin - Cosmos Holiday</title>
    <meta name="description" content="Admin is a material design and bootstrap based responsive dashboard template created mainly for admin and backend applications."/>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('cosmos/backEnd/themes/')}}/images/favicon.ico">

    <!-- Google icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/assets/')}}/css/bootstrap.min.css">

    <!-- Propeller css -->
    <!-- build:[href] assets/css/ -->
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/assets/')}}/css/propeller.min.css">
    <!-- /build -->

    <!-- Propeller date time picker css-->
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/components/')}}/datetimepicker/css/bootstrap-datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/components/')}}/datetimepicker/css/pmd-datetimepicker.css" />

    <!-- Propeller theme css-->
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/themes/')}}/css/propeller-theme.css" />

    <!-- Propeller admin theme css-->
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/themes/')}}/css/propeller-admin.css">

    <!-- Select2 css-->
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/components/')}}/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/components/')}}/select2/css/select2-bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/components/')}}/select2/css/pmd-select2.css" />


    {{--<link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/components/')}}/select2/css/pmd-select2.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/components/')}}/select2/css/select2.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/components/')}}/select2/css/select2-bootstrap.css">--}}


    <script src="{{asset('cosmos/backEnd/assets/')}}/ckeditor/ckeditor.js"></script>
    <script src="{{asset('cosmos/backEnd/assets/')}}/js/jquery-1.12.2.min.js"></script>

</head>

<body>
<!-- Header Starts -->
<!--Start Nav bar -->
@include('backEnd.include.header')
<!--End Nav bar -->
<!-- Header Ends -->

<!-- Sidebar Starts -->
<!-- End Left sidebar -->
<!-- Sidebar Ends -->
@include('backEnd.include.sidebar')
<!--content area start-->

@yield('mainContent')
<!--end content area-->

<!-- Footer Starts -->
<!--footer start-->
@include('backEnd.include.footer')
<!--footer end-->
<!-- Footer Ends -->

<!-- Scripts Starts -->
<script src="{{asset('cosmos/backEnd/assets/')}}/js/bootstrap.min.js"></script>
{{--<script src="{{asset('cosmos/backEnd/assets/')}}/ckeditor/ckeditor.js"></script>--}}


<script src="{{asset('cosmos/backEnd/assets/')}}/js/propeller.min.js"></script>

<!-- Javascript for revenue progressbar animation effect-->


<!--staked column chart for payment-->

<!-- Scripts Ends -->
<!-- Javascript for Datepicker -->
<script type="text/javascript" language="javascript" src="{{asset('cosmos/backEnd/components/')}}/datetimepicker/js/moment-with-locales.js"></script>
<script type="text/javascript" language="javascript" src="{{asset('cosmos/backEnd/components/')}}/datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script>
    // Linked date and time picker
    // start date date and time picker
    $('#datepicker-default').datetimepicker();
    $(".auto-update-year").html(new Date().getFullYear());
</script>

<!-- Select2 js-->
<script type="text/javascript" src="{{asset('cosmos/backEnd/components/')}}/select2/js/select2.full.js"></script>

<!-- Propeller Select2 -->
<script type="text/javascript">
    $(document).ready(function() {
        <!-- Simple Selectbox -->
        $(".select-simple").select2({
            theme: "bootstrap",
            minimumResultsForSearch: Infinity,
        });
        <!-- Selectbox with search -->
        $(".select-with-search").select2({
            theme: "bootstrap"
        });
        <!-- Select Multiple Tags -->
        $(".select-tags").select2({
            tags: false,
            theme: "bootstrap",
        });
        <!-- Select & Add Multiple Tags -->
        $(".select-add-tags").select2({
            tags: true,
            theme: "bootstrap",
        });
    });
</script>
<script type="text/javascript" src="{{asset('cosmos/backEnd/components/')}}/select2/js/pmd-select2.js"></script>
<script>
    $(document).ready(function() {
        var sPath=window.location.pathname;
        var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
        $(".pmd-sidebar-nav").each(function(){
            $(this).find("a[href='"+sPage+"']").parents(".dropdown").addClass("open");
            $(this).find("a[href='"+sPage+"']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
            $(this).find("a[href='"+sPage+"']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
            $(this).find("a[href='"+sPage+"']").addClass("active");
        });
    });
</script>

<script>
    function packageCountry(id) {
        alert('ok')
    }
</script>




{{--<script type="text/javascript" src="{{asset('cosmos/backEnd/components/')}}/select2/js/pmd-select2.js"></script>--}}
{{--<script type="text/javascript" src="{{asset('cosmos/backEnd/components/')}}/select2/js/select2.full.js"></script>--}}

</body>
</html>
