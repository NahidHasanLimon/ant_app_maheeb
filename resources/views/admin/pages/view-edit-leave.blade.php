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
    <link rel="stylesheet" href="{{asset('backend/css/add_button_search.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/custom_button.css')}}">
    <style>

        table th:first-child{
            border-radius:10px 0 0 10px;

        }

        table th:last-child{
            border-radius:0 10px 10px 0;

        }

    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Manage Leaves</h1>
        <p>View/Edit Leave</p>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">

                     <div class="row justify-content-between align-items-center mx-3 pt-4">
                          <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                            <div class="align-items-center m-4 d-inline-flex">
                            <a href="#" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#add_leave_modal">
                                    <i class="fas fa-plus">
                                        <span class="btn_txt"> Add Leaves</span>
                                        </i>
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
                <div style="position: relative" class="card-body">



                    <div style="border: none" class="card mt-n3">
                        <div class="card-title">
                            <div class="preview">
                            </div>
                        </div>
                        <div class="test"></div>
                        <div class="card-body">
                            <div id="maheeb" class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="leave_table" class="table holiday_table">
                                            {{--<thead id="holiday_head" >--}}
                                            <thead>

                                            <tr class="myTableHead">
                                                {{--<tr class="myHead">--}}

                                                <th>Name</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Type</th>
                                                <th>Duration</th>
                                                <th>Approval</th>
                                                <th>Activity</th>
                                            </tr>

                                            </thead>
                                            <tbody class="holiday_row" id="companyappend">
                                                @foreach ($items as $item)
                                                    <tr class="unqcompany{{$item->id}}">

                                                    <td>{{$item->users->full_name}}</td>
                                                    <td>{{$item->StartDate_Human2}}</td>
                                                    <td>{{$item->EndDate_Human2}}</td>
                                                    <td>{{$item->type->title}}</td>
                                                    <td>{{$item->Duration_Human }}</td>
                                                        <td>
                                                            @if($item->is_approved_superadmin==0)
                                                                <i class="fa fa-times approval" aria-hidden="true"></i>
                                                            @else
                                                                <i class="fa fa-check approval" aria-hidden="true"></i>
                                                            @endif

                                                        </td>

                                                        <td>
{{--                                                            <div class="btn-group" role="group" aria-label="...">--}}
                                                            <div class="" role="" aria-label="...">
                                                          <button type="button" data-toggle="modal" data-target="#leave_view_modal" class="btn view_btn viewLeave" data-id="{{$item->id}}">

