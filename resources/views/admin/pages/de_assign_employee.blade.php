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
    <link rel="stylesheet" href="{{asset('backend/css/add_button_search.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/custom_button.css')}}">

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

        #stop_btn_2 {
            border-radius: 10px;
            width: 100%;
            font-size: 12px;
            background: red;
        }

        /*.card-body {*/
            /*height: 750px;*/
        /*}*/

        /*#de_assign_table {*/
            /*min-height: 200px;*/
        /*}*/

        #form_div{
            position: relative;
            top: 50px;
        }

    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Deassign Employees</h1>
    </div>





    <!-- end of modal edit -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">

                <div style="position: relative" class="card-body">

                    {{--<button id="let_emp_btn" class=""--}}
                    {{--data-target="">--}}
                    {{--<a href="#" class="left_employee">--}}
                    {{--You Have {{$left}} assigned <span class="d-block mb-2 ">employees</span>--}}
                    {{--</a>--}}
                    {{--</button>--}}

                    <div class="row justify-content-between align-items-center mx-2 pt-4">

                        <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                            <div class="align-items-center m-4 d-inline-flex">
                                <label>
                                    @if($left =="")
                                        You have no assigned employees
                                    @else
                                        You Have <span id="number_of_un_assigned_emp">{{$left}}</span> assigned employee
                                    @endif


