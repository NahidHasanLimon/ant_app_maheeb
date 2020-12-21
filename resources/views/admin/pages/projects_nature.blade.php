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
        .myTableHead{
            text-align: center;
        }
        .holiday_row{
            text-align: center;
        }
    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Manage Projects Nature</h1>
    </div>
    <div class="modal fade" id="projects_nature_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h5 class="modal-title" id="exampleModalLabel">Add New Company</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="border: none" class="card">
                        <div class="card-title">
                            <div class="preview"><i class="" aria-hidden="true"></i>
                                <h5 class="text-center font-weight-bolder" id="">Add New Projects Nature</h5>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- create / add submit form -->
                                    <form method="post" name="add_projects_nature_form" id="add_projects_nature_form">
                                        @csrf
                                        <fieldset>

                                            <div class="form-group">
                                                <label for="pro_nature_name">Projects Nature </label>
                                                <input id="pro_nature_name_id" class="form-control" name="pro_nature_name"
                                                       type="text"
                                                       placeholder="Enter Projects Nature" required>
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
                    {{--<h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="text-center font-weight-bolder" id="">Edit Projects Nature</h5>
                <form method="post" name="projects_nature_edit_form" id="projects_nature_edit_form">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card-body text-center d-flex flex-column justify-content-center">

                                <div class="form-group">
                                    <label for="pro_nature_name">Projects Nature </label>
                                    <input id="pro_nature_name_id" class="form-control" name="pro_nature_name"
                                           type="text"
                                           placeholder="Enter Projects Nature" required>
                                </div>



                                <input type="hidden" id="id" name="id" class="form-control">
                                <input type="hidden" id="si" class="form-control">
                                {{--</div>--}}

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center d-flex flex-column justify-content-center">
                        <button type="submit" class="btn btn-primary sub_btn">Update</button>
                        {{--<button type="button" style="background: lightgrey;color: white" class="btn btn-fw" data-dismiss="modal">Cancel</button>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end of modal edit -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                        <div class="align-items-center m-4 d-inline-flex">
                            <a class="btn btn-primary bg-white text-dark form-control" href="" data-toggle="modal" data-target="#projects_nature_modal" id="add_company_btn">
                                <i class="fa fa-plus"> Add new Projects Nature</i>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-end mb-3 mb-md-0">
                        <div class="align-items-center m-4 d-inline-flex">
                            <input type="search" name="search_datatable_input" id="search_datatable_input" class="form-control">
                        </div>
                    </div>
                </div>
                <div style="position: relative" class="card-body">


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
                                        <table id="projects_nature_table" class="table company_table">
                                            <thead>

                                            <tr class="myTableHead">

                                                <th>Nature</th>
                                                <th>Activity</th>
                                            </tr>

                                            </thead>
                                            <tbody class="holiday_row" id="projects_table_append">

                                            @if(empty($items))
                                                <h2 class="text-danger text-center text-capitalize">Data does not
                                                    exist</h2>
                                            @else

                                                @foreach ($items as $item)
                                                    <tr class="unqcompany{{$item->id}}">

                                                        <td>{{$item->project_nature_name}}</td>

                                                        <td>

                                                            <button type="button"
                                                                    data-serial="{{$loop->index + 1}}"
                                                                    class="btn edit_pro_nature commonbtn"
                                                                    data-id="{{$item->id}}" data-toggle="modal"
                                                                    data-target="#exampleModal">
                                                                <img src="{{asset('backend/img/theme/light/edit.png')}}"
                                                                     alt="">
                                                            </button>
                                                            <button type="button" data-id="{{$item->id}}"
                                                                    class="btn delete_pro_nature commonbtn">
                                                                <img src="{{asset('backend/img/theme/light/trash.png')}}"
                                                                     alt="">

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
        var projects_nature_table = $('#projects_nature_table').DataTable({
            sDom: 'lrtip',
            "paging": false,
            fixedHeader: true
        });
        $('#search_datatable_input').on( 'keyup', function () {
            projects_nature_table.search( this.value ).draw();

        });



        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path


            $('ul a').each(function () {
                if (this.href === path) {
                    $("#project_management_structure_btn").addClass("active");
                    $("#manage_project_nature").css({
                        'font-family': 'Josefin Sans',
                        'font-style': 'normal',
                        'font-weight': 'bold',
                        'font-size': '13px',
                        'line-height': '12px',
                        'color': 'black',
                        'text-shadow': '0px 4px 4px rgba(0, 0, 0, 0.25)'
                    });
                    $("#project_management_structure_btn").find('i').toggleClass('fas fa-plus fas fa-minus');

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
                projects_nature_store: "{!! route('projects-nature.post') !!}",
                projects_nature_delete: "{!! route('projects-nature.delete') !!}",
                projects_nature_detail: "{!! route('projects-nature.detail') !!}",
                projects_nature_update: "{!! route('projects-nature.update') !!}",

            }
        };

        $("#add_projects_nature_form").validate({
            rules: {
                pro_nature_name: {
                    required: true,
                },
            },
            messages: {
                pro_nature_name: {
                    required: "Please enter a name",
                },
            },
            errorPlacement: function(label, element) {
                label.addClass('mt-2 text-danger');
                label.insertAfter(element);
            },
            highlight: function(element, errorClass) {
                $(element).parent().addClass('has-danger')
                $(element).addClass('form-control-danger')
            }
        });



//
//
        $(document).on('submit', '#add_projects_nature_form', function (event) {
            event.preventDefault();
            $.ajax({
                url: config.routes.projects_nature_store,
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.id != "") {
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
                        var rowCount = $('#projects_nature_table >tbody >tr').length + 1;
                        $('#projects_table_append').append(`<tr class="unqcompany` + data.item.id + `">


                <td>` + data.item.project_nature_name + ` </td>

<td>
                 <button type="button" class="btn edit_pro_nature commonbtn" data-toggle="modal"

                 data-id="` + data.item.id + `"
                 data-target="#exampleModal">
                   <img src="/backend/img/theme/light/edit.png" alt="">
                 </button>
                <button type="button" class="btn delete_pro_nature commonbtn"
                data-id="` + data.item.id + `"
                >
                    <img src="/backend/img/theme/light/trash.png" alt="">
                </button>
            </td>

            </tr>`);

                        toastr.success('Information was Created successfully');
                        setTimeout(function () {
                            $('#projects_nature_modal').modal('hide');
                        }, 1500);
                        $('#add_projects_nature_form').trigger('reset');

                    } else {
                        toastr.error('Failed to create');
                    }
                }
            })
        });
        $(document).on('click', '.delete_pro_nature', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
            var type = 'show';
            // alert(id);
            if (confirm('Are You Sure to Delete ?')) {
                $.ajax({
                    url: config.routes.projects_nature_delete,
                    type: "get",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        console.log(data);
                        toastr.success('Information was Deleted successfully');
                        tr.fadeOut(1000, function(){
                            $(this).remove();
                        });
                    }
                });
            }
        });

        $(document).on('click', '.edit_pro_nature', function (e) {

            e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'edit';
            // console.log(id,si);
            $.ajax({
                url: config.routes.projects_nature_detail,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },

                success: function (data) {
                    // console.log(data);
                    $('#projects_nature_edit_form').find('#pro_nature_name_id').val(data.projects_nature.project_nature_name);
                    $('#projects_nature_edit_form').find('#id').val(id);
                    $('#projects_nature_edit_form').find('#si').val(si);
                }
            });


        });


        $(document).on('submit', '#projects_nature_edit_form', function (e) {
            e.preventDefault();
            var si = $('#projects_nature_edit_form').find('#si').val();
            $.ajax({
                url: config.routes.projects_nature_update,
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
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
                    var rowCount = $('#projects_nature_table >tbody >tr').length + 1;
                    $('.unqcompany' + data.item.id).replaceWith(`<tr class="unqcompany` + data.item.id + `">


                  <td>` + data.item.project_nature_name + ` </td>

<td>
                 <button type="button" class="btn edit_pro_nature commonbtn" data-toggle="modal"

                 data-id="` + data.item.id + `"
                 data-target="#exampleModal">
                   <img src="/backend/img/theme/light/edit.png" alt="">
                 </button>
                <button type="button" class="btn delete_pro_nature commonbtn"
                data-id="` + data.item.id + `"
                >
                    <img src="/backend/img/theme/light/trash.png" alt="">
                </button>
            </td>

            </tr>`);


                    toastr.success('Infromation Updated successfully');
                    setTimeout(function () {
                        $('#exampleModal').modal('hide');
                    }, 1500);
                    $('#projects_nature_edit_form').trigger('reset');
                }
            });
        });

    </script>
@endsection
<!-- End custom js for this page-->