{{--                                                            <img src="{{asset("../backend/img/theme/light/view_eye_s.PNG")}}"--}}
{{--                                                                     alt="view eye">--}}
                                                              <i class="fa fa-eye"></i>
                                                          </button>
                                                          <button type="button" class="btn edit_btn editLeave" data-id="{{$item->id}}">
                                                              <i class="fa fa-pencil"></i>
                                                          </button>
                                                          <button type="button" class="btn decline_btn deleteLeave" data-id="{{$item->id}}">
{{--                                                                <img src="{{asset("../backend/img/theme/light/cross.png")}}"--}}
{{--                                                                     alt="delete">--}}
                                                              <i class="fa fa-times"></i>
                                                          </button>
                                                        </div>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            {{--@endif--}}
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
    <div class="modal fade" id="add_leave_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <h5 class="text-center font-weight-bolder" id="">Add Leave</h5>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- create / add submit form -->
                                    <form method="post" name="add_leave_form" id="add_leave_form">
                                        @csrf
                                        <fieldset>

                                            <div id="requested_user_div" class="form-group">

                                                <label class="" for="requested_user_id">Select an Employee </label>

                                                <select class="form-control" id="requested_user_id" name="requested_user_id" required>
                                                    <option value="">Select an employee</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}">{{$user->full_name}}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                            <div id="leave_date_duration_1_div" class="form-group">

                                                <label class="start" for="">Leave Start Date: </label>

                                                <input type="date" name="leave_start_date" id="leave_start_date"
                                                       class="date form-control"  required=""
                                                       value="" placeholder="Enter date here..">

                                            </div>
                                            <div id="leave_date_duration_2_div" class="form-group">

                                                <label class="end" for="holidayDate">Leave End Date: </label>
                                                <input type="date" name="leave_end_date" id="leave_end_date"
                                                       class="form-control"  value=""
                                                       placeholder="Enter date here.." novalidate>

                                            </div>

                                            <input type="checkbox" id="multiHoliday" name="multiHoliday" value="1">
                                            <label for="vehicle2"> Multiple Days</label><br>

                                            <div id="typeDiv" class="form-group">
                                                <label for="exampleFormControlSelect1">Type</label>
                                                <select class="form-control" id="leaveType" name="leaveType" required>
                                                    <option selected="selected" value="">Select a type</option>
                                                    @foreach($leaveTypes as $leaveType)
                                                        <option name="leaveType" id="leaveType"
                                                                value="{{$leaveType->id}}">{{$leaveType->title}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>





                                            <div id="notes_by_requesterDiv" class="form-group">

                                                <label class="notes_by_requester" for="notes_by_requester">Notes </label>
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


    <div class="modal fade" id="edit_leave_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h5 class="modal-title" id="exampleModalLabel">Edit Leave</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="text-center font-weight-bolder" id="">Edit Leaves</h5>
                <form method="post" name="leave_edit_form" id="leave_edit_form">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Employee Name</label>
                                    <select class="form-control" id="requested_user_id_edit" name="requested_user_id" required>
                                        <option selected="selected" value="">Select an Employee</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->full_Name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div id="leave_start_date_div" class="form-group">

                                    <label class="start" for="">Leave Start Date: </label>

                                    <input type="date" name="leave_start_date" id="leave_start_date_edit" format="dd/MM/yyyy"
                                           class=" form-control"  required="" value=""
                                           placeholder="Enter date here..">


                                </div>
                                <div id="leave_end_date_div" class="form-group">

                                    <label class="end" for="holidayDate">Leave End Date: </label>
                                    <input type="date" name="leave_end_date" id="leave_end_date_edit"
                                           class=" form-control"  value=""
                                           placeholder="Enter date here.." novalidate>

                                </div>

                                <input type="checkbox" id="is_multiholiday_edit" name="is_multiholiday_edit" value="1">
                                <label for="vehicle2"> Multiple Days</label><br>
                                <div id="holiday_type" class="form-group">
                                    <label for="exampleFormControlSelect1">Leave Type</label>
                                    <select class="form-control" id="leaveType_edit" name="leaveType" required>
                                        <option selected="selected" value="">Select a type</option>
                                        @foreach($leaveTypes as $leaveType)
                                            <option value="{{$leaveType->id}}">{{$leaveType->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea id="notes_by_requester_edit" class="form-control" name="notes_by_requester"
                                              placeholder="Enter Notes"></textarea>
                                </div>
                                <input type="hidden" id="id" name="id" class="form-control">
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
    {{-- start of view modal --}}
    <div id="leave_view_modal" class="modal fade" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title mx-auto">
                        <h4 class="display-4" id="exampleModalLabel">Leave
                            Details</h4>
                    </div>

                </div>
                <div id="leave_view_modal_body" class="modal-body">
                    <div class="row align-items-center ">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <label class="text-center">Employee</label>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <label class="form-control text-bold" id="requester_user_name_view_modal"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <label class="text-center">Date</label>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <label class="form-control text-bold h-100 d-inline-block" id="">
                                        <span class="d-block" id="start_date_leave_view_modal"></span>
                                        <span class="d-block" id="end_date_leave_view_modal"></span>
                                    </label>
                                    {{-- <label class="form-control text-bold" id="end_date_leave_view_modal"></label> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <label class="text-center">Duratrion</label>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <label class="form-control text-bold" id="duration_leave_view_modal"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <label class="text-center">Leave Type</label>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <label class="form-control text-bold" id="leave_type_leave_view_modal"></label>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 mx-auto">
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <label class="text-center">Approved by</label>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <label class="form-control text-bold" id="approved_by_leave_view_modal"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mx-auto">
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <label class="text-center">Notes</label>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <label class="form-control text-bold" id="notes_leave_view_modal"></label>
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
    {{-- end of view modal --}}
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
         $(document).ready(function() {

                var leave_table = $('#leave_table').DataTable( {
                                        "bPaginate": false,
                                        sDom: 'lrtip'
                                    // "bFilter": false,
                                });
                            });
  $('#search_datatable_input').on( 'keyup', function () {
            leave_table.search( this.value ).draw();

        });


        // $(".start").text("Leave  Date");
        // $('.date').datepicker({
        //     // format: "dd/mm/yyyy",
        //     autoclose: true,
        // });

        var config = {
            routes: {
                leave_store: "{!! route('leave.store') !!}",
                leave_delete: "{!! route('leave.destroy') !!}",
                leave_detail: "{!! route('leave.detail') !!}",
                leave_update: "{!! route('leave.update') !!}",
                leave_show: "{!! route('leave.show') !!}",

            }
        };


         jQuery(function ($) {
             var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

             console.log(path);
             $('ul a').each(function () {
                 if (this.href === path) {

                     $("#btn_1").addClass("active");
                     $("#view_edit_leave").css({
                         'font-family': 'Josefin Sans',
                         'font-style': 'normal',
                         'font-weight': 'bold',
                         'font-size': '13px',
                         'line-height': '12px',
                         'color': 'black',
                         'text-shadow': '0px 4px 4px rgba(0, 0, 0, 0.25)'
                     });
                     $("#btn_1").find('i').toggleClass('fas fa-plus fas fa-minus');
                     $("#parent_1").find('i').toggleClass('fa fa-angle-right fa fa-angle-down');
                     $('#attendnace_dropdown').hide();
                     // $(".my_sidenav_dropdown").attr("src","../../backend/img/theme/light/add_minus.png");

                     $("#dropdown_1").css("display", "block");
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




       $(document).on('submit', '#add_leave_form', function (event) {
            event.preventDefault();
            $.ajax({
                url: config.routes.leave_store,
                method: "post",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
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
                        var approve = "";
                        if ((data.item.is_approved_superadmin) === 0) {
                            approve = "<i class=\"fa fa-times approval\" aria-hidden=\"true\"></i>";
                        } else {
                            approve = "<i class=\"fa fa-check approval\" aria-hidden=\"true\"></i>";
                        }

                        var rowCount = $('#leave_table >tbody >tr').length + 1;
                        $('#companyappend').append(`<tr class="unqcompany` + data.item.id + `">
                <td>` + data.item.users.first_name + data.item.users.middle_name +data.item.users.last_name+` </td>
                <td>` +data.item.StartDate_Human2 + ` </td>
                <td>` +data.item.EndDate_Human2 + ` </td>
                <td>` +data.item.type.title + ` </td>
                <td>` + data.item.Duration_Human + ` </td>
                <td>` + approve + ` </td>


<td>

                 <div class="" role="" aria-label="...">
                                                          <button type="button" class="btn view_btn viewLeave" data-toggle="modal" data-target="#leave_view_modal" data-id="` +  data.item.id + `">
                                                             <i class="fa fa-eye"></i>
                                                                 </button>
                                                          <button type="button" class="btn edit_btn editLeave" data-id="` +  data.item.id + `">
                                                          <i class="fa fa-pencil"></i>
                                                                 </button>
                                                          <button type="button" class="btn decline_btn deleteLeave" data-id="` +  data.item.id + `">
                                                              <i class="fa fa-times"></i>
                                                                 </button>
                                                        </div>
            </td>

            </tr>`);
                        toastr.success('Leave placed successfully');
                        setTimeout(function () {
                            $('#add_leave_modal').modal('hide');
                        }, 1500);
                        $('#add_leave_form').trigger('reset');

                    } else {
                        toastr.error('Failed to Save');
                    }
                }
            });
        });
         $(document).on('click', '.deleteLeave', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
             var table = $('#leave_table').DataTable();
            var thisInstance=$(this);
            if (confirm('Are you sure, you want to delete ?')) {
                $.ajax({
                    url: config.routes.leave_delete,
                    // type: "get",
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        console.log(data);
                        if(data.success==true){
                        toastr.success('Leave was deleted successfully');
                        table.row(thisInstance.parents('tr')).remove().draw();
                    }else{
                        toastr.error('Failed to Approve');

                    }
                    }
                });
            }
        });
          $(document).ready(function () {
                $(":checkbox").click(function (event) {
                    if ($('#is_multiholiday_edit').is(":checked")) {
                        // $("#singleHoliday").prop("checked", false);
                        $(".start").text("Leave Start Date");

                        $("#leave_start_date_div").show();
                        $("#leave_end_date_div").show();
                    }
                    else {
                        $(".start").text("Leave Date");
                        $("#leave_start_date_div").show();
                        $("#leave_end_date_div").hide();
                    }
                });
            });

        $(document).on('click', '.editLeave', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                // url: config.routes.leave_show,
                url: config.routes.leave_detail,
                type: "get",
                data: {
                    id: id,
                },

                success: function (data) {
                    $('#edit_leave_modal').modal('show');
                    $('#leave_edit_form').find('#requested_user_id_edit').val(data.user.id);
                    $('#leave_edit_form').find('#notes_by_requester_edit').val(data.leave.notes_by_requester);
                    $('#leave_edit_form').find('#leave_start_date_edit').val(data.leave.StartDate_Datepicker);
                    $('#leave_edit_form').find('#leave_end_date_edit').val(data.leave.EndDate_Datepicker);
                    // if(data.type.id==2){
                    //     document
                    // }
                    $('#leave_edit_form').find('#leaveType_edit').val(data.type.id);

                    let x = data.leave.start_date;
                    let y = data.leave.end_date;

                    if (x != y) {
                        $('#is_multiholiday_edit').prop('checked', true);
                        $(".start").text("Leave Start Date");

                        $("#leave_start_date_div").show();
                        $("#leave_end_date_div").show();
                    } else {
                        // console.log(' equal')
                        $('#is_multiholiday_edit').prop('checked', false)
                        $(".start").text("Leave Date");
                        $("#leave_start_date_div").show();
                        $("#leave_end_date_div").hide();
                    }
                    $('#leave_edit_form').find('#id').val(id);
                }
            });

        });
          $(document).on('click', '.viewLeave', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: config.routes.leave_show,
                type: "get",
                data: {
                    id: id,
                },

                success: function (data) {
                    if(data.success==true){
                    $('#leave_view_modal').modal('show');
                    $('#notes_leave_view_modal').text(data.leave.notes_by_requester);
                    $('#duration_leave_view_modal').text(data.leave.Duration_Human+' days');
                    $('#leave_type_leave_view_modal').text(data.leave.type.title);
                    $('#start_date_leave_view_modal').text(data.leave.StartDate_Human2);
                    if(data.leave.StartDate_Human2!=data.leave.EndDate_Human2){

                        $('#end_date_leave_view_modal').text(data.leave.EndDate_Human2);
                    }
                    $('#requester_user_name_view_modal').text(data.leave.users.first_name+' ' + data.leave.users.middle_name+' '+ data.leave.users.last_name);
                    if(data.leave.is_approved_superadmin!=0){
                     $('#approved_by_leave_view_modal').text(data.leave.approving_superadmin.first_name+' ' + data.leave.approving_superadmin.middle_name+' '+ data.leave.approving_superadmin.last_name);
                    }else{
                        $('#approved_by_leave_view_modal').text('Not Approved Yet');
                    }
                }else{
                    toastr.error('Failed to find Leave');
                    $('#leave_view_modal_body').html('empty');
                }
            }});

        });
        $(document).on('submit', '#leave_edit_form', function (e) {
            e.preventDefault();
            var si = $('#leave_edit_form').find('#si').val();
            $.ajax({
                url: config.routes.leave_update,
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if(data.success==true){
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
                    var approve = "";
                    if ((data.item.is_approved_superadmin) === 0) {

                        approve = "<i class=\"fa fa-times approval\" aria-hidden=\"true\"></i>";

                    } else {
                        // approve = $('.approval').attr("src", "/backend/img/theme/light/tick.png");
                        approve = "<i class=\"fa fa-check approval\" aria-hidden=\"true\"></i>";
                    }



                    var rowCount = $('#leave_table >tbody >tr').length + 1;
                    // alert(data.item.users.first_name);
                    $('.unqcompany' + data.item.id).replaceWith(`<tr class="unqcompany` + data.item.id + `">

                <td>` + data.item.users.first_name + data.item.users.middle_name+data.item.users.last_name+` </td>
                <td>` +data.item.StartDate_Human2 + ` </td>
                <td>` +data.item.EndDate_Human2 + ` </td>
                <td>` +data.item.type.title + ` </td>
                <td>` + data.item.Duration_Human + ` </td>
                <td>` + approve + ` </td>
<td>

                  <div class="" role="" aria-label="...">
                                                          <button type="button" class="btn view_btn viewLeave" data-toggle="modal" data-target="#leave_view_modal" data-id="` +  data.item.id + `">
                                                           <i class="fa fa-eye"></i>
                                                                 </button>
                                                          <button type="button" class="btn edit_btn  editLeave" data-id="` +  data.item.id + `">
                                                          <i class="fa fa-pencil"></i>
                                                                 </button>
                                                          <button type="button" class="btn decline_btn deleteLeave" data-id="` +  data.item.id + `">
                                                               <i class="fa fa-times"></i>
                                                                 </button>
                                                        </div>
            </td>

            </tr>`);
                    toastr.success('Infromation Updated successfully');
                    setTimeout(function () {
                        $('#exampleModal').modal('hide');
                    }, 1500);
                    $('#leave_edit_form').trigger('reset');
                }else{
                  toastr.error('Failed to update');
                }
                //
                }

            });
        });

 $(function () {
            leaveToggle();
        });
$('#add_leave_modal').on('hidden.bs.modal', function () {
    //
});

         function leaveToggle() {
            $("#leave_date_duration_1_div").show();
            $("#leave_date_duration_2_div").hide();
                $(":checkbox").click(function (event) {
                    if ($('#multiHoliday').is(":checked")) {
                        $(".start").text("Leave Start Date");

                        $("#leave_date_duration_1_div").show();
                        $("#leave_date_duration_2_div").show();
                    }
                    else {
                        $(".start").text("Leave Date");
                        $("#leave_date_duration_1_div").show();
                        $("#leave_date_duration_2_div").hide();
                    }
                });
        }
    </script>
@endsection
<!-- End custom js for this page-->
