@extends('layouts.admin')
@section('pagePluginStyle')
    <link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    {{--    <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">--}}
    <link rel="stylesheet" href="{{asset('backend/css/steps.css')}}"/>
    <link rel="stylesheet" href="{{asset('backend/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/simple-line-icons/css/simple-line-icons.css')}}"/>



@endsection
@section('pageLevelStyle')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/dropify/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/holiday_custom_style.css')}}">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->

    <link rel="stylesheet" href="{{asset('backend/css/add_button_search.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/custom_button.css')}}">
    <style>

        .modal {
            position: fixed;
            z-index: 1050;
            top: 120px;
            left: 0;
            display: none;
            overflow: hidden;
            width: 100%;
            height: 100%;
            outline: 0;
        }
        table th:first-child {
            border-radius: 10px 0 0 10px;

        }

        table th:last-child {
            border-radius: 0 10px 10px 0;

        }
        /*.table-bordered th, .table-bordered td {*/
        /*    border: 1px solid;*/
        /*}*/

        .table thead th {
            font-size: .75rem;
            padding-top: .75rem;
            padding-bottom: .75rem;
            letter-spacing: 0;
            text-transform: none;
            border-bottom-width: 1px;
            background-color: black;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            /*margin-left: 0.5em;*/
            display: inline-block;
            width: auto;
            /* border-width: 4px; */
            border-radius: 9px;
            height: 40px;
            color: black;
            width: 85%;
        }
input[type='date'].form-control{
    /*width: 70%;*/
}
 input.form-control{
            max-width: 200px;
        }
        .common_search {
            /* height: calc(1.5em + 1.5rem + 2px); */
            padding: 9px !important;
            border-radius: 5px;
            border: 1px solid black;
        }
    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Approve Attendance</h1>
    </div>


<div class="modal fade" id="view_logs_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="border: none" class="card">
                        <div class="card-title">
                            <div class="preview"><i class="" aria-hidden="true"></i>
                                <h5 class="text-center font-weight-bolder" id="">View Log</h5>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-striped" id="attendance_log_table">
{{--                                    <table class="table table-bordered" id="attendance_log_table">--}}

                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>InTime</th>
                                                <th>OutTime</th>
                                                <th>Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody id="view_logs_tbody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- end of modal log -->
    <div class="modal fade" id="add_attendance_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                   <div class="card">
            <div class="card-body">
                <div class="container">
                    <form method="post" name="single_attendance_form" id="single_attendance_form">
                        @csrf
                        <div class="table-responsive">
                            <table class="tabel table tbl-boredered" id="singele_attendance_table">

                                <thead>
                                    <th>Employee</th>
                                    <th>Date</th>
                                    <th>First Check In</th>
                                    <th>Last Check Out</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>

                            </tbody>

                            </table>
                            <td>
                                <input class="btn btn-primary btn-fw float-right" type="submit" name="single_attendance_form_submit" id="single_attendance_form_submit_btn" required="">
                            </td>
                        </div>
                    </form>
                    <button type="button" class="btn btn-primary btn-sm btn-icon-text"onclick="add_row_attendance();"><i class="ti-plus"></i></button>

            </div>

                <div>
                </div>
            </div>
        </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end of add attendance modal -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">

                <div class="card-body">


                       <div class="row justify-content-between align-items-center">
                                  <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                                    <div class="align-items-center m-4 d-inline-flex">
                                       <input name="requested_attendance_date" class="form-control" id="select_attendance_date" type="date" value="{{$todays_date_formated}}" id="example-date-input">
                                    </div>
                                  </div>

                                  <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-center mb-3 mb-md-0">
                                    <div class="align-items-center m-4 d-inline-flex">
                                      <form method="post" name="search_attendance_form" id="search_attendance_form">
                                        @csrf
                                        {{-- <p class="font-weight-bold bg-da">You have <span id="number_of_unapproved_employee">30</span> Employees with unapproved attendance</p> --}}
                                        <button type="submit" class="btn btn-primary" id="approve_all_btn" data-attendance_date="{{$todays_date_formated}}">
                                         Approve All
                                    </button>
                                        </form>
                                    </div>
                                  </div>
                                  <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-end mb-3 mb-md-0">
{{--                                    <div class="align-items-center m-4 d-inline-flex">--}}
{{--                                       <input name="requested_attendance_date" class="form-control" id="search_datatable_input" type="text" id="example-date-input">--}}
{{--                                    </div>--}}
                                      <div class="align-items-center m-4 d-inline-flex inner-addon right-addon">
                                          <i class="fas fa-search"></i>
                                          <input type="search" placeholder="Search.." name="search_datatable_input"
                                                 id="search_datatable_input" class="common_search">
                                      </div>
                                  </div>
                               </div>


                    <div style="border: none" class="card">
                        <div class="card-title">
                            <div class="preview">
                            </div>
                        </div>
                        <div class="test"></div>
                        <div class="card-body">
                            <div id="maheeb" class="row">
                                <div class="col-12">

                                    <div class="table-responsive">
                                        <table id="approve_attendance_table" class="table holiday_table">
                                            <thead>
                                             <tr class="myTableHead">
                                                <th>Query Date</th>
                                                <th>Name</th>
                                               <th>First Check In</th>
                                               <th>Last Check Out</th>
                                               <th>View Log</th>
                                               <th>Approval</th>
                                             </tr>
                                           </thead>
                                           <tbody class="holiday_row" id="companyappend" >
                                            @foreach ($attendances as $attendance)
                                                <tr>
                                                    <td>{{$attendance->query_date}}</td>
                                                    <td>{{$attendance->Name}}</td>
                                                    <td>{{$attendance->InTime_Human}}</td>
                                                    <td>{{$attendance->OutTime_Human}}</td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-round-xs btn-xs view_logs_btn view_logs"
                                                                    data-serial="{{$loop->index + 1}}"
{{--                                                                    class="btn"--}}
                                                                    data-id="{{$attendance->id}}"
                                                                    data-user_id="{{$attendance->user_id}}"
                                                                    data-attendance_date="{{$attendance->query_date}}"
                                                                    data-toggle="modal"
                                                                    data-target="#exampleModal">
                                                                    <!-- view logs -->
                                                               View Log
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                                    data-serial="{{$loop->index + 1}}"
                                                                    class="btn approve_btn singleApprove"
                                                                    data-attendance_date="{{$attendance->query_date}}"
                                                                    data-user_id="{{$attendance->user_id}}"
                                                                    data-id="{{$attendance->id}}" data-toggle="modal"
                                                                    data-target="#exampleModal">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                            <button type="button"
                                                            data-id="{{$attendance->id}}"
                                                            data-attendance_date="{{$attendance->query_date}}"
                                                            data-user_id="{{$attendance->user_id}}"
                                                                class="btn decline_btn  singleDelete">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                           </tbody>

                                        </table>
                                    </div>

                                    <div>

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
{{--    <script src="{{asset('backend/vendors/select2/select2.min.js')}}"></script>--}}
    {{--<script src="{{asset('backend/js/select2.js')}}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
{{--    <script src="{{asset('backend/vendors/jquery-validation/jquery.validate.min.js')}}"></script>--}}
{{--    <script src="{{asset('backend/vendors/jquery-steps/jquery.steps.js')}}"></script>--}}
{{--    <script src="{{asset('backend/vendors/dropify/dropify.min.js')}}"></script>--}}

@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')

    <script type="text/javascript">


$(document).ready(function() {
var approve_attendance_table = $('#approve_attendance_table').DataTable( {
                            "columnDefs": [
                                {
                                    "targets": [ 0 ],
                                    "visible": false
                                }
                            ],
                            sDom: 'lrtip',
                            // "bFilter": false,
                            paging:false,
                        });
 // on load table filter with current date
 var on_load_attendance_date= $('#select_attendance_date').attr("value");
 approve_attendance_table.columns(0).search(on_load_attendance_date ).draw();
 // on load table filter with current date
 // date picker change  load event
  $('#select_attendance_date').change(function () {
    // this.form.submit();
    $('#approve_all_btn').data("attendance_date",this.value);
    // alert(this.value);
    approve_attendance_table.columns(0).search( this.value ).draw();
});
 // date picker change  load event
// search
$('#search_datatable_input').on( 'keyup', function () {
    approve_attendance_table.search( this.value ).draw();

});
//end of search
        $('.date').datepicker({
            // format: "dd/mm/yyyy",
            autoclose: true,
        });

} );

jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

            console.log(path);
            $('ul a').each(function () {
                if (this.href === path) {
                    // console.log ($("a[href == path]").find('id'));
                    $("#btn_1").addClass("active");
                    $("#approve_attendance").css({
                        'font-family': 'Josefin Sans',
                        'font-style': 'normal',
                        'font-weight': 'bold',
                        'font-size': '13px',
                        'line-height': '12px',
                        'color': 'black',
                        'text-shadow': '0px 4px 4px rgba(0, 0, 0, 0.25)'
                    });

                    $("#btn_1").find('i').toggleClass('fas fa-plus fas fa-minus');
                    $("#parent_manage_attendance").find('i').toggleClass('fa fa-angle-right fa fa-angle-down');

                    // $(".my_sidenav_dropdown").attr("src","../../backend/img/theme/light/add_minus.png");

                    $("#dropdown_1").css("display", "block");
                    $('#leave_dropdown').hide();
                    // dropdo.style.display = "block";
                    $(".first_sidebar").hide();
                    $(".second_sidebar").show();
                    $('#a1').addClass("active");
                    // $('#a1 span img').attr("src","../assets/img/theme/light/human-resources_WHite.png");
                    $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_white.png");
                    $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_Black.png");

                    $("#part_0").hide();
                    $("#item_1").show();
                    $("#item_2").hide();

                }
            });
        });


        var config = {
            routes: {
                view_logs: "{!! route('attendance.view.all.logs') !!}",
                approved_all_attendance: "{!! route('superadmin.attendancelog.approve') !!}",
                approve_attendance_single: "{!! route('superadmin.attendancelog.approve.single') !!}",
                delete_attendance_single: "{!! route('attendancelog.delete.single') !!}",

            }
        };


        function fill_attendance_log_table(attendance){
            console.log(attendance);

            $("#attendance_log_table > tbody:last-child").append("<tr><td>"+attendance.Date_Human+"</td><td>"+attendance.InTime_Human+"</td><td>"+attendance.OutTime_Human+"</td><td>"+attendance.Duration_Human+"</td></tr>");
        }

        $(document).on('click', '.view_logs', function (e) {
            e.preventDefault();
            var user_id = $(this).data('user_id');
            var attendance_date = $(this).data('attendance_date');
            // console.log(id,si);
            $.ajax({
                url: config.routes.view_logs,
                type: "get",
                data: {
                    user_id: user_id,
                    attendance_date: attendance_date,
                },

                success: function (data) {
                     $("#attendance_log_table > tbody:last-child").empty();
                   // view_logs
                   if (data.success == true){
                     $.each(data.data, function (i, attendance) {
                // console.log(attendance);
                         fill_attendance_log_table(attendance);
                    });
                   }
                   $('#view_logs_modal').modal('show');
                }
            });


        });

              $(document).on('click', '#approve_all_btn', function (e) {
                     e.preventDefault();
            var attendance_date = $(this).data('attendance_date');
            // alert(attendance_date);
            var table = $('#approve_attendance_table').DataTable();
              var thisInstance=$(this);


            // console.log(id,si);
            $.ajax({
                url: config.routes.approved_all_attendance,
                type: "get",
                data: {
                    attendance_date: attendance_date,
                },

                success: function (data) {
                     table.columns(0).search(attendance_date ).rows().remove().draw();
                     $("#attendance_log_table > tbody:last-child").empty();
                   // view_logs
                   if (data.success == true){
                    toastr.success('All attendnace approved successfully');
                     // table.columns(0).search(attendance_date ).rows().remove().draw();
                   }else{
                    toastr.error('All attendnace approved Failed');
                   }
                }
            });


        });
         // $(document).on('click', '.singleApprove', function (e) {
            $('#approve_attendance_table').on('click', '.singleApprove', function (e) {
            e.preventDefault();
             var user_id = $(this).data('user_id');
            var attendance_date = $(this).data('attendance_date');

            var table = $('#approve_attendance_table').DataTable();
            var thisInstance=$(this);
            // console.log(id,si);
            if (attendance_date!=''|| !is_null(attendance_date)) {
                $.ajax({
                url: config.routes.approve_attendance_single,
                type: "get",
                data: {
                    user_id: user_id,
                    attendance_date: attendance_date,
                },

                success: function (data) {
                   // view_logs

                   if (data.success==true) {
                     toastr.success('Attendnace approved successfully');
                    table.row(thisInstance.parents('tr')).remove().draw();
                    // make approve all btn date clear
                     thisInstance.data('');

                   }
                }
            });
            }


        });
         $(document).on('click', '.singleDelete', function (e) {
            e.preventDefault();
             var user_id = $(this).data('user_id');
            var attendance_date = $(this).data('attendance_date');
            var table = $('#approve_attendance_table').DataTable();
            var thisInstance=$(this);
            $.ajax({
                url: config.routes.delete_attendance_single,
                type: "get",
                data: {
                    user_id: user_id,
                    attendance_date: attendance_date,
                },

                success: function (data) {
                   // view_logs
                   if (data.success==true) {
                    toastr.success('Attendnace deleted successfully');
                   table.row(thisInstance.parents('tr')).remove().draw();
                   }else{
                     toastr.success('Failed to delete');
                   }
                }
            });


        });
// for only add attendance



    </script>


@endsection
<!-- End custom js for this page-->
