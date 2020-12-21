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

        .myTableHead {
            text-align: center;
            /*color: #747474;*/
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
        <h1>Manage Projects</h1>
    </div>


    <!-- end of modal edit -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">
                <div class="row justify-content-between align-items-center mx-2 pt-4">
                    <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                        <div class="align-items-center m-4 d-inline-flex">
                            <a class="btn btn-primary btn-sm add_btn" href="" data-toggle="modal"
                               data-target="#add_projects_modal" id="add_sub_department_btn">
                                <i class="fa fa-plus">Add Project</i>
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
                                        <table id="projects_table" class="table projects_table">

                                            <thead>

                                            <tr class="myTableHead">
                                                <th>Name</th>
                                                <th>Nature</th>
                                                <th>Frequency</th>
                                                <th>Company</th>
                                                <th>Category</th>
                                                <th>Sub-Category</th>
                                                <th>Activity</th>
                                            </tr>

                                            </thead>
                                            <tbody class="holiday_row" id="companyappend">

                                            @if(empty($items))
                                                <h2 class="text-danger text-center text-capitalize">Data does not
                                                    exist</h2>
                                            @else

                                                @foreach ($items as $item)
                                                    <tr class="unqcompany{{$item->id}}">
                                                        <td>{{$item->projects_name}}</td>
                                                        <td>{{$item->project_nature}}</td>
                                                        <td>{{$item->project_frequency}}</td>
                                                        <td>{{$item->organizations->lead_company_name}}</td>
                                                        <td>{{$item->categories->project_category_name}}</td>
                                                        <td>{{$item->subcategories->projects_sub_category_name}}</td>

                                                        <td>
                                                            <button type="button"
                                                                    data-serial="{{$loop->index + 1}}"
                                                                    class="btn edit_btn edit_projects commonbtn"
                                                                    data-id="{{$item->id}}" data-toggle="modal"
                                                                    data-target="#exampleModal">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                            <button type="button" data-id="{{$item->id}}"
                                                                    class="btn delete_btn delete_projects commonbtn">
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

    <div class="modal fade" id="add_projects_modal" tabindex="-1" role="dialog"
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
                                <h5 class="text-center font-weight-bolder" id="">Add New Project</h5>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- create / add submit form -->
                                    <form method="post" name="add_projects_form" id="add_projects_form">
                                        @csrf
                                        <fieldset>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pro_name">Project Name</label>
                                                        <input id="pro_name_id" class="form-control" name="projects_name"
                                                               type="text"
                                                               placeholder="Enter Projects Name.." required>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pro_nature">Project Nature</label>
                                                        <input id="pro_nature_id" class="form-control"
                                                               name="pro_nature_name"
                                                               type="text"
                                                               placeholder="Enter Projects Nature.." required>
                                                    </div>

                                                </div>


                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Organization</label>
                                                        <select class="form-control" id="companyId" name="company_name">
                                                            <option selected="selected" value="">Select a Company
                                                            </option>

                                                            @foreach($companies as $company)
                                                                <option value="{{$company->id}}">{{$company->lead_company_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Project Category</label>
                                                        <select class="form-control" id="catId" name="cat_name">
                                                            <option selected="selected" value="">Select a Category
                                                            </option>

                                                            @foreach($categories as $cat)
                                                                <option value="{{$cat->id}}">{{$cat->project_category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Project Sub
                                                            Category</label>
                                                        <select class="form-control" id="subCatId" name="sub_cat_name">
                                                            <option selected="selected" value="">Select a Category
                                                                First
                                                            </option>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="pro_frequency">Project Frequency</label>
                                                        <input id="pro_frequency_id" class="form-control"
                                                               name="pro_frequency_name"
                                                               type="text"
                                                               placeholder="Enter Projects Frequency.." required>
                                                    </div>
                                                </div>

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
                <h5 class="text-center font-weight-bolder" id="">Edit Project</h5>
                <form method="post" name="projects_edit_form" id="projects_edit_form">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card-body text-center d-flex flex-column justify-content-center">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pro_name">Project Name</label>
                                            <input id="pro_name_id" class="form-control" name="projects_name"
                                                   type="text"
                                                   placeholder="Enter Projects Name.." required>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pro_nature">Project Nature</label>
                                            <input id="pro_nature_id" class="form-control" name="pro_nature_name"
                                                   type="text"
                                                   placeholder="Enter Projects Nature.." required>
                                        </div>

                                    </div>


                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Organization</label>
                                            <select class="form-control" id="companyId" name="company_name">
                                                <option selected="selected" value="">Select a Company</option>

                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{$company->lead_company_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Project Category</label>
                                            <select class="form-control" id="catId" name="cat_name">
                                                <option selected="selected" value="">Select a Category</option>

                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->project_category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Project Sub Category</label>
                                            <select class="form-control" id="subCatId" name="sub_cat_name">
                                                <option selected="selected" value="">Select a Category First</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="pro_frequency">Project Frequency</label>
                                            <input id="pro_frequency_id" class="form-control" name="pro_frequency_name"
                                                   type="text"
                                                   placeholder="Enter Projects Frequency.." required>
                                        </div>
                                    </div>

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
    <script src="{{asset('backend/vendors/jquery-validation/jquery.validate.min.js')}}"></script>

@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')
    <script type="text/javascript">
        var projects_table = $('#projects_table').DataTable({
            sDom: 'lrtip',
            "paging": false,
            fixedHeader: true
        });
        $('#search_datatable_input').on('keyup', function () {
            projects_table.search(this.value).draw();

        });


        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path


            $('ul a').each(function () {
                if (this.href === path) {
                    $("#project_management_structure_btn").addClass("active");
                    $("#manage_projects").css({
                        'font-family': 'Josefin Sans',
                        'font-style': 'normal',
                        'font-weight': 'bold',
                        'font-size': '13px',
                        'line-height': '12px',
                        'color': 'black',
                        'text-shadow': '0px 4px 4px rgba(0, 0, 0, 0.25)'
                    });
                    $("#project_management_structure_btn").find('i').toggleClass('fas fa-plus fas fa-minus');
                    // $("#mng_projects_dropdown").find('i').toggleClass('fas fa-plus fas fa-minus');
                    $("#parent_mng_pro").find('i').toggleClass('fa fa-angle-right fa fa-angle-down');
                    $("#project_management_dropdown").css("display", "block");
                    $("#pro_structure_dropdown").hide();
                    $(".first_sidebar").hide();
                    $(".second_sidebar").show();

                    $('#project_management_link span img').attr("src", "/backend/img/theme/light/Project_white.png");

                    $('#project_management_link').addClass("active");

                    $("#project_management_item").show();

                }
            });
        });


        jQuery(document).ready(function () {
            jQuery('select[name="cat_name"]').on('change', function () {
                var countryID = jQuery(this).val();
                if (countryID) {
                    jQuery.ajax({
                        url: 'projects/getSubCategory/' + countryID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            jQuery('select[name="sub_cat_name"]').empty();
                            jQuery.each(data, function (key, value) {
                                $('select[name="sub_cat_name"]').append('<option value="' + value.id + '">' + value.projects_sub_category_name + '</option>');
                            });
                        }
                    });
                }
                else {
                    $('select[name="sub_cat_name"]').empty();
                }
            });
        });


        var config = {
            routes: {
                projects_store: "{!! route('projects.post') !!}",
                projects_delete: "{!! route('projects.delete') !!}",
                projects_detail: "{!! route('projects.detail') !!}",
                projects_update: "{!! route('projects.update') !!}",

            }
        };


        $("#add_projects_form").validate({
            rules: {
                projects_name: {
                    required: true,

                },
                pro_nature_name: {
                    required: true,

                },
                company_name: {
                    required: true,
                },

                cat_name: {
                    required: true,
                },

                sub_cat_name: {
                    required: true,
                },

                pro_frequency_name: {
                    required: true,

                },
            },
            messages: {
                projects_name: {
                    required: "Please enter a name",
                },
                pro_nature_name: {
                    required: "Please enter a nature",
                },
                company_name: {
                    required: "Please Select Company",
                },
                cat_name: {
                    required: "Please Select Category",
                },
                sub_cat_name: {
                    required: "Please Select Sub Category",
                },
                pro_frequency_name: {
                    required: "Please enter a frequency",
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

        $("#projects_edit_form").validate({
            rules: {
                projects_name: {
                    required: true,

                },
                pro_nature_name: {
                    required: true,

                },
                company_name: {
                    required: true,
                },

                cat_name: {
                    required: true,
                },

                sub_cat_name: {
                    required: true,
                },

                pro_frequency_name: {
                    required: true,

                },
            },
            messages: {
                projects_name: {
                    required: "Please enter a name",
                },
                pro_nature_name: {
                    required: "Please enter a nature",
                },
                company_name: {
                    required: "Please Select Company",
                },
                cat_name: {
                    required: "Please Select Category",
                },
                sub_cat_name: {
                    required: "Please Select Sub Category",
                },
                pro_frequency_name: {
                    required: "Please enter a frequency",
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


        $(document).on('submit', '#add_projects_form', function (event) {
            event.preventDefault();
            $.ajax({
                url: config.routes.projects_store,
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




                        projects_table.row.add([

                            '' + data.item.projects_name + '',
                            '' + data.item.project_nature + '',
                            '' + data.item.project_frequency +  '',
                            '' + data.item.organizations.lead_company_name +   '',
                            ''  + data.item.categories.project_category_name + '',
                            '' + data.item.subcategories.projects_sub_category_name + '',

                            '<button type="button" class="btn edit_btn edit_projects commonbtn" data-toggle="modal" data-id="' + data.item.id +'" data-target="#exampleModal">   <i class="fa fa-pencil"></i>   </button><button type="button" class="btn delete_btn delete_projects commonbtn" data-id="'+ data.item.id +'">   <i class="fa fa-trash"></i>   </button>'


                        ]) ;
                        projects_table.draw();




//                         var rowCount = $('#projects_table >tbody >tr').length + 1;
//                         $('#companyappend').append(`<tr class="unqcompany` + data.item.id + `">
//
//                 <td>` + data.item.projects_name + `</td>
//                 <td>` + data.item.project_nature + `</td>
//                 <td>` + data.item.project_frequency + `</td>
//                 <td>` + data.item.organizations.lead_company_name + `</td>
//                 <td>` + data.item.categories.project_category_name + `</td>
//                 <td>` + data.item.subcategories.projects_sub_category_name + `</td>
//
//
// <td>
//                  <button type="button" class="btn edit_btn edit_projects commonbtn" data-toggle="modal"
//
//                  data-id="` + data.item.id + `"
//                  data-target="#exampleModal">
//                    <i class="fa fa-pencil"></i>
//                  </button>
//                 <button type="button" class="btn delete_btn delete_projects commonbtn"
//                 data-id="` + data.item.id + `"
//                 >
//                    <i class="fa fa-trash"></i>
//                 </button>
//             </td>
//
//             </tr>`);

                        toastr.success('Information was Created successfully');
                        setTimeout(function () {
                            $('#add_projects_modal').modal('hide');
                        }, 1500);
                        $('#add_projects_form').trigger('reset');

                    } else {
                        toastr.error("Failed to store");
                    }
                },
                error: function(data, errorThrown)
                {
                    toastr.error("This field is required or this name has already been taken");

                }
            })
        });
        $(document).on('click', '.delete_projects', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
            var type = 'show';
            // alert(id);
            if (confirm('Are You Sure to Delete ?')) {
                $.ajax({
                    url: config.routes.projects_delete,
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
                        toastr.error("An error has occurred");

                    }
                });
            }
        });

        $(document).on('click', '.edit_projects', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'edit';
            // console.log(id,si);

            $.ajax({
                url: config.routes.projects_detail,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },

                success: function (data) {
                    // console.log(data.projects.subcategories.projects_sub_category_name);
                    $('#projects_edit_form').find('#companyId').val(data.projects.organizations.id);
                    $('#projects_edit_form').find('#catId').val(data.projects.categories.id);
                    $('#projects_edit_form').find('#subCatId').html(data.sub_category_option);
                    $('#projects_edit_form').find('#pro_nature_id').val(data.projects.project_nature);
                    $('#projects_edit_form').find('#pro_frequency_id').val(data.projects.project_frequency);
                    $('#projects_edit_form').find('#pro_name_id').val(data.projects.projects_name);
                    $('#projects_edit_form').find('#id').val(id);
                    $('#projects_edit_form').find('#si').val(si);
                },
                error: function(data, errorThrown)
                {
                    toastr.error("An error has occurred");

                }
            });


        });
        $(document).on('submit', '#projects_edit_form', function (e) {
            e.preventDefault();
            var si = $('#projects_edit_form').find('#si').val();
            $.ajax({
                url: config.routes.projects_update,
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


                        var rowCount = $('#projects_table >tbody >tr').length + 1;
                        // alert(data.item.users.first_name);
                        $('.unqcompany' + data.item.id).replaceWith(`<tr class="unqcompany` + data.item.id + `">


                <td>` + data.item.projects_name + `</td>
                <td>` + data.item.project_nature + `</td>
                <td>` + data.item.project_frequency + `</td>
                <td>` + data.item.organizations.lead_company_name + `</td>
                <td>` + data.item.categories.project_category_name + `</td>
                <td>` + data.item.subcategories.projects_sub_category_name + `</td>

<td>

                 <button type="button" class="btn edit_btn edit_projects commonbtn" data-toggle="modal"

                 data-id="` + data.item.id + `"
                 data-target="#exampleModal">
                    <i class="fa fa-pencil"></i>
                 </button>
                <button type="button" class="btn delete_btn delete_projects commonbtn"
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
                        $('#projects_edit_form').trigger('reset');
                    } else {
                        toastr.error("Failed to update");
                    }
                },
                error: function(data, errorThrown)
                {
                    toastr.error("This field is required or this name has already been taken");

                }
            });
        });

    </script>
@endsection
<!-- End custom js for this page-->
