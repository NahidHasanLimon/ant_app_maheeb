@extends('layouts.user-layout')
@section('pagePluginStyle')

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
    <style>

        /*#table_card {*/
        /*    height: 500px;*/
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
        <h1>Your Holidays</h1>
        {{--<p>List View</p>--}}
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

                                <input type="checkbox" class="" id="multiHoliday_2" name="multiHoliday_2" value="1">
                                <label for="vehicle2"> Multiple Holiday</label><br>

                                <div class="form-group">
                                    <label for="company_name">Holiday Type</label>
                                    <select class="form-control" id="typeId" name="typeName">
                                        <option selected="selected">Select a Type</option>
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


                <div class="card-body">


                    <div style="border:none" class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade " id="pills-createpermission" role="tabpanel"
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





                                <div class="col-xl-12">
                                    <div class="card widget-calendar">

                                        <div class="text-primary" style="font-size: 20px;margin: 0 auto"
                                             id='caljump'>
                                        </div>
                                        <div id='calendar'></div>
                                    </div>
                                </div>

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
                                                    {{--    <div class="col-md-6">
                                                           <div class="form-group row">
                                                               <div class="col-sm-12 text-center">
                                                                    <label class="text-center">Details</label>
                                                               </div>
                                                               <div class="col-sm-12 text-center">
                                                                   <label class="form-control text-bold" id="details_holiday_modal"></label>
                                                               </div>
                                                           </div>
                                                       </div> --}}
                                                    {{-- <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12 text-center">
                                                                 <label class="text-center">Type</label>
                                                            </div>
                                                            <div class="col-sm-12 text-center">
                                                                <label class="form-control text-bold" id="type_holiday_modal"></label>
                                                            </div>
                                                        </div>
                                                    </div> --}}
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
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                                    <div class="align-items-center m-4 d-inline-flex">
                                        <span class="badge badge-light">You have <span>{{$totalHolidays}}</span> holiday this year</span>
                                    </div>
                                </div>

                                <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-end mb-3 mb-md-0">
                                    <div class="align-items-center m-4 d-inline-flex">
                                        <input type="search" class="form-control" name="search_datatable_input"
                                               id="search_datatable_input">
                                    </div>
                                </div>
                            </div>
                            <div id="table_card" style="border: none" class="card">
                                <div class="card-title">
                                    <div class="preview">
                                    </div>
                                </div>
                                <div class="test"></div>
                                <div class="card-body">
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


                                                            <td>{{$different_days}} Day</td>
                                                            <td>{{$item->holiday_name}}</td>
                                                            <td>{{$item->types==0?"Public":"Company"}}</td>
                                                            <td>{{$item->notes}}</td>
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

    <script src="{{asset('backend/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')
    <script type="text/javascript">


        $(".fc-widget-content").css({"height": 65});
        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
            $('ul a').each(function () {
                if (this.href === path) {
                    // console.log ($("a[href == path]").find('id'));
                    $(".first_sidebar").hide();
                    $(".second_sidebar").show();
                    $('#a2').addClass("active");
                    $('#a2 span img').attr("src", "/backend/img/theme/light/Holiday_white.png");
                    // $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_Black.png");
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
                $('#calendar').fullCalendar('gotoDate', "" + year_drop + "-" + this.value + "-01");
            });

        }


        $(".start").text("Holiday  Date");

        $(function () {
            calenderShow();
            // var year_val =  $("#year_dropdown").find(":selected").text();
            // $("#chosen_year").text(year_val);

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






    </script>
@endsection
<!-- End custom js for this page-->
<!-- End custom js for this page-->
