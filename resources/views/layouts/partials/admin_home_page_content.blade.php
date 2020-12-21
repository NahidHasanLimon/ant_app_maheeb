@extends('layouts.admin')
@section('pagePluginStyle')

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@endsection


@section('pageLevelStyle')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <style>

        @media only screen and (min-width: 1366px) {

        }

        .card-footer {
            border-top: 0px;
        }

        .card-footer p {
            font-size: 11px;
        }

        .attendance_leave_name {
            font-size: 11px
        }

        .accept_decline_btn {
            font-size: 7px;
        }

        .see_all {

            background: #212121;
            color: #FFFFFF;
            font-size: 10px;
        }

        .see_all:hover {
            text-decoration: none;
            color: #FFFFFF;
            font-size: 15px !important;
        }

        .attendance_leave_header {
            /*font-size: 11px*/
            /*font-size: 14px*/
            font-size: 17px;
            font-family: 'Lilita One', cursive;
        }

        .attendance_text {
            font-size: 17px;
            font-family: 'Lilita One', cursive;
        }
    </style>
@endsection
@section('page-title')
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 mb-3 mb-md-0 ml-4">
                <h5 class="h3 font-weight-400 mb-0 text-white">Hello,{{Auth::user()->first_name}}</h5>
                <span class="text-sm text-white opacity-8">When ants fight, it is usually to the death!</span>
            </div>
        </div>
    </div>