{{--                                    You Have <span id="number_of_un_assigned_emp">{{$left}}</span> assigned employees--}}
                                </label>
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
                                        <table id="de_assign_table" class="table holiday_table">

                                            <thead>

                                            <tr class="myTableHead">
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Actions</th>
                                            </tr>

                                            </thead>

                                            <tbody class="holiday_row" id="companyappend">

                                            @if(empty($items))
                                                <h2 class="text-danger text-center text-capitalize">Data does not
                                                    exist</h2>
                                            @else

                                                @foreach ($items as $item)
                                                    <tr class="unqcompany{{$item->id}}">
                                                        <td>

                                                            <img id="logoTable" style="height: 50px; width: 50px;"
                                                                 src="{{asset('backend/img/user_photo/'.$item->users->photo)}}"
                                                                 alt="">

                                                        </td>
                                                        <td>{!! $item->users->first_name.' '.$item->users->middle_name.' '.$item->users->last_name!!}</td>
                                                        {{--<td>{!! $roles !!}</td>--}}

                                                        <td>


                                                            <button type="button"
                                                                    data-serial="{{$loop->index + 1}}"
                                                                    class="btn btn-primary btn-round-sm btn-sm de_assign_btn deassign commonbtn"
                                                                    data-id="{{$item->user_id}}" data-toggle="modal"
                                                                    data-target="#exampleModal">
{{--                                                                <img src="{{asset('backend/img/theme/light/deassign.png')}}"--}}
{{--                                                                     alt="">--}}
                                                                Deassign
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" value="close_btn" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="text-center font-weight-bolder" id="">Assign Employees</h5>
                <div class="d-flex justify-content-center" id="my_photo"></div>

                {{--<div class="col-xl-12 mt-3 pb-2 " id="deassign_detail_table"></div>--}}
                <div class="col-xl-12 mt-3 pb-2 table-responsive" id="deassign_detail_table"></div>

                <div id="my_form" class="mt--100 ">

                    <form method="post" name="deassign_edit_form" id="deassign_edit_form">
                        @csrf
                        <div class="modal-body">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card-body text-center d-flex flex-column justify-content-center">


                                    <div id="form_div" class="container">
                                        <div class="d-flex justify-content-center row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="company_name">Name</label>
                                                    <input id="company_name" class="form-control" name="company_name"
                                                           type="text"
                                                           readonly disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="Phone">Phone</label>
                                                    <input id="phoneId" class="form-control" name="phoneName"
                                                           type="text" readonly disabled>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="d-flex justify-content-center row">
                                            <div class="col-md-4 float-left">
                                                <div class="form-group">
                                                    <label for="company_name">Email</label>
                                                    <input id="emailId" class="form-control" name="emailName"
                                                           type="text"
                                                           readonly disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-right">
                                                <div class="form-group">
                                                    <label for="start_date">Start Date</label>
                                                    {{--<input type="text" name="holiday_start_date" id="holiday_start_date"--}}
                                                    {{--class="date form-control" data-provide="datepicker" required=""--}}
                                                    {{--value=""--}}
                                                    {{--placeholder="Enter Start date here..">--}}
                                                    <input type="date" name="holiday_start_date" id="holiday_start_date"
                                                           class="form-control" data-provide="" required=""
                                                           value=""
                                                           placeholder="Enter Start date here..">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="d-flex justify-content-center row">
                                            <div class="col-md-4 float-left">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Company</label>
                                                    <select class="form-control" id="cmpId" name="cmpName">
                                                        <option selected="selected" value="">Select a Company</option>
                                                        @foreach($companies as $company)
                                                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-4 float-right">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Department</label>

                                                    <select name="deptName" id="deptId" class="form-control" style="">
                                                        <option value="">Select Company First</option>
                                                    </select>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-center row">

                                            <div class="col-md-4 float-left">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Sub Department</label>
                                                    <select class="form-control" id="subDeptId" name="subDeptName">
                                                        <option selected="selected" value="">Select Department First
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4 float-right">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Designation</label>

                                                    <select name="designationName" id="designationId"
                                                            class="form-control"
                                                            style="">
                                                        <option value="">Select Sub department First</option>
                                                    </select>

                                                </div>
                                            </div>


                                        </div>
                                        <div class="d-flex justify-content-center row">

                                            <div class="col-md-4 float-left">
                                                <div class="form-group">
                                                    <label for="salary">Salary</label>
                                                    <input id="salaryId" class="form-control" name="salary_name"
                                                           type="text" placeholder="Enter salary"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-right">
                                                <div class="form-group">
                                                    <label for="salary">Remarks</label>
                                                    <input id="remarksId" class="form-control" name="remarks_name"
                                                           type="text" placeholder="Enter remarks">


                                                </div>
                                            </div>

                                        </div>
                                        <div class=""></div>
                                    </div>
                                    <input type="hidden" id="id" name="id" class="form-control">
                                    <input type="hidden" id="si" class="form-control">


                                </div>
                                <div class="modal-footer text-center d-flex flex-column justify-content-center pt-3">
                                    <button type="submit" class="btn btn-primary sub_btn">Assign</button>

                                </div>
                            </div>
                        </div>
                    </form>


                </div>

                <div class="modal-footer text-center d-flex flex-column justify-content-center">

                    {{--<input type="button" class="btn btn-primary sub_btn show_hide" value="Show Form">--}}
                    <input type="button" id="show_hide_id" class="btn btn-primary sub_btn show_hide" value="Assign">


                </div>
                {{--<button>Call Red</button>--}}

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
    <script src="{{asset('backend/vendors/jquery-validation/jquery.validate.min.js')}}"></script>

