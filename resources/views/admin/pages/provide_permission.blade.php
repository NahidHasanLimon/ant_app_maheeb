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

        table th:first-child {
            border-radius: 10px 0 0 10px;

        }

        table th:last-child {
            border-radius: 0 10px 10px 0;

        }

        .myTableHead {
            text-align: center;
        }

        .holiday_row {
            text-align: center;
        }

        .card {
            border: none
        }

        .card-body {
            position: relative
        }
    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Provide Permission</h1>
    </div>


    <!-- end of modal edit -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">
                <div class="row justify-content-between align-items-center mx-2 pt-4">
                    <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                        <div class="align-items-center m-4 d-inline-flex">
                            <a class="btn btn-primary btn-sm add_btn" href="" data-toggle="modal"
                               data-target="#add_permission_modal" id="add_company_btn">
                                <i class="fa fa-plus">Add Permission</i>
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
                <div class="card-body">


                    <div class="card mt-n3">
                        <div class="card-title">
                            <div class="preview">
                            </div>
                        </div>
                        <div class="test"></div>
                        <div class="card-body">
                            <div id="maheeb" class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="provide_permission_table" class="table sub_department_table">

                                            <thead>

                                            <tr class="myTableHead">
                                                <th>Name</th>
                                                <th>Role</th>

                                                <th>Activity</th>
                                            </tr>

                                            </thead>
                                            <tbody class="holiday_row" id="companyappend">

                                            @if(empty($items))
                                                <h2 class="text-danger text-center text-capitalize">Data does not
                                                    exist</h2>
                                            @else

                                                @foreach ($items as $item)
                                                    <tr class="unqcompany{{$item->model_id}}">
                                                        <td>{{$item->users->full_name}}</td>
                                                        <td>{{$item->roles->name}}</td>
{{--                                                        <td>{{ $item->category->project_category_name ?? 'no category' }}</td>--}}

                                                        <td>
                                                            <button type="button"
                                                                    data-serial="{{$loop->index + 1}}"
                                                                    class="btn edit_btn edit_permission commonbtn"
                                                                    data-id="{{$item->model_id}}" data-toggle="modal"
                                                                    data-target="#exampleModal">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                            <button type="button" data-id="{{$item->model_id}}"
                                                                    class="btn delete_btn delete_permission commonbtn">
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

    <div class="modal fade" id="add_permission_modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
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
                                <h5 class="text-center font-weight-bolder" id="">Add Role</h5>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- create / add submit form -->
                                    <form method="post" name="add_sub_cat_form" id="add_sub_cat_form">
                                        @csrf
                                        <fieldset>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Employee</label>
                                                <select class="form-control" id="user_id" name="user_name">
                                                    <option selected="selected" value="">Select an employee</option>
                                                    @foreach($users as $user)
                                                        <option
                                                            value="{{$user->id}}">{{$user->full_name}}</option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Role</label>
                                                <select class="form-control" id="role_id" name="role_name">
                                                    <option selected="selected" value="">Select a role</option>
                                                    @foreach($roles as $role)
                                                        <option
                                                            value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>


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
                <h5 class="text-center font-weight-bolder" id="">Edit Role</h5>
                <form method="post" name="sub_cat_edit_form" id="sub_cat_edit_form">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card-body text-center d-flex flex-column justify-content-center">


                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Employee</label>
                                    <select class="form-control" id="user_id" name="user_name">
                                        <option selected="selected">Select an employee</option>
                                        @foreach($users as $user)
                                            <option
                                                value="{{$user->id}}">{{$user->full_name}}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Role</label>
                                    <select class="form-control" id="role_id" name="role_name">
                                        <option selected="selected">Select a role</option>
                                        @foreach($roles as $role)
                                            <option
                                                value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>


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
    <script src="{{asset('backend/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('backend/js/select2.js')}}"></script>
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
        var provide_permission_table = $('#provide_permission_table').DataTable({
            sDom: 'lrtip',
            "paging": false,
            fixedHeader: true
        });
        $('#search_datatable_input').on('keyup', function () {
            provide_permission_table.search(this.value).draw();

        });


        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path


            $('ul a').each(function () {
                if (this.href === path) {
                    $("#project_management_structure_btn").addClass("active");
                    $("#manage_project_sub_category").css({
                        'font-family': 'Josefin Sans',
                        'font-style': 'normal',
                        'font-weight': 'bold',
                        'font-size': '13px',
                        'line-height': '12px',
                        'color': 'black',
                        'text-shadow': '0px 4px 4px rgba(0, 0, 0, 0.25)'
                    });
                    $("#project_management_structure_btn").find('i').toggleClass('fas fa-plus fas fa-minus');
                    $("#parent_pro_structure").find('i').toggleClass('fa fa-angle-right fa fa-angle-down');
                    $('#mng_pro_dropdown').hide();
                    $("#project_management_dropdown").css("display", "block");
                    $(".first_sidebar").hide();
                    $(".second_sidebar").show();

                    $('#project_management_link span img').attr("src", "/backend/img/theme/light/Project_white.png");

                    $('#project_management_link').addClass("active");

                    $("#project_management_item").show();

                }
            });
        });


        var config = {
            routes: {
                provide_permission_store: "{!! route('provide-permission.post') !!}",
                provide_permission_delete: "{!! route('provide-permission.delete') !!}",
                provide_permission_detail: "{!! route('provide-permission.detail') !!}",
                provide_permission_update: "{!! route('provide-permission.update') !!}",

            }
        };

        $("#add_sub_cat_form").validate({
            rules: {
                user_name: {
                    required: true,
                },
                role_name: {
                    required: true,
                },


            },
            messages: {
                role_name: {
                    required:  "Please Select Role",
                },
                user_name: {
                    required: "Please Select Employee",
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


        $("#sub_cat_edit_form").validate({
            rules: {
                user_name: {
                    required: true,
                },
                role_name: {
                    required: true,
                },


            },
            messages: {
                role_name: {
                    required: "Please Select Role",
                },
                user_name: {
                    required: "Please Select Employee",
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


        $(document).on('submit', '#add_sub_cat_form', function (event) {
            event.preventDefault();
            $.ajax({
                url: config.routes.provide_permission_store,
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


                        var rowCount = $('#provide_permission_table >tbody >tr').length + 1;
                        $('#companyappend').append(`<tr class="unqcompany` + data.item.model_id + `">
                <td>` + data.item.users.first_name + ` </td>
                <td>` + data.item.roles.name + `</td>

<td>
                 <button type="button" class="btn edit_btn edit_permission commonbtn" data-toggle="modal"

                 data-id="` + data.item.model_id + `"
                 data-target="#exampleModal">
                   <i class="fa fa-pencil"></i>
                 </button>
                <button type="button" class="btn delete_btn delete_permission commonbtn"
                data-id="` + data.item.model_id + `"
                >
                   <i class="fa fa-trash"></i>
                </button>
            </td>

            </tr>`);

                        toastr.success('Information was Created successfully');
                        setTimeout(function () {
                            $('#add_permission_modal').modal('hide');
                        }, 1500);
                        $('#add_sub_cat_form').trigger('reset');

                    } else {
                        toastr.error("Failed to store");
                    }
                }
            })
        });
        $(document).on('click', '.delete_permission', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
            var type = 'show';
            // alert(id);
            if (confirm('Are You Sure to Delete ?')) {
                $.ajax({
                    url: config.routes.provide_permission_delete,
                    type: "get",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        console.log(data);
                        toastr.success('Information was Deleted successfully');
                        tr.fadeOut(1000, function () {
                            $(this).remove();
                        });
                    }
                });
            }
        });

        $(document).on('click', '.edit_permission', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'edit';
            // console.log(id,si);

            $.ajax({
                url: config.routes.provide_permission_detail,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },

                success: function (data) {
                    // console.log(data.subDept.sub_department_name);
                    $('#sub_cat_edit_form').find('#user_id').val(data.employee_id.id);
                    $('#sub_cat_edit_form').find('#role_id').val(data.role_name.id);
                    $('#sub_cat_edit_form').find('#id').val(id);
                    $('#sub_cat_edit_form').find('#si').val(si);
                }
            });


        });
        $(document).on('submit', '#sub_cat_edit_form', function (e) {
            e.preventDefault();
            var si = $('#sub_cat_edit_form').find('#si').val();
            $.ajax({
                url: config.routes.provide_permission_update,
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


                        var rowCount = $('#provide_permission_table >tbody >tr').length + 1;
                        // alert(data.item.users.first_name);
                        $('.unqcompany' + data.item.model_id).replaceWith(`<tr class="unqcompany` + data.item.model_id + `">

                  <td>` + data.item.users.first_name + ` </td>
                <td>` + data.item.roles.name + `</td>

<td>

                 <button type="button" class="btn edit_btn edit_permission commonbtn" data-toggle="modal"

                 data-id="` + data.item.model_id + `"
                 data-target="#exampleModal">
                    <i class="fa fa-pencil"></i>
                 </button>
                <button type="button" class="btn delete_btn delete_permission commonbtn"
                data-id="` + data.item.model_id + `"
                >
                    <i class="fa fa-trash"></i>
                </button>
            </td>

            </tr>`);
                        toastr.success('Infromation Updated successfully');
                        setTimeout(function () {
                            $('#exampleModal').modal('hide');
                        }, 1500);
                        $('#sub_cat_edit_form').trigger('reset');
                    }
                    else {
                        toastr.error("Failed to store");
                    }
                }
            });
        });

    </script>
@endsection
<!-- End custom js for this page-->
