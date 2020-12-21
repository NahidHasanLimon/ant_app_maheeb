<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('backend/loginRes/css/global.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/loginRes/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/loginRes/css/responsive.css')}}" />
    <title>AntApp &mdash; Login!</title>
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-6 float-left">
            <div class="logo-wrapper">
                <a href="#"><img src="{{asset('backend/loginRes/img/logo/Ant-App-logo.svg')}}" class="img-fluid" alt="Ant-App-logo" id="logo" /></a>
            </div>
        </div>
        <div class="col-6">
            <div class="rigt-section float-right">
                <button id="change-theme-btn">Dark</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">

            @yield('content')

        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="{{asset('backend/loginRes/js/app.js')}}"></script>
</body>

</html>