@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')

    <script type="text/javascript">

        var de_assign_table = $('#de_assign_table').DataTable({
            sDom: 'lrtip',
            "paging": false,
            fixedHeader: true
        });
        $('#search_datatable_input').on('keyup', function () {
            de_assign_table.search(this.value).draw();

        });



        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

            console.log(path);
            $('ul a').each(function () {
                if (this.href === path) {
                    // console.log ($("a[href == path]").find('id'));
                    $("#employee_role_mng").addClass("active");
                    $("#deassign_emp_roles").css({
                        'font-family': 'Josefin Sans',
                        'font-style': 'normal',
                        'font-weight': 'bold',
                        'font-size': '13px',
                        'line-height': '12px',
                        'color': 'black',
                        'text-shadow': '0px 4px 4px rgba(0, 0, 0, 0.25)'
                    });
                    $("#employee_role_mng").find('i').toggleClass('fas fa-plus fas fa-minus');
                    $("#mng_emp_roles").find('i').toggleClass('fa fa-angle-right fa fa-angle-down');
                    $("#emp_role_mng_dropdown").css("display", "block");
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

        jQuery(document).ready(function () {
            jQuery('select[name="cmpName"]').on('change', function () {
                var countryID = jQuery(this).val();
                if (countryID) {
                    jQuery.ajax({
                        url: 'sub-department/getDepartments/' + countryID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            // console.log(data);
                            jQuery('select[name="deptName"]').empty();
                            $('select[name="deptName"]').append('<option value="" selected>Now Select Department</option>');
                            jQuery.each(data, function (key, value) {
                                // $('select[name="deptName"]').append('<option value="' + key + '">' + value + '</option>');
                                $('select[name="deptName"]').append(
                                    '<option value="' + value.id + '">' + value.department_name + '</option>');
                            });
                        }
                    });
                }
                else {
                    $('select[name="deptName"]').empty();
                }
            });
        });


        jQuery(document).ready(function () {
            jQuery('select[name="deptName"]').on('change', function () {
                var countryID = jQuery(this).val();
                if (countryID) {
                    jQuery.ajax({
                        url: 'designation/getSubDepartments/' + countryID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            // console.log(data);
                            jQuery('select[name="subDeptName"]').empty();
                            $('select[name="subDeptName"]').append('<option value="" selected>Now Select Sub Department</option>');
                            jQuery.each(data, function (key, value) {
                                // $('select[name="deptName"]').append('<option value="' + key + '">' + value + '</option>');
                                $('select[name="subDeptName"]').append('<option value="' + value.id + '">' + value.sub_department_name + '</option>');
                            });
                        }
                    });
                }
                else {
                    $('select[name="subDeptName"]').empty();
                }
            });
        });


        jQuery(document).ready(function () {
            jQuery('select[name="subDeptName"]').on('change', function () {
                var countryID = jQuery(this).val();
                if (countryID) {
                    jQuery.ajax({
                        url: 'assign-employee/getDesignations/' + countryID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            jQuery('select[name="designationName"]').empty();
                            $('select[name="designationName"]').append('<option value="" selected>Now Select Designation</option>');
                            jQuery.each(data, function (key, value) {
                                // $('select[name="deptName"]').append('<option value="' + key + '">' + value + '</option>');
                                $('select[name="designationName"]').append('<option value="' + value.id + '">' + value.designation_name + '</option>');
                            });
                        }
                    });
                }
                else {
                    $('select[name="designationName"]').empty();
                }
            });
        });


        $("#deassign_edit_form").validate({
            rules: {
                cmpName: {
                    required: true,

                },

                deptName: {
                    required: true,
                },

                subDeptName: {
                    required: true,
                },

                designationName: {
                    required: true,

                },
                salary_name: {
                    required: true,
                    number: true,
                },
            },
            messages: {

                cmpName: {
                    required: "Please Select Company",
                },
                deptName: {
                    required: "Please Select Department",
                },
                subDeptName: {
                    required: "Please Select Sub Department",
                },
                designationName: {
                    required: "Please select designation",
                },
                pro_frequency_name: {
                    required: "Please enter a frequency",
                },
                salary_name: {
                    required: "Please enter salary",
                },

            },
            errorPlacement: function (label, element) {
                label.addClass('mt-2 text-danger');
                label.insertAfter(element);
            },
            highlight: function (element, errorClass) {
                $(element).parent().addClass('has-danger')
                $(element).addClass('form-control-danger')
            }
        });


        var config = {
            routes: {

                de_assign_employee_edit: "{!! route('de-assign-employee.edit') !!}",
                de_assign_employee_store: "{!! route('de-assign-employee.store') !!}",
                de_assign_employee_stop: "{!! route('de-assign-employee.stop') !!}",
            }
        };

        $(document).on('click', '.deletecompany', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
            var type = 'show';
            // alert(id);
            if (confirm('Are You Sure you want to stop this role?')) {
                $.ajax({
                    url: config.routes.de_assign_employee_stop,
                    type: "get",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        console.log(data);
                        toastr.success('Role has stopped successfully');
                        tr.fadeOut(1000, function () {
                            $(this).remove();
                        });
                        // $(this).closest('tr').hide();
                        // location.reload();
                        // setTimeout(function () {
                        //     $('#exampleModal').modal('hide');
                        // }, 1500);
                        // $('#deassign_edit_form').trigger('reset');
                        $('#deassign_edit_form').find('#cmpId').val('');
                        $('#deassign_edit_form').find('#deptId').val('');
                        $('#deassign_edit_form').find('#subDeptId').val('');
                        $('#deassign_edit_form').find('#designationId').val('');
                        $('#deassign_edit_form').find('#salaryId').val('');
                        $('#deassign_edit_form').find('#remarksId').val('');
                        $('#deassign_edit_form').find('#holiday_start_date').val('');
                    }
                });
            }
        });


        $(document).ready(function () {
            $('div#my_form').hide();// hide it initially
            // $('.show_hide').on('click', function () {
            $('#show_hide_id').on('click', function () {

                $('div#my_form, div#deassign_detail_table').toggle();
                $(this).val($(this).val() == 'Show Posting' ? 'Assign' : 'Show Posting');

            });

            $('.close').on('click', function () {

                // $('div#my_form, div#deassign_detail_table').toggle('div#my_form, div#deassign_detail_table');

                var btn_value = $("#show_hide_id").val();

                console.log(btn_value);
                if(btn_value== "Show Posting"){
                    // $('.show_hide').val('Assign');
                    $('#show_hide_id').val('Assign');
                    $("#deassign_detail_table").show();
                    $("#my_form").hide();
                    // $('.show_hide').val('Assign');


                }else{
                    // $('.show_hide').val('Show Posting');
                    // $('.show_hide').val('Assign');
                    $('#show_hide_id').val('Assign');
                    $("#deassign_detail_table").show();
                    $("#my_form").hide();


                }

            });
        });



            $(document).on('click', '.deassign', function (e) {

                e.preventDefault();
                var id = $(this).data('id');
                var si = $(this).data('serial');
                var type = 'edit';
                console.log(id, si);
                $.ajax({
                    url: config.routes.de_assign_employee_edit,
                    type: "get",
                    data: {
                        id: id,
                        type: type,
                    },

                    success: function (data) {
                        // alert(data);
                        $('#deassign_edit_form').find('#company_name').val(data.user.first_name + " " + data.user.middle_name + " " + data.user.last_name);
                        $('#deassign_edit_form').find('#phoneId').val(data.user.mobile_number);
                        $('#deassign_edit_form').find('#emailId').val(data.user.email);
                        $('#my_photo').html(data.photo);
                        $('#deassign_detail_table').html(data.table);

                        // $('div#my_form').hide();// hide it initially
                        // $('.show_hide').on('click', function () {
                        //
                        //     $('div#my_form, div#deassign_detail_table').toggle();
                        //     $(this).val($(this).val() == 'Show Posting' ? 'Assign' : 'Show Posting');
                        // });

                        $('#deassign_edit_form').find('#id').val(id);
                        $('#deassign_edit_form').find('#si').val(si);
                    }
                });


            });





        $(document).on('submit', '#deassign_edit_form', function (e) {
            e.preventDefault();
            var si = $('#deassign_edit_form').find('#si').val();
            var id = $('#deassign_edit_form').find('#id').val();
            // var id = $(this).data('id');
            var tr = $(this).closest('tr');

            // console.log(id,si);
            $.ajax({
                url: config.routes.de_assign_employee_store,
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

                        // $("#companyappend").html(data.table);
                        $("#deassign_detail_table").html(data.table);


                        toastr.success('Role has assigned successfully');
                        // location.reload();
                    } else {
                        alert("Failed to store,because already assigned in this post");
                        // location.reload();
                    }
                    // setTimeout(function () {
                    //     $('#exampleModal').modal('hide');
                    // }, 1500);
                    // $('#deassign_edit_form').trigger('reset');
                    $('#deassign_edit_form').find('#cmpId').val('');
                    $('#deassign_edit_form').find('#deptId').val('');
                    $('#deassign_edit_form').find('#subDeptId').val('');
                    $('#deassign_edit_form').find('#designationId').val('');
                    $('#deassign_edit_form').find('#salaryId').val('');
                    $('#deassign_edit_form').find('#remarksId').val('');
                    $('#deassign_edit_form').find('#holiday_start_date').val('');

                }

            });
        });


    </script>


@endsection
<!-- End custom js for this page-->
