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
    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Manage Subscription</h1>
    </div>

    <div id="myTest" class="test_text">

    </div>







    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">

                <div class="row justify-content-between align-items-center mx-2 pt-4">
                    <div
                        class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                        <div class="align-items-center m-4 d-inline-flex">
                            {{--<a class="btn btn-primary form-control" href="" data-toggle="modal"--}}
                            <a class="btn btn-primary btn-sm add_btn" href="" data-toggle="modal"
                               data-target="#add_holiday_modal" id="add_holiday_btn">
                                <i class="fa fa-plus"> Add Subscription</i>
                            </a>
                        </div>
                    </div>

                    <div
                        class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-end mb-3 mb-md-0">
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
                                        <table id="sub_table_id" class="table holiday_table">
                                            {{--<thead id="holiday_head" >--}}
                                            <thead>

                                            <tr class="myTableHead">
                                                {{--<tr class="myHead">--}}

                                                <th>Account Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Activity</th>
                                            </tr>

                                            </thead>
                                            <tbody class="holiday_row" id="subscription_table">

                                            @if(empty($items))
                                                <h2 class="text-danger text-center text-capitalize">Data does not
                                                    exist</h2>
                                            @else

                                                @foreach ($items as $item)
                                                    <tr class="unqcompany{{$item->id}}">

                                                        <td>{{$item->account_name}}</td>
                                                        <td>{{$item->account_email}}</td>
                                                        <td>{{$item->account_password}}</td>


                                                        <td>

                                                            <button
                                                                class="btn view_btn view_employee_btn_class commonbtn"
                                                                data-id="{{$item->id}}" id="view_employee_btn"
                                                                data-target="#view_employee_modal"
                                                                data-toggle="modal"
                                                            >

                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            <button type="button"
                                                                    data-serial="{{$loop->index + 1}}"
                                                                    class="btn edit_btn editcompany commonbtn"
                                                                    data-id="{{$item->id}}" data-toggle="modal"
                                                                    data-target="#exampleModal">
                                                                {{--                                                                <img src="{{asset('backend/img/theme/light/edit.png')}}"--}}
                                                                {{--                                                                     alt="">--}}
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                            <button type="button" data-id="{{$item->id}}"
                                                                    class="btn delete_btn deletecompany commonbtn">
                                                                {{--                                                                <img src="{{asset('backend/img/theme/light/trash.png')}}"--}}
                                                                {{--                                                                     alt="">--}}

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


    <div class="modal fade" id="add_holiday_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">

        <div class="modal-dialog modal-lg" role="document">
            {{--<div class="modal-dialog modal-lg modal-dialog-centered" role="document">--}}
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h5 class="modal-title" id="exampleModalLabel">Add Subscription Details</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="border: none" class="card">
                        <div class="card-title">
                            <div class="preview"><i class="" aria-hidden="true"></i>
                                <h5 class="text-center font-weight-bolder" id="">Add Subscription Details</h5>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- create / add submit form -->
                                    <form method="post" name="add_holiday_form" id="add_holiday_form">
                                        @csrf
                                        <fieldset>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="" for="department_name">Account Name</label>
                                                        <input id="accId" class="form-control" name="acName" type="text"
                                                               placeholder="Enter Account Name.." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="department_name">Email</label>
                                                        <input id="emailId" class="form-control" name="emailName"
                                                               type="text"
                                                               placeholder="Enter Email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="department_name">Password</label>
                                                        <input id="passId" class="form-control" name="passName"
                                                               type="text"
                                                               placeholder="Enter password" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div id="" class="form-group">

                                                        <label class="start" for="">Start Date</label>

                                                        <input type="text" name="start_date" id="startDateId"
                                                               class="date form-control" data-provide="datepicker"
                                                               required=""
                                                               value=""
                                                               placeholder="Enter Start Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div id="" class="form-group">

                                                        <label class="start" for="">End Date: </label>

                                                        <input type="text" name="end_date" id="endDateId"
                                                               class="date form-control" data-provide="datepicker"
                                                               required=""
                                                               value=""
                                                               placeholder="Enter Start Date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Payment status</label>
                                                        <select class="form-control" id="statusId" name="statusName">
                                                            <option selected="selected">Select a status</option>
                                                            @foreach($statuses as $key=>$value)
                                                                <option value="{{$key}}">{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="department_name">Module</label>
                                                        <input id="moduleId" class="form-control" name="moduleName"
                                                               type="text"
                                                               placeholder="Enter Module" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="department_name">Amount</label>
                                                        <input id="amountId" class="form-control" name="amountName"
                                                               type="text"
                                                               placeholder="Enter Amount" required>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h5 class="modal-title" id="exampleModalLabel">Edit Subscription</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="text-center font-weight-bolder" id="">Edit Subscription</h5>
                <form method="post" name="company_edit_form" id="company_edit_form">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card-body text-center d-flex flex-column justify-content-center">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Account Name</label>
                                            <input id="accId" class="form-control" name="acName" type="text"
                                                   placeholder="Enter Account Name.." required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Email</label>
                                            <input id="emailId" class="form-control" name="emailName"
                                                   type="text"
                                                   placeholder="Enter Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Password</label>
                                            <input id="passId" class="form-control" name="passName"
                                                   type="text"
                                                   placeholder="Enter password" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div id="" class="form-group">

                                            <label class="start" for="">Start Date: </label>

                                            <input type="text" name="start_date" id="startDateId"
                                                   class="date form-control" data-provide="datepicker" required=""
                                                   value=""
                                                   placeholder="Enter Start Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div id="" class="form-group">

                                            <label class="start" for="">End Date: </label>

                                            <input type="text" name="end_date" id="endDateId"
                                                   class="date form-control" data-provide="datepicker" required=""
                                                   value=""
                                                   placeholder="Enter Start Date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Payment status</label>
                                            <select class="form-control" id="statusId" name="statusName">
                                                <option selected="selected" value="">Select a status</option>
                                                @foreach($statuses as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Module</label>
                                            <input id="moduleId" class="form-control" name="moduleName" type="text"
                                                   placeholder="Enter Module" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Amount</label>
                                            <input id="amountId" class="form-control" name="amountName" type="text"
                                                   placeholder="Enter Amount" required>
                                        </div>
                                    </div>
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


    <div class="modal fade" id="view_employee_modal" name="view_employee_modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h5 class="modal-title" id="exampleModalLabel">Subscription Details</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="text-center font-weight-bolder" id="">Subscription Details</h5>
                <form method="post" name="company_view_form" id="company_view_form">
                    {{--@csrf--}}
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card-body text-center d-flex flex-column justify-content-center">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Account Name</label>
                                            <input id="accId" class="form-control" name="acName" type="text"
                                                   placeholder="Enter Account Name.." required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Email</label>
                                            <input id="emailId" class="form-control" name="emailName"
                                                   type="text"
                                                   placeholder="Enter Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Password</label>
                                            <input id="passId" class="form-control" name="passName"
                                                   type="text"
                                                   placeholder="Enter password" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div id="" class="form-group">

                                            <label class="start" for="">Start Date: </label>

                                            <input type="text" name="start_date" id="startDateId"
                                                   class="date form-control" data-provide="datepicker" required=""
                                                   value=""
                                                   placeholder="Enter Start Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div id="" class="form-group">

                                            <label class="start" for="">End Date: </label>

                                            <input type="text" name="end_date" id="endDateId"
                                                   class="date form-control" data-provide="datepicker" required=""
                                                   value=""
                                                   placeholder="Enter Start Date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Payment status</label>
                                            <select class="form-control" id="statusId" name="statusName">
                                                <option selected="selected" value="">Select a status</option>
                                                @foreach($statuses as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Module</label>
                                            <input id="moduleId" class="form-control" name="moduleName" type="text"
                                                   placeholder="Enter Module" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Amount</label>
                                            <input id="amountId" class="form-control" name="amountName" type="text"
                                                   placeholder="Enter Amount" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="id" name="id" class="form-control">
                                <input type="hidden" id="si" class="form-control">
                                {{--</div>--}}

                            </div>
                        </div>
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
        $('.date').datepicker({
            // format: "dd/mm/yyyy",
            autoclose: true,
        });

        var sub_table = $('#sub_table_id').DataTable({

            sDom: 'lrtip',
            "paging": false,
            fixedHeader: true,
        });
        $('#search_datatable_input').on('keyup', function () {
            sub_table.search(this.value).draw();

        });
        jQuery(function ($) {
            // maheebTest();
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path


            $('ul a').each(function () {
                if (this.href === path) {

                    // $("#subscription_dropdown").addClass("active");
                    $("#manage_subscription_li").css({
                        'font-family': 'Josefin Sans',
                        'font-style': 'normal',
                        'font-weight': 'bold',
                        'font-size': '13px',
                        'line-height': '12px',
                        'color': 'black',
                        'text-shadow': '0px 4px 4px rgba(0, 0, 0, 0.25)'
                    });
                    $("#manage_subscription").find('i').toggleClass('fas fa-plus fas fa-minus');


                    $("#subscription_dropdown").css("display", "block");
                    // dropdo.style.display = "block";
                    $(".first_sidebar").hide();
                    $(".second_sidebar").show();
                    // $('#a1').addClass("active");
                    $('#a2').addClass("active");
                    // $('#a1 span img').attr("src","../assets/img/theme/light/human-resources_WHite.png");
                    $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_black.png");
                    $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_white.png");

                    $("#part_0").hide();
                    $("#item_1").hide();
                    $("#item_2").show();

                }
            });
        });


        var config = {
            routes: {
                subs_store: "{!! route('subscription.post') !!}",
                subs_delete: "{!! route('subscription.delete') !!}",
                subs_detail: "{!! route('subscription.detail') !!}",
                subs_update: "{!! route('subscription.update') !!}",
                subs_view: "{!! route('subscription.show') !!}",
                my_test: "{!! route('myTest') !!}",


            }
        };
        $("#add_holiday_form").validate({
            rules: {
                acName: {
                    required: true,
                },
                emailName: {
                    required: true,
                },

                passName: {
                    required: true,
                },
                statusName: {
                    required: true,
                },

                moduleName: {
                    required: true,
                },
                amountName: {
                    required: true,
                    number: true
                },
            },
            messages: {
                acName: {
                    required: "Please enter a name",
                },
                quantityName: {
                    required: "Please enter quantity",
                },
                passName: {
                    required: "Please enter password",
                },
                statusName: {
                    required: "Please Select ",
                },
                moduleName: {
                    required: "Please enter name",
                },
                amountName: {
                    required: "Please enter amount",
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


        $("#company_edit_form").validate({
            rules: {
                acName: {
                    required: true,
                },
                emailName: {
                    required: true,
                },

                passName: {
                    required: true,
                },
                statusName: {
                    required: true,
                },

                moduleName: {
                    required: true,
                },
                amountName: {
                    required: true,
                    number: true
                },
            },
            messages: {
                acName: {
                    required: "Please enter a name",
                },
                quantityName: {
                    required: "Please enter quantity",
                },
                passName: {
                    required: "Please enter password",
                },
                statusName: {
                    required: "Please Select ",
                },
                moduleName: {
                    required: "Please enter name",
                },
                amountName: {
                    required: "Please enter amount",
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


        $(document).on('submit', '#add_holiday_form', function (event) {
            event.preventDefault();
            $.ajax({
                url: config.routes.subs_store,
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


                        var rowCount = $('#sub_table_id >tbody >tr').length + 1;

                        sub_table.row.add([

                            '' + data.item.account_name + '',
                            '' + data.item.account_email + '',
                            '' + data.item.account_password  + '',
                            '<button type="button" class="btn view_btn view_employee_btn_class commonbtn" data-toggle="modal" data-id="' + data.item.id +'" data-target="#view_employee_modal" id="view_employee_btn">   <i class="fa fa-eye"></i>   </button>   <button type="button" class="btn edit_btn editcompany commonbtn" data-toggle="modal" data-id="' + data.item.id +'" data-target="#exampleModal">   <i class="fa fa-pencil"></i>   </button>   <button type="button" class="btn delete_btn deletecompany commonbtn" data-id="'+ data.item.id +'">   <i class="fa fa-trash"></i>   </button>'


                        ]) ;
                        sub_table.draw();



//                         $('#subscription_table').append(`<tr class="unqcompany` + data.item.id + `">
//
//                 <td>` + data.item.account_name + ` </td>
//                 <td>` + data.item.account_email + ` </td>
//                 <td>` + data.item.account_password + ` </td>
//
// <td>
//
//                 <button type="button" class="btn view_btn view_employee_btn_class commonbtn" data-toggle="modal"
//                id="view_employee_btn"
//                 data-target = "#view_employee_modal"
//                 data-id="` + data.item.id + `"
//                 >
//                   <i class="fa fa-eye"></i>
//                  </button>
//
//                  <button type="button" class="btn edit_btn editcompany commonbtn" data-toggle="modal"
//
//                  data-id="` + data.item.id + `"
//                  data-target="#exampleModal">
//                     <i class="fa fa-pencil"></i>
//                  </button>
//                 <button type="button" class="btn delete_btn deletecompany commonbtn"
//                 data-id="` + data.item.id + `"
//                 >
//                    <i class="fa fa-trash"></i>
//                 </button>
//             </td>
//
//             </tr>`);
                        toastr.success('Information was Created successfully');
                        setTimeout(function () {
                            $('#add_holiday_modal').modal('hide');
                        }, 1500);
                        $('#add_holiday_form').trigger('reset');

                    } else {
                        toastr.error("Failed to store");
                    }
                }
            })
        });
        $(document).on('click', '.deletecompany', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
            var type = 'show';
            // alert(id);
            if (confirm('Are You Sure to Delete ?')) {
                $.ajax({
                    url: config.routes.subs_delete,
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
                        // $(this).closest('tr').hide();
                        // location.reload();
                    },
                    error: function(data, errorThrown)
                    {
                        toastr.error("An error has occurred");

                    }
                });
            }
        });

        $(document).on('click', '.view_employee_btn_class', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'show';
            console.log(id, si);

            $.ajax({
                url: config.routes.subs_view,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },

                success: function (data) {
                    console.log(data);
                    // $('#view_employee_modal').modal('show');
                    $('#company_view_form').find('#accId').val(data.dept.account_name);
                    $('#company_view_form').find('#emailId').val(data.dept.account_email);
                    $('#company_view_form').find('#passId').val(data.dept.account_password);
                    $('#company_view_form').find('#startDateId').val(data.dept.start_date);
                    $('#company_view_form').find('#endDateId').val(data.dept.end_date);
                    $('#company_view_form').find('#statusId').val(data.dept.payment_status);
                    $('#company_view_form').find('#moduleId').val(data.dept.module);
                    $('#company_view_form').find('#amountId').val(data.dept.amount);
                    $('#company_view_form').find('#id').val(id);
                    $('#company_view_form').find('#si').val(si);
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
                url: config.routes.subs_detail,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },

                success: function (data) {
                    // console.log(data);
                    $('#company_edit_form').find('#accId').val(data.dept.account_name);
                    $('#company_edit_form').find('#emailId').val(data.dept.account_email);
                    $('#company_edit_form').find('#passId').val(data.dept.account_password);
                    $('#company_edit_form').find('#startDateId').val(data.dept.start_date);
                    $('#company_edit_form').find('#endDateId').val(data.dept.end_date);
                    $('#company_edit_form').find('#statusId').val(data.dept.payment_status);
                    $('#company_edit_form').find('#moduleId').val(data.dept.module);
                    $('#company_edit_form').find('#amountId').val(data.dept.amount);
                    $('#company_edit_form').find('#id').val(id);
                    $('#company_edit_form').find('#si').val(si);
                }
            });


        });
        $(document).on('submit', '#company_edit_form', function (e) {
            e.preventDefault();
            var si = $('#company_edit_form').find('#si').val();
            $.ajax({
                url: config.routes.subs_update,
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


                        var rowCount = $('#sub_table_id >tbody >tr').length + 1;
                        // alert(data.item.users.first_name);
                        $('.unqcompany' + data.item.id).replaceWith(`<tr class="unqcompany` + data.item.id + `">

               <td>` + data.item.account_name + ` </td>
                <td>` + data.item.account_email + ` </td>
                <td>` + data.item.account_password + ` </td>

<td>


                 <button type="button" class="btn view_btn view_employee_btn_class commonbtn" data-toggle="modal"
                 id="view_employee_btn"
                  data-target = "#view_employee_modal"
                 data-id="` + data.item.id + `"
                    >
                 <i class="fa fa-eye"></i>
                 </button>



                 <button type="button" class="btn edit_btn editcompany commonbtn" data-toggle="modal"

                 data-id="` + data.item.id + `"
                 data-target="#exampleModal">
                  <i class="fa fa-pencil"></i>
                 </button>
                <button type="button" class="btn delete_btn deletecompany commonbtn"
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
                        $('#company_edit_form').trigger('reset');
                    } else {
                        toastr.error("Failed to update");
                    }
                }
            });
        });

    </script>
@endsection
<!-- End custom js for this page-->
