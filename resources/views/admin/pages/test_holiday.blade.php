@extends('layouts.admin')
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


    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Manage Holidays</h1>
        <p>List View</p>
    </div>
    <div class="modal fade" id="add_holiday_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Holiday</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="border: none" class="card">
                        <div class="card-title">
                            <div class="preview"><i class="" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- create / add submit form -->
                                    <form method="post" name="add_holiday_form" id="add_holiday_form">
                                        @csrf
                                        <fieldset>
                                            <div class="form-group">
                                                <label for="company_name">Holiday Name</label>
                                                <input id="company_name" class="form-control" name="company_name"
                                                       type="text" placeholder="Enter  Holiday Name.." required>
                                            </div>


                                            <div id="holiday_1" class="form-group">

                                                <label class="start" for="">Holiday Start Date: </label>

                                                <input type="text" name="holiday_start_date" id="holiday_start_date"
                                                       class="date form-control" data-provide="datepicker" required=""
                                                       value="" placeholder="Enter date here..">


                                            </div>
                                            <div id="holiday_2" class="form-group">

                                                <label class="end" for="holidayDate">Holiday End Date: </label>
                                                <input type="text" name="holiday_end_date" id="holiday_end_date"
                                                       class="date form-control" data-provide="datepicker" value=""
                                                       placeholder="Enter date here.." novalidate>

                                            </div>

                                            <input type="checkbox" id="multiHoliday" name="multiHoliday" value="1">
                                            <label for="vehicle2"> Multiple Days</label><br>

                                            <input class="btn btn-primary" type="submit" value="Submit">
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Holiday</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" name="company_edit_form" id="company_edit_form">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="company_name">Holiday Name</label>
                                    <input id="company_name" class="form-control" name="company_name" type="text"
                                           placeholder="Enter  Holiday Name.." required>
                                </div>


                                <div id="holiday_3" class="form-group">

                                    <label class="start" for="">Holiday Start Date: </label>

                                    <input type="text" name="holiday_start_date" id="holiday_start_date"
                                           class="date form-control" data-provide="datepicker" required="" value=""
                                           placeholder="Enter date here..">


                                </div>
                                <div id="holiday_4" class="form-group">

                                    <label class="end" for="holidayDate">Holiday End Date: </label>
                                    <input type="text" name="holiday_end_date" id="holiday_end_date"
                                           class="date form-control" data-provide="datepicker" value=""
                                           placeholder="Enter date here.." novalidate>

                                </div>

                                <input type="checkbox" id="multiHoliday_2" name="multiHoliday_2" value="1">
                                <label for="vehicle2"> Multiple Holiday</label><br>
                                <input type="hidden" id="id" name="id" class="form-control">
                                <input type="hidden" id="si" class="form-control">
                                {{--</div>--}}

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end of modal edit -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">
                <button class="myButton" data-toggle="modal"
                        data-target="#add_holiday_modal" id="add_holiday_btn">
                    <a href="#" class="">
                        <i class="fa fa-plus my-float"></i>
                    </a>
                </button>
                <div class="button_item">
                    <ul style="border-bottom: none" class="nav nav-pills nav-pills-info myTabs" id="pills-tab"
                        role="tablist">
                        <li class="nav-item text-center">
                            <a style="color: white" class="nav-link " id="pills-profile-tab" data-toggle="pill"
                               href="#pills-permissionlist" role="tab" aria-controls="pills-profile"
                               aria-selected="true"><i class="fa fa-bars" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="color: white" class="nav-link active" id="pills-home-tab" data-toggle="pill"
                               href="#pills-createpermission" role="tab" aria-controls="pills-home"
                               aria-selected="false"><i class="fa fa-calendar" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>


                <div style="position: relative" class="card-body">


                    <div style="border:none" class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade active show" id="pills-createpermission" role="tabpanel"
                             aria-labelledby="pills-home-tab">
                            <div class="col-12 grid-margin stretch-card">
                                <div style="border: none" class="card">
                                    <div class="card-title">
                                        <div class="preview"><i class="" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- create / add submit form -->
                                                <div id='calendar'></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="pills-permissionlist" role="tabpanel"
                             aria-labelledby="pills-profile-tab">
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
                                                <table id="order-listing" class="table holiday_table">
                                                    <thead>
                                                    <tr id="holiday_head" class="">
                                                        <th>Serial</th>
                                                        <th>Date</th>
                                                        <th>Duration</th>
                                                        <th>Details</th>
                                                        <th>Actions</th>
                                                        {{--<th style="">Floating button</th>--}}
                                                    </tr>
                                                    </thead>
                                                    <tbody class="holiday_row" id="companyappend">

                                                    @if(empty($items))
                                                        <h2 class="text-danger text-center text-capitalize">Data does
                                                            not exist</h2>
                                                    @else

                                                        @foreach ($items as $item)
                                                            <tr class="unqcompany{{$item->id}}">


                                                                <td>{{$loop->index +1}}</td>

                                                                @php
                                                                    $start = \Carbon\Carbon::parse($item->holiday_date);
                                                                    $end = \Carbon\Carbon::parse($item->end_date);


                                                                    $different_days = $start->diffInDays($end);
                                                                    if($different_days<1){
                                                                        $different_days =1;
                                                                    }else{
                                                                           $different_days = $start->diffInDays($end);
                                                                    }

                                                                @endphp
                                                                <td>{{

                                                                ($different_days >1)? \Carbon\Carbon::parse($item->holiday_date)->format('dS')."-".\Carbon\Carbon::parse($item->end_date)->format('dS M'):\Carbon\Carbon::parse($item->holiday_date)->format('dS M')

                                                             }}</td>


                                                                <td>{{$different_days}}</td>
                                                                <td>{{$item->holiday_name}}</td>

                                                                <td>

                                                                    <button type="button"
                                                                            data-serial="{{$loop->index + 1}}"
                                                                            class="btn btn-dark editcompany commonbtn"
                                                                            data-companyname="{{$item->holiday_name}}"
                                                                            data-id="{{$item->id}}" data-toggle="modal"
                                                                            data-target="#exampleModal">
                                                                        Edit

                                                                    </button>
                                                                    <button type="button" data-id="{{$item->id}}"
                                                                            class="btn btn-dark deletecompany commonbtn">
                                                                        Delete
                                                                    </button>
                                                                </td>

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


    {{--<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>--}}

