<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Purpose Application UI is the following chapter we've finished in order to create a complete and robust solution next to the already known Purpose Website UI.">
    <meta name="author" content="Webpixels">
    <!-- start facebook meta tag-->
    <meta property="og:title" content="Ant App">
    <meta property="og:image" content="../assets/img/brand/ant_2.png">
    <meta property="og:description" content="Ant App">
    <!-- <meta property="og:url" content=""> -->
    <meta name="twitter:card" content="summary_large_image">
    <!-- End facebook meta tag-->
    <title>AntApp</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset("backend/img/brand/ant_2.png")}}" type="image/png">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{asset("backend/libs/@fortawesome/fontawesome-free/css/all.min.css")}}"><!-- Page CSS -->
    <link rel="stylesheet" href="{{asset("backend/libs/fullcalendar/dist/fullcalendar.min.css")}}">

    <!-- Purpose CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("backend/css/purpose.css")}}" id="stylesheet">
    <link rel="stylesheet" href="{{asset("backend/css/ant_sidebar.css")}}">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}


    @yield('pagePluginStyle')
    @yield('pageLevelStyle')
</head>

<body class="application application-offset">
<!-- Chat modal -->
<!-- Customizer modal -->
<!-- Application container -->
<div class="container-fluid container-application">
    <!-- Sidenav -->

@include('layouts.partials.ant_sidenav')
<!-- Sidenav Ends Here-->
    <!-- Content -->
    <div class="main-content position-relative">
        <!-- Main nav -->
    @include('layouts.partials.navbar-main')

     @yield('page-title')
    <!-- Page content -->
        <div class="page-content">
            <div class="page_child_content">


                @yield('content')

                {{--            @include('layouts.partials.theme-content')--}}
            </div>
        </div>
        <!-- Footer -->
        {{--        @include('layouts.partials.theme-footer')--}}
    </div>
</div>
<!-- Scripts -->
<!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
<script src="{{asset("backend/js/purpose.core.js")}}"></script>
<!-- Page JS -->
<script src="{{asset("backend/libs/progressbar.js/dist/progressbar.min.js")}}"></script>
<script src="{{asset("backend/libs/apexcharts/dist/apexcharts.min.js")}}"></script>
<script src="{{asset("backend/libs/moment/min/moment.min.js")}}"></script>
<script src="{{asset("backend/libs/fullcalendar/dist/fullcalendar.min.js")}}"></script>
<!-- Purpose JS -->
<script src="{{asset("backend/js/purpose.js")}}"></script>
<script src="{{asset("backend/js/ant-sidebar.js")}}"></script>
<!-- Demo JS - remove it when starting your project -->
{{--<script src="../assets/js/demo.js"></script>--}}
@yield('pagePluginScript')
@yield('pageLevelScript')



</body>

</html>