@endsection
@section('content')

    <div class="row">
        <div class="col-xl-6 col-md-6">
            <div class="card card-fluid">
                <div class="card-body">
                    <!-- Chart -->

                    <p class="text-center pt-4 font-weight-bolder text-primary text-uppercase attendance_text">Today's
                        Attendance</p>

                    <div class="d-flex justify-content-center" id="pie_chart"></div>


                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card card-fluid">
                <div class="card-body">

                    <p class="text-center pt-4 font-weight-bolder text-primary text-uppercase attendance_text">
                        Yesterday's Attendance</p>


                    <div class="d-flex justify-content-center" id="yesterday_pie_chart"></div>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="card widget-calendar card-fluid">
                <div class="card-header">
                    <h6 class=" font-weight-bolder text-center text-primary text-uppercase attendance_leave_header">Holidays</h6>
                    <div class="text-sm text-muted mb-1 widget-calendar-year"></div>
                    <div class="h5 mb-0 widget-calendar-day"></div>
                </div>

                <div id='calendar'></div>


            </div>
            <div id="fullCalModal" class="modal " data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title mx-auto">
                                <h4 class="display-4" id="exampleModalLabel">Holiday
                                    Details</h4>
                            </div>


                        </div>
                        <div id="holiday_modal_body" class="modal-body">
                            <div class="row align-items-center ">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12 text-center">
                                            <label class="text-center">Title</label>
                                        </div>
                                        <div class="col-sm-12 text-center">
                                            <label class="form-control text-bold"
                                                   id="holiday_title_holiday_modal"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12 text-center">
                                            <label class="text-center">Duratrion</label>
                                        </div>
                                        <div class="col-sm-12 text-center">
                                            <label class="form-control text-bold"
                                                   id="duration_holiday_modal"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12 text-center">
                                            <label class="text-center">Start Date</label>
                                        </div>
                                        <div class="col-sm-12 text-center">
                                            <label class="form-control text-bold"
                                                   id="start_date_holiday_modal"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12 text-center">
                                            <label class="text-center">End Date</label>
                                        </div>
                                        <div class="col-sm-12 text-center">
                                            <label class="form-control text-bold"
                                                   id="end_date_holiday_modal"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mx-auto">
                                    <div class="form-group row">
                                        <div class="col-sm-12 text-center">
                                            <label class="text-center">Notes</label>
                                        </div>
                                        <div class="col-sm-12 text-center">
                                            <label class="form-control text-bold"
                                                   id="notes_holiday_modal"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mx-auto">
                            <button class="btn btn-primary btn-sm"
                                    data-dismiss="modal">Close
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card card-fluid ">
                <div class="card-body text-center p-0 m-0">
                    <h6 class="pt-4 font-weight-bolder text-primary text-uppercase attendance_leave_header">Unapproved
                        Attendance</h6>

                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <table class="d-flex justify-content-center">
                                    <tbody>
                                    @foreach($attendances as $attendance)

                                        <tr>
                                            <td>
                                                <div class="col-md-12 pb-3">
                                                    <div class="img-fluid">
                                                        <img class="avatar rounded-circle avatar"
                                                             src="{{asset('backend/img/user_photo/'.$attendance->photo)}}"
                                                             style="" alt="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-md-12 pb-3">
                                                    <p class="attendance_leave_name">{{$attendance->Name}}</p>
                                                    <div class="d-flex justify-content-center mt-n3">
                                                        <button
                                                            class="btn btn-outline-success btn-xs accept_decline_btn singleApprove"
                                                            data-attendance_date="{{$attendance->query_date}}"
                                                            data-user_id="{{$attendance->user_id}}"
                                                            data-id="{{$attendance->id}}"

                                                        >Approve
                                                        </button>
                                                        <button
                                                            class="btn btn-outline-danger btn-xs accept_decline_btn singleDelete"
                                                            data-id="{{$attendance->id}}"
                                                            data-attendance_date="{{$attendance->query_date}}"
                                                            data-user_id="{{$attendance->user_id}}"

                                                        >Decline
                                                        </button>
                                                    </div>
                                                </div>


                                            </td>


                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">

                    {{--<p class="text-center"><span id="attendance_count">{{$attendance_count}} </span> unapproved--}}
                    {{--attendances</p>--}}

                    @if($attendance_count==0)

                        <p class="text-center">No attendance to approve</p>
                    @else
                        <p id="attendance_count_text" class="text-center"><span
                                id="attendance_count">{{$attendance_count}} </span> unapproved
                            attendances</p>
                        <a id="see_all_attendance" href="{{route('superadmin.approveAttendance.index')}}"
                           class="btn col-lg-12  see_all see_all_attendance">See All</a>

                    @endif
                </div>

            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card card-fluid ">
                <div class="card-body text-center p-0 m-0">
                    <h6 class="pt-4 font-weight-bolder text-primary text-uppercase attendance_leave_header">Unapproved
                        Leave</h6>

                    <div class="container">
                        <div class="row">

                            <div class="col-xl-12">
                                <table class="d-flex justify-content-center">
                                    <tbody>
                                    @foreach($leaves as $leave)

                                        <tr>
                                            <td>
                                                <div class="col-md-12 pb-3">
                                                    <div class="img-fluid">
                                                        <img class="avatar rounded-circle avatar"

                                                             src="{{asset('backend/img/user_photo/'.$leave->users->photo)}}"
                                                             style="" alt="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-md-12 pb-3">
                                                    <p class="attendance_leave_name">{{$leave->users->full_name}}</p>
                                                    <div class="d-flex justify-content-center mt-n3">
                                                        <button
                                                            class="btn btn-outline-success btn-xs accept_decline_btn approveLeave"
                                                            data-id="{{$leave->id}}">Approve
                                                        </button>
                                                        <button
                                                            class="btn btn-outline-danger btn-xs accept_decline_btn deleteLeave"
                                                            data-id="{{$leave->id}}">Decline
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>


                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">


                    @if($leave_count==0)

                        <p class="text-center">No leave to approve</p>
                    @else
                        <p class="text-center leave_count_text"><span id="leave_count">{{$leave_count}} </span> leaves
                            are unapproved</p>
                        <a id="se_all_leave" href="{{route('approve-leave.index')}}" class="btn col-lg-12  see_all">See
                            All</a>

                    @endif
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-xl-12 d-sm-flex flex-sm-column">
            <div class="row flex-sm-fill">
                <div class="col-sm-4">
                    <div class="card card-fluid">
                        <div class="card-body text-center">

                            <h6 class="text-center pt-4">Total Employees</h6>
                            <div class="progress-circle progress-lg mx-auto mt-3" id="progress-4" data-progress="100"
                                 data-text="{{$employee_count}}" data-textclass="h1" data-color="primary"></div>

                        </div>


                        <div class="card-footer">
                            <a href="{{route('employee.index')}}" class="btn col-lg-12  see_all">See All</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card card-fluid">
                        <div class="card-body text-center">

                            <div class="avatar-parent-child mt-4">


                                <img alt="Image placeholder" class="avatar avatar-lg rounded-circle"
                                     src="{{asset("backend/img/theme/light/team-3-800x800.jpg")}}">

                            </div>
                            <h5 class="h6 mt-4 mb-0 text-muted">Employees in </h5>
                            <h5>Strategic Planning</h5>
                            <h1 class="text-muted">02</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card card-fluid">
                        <div class="card-body text-center">

                            <div class="avatar-parent-child mt-4">


                                <img alt="Image placeholder" class="avatar avatar-lg rounded-circle"
                                     src="{{asset("backend/img/theme/light/team-3-800x800.jpg")}}">

                            </div>
                            <h5 class="h6 mt-4 mb-0 text-muted">Employees in </h5>
                            <h5>UI Team</h5>
                            <h1 class="text-muted">01</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-sm-fill mb-3">
                <div class="col-sm-4">
                    <div class="card card-fluid">
                        <div class="card-body text-center">

                            <div class="avatar-parent-child mt-4">


                                <img alt="Image placeholder" class="avatar avatar-lg rounded-circle"
                                     src="{{asset("backend/img/theme/light/team-3-800x800.jpg")}}">

                            </div>
                            <h5 class="h6 mt-4 mb-0 text-muted">Employees in </h5>
                            <h5>Design Team</h5>
                            <h1 class="text-muted">02</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card card-fluid">
                        <div class="card-body text-center">

                            <div class="avatar-parent-child mt-4">


                                <img alt="Image placeholder" class="avatar avatar-lg rounded-circle"
                                     src="{{asset("backend/img/theme/light/team-3-800x800.jpg")}}">

                            </div>
                            <h5 class="h6 mt-4 mb-0 text-muted">Employees in </h5>
                            <h5>Visuals Team</h5>
                            <h1 class="text-muted">01</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection

