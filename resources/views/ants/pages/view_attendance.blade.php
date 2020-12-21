@extends('layouts.user-layout')
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

    <style>

        table th:first-child {
            border-radius: 10px 0 0 10px;

        }

        table th:last-child {
            border-radius: 0 10px 10px 0;

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


    </style>

@endsection

@section('content')
    
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
    <div class="top_text">
        <h1>Your Attendance</h1>
    </div>


    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">
                <div style="position: relative" class="card-body">
                    <div class="d-flex justify-content-center my-4">
                     <input type="month" id="select_attendance_date" type="submit" class="btn btn-primary text-dark bg-white align-middle mx-auto" value="{{$todays_month_query}}">
                </div>
  {{-- <i class="fas fa-calendar-alt fa-2x"></i> <span class="align-middle">{{$month_year_name}}</span> --}}
{{-- </button> --}}
                   <!--  <button  id="let_emp_btn" class=""
                            data-target="" >
                        <a href="#" class="left_employee">
                        You Have 3 unassigned <span class="d-block mb-2 ">employees</span>
                        </a>
                    </button> -->

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
                                        <table id="view_logs_table" class="table holiday_table">
                                            {{--<table id="employee_list_table" class="table holiday_table">--}}
                                            {{--<thead id="holiday_head" >--}}
                                            <thead>

                                            <tr class="myTableHead">
                                                
                                                <th>Query_Date</th>
                                                <th>Date</th>
                                                <th>In Time</th>
                                                <th>Out Time</th>
                                                <th>Duration</th>
                                                <th>Status</th>
                                            </tr>

                                            </thead>

                                            <tbody class="holiday_row" id="companyappend">

                                            @if(empty($attendances))
                                                <h2 class="text-danger text-center text-capitalize">Data does not
                                                    exist</h2>
                                            @else

                                                @foreach ($attendances as $attendance)
                                                    <tr class="unqcompany{{$attendance->id}}">
                                                        <td>{{$attendance->query_year_and_month}}</td>
                                                        <td>
                                                            <a class="btn view_logs" id="view_logsBtn" 
                                                            data-id="{{$attendance->id}}"
                                                            data-attendance_date="{{$attendance->query_date}}"
                                                            data-user_id="{{$attendance->user_id}}"
                                                            data-attendance_date="{{$attendance->query_date}}">
                                                            {{$attendance->Date_Human}}
                                                            </a>
                                                        </td>
                                                        <td>{{$attendance->InTime_Human}}</td>
                                                        <td>{{$attendance->OutTime_Human}}</td>
                                                        <td>{{$attendance->Duration_Human}} Hrs</td>
                                                        <td>{{$attendance->Status_Human}}</td>
                                                       
                                                        

                                                    </tr>
                                                @endforeach
                                            @endif
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

        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

            console.log(path);
            $('ul a').each(function () {
                if (this.href === path) {
                    // console.log ($("a[href == path]").find('id'));

                    $(".first_sidebar").hide();
                    $(".second_sidebar").show();
                    $('#a1').addClass("active");
                    $('#a1 span img').attr("src", "/backend/img/theme/light/Attendnce-white.png");
                    // $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_Black.png");
                    $("#part_0").hide();
                    $("#item_1").show();
                    $("#item_2").hide();

                }
            });
        });





        $('.date').datepicker({
            // format: "dd/mm/yyyy",
            autoclose: true,
            responsive: true,
        });
        var config = {
            routes: {
               view_logs: "{!! route('attendance.view.logs.approved') !!}",
            }
        };
   function fill_attendance_log_table(attendance){
            console.log(attendance);
             
            $("#attendance_log_table > tbody:last-child").append("<tr><td>"+attendance.Date_Human+"</td><td>"+attendance.InTime_Human+"</td><td>"+attendance.OutTime_Human+"</td><td>"+attendance.Duration_Human+"</td></tr>");
        }
  $(document).ready(function() {
                var view_logs_table = $('#view_logs_table').DataTable( {
                                        // responsive: true,
                                            "columnDefs": [
                                                {
                                                    "targets": [ 0 ],
                                                    "visible": false
                                                }
                                            ],
                                            // sDom: 'lrtip'
                                            // "bFilter": false,
                                        } );
                 // on load table filter with current date
                 var on_load_attendance_date= $('#select_attendance_date').attr("value");
                 view_logs_table.columns(0).search(on_load_attendance_date ).draw();
                 // on load table filter with current date
                 // date picker change  load event
                  $('#select_attendance_date').change(function () {
                    // alert(this.value);
                    view_logs_table.columns(0).search( this.value ).draw();
                });
                 // date picker change  load event
                // search
                // $('#search_datatable_input').on( 'keyup', function () {
                //     attendance_table.search( this.value ).draw();

                // } )
                //end of search

                } );

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


        
    </script>


@endsection
<!-- End custom js for this page-->