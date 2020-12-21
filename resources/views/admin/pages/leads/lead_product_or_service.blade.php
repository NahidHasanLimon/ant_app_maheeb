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
            font-weight: 400;
            line-height: 1.5;
            display: block;
            width: 100%;
            height: calc(1.5em + 1.5rem + 2px);
            padding: .75rem 1.25rem;
            transition: all .2s ease;
            color: #8492a6;
            /*border: 1px solid #e0e6ed;*/
            border-radius: .25rem;
            background-color: #fff;
            background-clip: padding-box;
            box-shadow: inset 0 1px 1px rgba(31, 45, 61, .075);
        }
        label {
            display: inline-block;
            margin-bottom: .5rem;
            font-weight: bold;
            color: black;
            font-size: 11px;
        }
    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Product or Services</h1>
    </div>
    <div class="modal fade" id="add_holiday_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h5 class="modal-title" id="exampleModalLabel">Add New Product/Service</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="border: none" class="card">
                        <div class="card-title">
                            <div class="preview"><i class="" aria-hidden="true"></i>
                                <h5 class="text-center font-weight-bolder" id="">Add New Product/Service</h5>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- create / add submit form -->
                                    <form method="post" name="add_holiday_form" id="add_holiday_form">
                                        @csrf
                                        <fieldset>
                                            <div class="">
                                                <div class="col-md-6 float-left">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Industry</label>
                                                        <select class="form-control" id="cmpId" name="cmpName">
                                                            <option selected="selected" value="">Select an Industry</option>
                                                            @foreach($companies as $company)
                                                                <option value="{{$company->id}}">{{$company->lead_industry_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 float-right">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Sub-Industry</label>

                                                        <select name="deptName" id="deptId" class="form-control"
                                                                style="">
                                                            <option value="">Select Industry First</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="col-md-6 float-left">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Product/Service</label>
                                                        <select class="form-control" id="psId" name="psName">
                                                            <option selected="selected" value="">Select Product/Service</option>
                                                            @foreach($productServices as $key => $value)
                                                                <option value="{{$key}}">{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 float-left">
                                                    <div class="form-group">
                                                        <label for="department_name">Product/Service Name</label>
                                                        <input id="sub_dept_id" class="form-control"
                                                               name="lead_product_or_service_name"
                                                               type="text"
                                                               placeholder="Enter  Product/Service Name.." required>
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
                    {{--<h5 class="modal-title" id="exampleModalLabel">Edit Product/Service</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="text-center font-weight-bolder" id="">Edit Product/Service</h5>
                <form method="post" name="company_edit_form" id="company_edit_form">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card-body text-center d-flex flex-column justify-content-center">

                                <div class="">
                                    <div class="col-md-6 float-left">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Industry</label>
                                            <select class="form-control" id="cmpId" name="cmpName">
                                                <option selected="selected" value="">Select an Industry</option>
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{$company->lead_industry_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-right">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Sub-Industry</label>

                                            <select name="deptName" id="deptId" class="form-control"
                                                    style="">
                                                <option value="">Select Industry First</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="col-md-6 float-left">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Product/Service</label>
                                            <select class="form-control" id="psId" name="psName">
                                                <option selected="selected" value="">Select Product/Service</option>
                                                @foreach($productServices as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-left">
                                        <div class="form-group">
                                            <label for="department_name">Product/Service Name</label>
                                            <input id="sub_dept_id" class="form-control"
                                                   name="lead_product_or_service_name"
                                                   type="text"
                                                   placeholder="Enter Product/Service Name.." required>
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
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">
                <div class="row justify-content-between align-items-center mx-3 pt-4">
                    <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                        <div class="align-items-center m-4 d-inline-flex">

                            <a class="btn btn-primary btn-sm add_btn" href="" data-toggle="modal"
                               data-target="#add_holiday_modal" id="add_holiday_btn">
                                <i class="fa fa-plus">Add Product/Services</i>
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

                    {{--<button class="vieweditButoon" data-toggle="modal"--}}
                            {{--data-target="#add_holiday_modal" id="add_holiday_btn">--}}
                        {{--<a href="#" class="">--}}
                            {{--<i class="fa fa-plus my-float"> <span class="btn_txt">Add Product/Services</span></i>--}}
                        {{--</a>--}}
                    {{--</button>--}}

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
                                        <table id="prod_service_table" class="table holiday_table">
                                            {{--<thead id="holiday_head" >--}}
                                            <thead>

                                            <tr class="myTableHead">
                                                {{--<tr class="myHead">--}}

                                                <th>Industry</th>
                                                <th>Subindustry</th>
                                                <th>Product/Service</th>
                                                <th>Name</th>
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

                                                        <td>{{$item->lead_sub_industry->lead_industry->lead_industry_name}}</td>
                                                        <td>{{$item->lead_sub_industry->lead_sub_industry_name}}</td>
                                                        <td>{{ ($item->is_lead_product_or_service==0) ? "Product" : "Service" }}  </td>
                                                        <td>{{$item->lead_product_or_service_name}}</td>

                                                        <td>
                                                            <button type="button"
                                                                    data-serial="{{$loop->index + 1}}"
                                                                    class="btn edit_btn editcompany commonbtn"
                                                                    data-id="{{$item->id}}" data-toggle="modal"
                                                                    data-target="#exampleModal">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                            <button type="button" data-id="{{$item->id}}"
                                                                    class="btn delete_btn deletecompany commonbtn">
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

        var prod_service_table = $('#prod_service_table').DataTable({

            sDom: 'lrtip',
            "paging": false,
            fixedHeader: true,
        });
        $('#search_datatable_input').on('keyup', function () {
            prod_service_table.search(this.value).draw();

        });

        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path


            $('ul a').each(function () {
                if (this.href === path) {
                    // console.log ($("a[href == path]").find('id'));
                    // $("#btn_1").addClass("active");
                    $("#lead_structure_button").addClass("active");
                    $("#manage_product_service").css({
                        'font-family': 'Josefin Sans',
                        'font-style': 'normal',
                        'font-weight': 'bold',
                        'font-size': '13px',
                        'line-height': '12px',
                        'color': 'black',
                        'text-shadow': '0px 4px 4px rgba(0, 0, 0, 0.25)'
                    });
                    $("#lead_structure").find('i').toggleClass('fas fa-plus fas fa-minus');

                    // $(".my_sidenav_dropdown").attr("src","../../backend/img/theme/light/add_minus.png");

                    $("#lead_structure_dropdown").css("display", "block");
                    $(".first_sidebar").hide();
                    $(".second_sidebar").show();
                    $('#lead_generation_link').addClass("active");
                    $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_Black.png");
                    $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_black.png");
                    $('#lead_generation_link span img').attr("src", "/backend/img/theme/light/Lead_white.png");
                    $("#part_0").hide();
                    $("#item_1").hide();
                    $("#item_2").hide();
                    $("#lead_generation_item").show();

                }
            });
        });


        jQuery(document).ready(function () {
            jQuery('select[name="cmpName"]').on('change', function () {
                var countryID = jQuery(this).val();
                if (countryID) {
                    jQuery.ajax({
                        url: 'sub-industry/getSubIndustry/' + countryID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            jQuery('select[name="deptName"]').empty();
                            jQuery.each(data, function (key, value) {
                                // $('select[name="deptName"]').append('<option value="' + key + '">' + value + '</option>');
                                $('select[name="deptName"]').append('<option value="' + value.id + '">' + value.lead_sub_industry_name + '</option>');
                            });
                        }
                    });
                }
                else {
                    $('select[name="deptName"]').empty();
                }
            });
        });

        var config = {
            routes: {
                lead_product_service_store: "{!! route('lead-product-service.post') !!}",
                lead_product_service_delete: "{!! route('lead-product-service.delete') !!}",
                lead_product_service_detail: "{!! route('lead-product-service.detail') !!}",
                lead_product_service_update: "{!! route('lead-product-service.update') !!}",
                {{--                sub_dept_update: "{!! route('subDepartment.update') !!}",--}}

            }
        };


        $("#add_holiday_form").validate({
            rules: {

                cmpName: {
                    required: true,
                },
                deptName: {
                    required: true,
                },
                psName: {
                    required: true,
                },
                lead_product_or_service_name:{
                    required: true,
                }
            },
            messages: {

                cmpName: {
                    required: "Please Select First",
                },
                deptName: {
                    required: "Please Select First",
                },
                psName: {
                    required: "Please Select First",
                },
                lead_product_or_service_name:{
                    required: "Please Enter a Name",
                }

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

                cmpName: {
                    required: true,
                },
                deptName: {
                    required: true,
                },
                psName: {
                    required: true,
                },
                lead_product_or_service_name:{
                    required: true,
                }
            },
            messages: {

                cmpName: {
                    required: "Please Select First",
                },
                deptName: {
                    required: "Please Select First",
                },
                psName: {
                    required: "Please Select First",
                },
                lead_product_or_service_name:{
                    required: "Please Enter a Name",
                }

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
                url: config.routes.lead_product_service_store,
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


                        var is_p_or_s = (data.item.is_lead_product_or_service == 0) ? "product" : "Service";
                        var rowCount = $('#prod_service_table >tbody >tr').length + 1;


                        prod_service_table.row.add([

                            '' + data.item.lead_sub_industry.lead_industry.lead_industry_name  + '',
                            '' +  data.item.lead_sub_industry.lead_sub_industry_name + '',
                            '' +  is_p_or_s  + '',
                            '' +  data.item.lead_product_or_service_name + '',
                            '<button type="button" class="btn edit_btn editcompany commonbtn" data-toggle="modal" data-id="' + data.item.id +'" data-target="#exampleModal">   <i class="fa fa-pencil"></i>   </button><button type="button" class="btn delete_btn deletecompany commonbtn" data-id="'+ data.item.id +'">   <i class="fa fa-trash"></i>   </button>'


                        ]) ;
                        prod_service_table.draw();





//                         $('#companyappend').append(`<tr class="unqcompany` + data.item.id + `">
//
//             <td>` + data.item.lead_sub_industry.lead_industry.lead_industry_name + ` </td>
//             <td>` + data.item.lead_sub_industry.lead_sub_industry_name + ` </td>
//                      <td>` + is_p_or_s + ` </td>
//             <td>` + data.item.lead_product_or_service_name + ` </td>
//
//
//
// <td>
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
//                     <i class="fa fa-trash"></i>
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
                },
                error: function(data, errorThrown)
                {
                    toastr.error("This field is required or this name has already been taken");

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
                    url: config.routes.lead_product_service_delete,
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
                    }
                });
            }
        });

        $(document).on('click', '.editcompany', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'edit';
            // console.log(id,si);

            $.ajax({
                url: config.routes.lead_product_service_detail,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },

                success: function (data) {
                    // console.log(data.subDept.sub_department_name);
                    $('#company_edit_form').find('#cmpId').val(data.industry.id);
                    $('#company_edit_form').find('#deptId').html(data.drops);
                    $('#company_edit_form').find('#sub_dept_id').val(data.subDept.lead_product_or_service_name);
                    $('#company_edit_form').find('#psId').val(data.subDept.is_lead_product_or_service);
                    $('#company_edit_form').find('#id').val(id);
                    $('#company_edit_form').find('#si').val(si);
                }
            });


        });
        $(document).on('submit', '#company_edit_form', function (e) {
            e.preventDefault();
            var si = $('#company_edit_form').find('#si').val();
            $.ajax({
                url: config.routes.lead_product_service_update,
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
                        var is_p_or_s = (data.item.is_lead_product_or_service == 0) ? "product" : "Service";


                        var rowCount = $('#prod_service_table >tbody >tr').length + 1;
                        // alert(data.item.users.first_name);
                        $('.unqcompany' + data.item.id).replaceWith(`<tr class="unqcompany` + data.item.id + `">

              <td>` + data.item.lead_sub_industry.lead_industry.lead_industry_name + ` </td>
            <td>` + data.item.lead_sub_industry.lead_sub_industry_name + ` </td>
                     <td>` + is_p_or_s + ` </td>
            <td>` + data.item.lead_product_or_service_name + ` </td>


<td>

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
                    }
                    else{
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
