@extends('layouts.admin')
@section('pagePluginStyle')
    <link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css"
          integrity="sha256-Lfe6+s5LEek8iiZ31nXhcSez0nmOxP+3ssquHMR3Alo=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css"
          integrity="sha256-AVsv7CEpB2Y1F7ZjQf0WI8SaEDCycSk4vnDRt0L2MNQ=" crossorigin="anonymous"/>


@endsection
@section('pageLevelStyle')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/holiday_custom_style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/add_button_search.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/custom_button.css')}}">
    <style>

        /*#table_card {*/
            /*height: 500px;*/
        /*}*/

        .fc-today {
            background: #FFF !important;
            border: none !important;

        }

        .fc td, .fc th {
            border-style: none !important;
        }

        .fc-view-container {
            position: relative;
            width: 90%;
            margin: 0 auto;
        }

        .nav-pills .nav-link {
            border: 1px solid #c9ccd7;
            padding: .5rem 1.75rem;
            background: #AFABAB;
            /*background: #EBEBEB;*/
        }

        .fc-icon {
            font-family: fcicons !important;
            speak: none;
            font-style: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            width: 1em;
            height: 9em;
        }

        .fc-left {
            margin: 0 auto;

            text-align: center;

        }

        #year_dropdown {

            /*width: 50%;*/
            /*margin: 0 auto;*/

        }

        #month_label {
            color: black;
            position: relative;
            right: 696px;
            top: 7px;
            font-size: 18px;
        }

        #year_label {
            position: relative;
            top: 45px;
        }

        table th:first-child {
            border-radius: 10px 0 0 10px;

        }

        table th:last-child {
            border-radius: 0 10px 10px 0;

        }

        .fc-button-group {

            position: relative;
            right: 318px;
        }

        .fc-state-default {
            background: black;
            color: white;

            position: relative;

            display: none;
        }

        .fc-row fc-week fc-widget-content {
            height: 30px !important;
        }


    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Manage Holidays</h1>
        {{--<p>List View</p>--}}
    </div>


    <!-- end of modal edit -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-4 d-flex align-items-center justify-content-center justify-content-md-center mb-3 mb-md-0">
                        <div class="align-items-center m-4 d-inline-flex">
                            <ul style="border-bottom: none" class="nav nav-pills nav-pills-info myTabs" id="pills-tab"
                                role="tablist">
                                <li class="nav-item text-center">
                                    <a style="color: white" class="nav-link active" id="pills-profile-tab"
                                       data-toggle="pill"
                                       href="#pills-permissionlist" role="tab" aria-controls="pills-profile"
                                       aria-selected="true"><i class="fa fa-bars" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: white" class="nav-link " id="pills-home-tab" data-toggle="pill"
                                       href="#pills-createpermission" role="tab" aria-controls="pills-home"
                                       aria-selected="false"><i class="fa fa-calendar" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>


                <div style="position: relative" class="card-body">


                    <div style="border:none" class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade" id="pills-createpermission" role="tabpanel"
                             aria-labelledby="pills-home-tab">

                            <div class="d-flex justify-content-center mt-2">
                                <div class="col-md-3">


                                    <select class="form-control select_year float-right" id="year_dropdown">
                                        @foreach ($years as $year)
                                            <option value="{{$year}}" {{$year==2020?"seleted":""}} >{{$year}} </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-3">

                                    <select class="form-control select_month " id='month_dropdown'>


                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>



                                    </select>

                                </div>


                            </div>

                            <div class="row pt-4">
                                <div class="col-md-6">

                                    <p class="text-center">Your Selected Year: <span id="chosen_year"></span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-center">Your Selected Month: <span id="chosen_month"></span></p>
                                </div>

                            </div>


                            <br>

                            <div class="row">
                                {{--<div class="col-md-12">--}}

                                <div class="col-xl-12">
                                    <div class="card widget-calendar">

                                        <div class="text-primary" style="font-size: 20px;margin: 0 auto"
                                             id='caljump'>


                                        </div>


                                        <div id='calendar'></div>
                                    </div>
                                </div>
                                {{--</div>--}}
                                <div id="fullCalModal" class="modal fade" data-backdrop="false">
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

                        </div>

                        <div class="tab-pane fade active show" id="pills-permissionlist" role="tabpanel"
                             aria-labelledby="pills-profile-tab">

                            <div class="row justify-content-between align-items-center mx-n1 ">
                                <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                                    <div class="align-items-center m-4 d-inline-flex">
                                        <a class="btn btn-primary btn-sm add_btn" href=""
                                           data-toggle="modal" data-target="#add_holiday_modal" id="add_holiday_btn">
                                            <i class="fa fa-plus"> Add holiday</i>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-end mb-3 mb-md-0">
                                    <div class="align-items-center m-4 d-inline-flex inner-addon right-addon">
                                        <i class="fas fa-search"></i>
                                        <input type="search" placeholder="Search.." name="search_datatable_input"
                                               id="search_datatable_input" class="common_search">
                                    </div>
                                </div>
                            </div>

                            <div id="table_card" style="border: none" class="card mt-n3">
                                <div class="card-title">
                                    <div class="preview">
                                    </div>
                                </div>
                                <div class="test"></div>
                                <div class="card-body">
                                    <div id="maheeb" class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="holiday_table" class="table holiday_table">
                                                    <thead id="holiday_head">
                                                    <tr class="myTableHead">
                                                        <th>Serial</th>
                                                        <th>Date</th>
                                                        <th>Duration</th>
                                                        <th>Details</th>
                                                        <th>Types</th>
                                                        <th>Notes</th>
                                                        <th>Actions</th>

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
                                                                    $start = \Carbon\Carbon::parse($item->start_date);
                                                                    $end = \Carbon\Carbon::parse($item->end_date);


                                                                    $different_days = $start->diffInDays($end)+1;
                                                                    if($different_days<1){
                                                                        $different_days =1;
                                                                    }else{
                                                                           $different_days = $start->diffInDays($end)+1;
                                                                    }

                                                                @endphp
                                                                <td>{{

                                                                ($different_days >1)? \Carbon\Carbon::parse($item->start_date)->format('dS')."-".\Carbon\Carbon::parse($item->end_date)->format('dS M'):\Carbon\Carbon::parse($item->start_date)->format('dS M')

                                                             }}</td>


                                                                <td>{{$different_days}}</td>
                                                                <td>{{$item->holiday_name}}</td>
                                                                <td>{{$item->types==0?"Public":"Company"}}</td>
                                                                <td>{{$item->notes}}</td>

                                                                <td>

                                                                    <button type="button"
                                                                            data-serial="{{$loop->index + 1}}"

                                                                            class="btn  edit_btn editcompany commonbtn"
                                                                            data-companyname="{{$item->holiday_name}}"
                                                                            data-id="{{$item->id}}" data-toggle="modal"
                                                                            data-target="#exampleModal">

