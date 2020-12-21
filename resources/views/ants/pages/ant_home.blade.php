@extends('layouts.user-layout')
@section('pagePluginStyle')

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">



@endsection
@section('pageLevelStyle')

    <style>
        /*fullcalender */
        .fc-event-time,
        .fc-event-title {
            /*  padding: 0 1px;
              float: left;
              clear: none;
              margin-right: 10px;*/
        }

        .fc-time {
            display: none;;
        }

        .widget-calendar {
            height: auto;
        }

        /*fullcalender */
        .card-footer {
            border-top: 0px;
        }

        .card-footer p {
            font-size: 11px;
        }

        .see_all {
            background: #959595;
            color: black;
            font-size: 9px;
        }

        .holiday_name {
            color: black;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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

    <section class="profile_main_content_area">
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card">

                    <div class="card-body">

                        <div class="row align-items-center text-center mt-3 mb-3 pt-3">
                            <div class="col-md-6">

                                <button id="CheckButton" class="border-0 bg-none p-0 rounded-circle">
                                    <img id="start_session" class="preview img-fluid"
                                         src="{{asset('backend/img/theme/light/start_session.png')}}"
                                         alt="">
                                    <img id="stop_session" class="preview img-fluid"
                                         src="{{asset('backend/img/theme/light/stop_session.png')}}"
                                         alt="" style="display: none;">

                                </button>


                            </div>
                            <div class="col-md-6">
                                <div class="session_text">
                                    <p class="text-center" id="session_header">Your last session was</p>
                                    <h3 class="h3 text-center" id="check_in_timer_conitnue" style="display: none;">
                                        00<span class="pt-3">hr</span>33<span class="pt-3">m</span> 17<span
                                                class="pt-3">s</span>235 <span class="pt-3">ms</span></h3>
                                    <h3 class="h3 text-center" id="check_in_timer">00<span class="pt-3">hr</span>33<span
                                                class="pt-3">m</span> 17<span class="pt-3">s</span>235<span
                                                class="pt-3">ms</span></h3>
                                    <p class="text-center" id="">Starting From <span id="session_start_from"></span></p>

                                    <hr>
                                    <p class="text-center">You have checked in <span id="total_checked_in">3</span>
                                        times today</p>
                                    {{-- <button class="btn btn-primary  mx-auto d-block" id="session_view_btn">View logs</button> --}}
                                    <a class="btn btn-sm btn-primary" href="{{ route('user.attendance.logs.view') }}">
                                        View Logs
                                        {{-- <img src="{{asset('backend/img/theme/light/viewlogs.png')}}" --}}
                                        {{-- alt=""> --}}
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="card">

                    <div class="card-body">

                        <p class="text-center pt-4 font-weight-bold text-primary">Upcoming Holidays</p>
                        @foreach($items as $item)

                        <div class="container">
                            <div class="row">
                            <div class="col-md-2 mt-2">
                                <div class="img-fluid">
                                    <img class=""
                                         src="{{asset('backend/img/user_dashboard/red_rectangle.png')}}"
                                         style="" alt="">
                                </div>
                            </div>
                            <div class="col-md-10 pt-2">
                                <p>{{$item->StartDate_Human2}}</p>
                                <h6 class="font-weight-bolder mt-n1 holiday_name">{{$item->holiday_name}}</h6>
                            </div>
                            </div>
                        </div>

                        @endforeach


                    </div>
                    <div class="card-footer d-flex justify-content-center">

                        <a href="{{route('user.holiday.index')}}" class="btn see_all">See All</a>
                    </div>

                </div>

            </div>


            <div class="col-xl-6 col-md-6">
                <!-- Calendar -->
                <div class="card widget-calendar card-fluid">
                    <div class="card-header">
                        <div class="text-sm text-muted mb-1 widget-calendar-year"></div>
                        <div class="h5 mb-0 widget-calendar-day"></div>
                    </div>

                    <div id='calendar'></div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">

                <div class="card-body text-center d-flex flex-column justify-content-center">

                </div>
            </div>
        </div>





    </section>
@endsection


<!-- Start of js plugin -->
@section('pagePluginScript')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>


@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')
    <script type="text/javascript">

        $(function () {
            // $("#CheckButton").click(function(){

            //     var myId = $('img',this).toggle();
            //     var imgId = $('img',this).attr('id');


            // });
        });

        var url_select;
        var config = {
            routes: {
                // holiday_calender: "{!! route('calender.index') !!}",
                attendnace_calender_of_a_user: "{!! route('user.attendnace.calender.list') !!}",
                attendance_check_in: "{!! route('attendanceSingleButton.check_in') !!}",
                attendance_check_out: "{!! route('attendanceSingleButton.check_out') !!}",
                check_last_status_today: "{!! route('attendanceSingleButton.check_last_status_today') !!}",
            }
        };
        $(function () {


            $('#calendar').fullCalendar({

                events: function (start, end, timezone, callback) {

                    // var bgName =['bg-warning','bg-danger','bg-success'];
                    var bgName = ['bg-success'];

                    $.ajax({
                        url: config.routes.attendnace_calender_of_a_user,
                        type: "get",
                        success: function (data) {

                            var events = [];
                            console.log(data);
                            // $(doc).find('event').each(function( ) {
                            $.each(data.data, function (i, v) {
                                if (v.status == 'late') {
                                    var bg = 'bg-danger';
                                }
                                console.log(v);
                                events.push({
                                    title: v.status,
                                    start: v.attendance_date,
                                    end: v.attendance_date,
                                    // className: bgName[i]
                                    className: bg
                                });

                            });
                            callback(events);

                        },
                    });
                },
            });

            //Display Current Date as Calendar widget header
            var mYear = moment().format('YYYY');
            var mDay = moment().format('dddd, MMM D');
            $('.widget-calendar-year').html(mYear);
            $('.widget-calendar-day').html(mDay);

        });

        function check_in_timer(last_check_in) {
            // Set the date we're counting down to
            var last_check_in = last_check_in;
            var days = 0;
            var hours = 0;
            var minutes = 0;
            var seconds = 0;
            document.getElementById("check_in_timer").innerHTML = "";
            countDownDate = new Date("Jul 27, 2010 " + last_check_in + "").getTime();
            console.log(new Date("Jul 26, 2010 " + last_check_in + "").getTime());

// Update the count down every 1 second
            var x = setInterval(function () {
                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = now - countDownDate;

                // Time calculations for days, hours, minutes and seconds
                days = Math.floor(distance / (1000 * 60 * 60 * 24));
                hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                seconds = Math.floor((distance % (1000 * 60)) / 1000);
                // Output the result in an element with id="check_in_timer"

                document.getElementById("check_in_timer_conitnue").innerHTML = hours + '<span class="pt-3">hr</span>' + minutes + '<span class="pt-3">m</span>' + seconds + '<span class="pt-3">s</span>';


                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("check_in_timer").innerHTML = "EXPIRED";
                }
            }, 1000);

        }

        $(document).ready(function () {
            function single_button_change(data) {
                console.log(data);

                // var last_status = $("#CheckButton").data('last_status');
                var last_status = data.checked_status;
                $('#total_checked_in').empty().text(data.total_checked_in);

                if (last_status == 'in') {
                    var timeString12hr_cin = new Date('1970-01-01T' + data.data.check_in + 'Z')
                        .toLocaleTimeString({},
                            {timeZone: 'UTC', hour12: true, hour: 'numeric', minute: 'numeric'}
                        );

                    $('#session_header').empty().text('You,re working for');
                    $('#session_start_from').empty().text(timeString12hr_cin);
                    $('#stop_session').show();
                    $('#start_session').hide();
                    url_select = config.routes.attendance_check_out;
                    $('#check_in_timer_conitnue').show();
                    check_in_timer(data.data.check_in);
                    console.log();
                } else if (last_status == 'out') {
                    var c_in = data.data.duration;
                    var c_in_split = c_in.split(':');
                    var timeString12hr_cin = new Date('1970-01-01T' + data.data.check_in + 'Z')
                        .toLocaleTimeString({},
                            {timeZone: 'UTC', hour12: true, hour: 'numeric', minute: 'numeric'}
                        );
                    $('#session_header').empty().text('Your Last Session was');
                    $('#session_start_from').empty().text(timeString12hr_cin);
                    $('#check_in_timer').empty().html('' + c_in_split[0] + '<span class="pt-3">hr</span>' + c_in_split[1] + '<span class="pt-3">m</span> ' + c_in_split[2] + '<span class="pt-3">s</span>');
                    $('#stop_session').hide();
                    $('#start_session').show();
                    $('#check_in_timer_conitnue').hide();
                    url_select = config.routes.attendance_check_in;


                } else if (last_status == 'empty') {
                    $('#session_header').empty().text('Your Last Session was');
                    $('#session_start_from').empty().text('Starting From 00:00 ');
                    $('#check_in_timer').empty().html('00<span class="pt-3">hr</span>00<span class="pt-3">m</span>00<span class="pt-3">s</span>');
                    $('#stop_session').hide();
                    $('#start_session').show();
                    $('#check_in_timer_conitnue').hide();
                    url_select = config.routes.attendance_check_in;

                }
            }

            // single_button_change();
            $.ajax({
                url: config.routes.check_last_status_today,
                type: "get",
                success: function (data) {
                    if (data.success == true) {
                        console.log(data.checked_status);
                        $("#CheckButton").data('last_status', data.checked_status);

                    }
                    else {
                        console.log(data);
                        $("#CheckButton").data('last_status', data.checked_status);
                    }
                    single_button_change(data);
                }
            });


            $(document).on('click', '#CheckButton', function (e) {
                e.preventDefault();
                console.log(url_select);
                // var url_select= url_select();

                swal({
                    title: "Are you sure?",
                    // text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                url: url_select,
                                type: "get",
                                success: function (data) {
                                    console.log(data);
                                    if (data.success == true) {
                                        $("#CheckButton").data('last_status', data.checked_status);
                                        // toastr.success('Checked ' + data.checked_status + ' successfully');
                                        swal({
                                            // title: "Good job!",
                                            text: "You have checked "+ data.checked_status +"   successfully!",
                                            icon: "success",
                                            button: false,
                                        });

                                    } else {
                                        // alert(data.message);
                                        // toastr.error(data.message);
                                        swal({
                                            // title: "Good job!",
                                            text: "Something is wrong!",
                                            icon: "error",
                                            button: false,
                                        });
                                        $("#CheckButton").data('last_status', data.checked_status);
                                    }
                                    single_button_change(data);

                                }
                            });


                        } else {
                            // swal("Your imaginary file is safe!");
                        }
                    });




            });


        });


    </script>
@endsection
<!-- End custom js for this page-->