@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')
    <script type="text/javascript">

        $('.date').datepicker({
            // format: "dd/mm/yyyy",
            autoclose: true,
        });

        var config = {
            routes: {
                holiday_store: "{!! route('holiday.post') !!}",
                holiday_delete: "{!! route('holiday.delete') !!}",
                holiday_detail: "{!! route('holiday.detail') !!}",
                holiday_update: "{!! route('holiday.update') !!}",
            }
        };


        $(".start").text("Holiday  Date");
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },


                events: [
                        @foreach($appointments as $appointment)
                    {
                        title: '{{ $appointment->holiday_name  }}',
                        start: '{{ $appointment->holiday_date }}',
                        @if ($appointment->end_date)
                        end: '{{ $appointment->end_date }}',
                        @endif
                    },
                    @endforeach
                ],
            });


        });


        $(function () {
            holidayToggle();
        });

        function holidayToggle() {
            $("#holiday_1").show();
            $("#holiday_2").hide();
            $(document).ready(function () {
                $(":checkbox").click(function (event) {
                    if ($('#multiHoliday').is(":checked")) {
                        // $("#singleHoliday").prop("checked", false);
                        $(".start").text("Holiday Start Date");

                        $("#holiday_1").show();
                        $("#holiday_2").show();
                    }
                    else {
                        $(".start").text("Holiday Date");
                        $("#holiday_1").show();
                        $("#holiday_2").hide();
                    }
                });
            });


        }


        $(document).on('submit', '#add_holiday_form', function (event) {
            event.preventDefault();
            $.ajax({
                url: config.routes.holiday_store,
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.id != "") {
                        // toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000})
                        //console.log(data);
                        toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 2000,
                            "timeOut": 2000,
                            "extendedTimeOut": 2000
                        };
                        // console.log(data.table);
                        var start = moment(data.holiday_date);
                        var end = moment(data.end_date);
                        var range = end.diff(start, 'days');

                        if (range < 1) {
                            range = 1;
                        } else {
                            range = end.diff(start, 'days');
                        }
                        var days = (range > 1) ? moment(data.holiday_date).format('Do') + "-" + moment(data.end_date).format('Do MMM') : moment(data.holiday_date).format('Do MMM');
                        var rowCount = $('#order-listing >tbody >tr').length + 1;
                        $('#companyappend').append(`<tr class="unqcompany` + data.id + `">
            <td>` + rowCount + `</td>
            <td>` + days + ` </td>
            <td>` + range + ` </td>
            <td>` + data.holiday_name + ` </td>

            <td>

                <button type="button" class="btn btn-dark editcompany commonbtn" data-companyname="` + data.holiday_name + `"  data-id="` + data.id + `" data-toggle="modal" data-target="#exampleModal"> Edit </button>
                <button type="button" class="btn btn-dark btn-icon-text deletecompany commonbtn"  data-id="` + data.id + `">
                Delete
                </button>
            </td>
        </tr>`);
                        toastr.success('Holiday was Created successfully');
                        setTimeout(function () {
                            $('#add_holiday_modal').modal('hide');
                        }, 1500);
                        $('#add_holiday_form').trigger('reset');

                    } else {
                        alert("Failed to store");
                    }
                }
            })
        });
        $(document).on('click', '.deletecompany', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var type = 'show';
            // alert(id);
            if (confirm('Are You Sure to Delete ?')) {
                $.ajax({
                    url: config.routes.holiday_delete,
                    type: "get",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        console.log(data);
                        toastr.success('Holiday was Deleted successfully');
                        $(this).closest('tr').hide();
                        location.reload();
                    }
                });
            }
        });

        $(document).on('click', '.editcompany', function (e) {
            $("#holiday_3").show();
            $("#holiday_4").hide();


            e.preventDefault();

            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'edit';
            $(document).ready(function () {
                $(":checkbox").click(function (event) {
                    if ($('#multiHoliday_2').is(":checked")) {
                        // $("#singleHoliday").prop("checked", false);
                        $(".start").text("Holiday Start Date");

                        $("#holiday_3").show();
                        $("#holiday_4").show();
                    }
                    else {
                        $(".start").text("Holiday Date");
                        $("#holiday_3").show();
                        $("#holiday_4").hide();
                    }
                });
            });

            $.ajax({
                url: config.routes.holiday_detail,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },
                success: function (data) {

                    $('#company_edit_form').find('#company_name').val(data.holiday.holiday_name);
                    $('#company_edit_form').find('#holiday_start_date').val(data.holiday.holiday_date);
                    $('#company_edit_form').find('#holiday_end_date').val(data.holiday.end_date);

                    let x = data.holiday.holiday_date;
                    let y = data.holiday.end_date;

                    if (x != y) {
                        // alert('equal')
                        console.log('not equal')
                        $('#multiHoliday_2').prop('checked', true)
                        $(".start").text("Holiday Start Date");

                        $("#holiday_3").show();
                        $("#holiday_4").show();
                    } else {
                        console.log(' equal')
                        $('#multiHoliday_2').prop('checked', false)
                        $(".start").text("Holiday Date");
                        $("#holiday_3").show();
                        $("#holiday_4").hide();
                    }

                    $('#company_edit_form').find('#id').val(id);
                    $('#company_edit_form').find('#si').val(si);
                }
            });
        });
        $(document).on('submit', '#company_edit_form', function (e) {
            e.preventDefault();
            var si = $('#company_edit_form').find('#si').val();
            $.ajax({
                url: config.routes.holiday_update,
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    toastr.options = {
                        "debug": false,
                        "positionClass": "toast-bottom-right",
                        "onclick": null,
                        "fadeIn": 300,
                        "fadeOut": 2000,
                        "timeOut": 2000,
                        "extendedTimeOut": 2000
                    };
                    // var username = data.username===null ? 'N/A':  data.username.name;

                    var start = moment(data.holiday.holiday_date);
                    var end = moment(data.holiday.end_date);
                    var range = end.diff(start, 'days');

                    if (range < 1) {
                        range = 1;
                    } else {
                        range = end.diff(start, 'days');
                    }
                    var days = (range > 1) ? moment(data.holiday.holiday_date).format('Do') + "-" + moment(data.holiday.end_date).format('Do MMM') : moment(data.holiday.holiday_date).format('Do MMM');


                    $('.unqcompany' + data.holiday.id).replaceWith(`<tr class="unqcompany` + data.holiday.id + `">
        <td>` + si + `</td>
       <td>` + days + ` </td>
       <td>` + range + ` </td>
       <td>` + data.holiday.holiday_name + ` </td>
        <td>

            <button type="button" class="btn btn-dark editcompany commonbtn" data-companyname="` + data.holiday.holiday_name + `"  data-id="` + data.holiday.id + `" data-toggle="modal" data-target="#exampleModal">  Edit </button>
            <button type="button" class="btn btn-dark btn-icon-text deletecompany commonbtn"  data-id="` + data.holiday.id + `">
           Delete
            </button>
        </td>
    </tr>`);
                    toastr.success('Holiday was Updated successfully');
                    setTimeout(function () {
                        $('#exampleModal').modal('hide');
                    }, 1500);
                    $('#company_edit_form').trigger('reset');
                }
            });
        });

    </script>
@endsection
<!-- End custom js for this page-->