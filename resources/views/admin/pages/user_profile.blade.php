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

        .form-control {
            font-size: 11px !important;
            /*width: auto !important; */
            height: calc(1.5em + 1.5rem + 2px);
            padding: .75rem 1.25rem;
            transition: all .2s ease;
            color: #8492a6;
            border: 1px solid #e0e6ed;
            border-radius: .75rem;
            background-color: #fff;
            background-clip: padding-box;
            box-shadow: inset 0 1px 1px rgba(31, 45, 61, .075);
        }
    </style>

@endsection

@section('content')
    <div class="top_text">
        <h1>My Profile</h1>
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-12">

            <div class="container">
                <div class="card content" style="background-color: white">
                    <div class="card-body">

                        <div class="container mt-3">

                            <div class="d-flex justify-content-center row">
                                <div class="col-md-4 float-right">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control col-md-12" type="text"
                                               value="{{$user->getFullNameAttribute()}}" readonly disabled>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control col-md-12" type="text" value="{{$user->email}}"
                                               readonly disabled>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex justify-content-center row pt-2">
                                <div class="col-md-4 float-right">
                                    <div class="form-group">
                                        <label for="mobile_no">Present Address</label>
                                        <input  class="form-control col-md-12" type="text" value="{{$user->present_address}}" readonly disabled>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Permanent Address</label>
                                        <input  class="form-control col-md-12" type="text" value="{{$user->permanent_address}}" readonly disabled>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex justify-content-center row pt-2">
                                <div class="col-md-4 float-right">
                                    <div class="form-group">
                                        <label for="mobile_no">Mobile No</label>
                                        <input  class="form-control col-md-12" type="text" value="{{$user->mobile_number}}" readonly disabled>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Emergency No</label>
                                        <input  class="form-control col-md-12" type="text" value="{{$user->emergency_number}}" readonly disabled>
                                    </div>
                                </div>

                            </div>


                            <div class="d-flex justify-content-center row pt-2">
                                <div class="col-md-4 float-right">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input  class="form-control col-md-12" type="text" value="{{$user->dob}}" readonly disabled>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="blood_group">Blood Group</label>
                                        <input  class="form-control col-md-12" type="text" value="{{$user->blood_group}}" readonly disabled>
                                    </div>
                                </div>

                            </div>

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



@endsection
<!-- End custom js for this page-->