{{--                                                                        <img src="{{asset('backend/img/theme/light/edit.png')}}"--}}
{{--                                                                             alt="">--}}
                                                                        <i class="fa fa-pencil"></i>
                                                                    </button>
                                                                    <button type="button" data-id="{{$item->id}}"

                                                                            class="btn delete_btn deletecompany commonbtn">

{{--                                                                        <img src="{{asset('backend/img/theme/light/trash.png')}}"--}}
{{--                                                                             alt="">--}}
                                                                        <i class="fa fa-trash"></i>
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
    <div class="modal fade" id="add_holiday_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <h5 class="text-center font-weight-bolder" id="">Add Holiday</h5>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
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

                                                <input type="date" name="holiday_start_date" id="holiday_start_date"
                                                       class="form-control" required=""
                                                       value="" placeholder="Enter date here..">


                                            </div>
                                            <div id="holiday_2" class="form-group">

                                                <label class="end" for="holidayDate">Holiday End Date: </label>
                                                <input type="date" name="holiday_end_date" id="holiday_end_date"
                                                       class="form-control" value=""
                                                       placeholder="Enter date here.." novalidate>

                                            </div>

                                            <input type="checkbox" id="multiHoliday" name="multiHoliday" value="1">
                                            <label for="vehicle2"> Multiple Days</label><br>

                                            <div class="form-group">
                                                <label for="company_name">Type</label>
                                                <select class="form-control" id="typeId" name="typeName" required>
                                                    <option selected="selected" value="">Select a Type</option>
                                                    @foreach($types as $key=>$value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="company_name">Notes</label>

                                                <input id="notesId" class="form-control" name="notesName"
                                                       type="text" placeholder="Enter Notes here" required>
                                            </div>


                                            <input class="btn btn-primary sub_btn" type="submit" value="Add">
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="text-center font-weight-bolder" id="">Edit Holiday</h5>
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

                                    <input type="date" name="holiday_start_date" id="holiday_start_date"
                                           class="form-control" required="" value=""
                                           placeholder="Enter date here..">


                                </div>
                                <div id="holiday_4" class="form-group">

                                    <label class="end" for="holidayDate">Holiday End Date: </label>
                                    <input type="date" name="holiday_end_date" id="holiday_end_date"
                                           class="form-control" value=""
                                           placeholder="Enter date here.." novalidate>

                                </div>

                                <input type="checkbox" class="" id="multiHoliday_2" name="multiHoliday_2" value="1">
                                <label for="vehicle2"> Multiple Holiday</label><br>

                                <div class="form-group">
                                    <label for="company_name">Holiday Type</label>
                                    <select class="form-control" id="typeId" name="typeName" required>
                                        <option selected="selected" value="">Select a Type</option>
                                        @foreach($types as $key=>$value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="company_name">Notes</label>

                                    <input id="notesId" class="form-control" name="notesName"
                                           type="text" placeholder="Enter Notes here" required>
                                </div>


                                <input type="hidden" id="id" name="id" class="form-control">
                                <input type="hidden" id="si" class="form-control">


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center d-flex flex-column justify-content-center">
                        <button type="submit" class="btn btn-primary sub_btn">Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


<!-- Start of js plugin -->
@section('pagePluginScript')
    <script src="{{asset('backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('backend/js/data-table.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js"
            integrity="sha256-GBryZPfVv8G3K1Lu2QwcqQXAO4Szv4xlY4B/ftvyoMI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js"
            integrity="sha256-FT1eN+60LmWX0J8P25UuTjEEE0ZYvpC07nnU6oFKFuI=" crossorigin="anonymous"></script>


@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')
    <script type="text/javascript">


        $(".fc-widget-content").css({"height": 65});
        $('.date').datepicker({
            // format: "dd/mm/yyyy",
            autoclose: true,
        });
        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path


            $('ul a').each(function () {
                if (this.href === path) {
                    // console.log ($("a[href == path]").find('id'));
                    $("#btn_1").addClass("active");
                    $("#manage_holiday_id").css({
                        'font-family': 'Josefin Sans',
                        'font-style': 'normal',
                        'font-weight': 'bold',
                        'font-size': '13px',
                        'line-height': '12px',
                        'color': 'black',
                        'text-shadow': '0px 4px 4px rgba(0, 0, 0, 0.25)'
                    });


                    $("#btn_1").find('i').toggleClass('fas fa-plus fas fa-minus');
                    $('#attendnace_dropdown').hide();
                    $('#leave_dropdown').hide();

                    $("#dropdown_1").css("display", "block");

                    $(".first_sidebar").hide();
                    $(".second_sidebar").show();
                    $('#a1').addClass("active");

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
                holiday_store: "{!! route('holiday.post') !!}",
                holiday_delete: "{!! route('holiday.delete') !!}",
                holiday_detail: "{!! route('holiday.detail') !!}",
                holiday_update: "{!! route('holiday.update') !!}",
                holiday_calender: "{!! route('calender.index') !!}",
            }
        };
        var holiday_table = $('#holiday_table').DataTable({

            sDom: 'lrtip',
            "paging": false,
            fixedHeader: true
        });
        $('#search_datatable_input').on('keyup', function () {
            holiday_table.search(this.value).draw();

        });

        function calenderShow() {

            $('#calendar').fullCalendar({

                contentHeight: 350,
                editable: true,
                theme: false,
                selectable: true,
                events: function (start, end, timezone, callback) {
                    $.ajax({
                        url: config.routes.holiday_calender,
                        type: "get",
                        success: function (doc) {
                            var events = [];

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


            $(".select_month").on("change", function (event) {
                var year_drop = $("#year_dropdown").val();

                $('#calendar').fullCalendar('changeView', 'month', this.value);
                // $('#calendar').fullCalendar('gotoDate', "" + year_drop + "-" + this.value + "-1");
                $('#calendar').fullCalendar('gotoDate', "" + year_drop + "-" + this.value + "-01");

            });

        }


        $(".start").text("Holiday  Date");

        $(function () {
            holidayToggle();
            calenderShow();


            $("#month_dropdown").on('change', function() {
                var month_val =  $(this).find(":selected").text();
                $("#chosen_month").text(month_val);

                var year_val =  $("#year_dropdown").find(":selected").text();
                $("#chosen_year").text(year_val);
            });


            $("#year_dropdown").on('change', function() {
                var year_val =  $(this).find(":selected").text();
                $("#chosen_year").text(year_val);

            });
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
                    if (data.success == true) {
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

                        $('#calendar').fullCalendar('refetchEvents');

                        // var start = moment(data.start_date);
                        var start = moment(data.holiday.start_date);
                        // var end = moment(data.end_date);
                        var end = moment(data.holiday.end_date);
                        var range = end.diff(start, 'days');
                        var types = (data.holiday.types) === 0 ? "Public" : "Company";
                        if (range < 1) {
                            range = 1;
                        } else {
                            range = end.diff(start, 'days');
                        }
                        var days = (range > 1) ? moment(data.holiday.start_date).format('Do') + "-" + moment(data.holiday.end_date).format('Do MMM') : moment(data.holiday.start_date).format('Do MMM');
                        var rowCount = $('#holiday_table >tbody >tr').length + 1;
                        $('#companyappend').append(`<tr class="unqcompany` + data.id + `">
            <td>` + rowCount + `</td>
            <td>` + days + ` </td>
            <td>` + range + ` </td>
            <td>` + data.holiday.holiday_name + ` </td>
            <td>` + types + ` </td>
            <td>` + data.holiday.notes + ` </td>

            <td>

                <button type="button" class="btn edit_btn editcompany commonbtn" data-companyname="` + data.holiday.holiday_name + `"  data-id="` + data.holiday.id + `" data-toggle="modal" data-target="#exampleModal">

                  <i class="fa fa-pencil"></i>
                </button>
                <button type="button" class="btn delete_btn deletecompany commonbtn"  data-id="` + data.holiday.id + `">
                                    <i class="fa fa-trash"></i>

                </button>
            </td>
        </tr>`);
                        toastr.success('Holiday was Created successfully');
                        setTimeout(function () {
                            $('#add_holiday_modal').modal('hide');
                        }, 1500);
                        $('#add_holiday_form').trigger('reset');

                    } else {
                        toastr.error("Failed to store");
                    }
                }
            })
        });
        $(document).on('click', '.deletecompany', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
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
                        tr.fadeOut(1000, function () {
                            $(this).remove();
                        });
                        // $(this).closest('tr').hide();
                        // location.reload();
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

                    // console.log(items);

                    $('#company_edit_form').find('#company_name').val(data.holiday.holiday_name);
                    $('#company_edit_form').find('#holiday_start_date').val(data.holiday.start_date);
                    $('#company_edit_form').find('#holiday_end_date').val(data.holiday.end_date);
                    $('#company_edit_form').find('#typeId').val(data.holiday.types);
                    $('#company_edit_form').find('#notesId').val(data.holiday.notes);

                    let x = data.holiday.start_date;
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
                    if (data.success == true) {
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
                        $('#calendar').fullCalendar('refetchEvents');
                        var start = moment(data.holiday.start_date);
                        var end = moment(data.holiday.end_date);
                        var range = end.diff(start, 'days');
                        var types = (data.holiday.types) === 0 ? "Public" : "Company";

                        if (range < 1) {
                            range = 1;
                        } else {
                            range = end.diff(start, 'days');
                        }
                        var days = (range > 1) ? moment(data.holiday.start_date).format('Do') + "-" + moment(data.holiday.end_date).format('Do MMM') : moment(data.holiday.start_date).format('Do MMM');


                        $('.unqcompany' + data.holiday.id).replaceWith(`<tr class="unqcompany` + data.holiday.id + `">
        <td>` + si + `</td>
       <td>` + days + ` </td>
       <td>` + range + ` </td>
       <td>` + data.holiday.holiday_name + ` </td>
       <td>` + types + ` </td>
       <td>` + data.holiday.notes + ` </td>
        <td>

            <button type="button" class="btn edit_btn editcompany commonbtn" data-companyname="` + data.holiday.holiday_name + `"  data-id="` + data.holiday.id + `" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-pencil"></i>

             </button>
            <button type="button" class="btn delete_btn deletecompany commonbtn"  data-id="` + data.holiday.id + `">
                              <i class="fa fa-trash"></i>

            </button>
        </td>
    </tr>`);
                        toastr.success('Holiday was Updated successfully');
                        setTimeout(function () {
                            $('#exampleModal').modal('hide');
                        }, 1500);
                        $('#company_edit_form').trigger('reset');
                    }
                    else{
                        toastr.error("Failed to update");
                    }
                }
            });
        });

    </script>
@endsection
<!-- End custom js for this page-->
