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
    <style>

        .myTableHead {
            text-align: center;
        }

        .holiday_row {
            text-align: center;
        }

        table th:first-child {
            border-radius: 10px 0 0 10px;

        }

        table th:last-child {
            border-radius: 0 10px 10px 0;

        }

        .form-control {
            font-size: 11px !important;
            border-radius: 5px;
        }

        label {
            display: inline-block;
            margin-bottom: .5rem;
            font-weight: bold;
            color: black;
            /*font-size: 11px;*/
        }

        .card {
            border: none
        }

        .card-body {
            position: relative
        }

        .delete_btn{

            background-color: #D62828;
            border: none;
            color: white;
            padding: 0px 7px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            box-shadow: 0px 3px #CDCDCD;

        }

        .edit_btn{

            background-color: #212121;
            border: none;
            color: white;
            padding: 0px 6px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            box-shadow: 0px 3px #CDCDCD;
        }

        .approve_btn{

            background-color: #78C3A3;
            border: none;
            color: white;
            padding: 0px 6px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            /*box-shadow: 0px 3px #CDCDCD;*/
        }

        .decline_btn{

            background-color: #D62828;
            border: none;
            color: white;
            padding: 0px 6px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            /*box-shadow: 0px 3px #CDCDCD;*/
        }
        .view_btn{

            background-color: #212121;
            border: none;
            color: white;
            padding: 0px 6px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            box-shadow: 0px 3px #CDCDCD;
        }


        .view_logs_btn {
            background-color: #212121;
            color: white;
            padding: 1px 19px;
            font-size: 10px;
            cursor: pointer;
            border-radius: 20px;
        }
        .assign_btn {
            background-color: #212121;
            color: white;
            padding: 3px 18px;
            font-size: 11px;
            cursor: pointer;
            border-radius: 23px;
        }
        .de_assign_btn {
            background-color: #212121;
            color: white;
            padding: 3px 18px;
            font-size: 11px;
            cursor: pointer;
            border-radius: 23px;
        }

        .fire_btn {
            background-color: #212121;
            color: white;
            padding: 3px 30px;
            font-size: 11px;
            cursor: pointer;
            border-radius: 23px;
        }

        .delete_btn_round{
            border-radius: 50%;
            background-color: #D62828;
            border: none;
            color: white;
            padding: 2px 10px;
            font-size: 15px;
            cursor: pointer;
        }

    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Test Page</h1>
    </div>


    <!-- end of modal edit -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">
                <div class="row justify-content-between align-items-center mx-2 pt-4">
                    <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
{{--                        <div class="align-items-center m-4 d-inline-flex">--}}
{{--                            --}}{{--<a class="btn btn-primary form-control" href="" data-toggle="modal"--}}
{{--                            <a class="btn btn-primary btn-sm add_btn" href="" data-toggle="modal"--}}
{{--                               data-target="#projects_category_modal" id="add_company_btn">--}}
{{--                                <i class="fa fa-plus"> Add Project Category</i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
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


                    <button class="delete_btn">     <i class="fa fa-trash"></i>     </button>
                    <button class="edit_btn">       <i class="fa fa-pencil"></i>    </button>
                    <button class="approve_btn">      <i class="fa fa-check"></i>     </button>
                    <button class="decline_btn">    <i class="fa fa-times"></i>     </button>
                    <button class="view_btn">   <i class="fa fa-eye"></i>   </button>
                    <button type="button" class="btn btn-primary btn-round-xs btn-xs view_logs_btn">View Logs</button>
                    <button type="button" class="btn btn-primary btn-round-sm btn-sm assign_btn">Assign</button>
                    <button type="button" class="btn btn-primary btn-round-sm btn-sm de_assign_btn">Deassign</button>
                    <button type="button" class="btn btn-primary btn-round-lg btn-lg fire_btn">Fire</button>
                    <button class="btn-circle delete_btn_round">     <i class="fa fa-trash"></i></button>

                    <div class="card mt-6">
                        <div class="card-title">
                            <div class="preview">
                            </div>
                        </div>
                        <div class="test"></div>
                        <div class="card-body">
                            <div id="maheeb" class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="projects_category_table" class="table company_table">
                                            <thead>

                                            <tr class="myTableHead">

                                                <th>Employee Name</th>
{{--                                                <th>Activity</th>--}}
                                            </tr>

                                            </thead>
                                            <tbody class="holiday_row" id="projects_table_append">

                                            @if(empty($attendances))
                                                <h2 class="text-danger text-center text-capitalize">Data does not
                                                    exist</h2>
                                            @else

                                                @foreach ($attendances as $attendance)
                                                    <tr  class="unqcompany{{$attendance->id}}">

                                                        <td>{{$attendance->full_name}}</td>

{{--                                                        <td>--}}

{{--                                                            <button type="button"--}}
{{--                                                                    data-serial="{{$loop->index + 1}}"--}}
{{--                                                                    class="btn edit_pr_cat commonbtn"--}}
{{--                                                                    data-id="{{$attendance->id}}" data-toggle="modal"--}}
{{--                                                                    data-target="#exampleModal">--}}
{{--                                                                <img src="{{asset('backend/img/theme/light/edit.png')}}"--}}
{{--                                                                     alt="">--}}
{{--                                                            </button>--}}
{{--                                                            <button type="button" data-id="{{$attendance->id}}"--}}
{{--                                                                    class="btn delete_pr_cat commonbtn">--}}
{{--                                                                <img src="{{asset('backend/img/theme/light/trash.png')}}"--}}
{{--                                                                     alt="">--}}

{{--                                                            </button>--}}
{{--                                                        </td>--}}

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

        $('.date').datepicker({
            // format: "dd/mm/yyyy",
            autoclose: true,
        });
        var project_cat_table = $('#projects_category_table').DataTable({

            sDom: 'lrtip',
            "paging": false,
            fixedHeader: true,
        });
        $('#search_datatable_input').on('keyup', function () {
            project_cat_table.search(this.value).draw();

        });


        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path


            $('ul a').each(function () {
                if (this.href === path) {
                    $("#project_management_structure_btn").addClass("active");
                    $("#manage_project_category").css({
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
                projects_category_store: "{!! route('projects-category.post') !!}",
                projects_category_delete: "{!! route('projects-category.delete') !!}",
                projects_category_detail: "{!! route('projects-category.detail') !!}",
                projects_category_update: "{!! route('projects-category.update') !!}",

            }
        };

        $("#add_projects_category_form").validate({
            rules: {
                pr_cat_name: {
                    required: true,
                },
            },
            messages: {
                pr_cat_name: {
                    required: "Please enter project category name",
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

        $("#projects_category_edit_form").validate({
            rules: {
                pr_cat_name: {
                    required: true,
                },
            },
            messages: {
                pr_cat_name: {
                    required: "Please enter project category name",
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


        $(document).on('submit', '#add_projects_category_form', function (event) {
            event.preventDefault();
            $.ajax({
                url: config.routes.projects_category_store,
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
                        var rowCount = $('#projects_category_table >tbody >tr').length + 1;


                        $('#projects_table_append').append(`<tr class="unqcompany` + data.item.id + `">


                <td>` + data.item.project_category_name + ` </td>

<td>
                 <button type="button" class="btn edit_pr_cat commonbtn" data-toggle="modal"

                 data-id="` + data.item.id + `"
                 data-target="#exampleModal">
                   <img src="/backend/img/theme/light/edit.png" alt="">
                 </button>
                <button type="button" class="btn delete_pr_cat commonbtn"
                data-id="` + data.item.id + `"
                >
                    <img src="/backend/img/theme/light/trash.png" alt="">
                </button>
            </td>

            </tr>`);


                        //
                        // project_cat_table.row.add([
                        //
                        //     '' + data.item.project_category_name + '',
                        //     '<button type="button" class="btn edit_pr_cat commonbtn" data-toggle="modal" data-id="' + data.item.id +'" data-target="#exampleModal"><img src="/backend/img/theme/light/edit.png" alt=""></button><button type="button" class="btn delete_pr_cat commonbtn" data-id="'+ data.item.id +'"> <img src="/backend/img/theme/light/trash.png" alt=""></button>'
                        //
                        //
                        // ]).node().id =data.item.id ;
                        // project_cat_table.draw();



                        // $('#test_row').addClass('unqcompany'+data.item.id);


                        // project_cat_table.attr('class', data.item.id);



                        toastr.success('Information was Created successfully');
                        setTimeout(function () {
                            $('#projects_category_modal').modal('hide');
                        }, 1500);
                        $('#add_projects_category_form').trigger('reset');

                    } else {
                        toastr.error("Failed to store");
                    }
                }
            })
        });
        $(document).on('click', '.delete_pr_cat', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
            var type = 'show';
            // alert(id);
            if (confirm('Are You Sure to Delete ?')) {
                $.ajax({
                    url: config.routes.projects_category_delete,
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

        $(document).on('click', '.edit_pr_cat', function (e) {

            e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'edit';
            // console.log(id,si);
            $.ajax({
                url: config.routes.projects_category_detail,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },

                success: function (data) {
                    // console.log(data);
                    $('#projects_category_edit_form').find('#pr_cat_name_id').val(data.pr_cat.project_category_name);
                    $('#projects_category_edit_form').find('#id').val(id);
                    $('#projects_category_edit_form').find('#si').val(si);
                }
            });


        });


        $(document).on('submit', '#projects_category_edit_form', function (e) {
            e.preventDefault();
            var si = $('#projects_category_edit_form').find('#si').val();

            $.ajax({
                url: config.routes.projects_category_update,
                method: "POST",
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
                        // var username = data.username===null ? 'N/A':  data.username.name;
                        var rowCount = $('#projects_category_table >tbody >tr').length + 1;
                        $('.unqcompany' + data.item.id).replaceWith(`<tr class="unqcompany` + data.item.id + `">


                <td>` + data.item.project_category_name + ` </td>

<td>
                 <button type="button" class="btn edit_pr_cat commonbtn" data-toggle="modal"

                 data-id="` + data.item.id + `"
                 data-target="#exampleModal">
                   <img src="/backend/img/theme/light/edit.png" alt="">
                 </button>
                <button type="button" class="btn delete_pr_cat commonbtn"
                data-id="` + data.item.id + `"
                >
                    <img src="/backend/img/theme/light/trash.png" alt="">
                </button>
            </td>

            </tr>`);

                        // var id =   $('#projects_category_edit_form').find('#id').val();
                        // console.log(id);
                        //
                        // project_cat_table.row(id).data(
                        //
                        //     [
                        //
                        //         '' + data.item.project_category_name + '',
                        //         '<button type="button" class="btn edit_pr_cat commonbtn" data-toggle="modal" data-id="' + data.item.id +'" data-target="#exampleModal"><img src="/backend/img/theme/light/edit.png" alt=""></button><button type="button" class="btn delete_pr_cat commonbtn" data-id="'+ data.item.id +'"> <img src="/backend/img/theme/light/trash.png" alt=""></button>'
                        //
                        //
                        //     ]
                        // ).draw();


                        toastr.success('Infromation Updated successfully');
                        setTimeout(function () {
                            $('#exampleModal').modal('hide');
                        }, 1500);
                        $('#projects_category_edit_form').trigger('reset');
                    } else {
                        toastr.error("Failed to update");
                    }
                }
            });
        });

    </script>
@endsection
<!-- End custom js for this page-->