@section('pagePluginScript')

    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection


@section('pageLevelScript')


    <script type="text/javascript">

        $(document).ready(function () {
            drawChart();

        });


        var config = {
            routes: {

                today_attendance: "{!! route('today-attendance') !!}",
                holiday_calender: "{!! route('calender.index') !!}",
                leave_aprrove: "{!! route('approve-leave.approve') !!}",
                leave_delete: "{!! route('leave.destroy') !!}",
                approve_attendance_single: "{!! route('superadmin.attendancelog.approve.single') !!}",
                delete_attendance_single: "{!! route('attendancelog.delete.single') !!}",
            }
        };
        var today_analytics =
            <?php echo $today_status; ?>
            {{--var analytics_2 = "<?php echo $course; ?>"--}}
        var yesterday_analytics = <?php echo $yesterday_status; ?>

            google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);


        function drawChart() {

            var data = google.visualization.arrayToDataTable(today_analytics);
            var options = {
                'width': '100%', 'height': '100%',
                pieHole: 0.4,
                // pieSliceText: 'label',
                pieSliceText: 'value',
                fontSize: 11,
                legend: {position: 'bottom'},
                tooltip: {
                    text: 'value'
                },

            };


            if (data.getNumberOfRows() == 0) {
                $("#pie_chart").append("Sorry, no employee is present today").addClass("mt-6 text-primary")
            } else {
                var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
                chart.draw(data, options);
            }


            // var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            // chart.draw(data, options);

            var data_2 = google.visualization.arrayToDataTable(yesterday_analytics);


            if (data_2.getNumberOfRows() == 0) {
                $("#yesterday_pie_chart").append("Sorry, no employee was present yesterday").addClass("mt-6 text-primary")
            } else {

                var chart_2 = new google.visualization.PieChart(document.getElementById('yesterday_pie_chart'));
                chart_2.draw(data_2, options);
            }

            // var chart_2 = new google.visualization.PieChart(document.getElementById('yesterday_pie_chart'));
            // chart_2.draw(data_2, options);


        }

        $(function () {

            $('#calendar').fullCalendar({
                editable: true,
                selectable: true,
                dayNamesShort: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                events: function (start, end, timezone, callback) {

                    // var bgName =['bg-warning','bg-danger','bg-success'];
                    var bgName = ['bg-success'];

                    $.ajax({
                        url: config.routes.holiday_calender,
                        type: "get",
                        success: function (doc) {
                            var events = [];
                            console.log(doc);
                            $.each(doc, function (i, v) {
                                events.push({
                                    title: v.holiday_name,
                                    start: v.start_date,
                                    end: v.end_date,
                                    notes: v.notes,
                                    types: v.types,
                                });

                            });
                            callback(events);

                        },
                    });
                },
                eventRender: function (event, element) {


                    console.log(event.title, event.start._i, event);
                    element.click(function () {
                        var startDate = moment(event.start._i);
                        var endDate = moment((event.end == null) ? event.start._i : event.end._i);
                        var end = "";
                        var htext = "";
                        var range = endDate.diff(startDate, 'days');
                        if (range < 1) {
                            range = 1;
                            event_end_date = event.start._i;
                        } else {
                            event_end_date = event.end._i;
                        }
                        $('#holiday_title_holiday_modal').text(event.title);
                        $('#duration_holiday_modal').text(range);
                        $('#start_date_holiday_modal').text(event.start._i);
                        $('#end_date_holiday_modal').text(event_end_date);
                        $('#notes_holiday_modal').text(event.notes);

                        console.log(event);

                        $('#fullCalModal').modal();


                    });
                }
            });

            //Display Current Date as Calendar widget header
            var mYear = moment().format('YYYY');
            var mDay = moment().format('dddd, MMM D');
            $('.widget-calendar-year').html(mYear);
            $('.widget-calendar-day').html(mDay);

        });


        $(document).on('click', '.singleApprove', function (e) {
            e.preventDefault();

            var user_id = $(this).data('user_id');
            var attendance_date = $(this).data('attendance_date');

            // var table = $('#approve_attendance_table').DataTable();
            var tr = $(this).closest('tr');
            // var thisInstance = $(this);
            // console.log(id,si);
            if (attendance_date != '' || !is_null(attendance_date)) {
                $.ajax({
                    url: config.routes.approve_attendance_single,
                    type: "get",
                    data: {
                        user_id: user_id,
                        attendance_date: attendance_date,
                    },

                    success: function (data) {
                        // view_logs

                        if (data.success == true) {
                            toastr.success('Attendnace approved successfully');
                            // table.row(thisInstance.parents('tr')).remove().draw();
                            // $('#attendance_count').text(data.attendance_count);


                            if (data.attendance_count === 0) {
                                $('#see_all_attendance').hide();
                                $('#attendance_count').hide();
                                $('#attendance_count_text').text("No attendance to approve");
                            } else {
                                $('#attendance_count').text(data.attendance_count);
                            }


                            tr.fadeOut(1000, function () {
                                $(this).remove();
                            });
                            // make approve all btn date clear
                            thisInstance.data('');
                            location.reload();
                        }
                    }
                });
            }


        });


        $(document).on('click', '.singleDelete', function (e) {
            e.preventDefault();
            var user_id = $(this).data('user_id');
            var attendance_date = $(this).data('attendance_date');
            // var table = $('#approve_attendance_table').DataTable();
            var tr = $(this).closest('tr');
            var thisInstance = $(this);
            $.ajax({
                url: config.routes.delete_attendance_single,
                type: "get",
                data: {
                    user_id: user_id,
                    attendance_date: attendance_date,
                },

                success: function (data) {
                    // view_logs
                    if (data.success == true) {
                        toastr.success('Attendnace deleted successfully');
                        // $('#attendance_count').text(data.attendance_count);

                        if (data.attendance_count === 0) {
                            $('#see_all_attendance').hide();
                            $('#attendance_count').hide();
                            $('#attendance_count_text').text("No attendance to approve");
                        } else {
                            $('#attendance_count').text(data.attendance_count);
                        }

                        tr.fadeOut(1000, function () {
                            $(this).remove();
                        });
                        // table.row(thisInstance.parents('tr')).remove().draw();
                        // location.reload();
                    } else {
                        toastr.success('Failed to delete');
                    }
                }
            });


        });


        $(document).on('click', '.approveLeave', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            // var table = $('#leave_table').DataTable();
            var tr = $(this).closest('tr');
            // var thisInstance=$(this);
            if (confirm('Are you sure, you want to approve ?')) {
                $.ajax({
                    url: config.routes.leave_aprrove,
                    // type: "get",
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        console.log(data);
                        if (data.success == true) {
                            toastr.success('Leave was Approved successfully');
                            // $('#leave_count').text(data.leave_count);

                            if (data.leave_count === 0) {
                                $('#se_all_leave').hide();
                                $('#leave_count').hide();
                                $('.leave_count_text').text("No leave to approve");
                            } else {
                                $('#leave_count').text(data.leave_count);
                            }


                            // table.row(thisInstance.parents('tr')).remove().draw();
                            tr.fadeOut(1000, function () {
                                $(this).remove();
                            });


                        } else {
                            toastr.error('Failed to Approve');

                        }
                        // $(this).closest('tr').hide();
                        // location.reload();
                    }
                });
            }
        });
        $(document).on('click', '.deleteLeave', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
            // var table = $('#leave_table').DataTable();
            // var thisInstance=$(this);
            if (confirm('Are you sure, you want to delete ?')) {
                $.ajax({
                    url: config.routes.leave_delete,
                    // type: "get",
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        console.log(data);
                        if (data.success == true) {
                            toastr.success('Leave was deleted successfully');
                            tr.fadeOut(1000, function () {
                                $(this).remove();
                            });

                            if (data.leave_count === 0) {
                                $('#se_all_leave').hide();
                                $('#leave_count').hide();
                                $('.leave_count_text').text("No leave to approve");
                            } else {
                                $('#leave_count').text(data.leave_count);
                            }


                            // table.row(thisInstance.parents('tr')).remove().draw();
                        } else {
                            toastr.error('Failed to Approve');

                        }
                        // $(this).closest('tr').hide();
                        // location.reload();
                    }
                });
            }
        });


    </script>
@endsection


