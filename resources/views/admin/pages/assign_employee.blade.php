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


    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Assign Employees</h1>
    </div>








    <!-- end of modal edit -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">

                <div style="position: relative" class="card-body">
                    <div class="row justify-content-between align-items-center mx-2 pt-4">

                    <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                        <div class="align-items-center m-4 d-inline-flex">
                            <label>
                                You Have <span id="number_of_un_assigned_emp">{{$number_of_unassigned_employee}}</span> unassigned employees
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
                                        <table id="assigned_posting_table" class="table holiday_table">
                                            {{--<table id="employee_list_table" class="table holiday_table">--}}
                                            {{--<thead id="holiday_head" >--}}
                                            <thead>

                                            <tr class="myTableHead">
                                                {{--<tr class="myHead">--}}
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>

                                            </thead>

                                            <tbody class="holiday_row" id="assign_emp_append">

                                            @if(empty($allUsers))
                                                <h2 class="text-danger text-center text-capitalize">Data does not
                                                    exist</h2>
                                            @else

                                                @foreach ($allUsers as $user)
                                                    <tr class="unqcompany{{$user->id}}">
                                                        <td>

                                                            <img id="logoTable" style="height: 50px; width: 50px;"
                                                                 src="{{asset('backend/img/user_photo/'.$user->photo)}}"
                                                                 alt="">

                                                        </td>
                                                        <td>{!! $user->first_name.' '.$user->middle_name.' '.$user->last_name!!}</td>
                                                        <td>{{$user->mobile_number}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>


                                                            <button type="button"
                                                                    data-serial="{{$loop->index + 1}}"
                                                                    class="btn btn-primary btn-round-sm btn-sm assign_btn editcompany commonbtn"
                                                                    data-id="{{$user->id}}" data-toggle="modal"
                                                                    data-target="#exampleModal">
{{--                                                                <img src="{{asset('backend/img/theme/light/assign.png')}}"--}}
{{--                                                                     alt="">--}}
                                                                Assign
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
        {{--<div class="modal-dialog modal-md" role="document">--}}
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="text-center font-weight-bolder" id="">Assign Employees</h5>
                <form method="post" name="assign_emp_form" id="assign_emp_form">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card-body text-center d-flex flex-column justify-content-center">
                                <div id="my_photo"></div>
                                {{--<div class="row">--}}
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="company_name">Name</label>
                                            <input id="company_name" class="form-control" name="company_name"
                                                   type="text"
                                                   readonly disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="Phone">Phone</label>
                                            <input id="phoneId" class="form-control" name="phoneName"
                                                   type="text" readonly disabled>
                                        </div>
                                    </div>


                                </div>


                                <div class="d-flex justify-content-center">
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="company_name">Email</label>
                                            <input id="emailId" class="form-control" name="emailName"
                                                   type="text"
                                                   readonly disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            {{--<input type="text" name="holiday_start_date" id="holiday_start_date"--}}
                                            {{--class="date form-control" data-provide="datepicker" required="" value=""--}}
                                            {{--placeholder="Enter Start date here..">--}}

                                            <input type="date" name="holiday_start_date" id="holiday_start_date"
                                                   class="date form-control"  required="" value=""
                                                   placeholder="Enter Start date here..">

                                        </div>
                                    </div>


                                </div>

                                <div class="d-flex justify-content-center">
                                    <div class="col-md-4">
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
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Department</label>

                                            <select name="deptName" id="deptId" class="form-control" style="">
                                                <option value="">Select Company First</option>
                                            </select>

                                        </div>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-center">

                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Sub Department</label>
                                            <select class="form-control" id="subDeptId" name="subDeptName">
                                                <option selected="selected" value="">Select Department First</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Designation</label>

                                            <select name="designationName" id="designationId" class="form-control" style="">
                                                <option  value="">Select Sub department First</option>
                                            </select>

                                        </div>
                                    </div>


                                </div>


                                <div class="d-flex justify-content-center">

                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input id="salaryId" class="form-control" name="salary_name"
                                                   type="text" placeholder="Enter salary"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="salary">Remarks</label>
                                            <input id="remarksId" class="form-control" name="remarks_name"
                                                   type="text" placeholder="Enter remarks">


                                        </div>
                                    </div>

                                </div>



                                <div class="">




                                </div>

                                <input type="hidden" id="id" name="id" class="form-control">
                                <input type="hidden" id="si" class="form-control">
                                {{--</div>--}}

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center d-flex flex-column justify-content-center">
                        <button type="submit" class="btn btn-primary sub_btn">Assign</button>
                        {{--<button type="button" style="background: lightgrey;color: white" class="btn btn-fw" data-dismiss="modal">Cancel</button>--}}
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
    <script src="{{asset('backend/vendors/jquery-validation/jquery.validate.min.js')}}"></script>



@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')

    <script type="text/javascript">


        var config = {
            routes: {
                assign_employee_store: "{!! route('assign-employee.store') !!}",
                assign_employee_edit: "{!! route('assign-employee.edit') !!}",

            }
        };

        var assigned_posting_table = $('#assigned_posting_table').DataTable( {
            "bPaginate": false,
            sDom: 'lrtip'
            // "bFilter": false,

        });
        $('#search_datatable_input').on( 'keyup', function () {
            assigned_posting_table.search( this.value ).draw();

        });


        $("#assign_emp_form").validate({
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
                designationName:{
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






        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

            console.log(path);
            $('ul a').each(function () {
                if (this.href === path) {
                    // console.log ($("a[href == path]").find('id'));
                    $("#employee_role_mng").addClass("active");
                    $("#assign_emp_roles").css({
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



        $(document).on('click', '.editcompany', function (e) {

            e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'edit';
            // console.log(id,si);
            $.ajax({
                url: config.routes.assign_employee_edit,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },

                success: function (data) {
                    // console.log(data);
                    $('#assign_emp_form').find('#company_name').val(data.user.first_name+" "+data.user.middle_name+" "+data.user.last_name);
                    $('#assign_emp_form').find('#phoneId').val(data.user.mobile_number);
                    $('#assign_emp_form').find('#emailId').val(data.user.email);
                    $('#assign_emp_form').find('#my_photo').html(data.photo);
                    $('#assign_emp_form').find('#id').val(id);
                    $('#assign_emp_form').find('#si').val(si);
                }
            });


        });

        $(document).on('submit', '#assign_emp_form', function (e) {
            e.preventDefault();
            var si = $('#assign_emp_form').find('#si').val();
            var id = $('#assign_emp_form').find('#id').val();
            var table = $('#assigned_posting_table').DataTable();
            var thisInstance=$(this);

            // console.log(id,si);
            $.ajax({
                url: config.routes.assign_employee_store,
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    table.row(thisInstance.parents('tr')).remove().draw();

                    console.log(data);
                    if (data.success == true) {
                        toastr.options = {
                            "debug": false, "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 2000,
                            "timeOut": 2000,
                            "extendedTimeOut": 2000
                        };
                        $("#assign_emp_append").html(data.table);
                        $("#number_of_un_assigned_emp").html(data.number_of_unassigned_employee);


                        toastr.success('Role has assigned successfully');
                        setTimeout(function () {
                            $('#exampleModal').modal('hide');
                        }, 1500);
                        $('#assign_emp_form').trigger('reset');
                    }
                    else{
                        toastr.error("Failed to store");
                    }
                }

            });
        });


    </script>


@endsection
<!-- End custom js for this page-->
