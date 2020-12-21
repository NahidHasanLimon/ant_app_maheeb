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
        <h1>Manage {{$cat_name->name}}</h1>
    </div>


    <!-- end of modal edit -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">
                <div class="row justify-content-between align-items-center mx-2 pt-4">
                    <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                        <div class="align-items-center m-4 d-inline-flex">
                            <a class="btn btn-primary btn-sm add_btn" href="" data-toggle="modal"
                               data-target="#add_project_status_modal" id="add_company_btn">
                                <i class="fa fa-plus"> Add Project Status</i>
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
                                        <table id="project_status_table" class="table holiday_table">

                                            <thead>

                                            <tr class="myTableHead">
                                                <th>Category</th>
                                                <th>Project Status</th>
                                                <th>Definition</th>
                                                <th>Activity</th>
                                            </tr>

                                            </thead>
                                            <tbody class="holiday_row" id="pro_status_append">

                                            @if(empty($items))
                                                <h2 class="text-danger text-center text-capitalize">Data does not
                                                    exist</h2>
                                            @else

                                                @foreach ($items as $item)
                                                    <tr class="unqcompany{{$item->id}}">
                                                        <td>{{ $item->status_category->name ?? 'no category' }}</td>
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->definition}}</td>


                                                        <td>
                                                            <button type="button"
                                                                    data-serial="{{$loop->index + 1}}"
                                                                    class="btn edit_btn edit_pro_status commonbtn"
                                                                    data-id="{{$item->id}}" data-toggle="modal"
                                                                    data-target="#exampleModal">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                            <button type="button" data-id="{{$item->id}}"
                                                                    class="btn delete_btn delete_pro_status commonbtn">
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

    <div class="modal fade" id="add_project_status_modal" tabindex="-1" role="dialog"
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
                                <h5 class="text-center font-weight-bolder" id="">Add Project Status</h5>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- create / add submit form -->
                                    <form method="post" name="add_project_status_form" id="add_project_status_form">
                                        @csrf
                                        <fieldset>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Project Status Category</label>
                                                <input id="catId" class="form-control" name="cat_name"
                                                       type="text"   value="{{$cat_name->name}}"
                                                       readonly disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="pro_status_name">Project Status</label>
                                                <input id="pro_status_name_id" class="form-control" name="pro_status_name"
                                                       type="text"
                                                       placeholder="Enter Project Status.." required>
                                            </div>

                                            <div class="form-group">
                                                <label for="definition">Definition</label>
                                                <input id="definition_id" class="form-control" name="definition_name"
                                                       type="text"
                                                       placeholder="Enter Definition" required>
                                            </div>

                                            <input type="hidden" id="id" name="cat_id_hidden" value="{{$cat_name->id}}" class="form-control">
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
                <h5 class="text-center font-weight-bolder" id="">Edit Project Status</h5>
                <form method="post" name="project_status_edit_form" id="project_status_edit_form">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card-body text-center d-flex flex-column justify-content-center">

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Project Status Category</label>
                                    <input id="catId" class="form-control" name="cat_name"
                                           type="text"   value="{{$cat_name->name}}"
                                           readonly disabled>
                                </div>

                                <div class="form-group">
                                    <label for="pro_status_name">Project Status</label>
                                    <input id="pro_status_name_id" class="form-control" name="pro_status_name"
                                           type="text"
                                           placeholder="Enter Project Status.." required>
                                </div>

                                <div class="form-group">
                                    <label for="definition">Definition</label>
                                    <input id="definition_id" class="form-control" name="definition_name"
                                           type="text"
                                           placeholder="Enter Definition" required>
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
        var project_status_table = $('#project_status_table').DataTable({
            sDom: 'lrtip',
            "paging": false,
            fixedHeader: true
        });
        $('#search_datatable_input').on('keyup', function () {
            project_status_table.search(this.value).draw();

        });




        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path


            $('ul a').each(function () {

                    $("#project_management_structure_btn").addClass("active");
                    $("#manage_project_status").css({
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
                    $('#mng_pro_item_cat_dropdown').hide();
                    $("#project_management_dropdown").css("display", "block");

                    $(".first_sidebar").hide();
                    $(".second_sidebar").show();

                    $('#project_management_link span img').attr("src", "/backend/img/theme/light/Project_white.png");

                    $('#project_management_link').addClass("active");

                    $("#project_management_item").show();


            });
        });


        $("#add_project_status_form").validate({
            rules: {
                cat_name: {
                    required: true,
                },
                pro_status_name: {
                    required: true,
                },
                definition_name: {
                    required: true,
                },

            },
            messages: {
                pro_status_name: {
                    required: "Please enter status",
                },
                definition_name: {
                    required: "Please enter definition",
                },
                cat_name: {
                    required: "Please Select Category",
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


        $("#project_status_edit_form").validate({
            rules: {
                cat_name: {
                    required: true,
                },
                pro_status_name: {
                    required: true,
                },
                definition_name: {
                    required: true,
                },


            },
            messages: {
                pro_cat_status_name: {
                    required: "Please enter status",
                },
                definition_name: {
                    required: "Please enter definition",
                },
                cat_name: {
                    required: "Please Select Category",
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
                pro_status_store: "{!! route('filtered-project-status-cat.post') !!}",
                pro_status_delete: "{!! route('project-status.delete') !!}",
                pro_status_detail: "{!! route('project-status.detail') !!}",
                pro_status_update: "{!! route('filtered-project-status-category.update') !!}",

            }
        };

        $(document).on('submit', '#add_project_status_form', function (event) {
            event.preventDefault();
            $.ajax({
                url: config.routes.pro_status_store,
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


                        var rowCount = $('#project_status_table >tbody >tr').length + 1;
                        $('#pro_status_append').append(`<tr class="unqcompany` + data.item.id + `">
                <td>` + data.item.status_category.name+ `</td>
                <td>` + data.item.name+ ` </td>
                <td>` + data.item.definition + `</td>


<td>
                 <button type="button" class="btn edit_btn edit_pro_status commonbtn" data-toggle="modal"

                 data-id="` + data.item.id + `"
                 data-target="#exampleModal">
                   <i class="fa fa-pencil"></i>
                 </button>
                <button type="button" class="btn delete_btn delete_pro_status commonbtn"
                data-id="` + data.item.id + `"
                >
                   <i class="fa fa-trash"></i>
                </button>
            </td>

            </tr>`);
                        // project_status_table.row.add([
                        //
                        //     '' + data.item.name + '',
                        //     '' + data.item.definition + '',
                        //     '' + data.item.status_category.name + '',
                        //     '<button type="button" class="btn edit_btn edit_pro_status commonbtn" data-toggle="modal" data-id="' + data.item.id +'" data-target="#exampleModal">   <i class="fa fa-pencil"></i>   </button><button type="button" class="btn delete_btn delete_pro_status commonbtn" data-id="'+ data.item.id +'">   <i class="fa fa-trash"></i>   </button>'
                        //
                        //
                        // ]) ;
                        // project_status_table.draw();

                        toastr.success('Information was Created successfully');
                        setTimeout(function () {
                            $('#add_project_status_modal').modal('hide');
                        }, 1500);
                        $('#add_project_status_form').trigger('reset');

                    } else {
                        toastr.error("Failed to store");
                    }
                },
                error: function(data, errorThrown)
                {
                    toastr.error("An error has occurred");

                }
            })
        });
        $(document).on('click', '.delete_pro_status', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
            var type = 'show';
            // alert(id);
            if (confirm('Are You Sure to Delete ?')) {
                $.ajax({
                    url: config.routes.pro_status_delete,
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
                    },
                    error: function(data, errorThrown)
                    {
                        toastr.error("Failed to delete");

                    }
                });
            }
        });

        $(document).on('click', '.edit_pro_status', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'edit';
            // console.log(id,si);

            $.ajax({
                url: config.routes.pro_status_detail,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },

                success: function (data) {
                    // console.log(data.subDept.sub_department_name);
                    $('#project_status_edit_form').find('#catId').val(data.pro_status.status_category.name);
                    $('#project_status_edit_form').find('#pro_status_name_id').val(data.pro_status.name);
                    $('#project_status_edit_form').find('#definition_id').val(data.pro_status.definition);

                    $('#project_status_edit_form').find('#id').val(id);
                    $('#project_status_edit_form').find('#si').val(si);
                },
                error: function(data, errorThrown)
                {
                    toastr.error("An error has occurred");

                }
            });


        });
        $(document).on('submit', '#project_status_edit_form', function (e) {
            e.preventDefault();
            var si = $('#project_status_edit_form').find('#si').val();
            $.ajax({
                url: config.routes.pro_status_update,
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


                        var rowCount = $('#project_status_table >tbody >tr').length + 1;
                        // alert(data.item.users.first_name);
                        $('.unqcompany' + data.item.id).replaceWith(`<tr class="unqcompany` + data.item.id + `">

                 <td>` + data.item.status_category.name +  `</td>
                <td>` + data.item.name + ` </td>

                <td>` + data.item.definition + `</td>


<td>

                 <button type="button" class="btn edit_btn edit_pro_status commonbtn" data-toggle="modal"

                 data-id="` + data.item.id + `"
                 data-target="#exampleModal">
                    <i class="fa fa-pencil"></i>
                 </button>
                <button type="button" class="btn delete_btn delete_pro_status commonbtn"
                data-id="` + data.item.id + `"
                >
                    <i class="fa fa-trash"></i>
                </button>
            </td>

            </tr>`);
                        toastr.success('Infromation Updated successfully');
                        setTimeout(function () {
                            $('#exampleModal').modal('hide');
                        }, 1500);
                        $('#project_status_edit_form').trigger('reset');
                    }
                    else {
                        toastr.error("Failed to store");
                    }
                },
                error: function(data, errorThrown)
                {
                    toastr.error("An error has occurred");

                }
            });
        });

    </script>
@endsection
<!-- End custom js for this page-->
