@extends('layouts.user-layout')
@section('pagePluginStyle')

@endsection
@section('pageLevelStyle')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/holiday_custom_style.css')}}">
    <style>

        .card {
            border: none;
            border-radius: 25px;
        }

    </style>

@endsection

@section('content')
    <div class="top_text">
        <h1>Change Password</h1>
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-12">

            <div class="container">
                <div class="card content" style="background-color: white">
                    <div class="card-body">
                        <div class="p-3">
                            <form class="form-horizontal m-t-30" method="POST" action="{{ route('password.change') }}">
                                @csrf
                                @foreach ($errors->all() as $error)

                                    <p class="text-danger">{{ $error }}</p>

                                @endforeach

                                <div class="form-group">
                                    <label for="Useremail">Old Password</label>
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                           name="old_password" id="old_password">
                                </div>

                                <div class="form-group">
                                    <label for="Useremail">New Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" id="password">
                                </div>

                                <div class="form-group">
                                    <label for="Useremail">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                           id="password_confirmation">
                                </div>

                                <div class="col-sm-12 d-flex justify-content-center">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Change
                                        Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


<!-- Start of js plugin -->
@section('pagePluginScript')

@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
                @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"

        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif


    </script>


@endsection
<!-- End custom js for this page-->