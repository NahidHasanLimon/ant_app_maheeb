@extends('layouts.user-layout')
@section('pagePluginStyle')
    <link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}"/>
    {{--    <link rel="stylesheet" href="{{asset('backend/vendors/simple-line-icons/css/simple-line-icons.css')}}"/>--}}
    {{--    <link rel="stylesheet" href="{{asset('backend/vendors/select2/select2.min.css')}}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css"
          integrity="sha256-Lfe6+s5LEek8iiZ31nXhcSez0nmOxP+3ssquHMR3Alo=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css"
          integrity="sha256-AVsv7CEpB2Y1F7ZjQf0WI8SaEDCycSk4vnDRt0L2MNQ=" crossorigin="anonymous"/>

@endsection
@section('pageLevelStyle')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/holiday_custom_style.css')}}">
    <style>

        table th:first-child {
            border-radius: 10px 0 0 10px;

        }

        table th:last-child {
            border-radius: 0 10px 10px 0;

        }

   /*     #info_content {
            height: 800px
        }*/

        .all_nav_item {
            /*width: 16%;*/

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

        input.formcontrol{
            background-color: red;
        }

        .nav-link {
            font-size: 12px;
            /*height: 34px;*/
            font-weight: bold;
            vertical-align: middle;
        }
        .navlink p{

        }


        .nav-pills .nav-link {
            border: 1px solid #c9ccd7;
            padding: .5rem 1.75rem;
            background: #EBEBEB;
        }

        /*#contact_info{
        font-size: 11px;
        }
        #personal_info{
        font-size: 11px;
        }
        #bank_info {
            font-size: 11px;
        }

        #bank_info h3 {
            font-weight: bold;
            font-size: 16px;
            color: black;
        }
*/
        .table tr th{

            font-family: Segoe UI;
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 19px;
            color: #000000;
        }
        .tab-content{
            min-height: 450px;
        }
        
    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Your Personal Information</h1>
    </div>
    <!-- end of modal edit -->
    <div id="info_content" class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">

                <div style="position: relative" class="card-body">

                    <ul class="nav nav-pills d-flex justify-content-center nav-pills-success pt-4" id="pills-tab"
                        role="tablist">

                        <li class="nav-item all_nav_item pr-5">
                            <a class="nav-link active" id="pills-personal_info-tab" data-toggle="pill"
                               href="#pills-personal_info" role="tab" aria-controls="pills-personal_info"
                               {{--aria-se Bank Informationlected="true"><p class="text-center my-auto">Personal <span class="d-block">Info</span></p></a>--}}
                               aria-selected="true"><p class="text-center my-auto ">Personal Info</p></a>
                        </li>
                        <li class="nav-item pb-4 all_nav_item mr-5">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                               role="tab" aria-controls="pills-profile" aria-selected="false">
                                {{--<p class="text-center my-auto">Contact <span class="d-block">Info</span></p>--}}
                                <p class="text-center my-auto">Contact Info</p>

                            </a>
                        </li>
                        <li class="nav-item all_nav_item mr-5">
                            <a class="nav-link" id="pills-financial-tab" data-toggle="pill" href="#pills-financial"
                               role="tab" aria-controls="pills-contact" aria-selected="false">
                                {{--<p class="text-center my-auto">Financial <span class="d-block">Info</span></p>--}}
                                <p class="text-center my-auto my-auto">Financial Info</p>
                            </a>
                        </li>

                        <li class="nav-item all_nav_item mr-5">
                            <a class="nav-link " id="pills-educationalQualification-tab" data-toggle="pill"
                               href="#pills-educationalQualification" role="tab"
                               aria-controls="pills-educationalQualification" aria-selected="true">

                                {{--<p id="edu_info" class="text-center my-auto">Education<span class="d-block">Info</span></p>--}}
                                <p id="" class="text-center my-auto">Education Info</p>
                            </a>
                        </li>
                        <li class="nav-item all_nav_item mr-5">
                            <a class="nav-link" id="pills-workExperience-tab" data-toggle="pill"
                               href="#pills-workExperience" role="tab" aria-controls="pills-workExperience"
                               aria-selected="true">
                                <p class="text-center my-auto">Work Info</p>

                            </a>
                        </li>
                        <li class="nav-item all_nav_item mr-5">
                            <a class="nav-link" id="pills-Skill-tab" data-toggle="pill" href="#pills-Skill" role="tab"
                               aria-controls="pills-Skill" aria-selected="true">
                                {{--<p class="text-center my-auto">Skills <span class="d-block">Info</span></p>--}}
                                <p class="text-center my-auto">Skills Info</p>

                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        {{-- work experience --}}
                        <div class="tab-pane fade" id="pills-Skill" role="tabpanel" aria-labelledby="pills-Skill-tab">
                            <div class="table-responsive">
                                <table class="table table-striped" id="skill_view_table">
                                    <thead>
                                    <tr id="skill_info_tr">
                                        <th>Company</th>
                                        <th>Name</th>
                                        <th>Applicability on Workspace</th>
                                        <th>Profeciency Level</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- end of workexperice --}}
                        {{-- work experience --}}
                        <div class="tab-pane fade" id="pills-workExperience" role="tabpanel"
                             aria-labelledby="pills-workExperience-tab">
                            <div class="table-responsive">
                                <table class="table table-striped" id="work_experience_view_table">
                                    <thead>
                                    <tr id="work_info">
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Join Date</th>
                                        <th>Left Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- end of workexperice --}}
                        {{--  Educational Qualification   --}}
                        <div class="tab-pane fade show" id="pills-educationalQualification" role="tabpanel"
                             aria-labelledby="pills-educationalQualification-tab">
                            <div class="table-responsive">
                                <table class="table table-striped" id="educational_qualification_view_table">
                                    <thead>
                                    <tr id="edu_info_tr">
                                        <th>Degree</th>
                                        <th>Program/Group</th>
                                        <th>Institution</th>
                                        <th>GPA</th>
                                        <th>Major</th>
                                        <th>Minor</th>
                                        {{--<th>Passing Date</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- end of Educational Qualification  --}}
                        <div class="tab-pane  fade show active" id="pills-personal_info" role="tabpanel"
                             aria-labelledby="pills-personal_info-tab" class="pb-5 pt-2">


                            <div id="personal_info" class="">

                                <div class="container">

                                    <div class="d-flex justify-content-center row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="col-sm-9 col-form-label ">Name</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control font-weight-bold"
                                                           name="first_name_v" id="first_name_v" disabled="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 float-right">
                                            <div class="form-group ">
                                                <label class="col-sm-12 col-form-label">Identification Type</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control text-uppercase"
                                                           name="identification_type_v" id="identification_type_v"
                                                           disabled="" value="">
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="d-flex justify-content-center row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-9 col-form-label">Date of Birth</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="dob_v" id="dob_v" class="form-control"
                                                           value="" disabled="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 float-right">
                                            <div class="form-group">
                                                <label class="col-sm-12 col-form-label">Identificaion Number</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control"
                                                           name="identification_number_v" id="identification_number_v"
                                                           disabled="" value="">
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="d-flex justify-content-center row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="col-sm-9 col-form-label">Blood Group</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control text-uppercase"
                                                           name="blood_group_v" id="blood_group_v" disabled="" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 float-right">
                                            <div class="form-group ">
                                                <label class="col-sm-9 col-form-label">Medical Condition</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="medical_condition_v"
                                                           id="medical_condition_v" disabled="" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="d-flex justify-content-center row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="col-sm-6 col-form-label">Gender</label>
                                                <div class="col-sm-12">

                                                    <input type="text" name="gender_v" id="gender_v"
                                                           class="form-control text-uppercase" value="" disabled="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">

                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                             aria-labelledby="pills-profile-tab">
                            {{--  <div class="media">
                               <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/115x115" alt="sample image"> --}}
                            <div id="contact_info" class="media-body">

                                <div class="container">
                                    <div class="d-flex justify-content-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-9 col-form-label">Email Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="email_v" id="email_v"
                                                       disabled="" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 float-right">
                                        <div class="form-group">
                                            <label class="col-sm-12 col-form-label">Emergency Contact Person</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="emergency_person_name_v"
                                                       id="emergency_person_name_v" class="form-control" value=""
                                                       disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    </div>


                                <div class="d-flex justify-content-center">

                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label class="col-sm-6 col-form-label">Mobile Number</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="mobile_number_v" id="mobile_number_v"
                                                       class="form-control" value="" disabled="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 float-right">
                                        <div class="form-group ">
                                            <label class="col-sm-12 col-form-label">Emergency Contact Number</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="emergency_number_v" id="emergency_number_v"
                                                       class="form-control" value="" disabled="">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-12 col-form-label">Present Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="present_address_v" id="present_address_v"
                                                       class="form-control" value="" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 float-right">
                                        <div class="form-group ">
                                            <label class="col-sm-9 col-form-label">Emergency Person Relation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="emergency_relation_v"
                                                       id="emergency_relation_v" disabled="" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-sm-9 col-form-label">Permanent Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="permanent_address_v"
                                                       id="permanent_address_v" disabled="" value="limon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 float-right">
                                        <div class="form-group ">
                                            <label class="col-sm-9 col-form-label">Facebook Username</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="fb_username_v" id="fb_username_v"
                                                       class="form-control" value="" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-financial" role="tabpanel"
                             aria-labelledby="pills-financial-tab">

                            <div id="bank_info" class="media-body">


                                {{--<div class="col-md-7">--}}
                                <div class="">
                                    <h3 class="text-center my-auto"> Bank Information</h3>
                                </div>

                                <div class="container">
                                <div class="d-flex justify-content-center">

                                    <div class="col-md-4">

                                        <div class="form-group ">
                                            <label class="col-sm-9 col-form-label">Bank Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="personal_bank_name_v" id="personal_bank_name_v"
                                                       class="form-control" value="" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-sm-9 col-form-label">Account Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                       name="personal_bank_account_name_v"
                                                       id="personal_bank_account_name_v" disabled="" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-sm-9 col-form-label">Account number</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="personal_bank_account_number_v"
                                                       id="personal_bank_account_number_v" class="form-control" value=""
                                                       disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-sm-9 col-form-label">Branch Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                       name="personal_bank_branch_name_v"
                                                       id="personal_bank_branch_name_v" disabled="" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-sm-9 col-form-label">Branch Routing Number</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="personal_bank_branch_routing_number_v"
                                                       id="personal_bank_branch_routing_number_v" class="form-control"
                                                       value="" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">

                                        </div>
                                    </div>

                                </div>
                                    <div class="">
                                        <h3 class="text-center my-auto">Bkash Information</h3>
                                    </div>

                                <div class="d-flex justify-content-center">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-sm-9 col-form-label">Bkash Account Number</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="bkash_account_number_v"
                                                       id="bkash_account_number_v" class="form-control" value=""
                                                       disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-sm-9 col-form-label">Bkash Account Type</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="bkash_account_type_v" id="bkash_account_type_v"
                                                       class="form-control" value="" disabled="">
                                            </div>
                                        </div>
                                    </div>

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
    <script src="{{asset('backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('backend/js/data-table.js')}}"></script>
    <script src="{{asset('backend/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('backend/js/select2.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js"
            integrity="sha256-GBryZPfVv8G3K1Lu2QwcqQXAO4Szv4xlY4B/ftvyoMI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js"
            integrity="sha256-FT1eN+60LmWX0J8P25UuTjEEE0ZYvpC07nnU6oFKFuI=" crossorigin="anonymous"></script>
    <script src="{{asset('backend/vendors/jquery-validation/jquery.validate.min.js')}}"></script>

@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')
    <script type="text/javascript">

        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
            $('ul a').each(function () {
                if (this.href === path) {
                    $(".first_sidebar").hide();
                    $(".second_sidebar").show();
                    $('#lead_generation_link').addClass("active");
                    $('#a2 span img').attr("src", "/backend/img/theme/light/Holiday_black.png");
                    $('#a1 span img').attr("src", "/backend/img/theme/light/Attendnce-black.png");
                    $('#lead_generation_link span img').attr("src", "/backend/img/theme/light/Lead_white.png");
                    $("#part_0").hide();
                    $("#item_1").hide();
                    $("#item_2").hide();
                    $("#lead_generation_item").show();

                }
            });
        });

        jQuery(function ($) {

            $('.nav-link').click(function(e) {
                // e.preventDefault();
                var id = $(this).attr('id');
                // alert(id);
                if(id==="pills-profile-tab"){
                    $('.top_text').html('<h1>Your Contact Information</h1>')
                }
                else if(id==="pills-financial-tab"){
                    $('.top_text').html('<h1>Your Financial Information</h1>')
                }
                else if(id==="pills-educationalQualification-tab"){
                    $('.top_text').html('<h1>Your Educational Information</h1>')
                }
                else if(id==="pills-workExperience-tab"){
                    $('.top_text').html('<h1>Your Work Information</h1>')
                }
                else if(id==="pills-Skill-tab"){
                    $('.top_text').html('<h1>Your Skill Information</h1>')
                }

            });
        });





        var config = {
            routes: {

                user_show: "{!! route('ant-information.edit') !!}",

            }
        };
        jQuery(function ($) {
            // e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'show';
            $('#work_experience_view_table > tbody').empty();
            $('#educational_qualification_view_table > tbody').empty();
            $('#skill_view_table > tbody').empty();
            $.ajax({
                url: config.routes.user_show,
                type: "get",
                // data: {
                //     id: id,
                //     type:type,
                // },
                success: function (data) {
                    console.log(data);
                    $('#loading_loader').hide();
                    $('#view_employee_modal').modal('show');

                    $('#first_name_v').val(data.user.first_name + ' ' + data.user.middle_name + ' ' + data.user.last_name);
                    $('#identification_number_v').val(data.user.identification_number);
                    $('#identification_type_v').val(data.user.identification_type);
                    $('#mobile_number_v').val(data.user.mobile_number);
                    $('#permanent_address_v').val(data.user.permanent_address);
                    $('#present_address_v').val(data.user.present_address);
                    $('#gender_v').val(data.user.gender);
                    $('#blood_group_v').val(data.user.blood_group);
                    $('#medical_condition_v').val(data.user.medical_condition);
                    $('#dob_v').val(data.user.dob);

                    $('#email_v').val(data.user.email);
                    $('#emergency_person_name_v').val(data.user.emergency_person_name);
                    $('#emergency_relation_v').val(data.user.emergency_person_relation);
                    $('#emergency_number_v').val(data.user.emergency_number);
                    $('#discord_id_v').val(data.user.discord_id);
                    $('#fb_username_v').val(data.user.fb_username);
                    // $('#email_v').val(data.user.email);
                    // Financial Statements

                    $('#personal_bank_name_v').val(data.user.user_information.financial_information.personal_bank_name);
                    $('#personal_bank_account_number_v').val(data.user.user_information.financial_information.personal_bank_account_number);
                    $('#personal_bank_account_name_v').val(data.user.user_information.financial_information.personal_bank_account_name);
                    $('#personal_bank_branch_name_v').val(data.user.user_information.financial_information.personal_bank_branch_name);
                    $('#personal_bank_branch_routing_number_v').val(data.user.user_information.financial_information.personal_bank_branch_routing_number);
                    $('#bkash_account_number_v').val(data.user.user_information.financial_information.bkash_account_number);
                    $('#bkash_account_type_v').val(data.user.user_information.financial_information.bkash_account_type);
                    // Financial Statements
                    $('#photo_v').attr("src", "/backend/img/theme/light/" + data.user.photo);
                    // $('#designation_edit_form').find('#id').val(id);
                    // $('#designation_edit_form').find('#si').val(si);
                    var $radios = $('input:radio[name=gender]');
                    if ($radios.is(':checked') === false) {
                        $radios.filter('[value=' + data.user.gender + ']').prop('checked', true);
                    }
                    // start whole user information
                    if (data.user.user_information != '') {
                        // start work experience view
                        if (data.user.user_information.work_experience != '') {
                            $.each(data.user.user_information.work_experience, function (i, experience) {
                                // $("#work_experience_view_table > tbody:last-child").append("<tr><td>" + experience.title + "</td><td>" + experience.company + "</td><td><input type='date' class='form-control joinon' name='we_joinedDate[]' placeholder='Enter joinon date EX:dd-mm-yy' disabled aria-invalid='false'value='" + experience.joinDate + "'></td><td><input type='date' class='form-control lefton'placeholder='Enter joinon date EX:dd-mm-yy' disabled aria-invalid='false'value='" + experience.LeftDate + "'></td></tr>");



                                $("#work_experience_view_table > tbody:last-child").append("<tr><td class=''> <input type='text' class='form-control'  placeholder=''  value='" + experience.title + "' disabled></td><td class=''> <input type='text' class='form-control'  placeholder=''  value='" + experience.company + "' disabled></td><td><input type='date' class='form-control joinon' name='we_joinedDate[]' placeholder='Enter joinon date EX:dd-mm-yy' disabled aria-invalid='false'value='" + experience.joinDate + "'></td><td><input type='date' class='form-control lefton'placeholder='Enter joinon date EX:dd-mm-yy' disabled aria-invalid='false'value='" + experience.LeftDate + "'></td></tr>");



                            });
                        } else {
                            $("#work_experience_view_table > tbody:last-child").append("<tr>No Work Experience</tr>");
                        }
                        // end of work experience view
                        // start educational qualification view
                        if (data.user.user_information.educational_qualification != '') {
                            // $.each(data.user.user_information.educational_qualification, function (i, qualification) {
                            //     $("#educational_qualification_view_table > tbody:last-child").append("<tr><td>" + qualification.degree + "</td><td>" + qualification.programOrGroup + "</td><td>" + qualification.institution + "</td><td>" + qualification.gpa + "</td><td>" + qualification.major + "</td><td>" + qualification.minor + "</td></tr>");
                            // });



                            $.each(data.user.user_information.educational_qualification, function (i, qualification) {
                                // console.log(qualification.degree);
                                $("#educational_qualification_view_table > tbody:last-child").append("<tr><td><input type='text' class='form-control'  placeholder=''  value='" + qualification.degree + "' disabled></td><td><input type='text' class='form-control'  placeholder=''  value='" + qualification.programOrGroup + "' disabled></td><td><input type='text' class='form-control'  placeholder=''  value='" + qualification.institution + "' disabled></td><td><input type='text' class='form-control'  placeholder=''  value='" + qualification.gpa + "' disabled></td><td><input type='text' class='form-control'  placeholder=''  value='" + qualification.major + "' disabled></td><td><input type='text' class='form-control'  placeholder=''  value='" + qualification.minor + "' disabled></td></tr>");
                            });
                            //



                        } else {
                            $("#educational_qualification_view_table > tbody:last-child").append("<tr>No Work Experience</tr>");
                        }
                        // end educational qualification view
                        // start employee skill view
                        if (data.user.user_information.skill != '') {
                            // $.each(data.user.user_information.skill, function (i, skill) {
                            //
                            //     $("#skill_view_table > tbody:last-child").append("<tr><td>" + skill.category + "</td><td>" + skill.name + "</td><td>" + skill.workspace + "</td><td>" + skill.profeciency + "</td></tr>");
                            // });


                            $.each(data.user.user_information.skill, function (i, skill) {

                                $("#skill_view_table > tbody:last-child").append("<tr><td><input type='text' class='form-control'  placeholder=''  value='" + skill.category + "' disabled></td><td><input type='text' class='form-control'  placeholder=''  value='" + skill.name + "' disabled></td><td><input type='text' class='form-control'  placeholder=''  value='" + skill.workspace + "' disabled></td><td><input type='text' class='form-control'  placeholder=''  value='" + skill.profeciency + "' disabled></td></tr>");
                            });




                        } else {
                            $("#skill_view_table > tbody:last-child").append("<tr>No Work Experience</tr>");
                        }
                        // end employee skill view
                    }
                    // end of whole user information
                }
                // end of success
            });

        });


    </script>
@endsection
<!-- End custom js for this page-->