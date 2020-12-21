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
        .afl_btn{
            position: relative;
            top: 74px;
            z-index: 1;
            border: 1px solid #000000;
            box-sizing: border-box;
            border-radius: 7px;
            background: white;
            left: -7px;
            border: none;
        }

        #afl_img{
            width: 79%;
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

    <div class="top_text">
        <h1>Ask for Leaves</h1>

    </div>
    <div class="modal fade" id="ask_for_leave_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h5 class="modal-title" id="exampleModalLabel">Manage Leaves</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="border: none" class="card">
                        <div class="card-title">
                            <div class="preview"><i class="" aria-hidden="true"></i>
                                <h5 class="text-center font-weight-bolder" id="">Ask for Leave</h5>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- create / add submit form -->
                                    <form method="post" name="ask_for_leave_form" id="ask_for_leave_form">
                                        @csrf
                                        <fieldset>

                                            <div id="leave_date_duration_1" class="form-group">

                                                <label class="start" for="">Leave Start Date: </label>

                                                <input type="date" name="leave_start_date" id="leave_start_date"
                                                       class="form-control"  required=""
                                                       value="" placeholder="Enter date here..">

                                            </div>
                                            <div id="leave_date_duration_2" class="form-group">

                                                <label class="end" for="holidayDate">Leave End Date: </label>
                                                <input type="date" name="leave_end_date" id="leave_end_date"
                                                       class="form-control"  value=""
                                                       placeholder="Enter date here.." novalidate>

                                            </div>

                                            <input type="checkbox" id="multiHoliday" name="multiHoliday" value="1">
                                            <label for="vehicle2"> Multiple Days</label><br>

                                            <div id="typeDiv" class="form-group">
                                                <label for="exampleFormControlSelect1">Type</label>
                                                <select class="form-control" id="leaveId" name="leaveType">
                                                    <option selected="selected">Select a type</option>
                                                    @foreach($leaveTypes as $leaveType)
                                                        <option name="leaveType" id="leaveType"
                                                                value="{{$leaveType->id}}">{{$leaveType->title}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div id="documentDiv" class="form-group">
                                                <label for="company_photo">Document(Optional)</label>
                                                {{--<input type="file" id="company_image" name="image" class="form-control">--}}
                                                {!! Form::file('doc', null , ['class' => 'form-control','id' => 'docID'
            ]) !!}
                                            </div>


                                            <div id="notes_by_requesterDiv" class="form-group">

                                                <label class="notes_by_requester" for="holidayDate">Notes </label>
                                                <input type="text" name="notes_by_requester" id="notes_by_requester"
                                                       class="form-control"
                                                       placeholder="Enter notes_by_requester here..">

                                            </div>

                                            <input class="btn btn-primary sub_btn" type="submit" value="Ask">
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



    <!-- end of modal edit -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">

                <div style="position: relative" class="card-body">

                    <button class="afl_btn" data-toggle="modal"
                            {{--<button class="" data-toggle="modal"--}}
                            data-target="#ask_for_leave_modal" id="">
                        <a href="#" class="">

                            <img id="afl_img" src="{{asset('backend/img/theme/light/afl.png')}}" alt="">
                     
                        </a>
                        {{--                        <img src="{{asset('backend/img/theme/light/big_plus.png')}}" alt="">--}}
                    </button>

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
                                        <table id="asking_table" class="table holiday_table">
                                            {{--<thead id="holiday_head" >--}}
                                            <thead>

                                            <tr class="myTableHead">

                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Duration</th>
                                                <th>Type</th>
                                                <th>Notes</th>

                                            </tr>

                                            </thead>
                                            <tbody class="holiday_row" id="companyappend">

                                            @foreach ($items as $item)
                                                <tr class="unqcompany{{$item->id}}">

                                                    <td>{{$item->StartDate_Human}}</td>
                                                    <td>{{$item->EndDate_Human}}</td>

                                                    @php
                                                       
                                                        $approving_superadmin_id = $item->approving_superadmin_id;
                                                        $approving_supervisor_id = $item->approving_supervisor_id;
                                                    @endphp
                                                    <td>{{$item->Duration_Human}}</td>
                                                    <td>{{$item->type->title}}</td>
                                                    <td>{{$item->notes_by_requester}}</td>
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
     var asking_table = $('#asking_table').DataTable( {
                            // sDom: 'lrtip',
                            // "bFilter": false,
                            fixedHeader:true,
                            paging:false,
                        });
$('#search_datatable_input').on( 'keyup', function () {
    asking_table.search( this.value ).draw();

});

        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path


            $('ul a').each(function () {
                if (this.href === path) {

                    $(".first_sidebar").hide();
                    $(".second_sidebar").show();
                    $('#afl_link').addClass("active");
                    $('#a1 span img').attr("src","/backend/img/theme/light/Attendnce-black.png");
                    $('#a2 span img').attr("src","/backend/img/theme/light/Holiday_black.png");
                    $('#afl_link span img').attr("src","/backend/img/theme/light/Leave_white.png");
                    $("#part_0").hide();
                    $("#item_1").hide();
                    $("#item_2").hide();
                    // $("#lead_generation_item").show();

                }
            });
        });
        $(".start").text("Start  Date");


        $('.date').datepicker({
            // format: "dd/mm/yyyy",
            autoclose: true,
        });

        $(function () {
            leaveToggle();
            typeToggole();
        });

        function leaveToggle() {
            $("#leave_date_duration_1").show();
            $("#leave_date_duration_2").hide();
            $(document).ready(function () {
                $(":checkbox").click(function (event) {
                    if ($('#multiHoliday').is(":checked")) {
                        // $("#singleHoliday").prop("checked", false);
                        $(".start").text("Leave Start Date");

                        $("#leave_date_duration_1").show();
                        $("#leave_date_duration_2").show();
                    }
                    else {
                        $(".start").text("Leave Date");
                        $("#leave_date_duration_1").show();
                        $("#leave_date_duration_2").hide();
                    }
                });


            });
        }

        function typeToggole() {

            // $("#notes_by_requesterDiv").show();
            // $("#notes_by_requesterDiv").hide();
            $("#documentDiv").hide();
            var Privileges = jQuery('#leaveId');
            var select = this.value;


            Privileges.change(function () {
                console.log($(this).val());
                if ($(this).val() == 2) {
                    // $("#notes_by_requesterDiv").show();
                    // $("#notes_by_requesterDiv").hide();
                    $("#documentDiv").show();
                }
                else {
                    // $("#notes_by_requesterDiv").show();
                    // $("#notes_by_requesterDiv").hide();
                    $("#documentDiv").hide();
                }
            });


        }


        var config = {
            routes: {
                ask_for_leave_store: "{!! route('ask-for-leave.store') !!}",
            }
        };


        $(document).on('submit', '#ask_for_leave_form', function (event) {
            event.preventDefault();
            $.ajax({
                url: config.routes.ask_for_leave_store,
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.success==true) {
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
                        var approve = "";
                        if ((data.item.is_approved) === 0) {

                            approve = "<i class=\"fa fa-times approval\" aria-hidden=\"true\"></i>";

                        } else {
                            // approve = $('.approval').attr("src", "/backend/img/theme/light/tick.png");
                            approve = "<i class=\"fa fa-check approval\" aria-hidden=\"true\"></i>";
                        }

                        var start = moment(data.item.start_date);
                        var end = moment(data.item.end_date);
                        var range = end.diff(start, 'days');
                        // console.log(data.item.start_date,data.item.end_date);
                        if (range < 1) {
                            range = 1;
                        } else {
                            range = end.diff(start, 'days');
                        }
                        var days = (range > 1) ? moment(data.item.start_date).format('Do') + "-" + moment(data.item.end_date).format('Do MMM') : moment(data.item.start_date).format('Do MMM');
                        var rowCount = $('#order-listing >tbody >tr').length + 1;
                        $('#companyappend').append(`<tr class="unqcompany` + data.item.id + `">




                <td>` + moment(data.item.start_date).format('Do MMM') + ` </td>
                <td>` + moment(data.item.end_date).format('Do MMM') + ` </td>
                  <td>` + range + ` </td>
                <td>` + data.item.type.title + ` </td>
                <td>` + data.item.notes_by_requester + ` </td>





            </tr>`);
                        toastr.success('Permission for leave has placed successfully');
                        setTimeout(function () {
                            $('#ask_for_leave_modal').modal('hide');
                        }, 1500);
                        $('#ask_for_leave_form').trigger('reset');

                    } else {
                        toastr.error('Asking for leave failed!');
                    }
                }
            })
        });
    </script>
@endsection
<!-- End custom js for this page-->