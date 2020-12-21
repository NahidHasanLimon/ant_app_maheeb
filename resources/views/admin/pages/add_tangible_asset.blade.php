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

    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Manage Tangible Asset</h1>
    </div>


    <!-- end of modal edit -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div style="border: none; border-radius:25px " class="card">
                <div class="row justify-content-between align-items-center mx-2 pt-4">
                         <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                            <div class="align-items-center m-4 d-inline-flex">
                                <a class="btn btn-primary btn-sm add_btn" href="" data-toggle="modal" data-target="#asset_modal" id="add_asset_btn">
                                     <i class="fa fa-plus">Add Asset</i>
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
                <div id="asset_card" style="position: relative" class="card-body">

                   {{--  <button class="vieweditButoon" data-toggle="modal"
                            data-target="#asset_modal" id="add_holiday_btn">
                        <a href="#" class="">
                            <i class="fa fa-plus my-float"> <span class="btn_txt">Add new Asset</span></i>

                        </a>
                    </button> --}}

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
                                        <table id="asset_table" class="table holiday_table">
                                            {{--<thead id="holiday_head" >--}}
                                            <thead>

                                            <tr class="myTableHead">
                                                {{--<tr class="myHead">--}}

                                                <th>Category</th>
                                                <th>Assets</th>
                                                <th>Quantity</th>
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

                                                        <td>{{$item->tangible_category->tangible_category_name}}</td>
                                                        <td>{{$item->tangible_asset_name}}</td>
                                                        <td>{{$item->tangible_asset_quantity}}</td>


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
    <div class="modal fade" id="asset_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">

        <div class="modal-dialog" role="document">
            {{--<div class="modal-dialog modal-lg modal-dialog-centered" role="document">--}}
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h5 class="modal-title" id="exampleModalLabel">Add new Assets</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="border: none" class="card">
                        <div class="card-title">
                            <div class="preview"><i class="" aria-hidden="true"></i>
                                <h5 class="text-center font-weight-bolder" id="">Add New Assets</h5>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- create / add submit form -->
                                    <form method="post" name="add_holiday_form" id="add_holiday_form">
                                        @csrf
                                        <fieldset>

                                            <div class="d-flex justify-content-center">
                                                <div class="form-group col-md-10">
                                                    <label for="exampleFormControlSelect1">Category</label>
                                                    <select class="form-control" id="cmpId" name="cmpName">
                                                        <option selected="selected" value="">Select a category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->tangible_category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div>
                                                <div class="col-md-6 float-left">
                                                    <div class="form-group">
                                                        <label for="department_name">Assets</label>
                                                        <input id="deptId" class="form-control" name="deptName"
                                                               type="text"
                                                               placeholder="Enter  Assets" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 float-right">
                                                    <div class="form-group">
                                                        <label for="department_name">Quantity</label>
                                                        <input id="quantityId" class="form-control" name="quantityName"
                                                               type="text"
                                                               placeholder="Enter  Quantity Name.." required>
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
                    {{--<h5 class="modal-title" id="exampleModalLabel">Edit Assets</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="text-center font-weight-bolder" id="">Edit Asset</h5>
                <form method="post" name="company_edit_form" id="company_edit_form">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card-body text-center d-flex flex-column justify-content-center">

                                <div class="d-flex justify-content-center">
                                    <div class="form-group col-md-10">
                                        <label for="exampleFormControlSelect1">Category</label>
                                        <select class="form-control" id="cmpId" name="cmpName">
                                            <option selected="selected" value="">Select a category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->tangible_category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div>
                                    <div class="col-md-6 float-left">
                                        <div class="form-group">
                                            <label for="department_name">Assets</label>
                                            <input id="deptId" class="form-control" name="deptName"
                                                   type="text"
                                                   placeholder="Enter  Assets" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-right">
                                        <div class="form-group">
                                            <label for="department_name">Quantity</label>
                                            <input id="quantityId" class="form-control" name="quantityName"
                                                   type="text"
                                                   placeholder="Enter  Quantity Name.." required>
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

        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path


            $('ul a').each(function () {
                if (this.href === path) {
                    // console.log ($("a[href == path]").find('id'));
                    // $("#btn_1").addClass("active");
                    $("#tang_assets_dropdown").addClass("active");
                    $("#manage_tang_asset").css({
                        'font-family': 'Josefin Sans',
                        'font-style': 'normal',
                        'font-weight': 'bold',
                        'font-size': '13px',
                        'line-height': '12px',
                        'color': 'black',
                        'text-shadow': '0px 4px 4px rgba(0, 0, 0, 0.25)'
                    });
                    $("#tang_assets").find('i').toggleClass('fas fa-plus fas fa-minus');

                    $("#tang_assets_dropdown").css("display", "block");

                    $(".first_sidebar").hide();
                    $(".second_sidebar").show();
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
                tang_asset_store: "{!! route('tang-asset.post') !!}",
                tang_asset_delete: "{!! route('tang-asset.delete') !!}",
                tang_asset_detail: "{!! route('tang-asset.detail') !!}",
                tang_asset_update: "{!! route('tang-asset.update') !!}",


            }
        };

        $("#add_holiday_form").validate({
            rules: {
                deptName: {
                    required: true,
                },
                quantityName: {
                    required: true,
                    number: true

                },


                cmpName: {
                    required: true,
                },
            },
            messages: {
                deptName: {
                    required: "Please enter a name",
                },
                quantityName: {
                    required: "Please enter quantity",
                },
                cmpName: {
                    required: "Please Select First",
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
                deptName: {
                    required: true,
                },
                quantityName: {
                    required: true,
                },


                cmpName: {
                    required: true,
                },
            },
            messages: {
                deptName: {
                    required: "Please enter a name",
                },
                quantityName: {
                    required: "Please enter quantity",
                },
                cmpName: {
                    required: "Please Select First",
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

        var asset_table = $('#asset_table').DataTable({
            sDom: 'lrtip',
            "paging": false,
            fixedHeader: true
        });
        $('#search_datatable_input').on( 'keyup', function () {
            asset_table.search( this.value ).draw();

        });


        $(document).on('submit', '#add_holiday_form', function (event) {
            event.preventDefault();
            $.ajax({
                url: config.routes.tang_asset_store,
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



                     asset_table.row.add([

                            '' + data.item.tangible_category.tangible_category_name + '',
                            '' + data.item.tangible_asset_name + '',
                            '' + data.item.tangible_asset_quantity  + '',
                            '<button type="button" class="btn edit_btn editcompany commonbtn" data-toggle="modal" data-id="' + data.item.id +'" data-target="#exampleModal">   <i class="fa fa-pencil"></i>   </button><button type="button" class="btn delete_btn deletecompany delete_pr_cat commonbtn" data-id="'+ data.item.id +'">   <i class="fa fa-trash"></i>   </button>'


                        ]).node().id =data.item.id ;
                       asset_table.draw();






//                         var rowCount = $('#asset_table >tbody >tr').length + 1;
//                         $('#companyappend').append(`<tr class="unqcompany` + data.item.id + `">
//
//                 <td>` + data.item.tangible_category.tangible_category_name + ` </td>
//                 <td>` + data.item.tangible_asset_name + ` </td>
//                 <td>` + data.item.tangible_asset_quantity + ` </td>
//
//
//
// <td>
//
//                  <button type="button" class="btn edit_btn editcompany commonbtn" data-toggle="modal"
//
//                  data-id="` + data.item.id + `"
//                  data-target="#exampleModal">
//                    <i class="fa fa-pencil"></i>
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
                            $('#asset_modal').modal('hide');
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
                    url: config.routes.tang_asset_delete,
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

        $(document).on('click', '.editcompany', function (e) {
            $("#holiday_3").show();
            $("#holiday_4").hide();
            e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'edit';
            // console.log(id,si);

            $.ajax({
                url: config.routes.tang_asset_detail,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },

                success: function (data) {
                    // console.log(data);
                    $('#company_edit_form').find('#cmpId').val(data.company.id);
                    $('#company_edit_form').find('#deptId').val(data.dept.tangible_asset_name);
                    $('#company_edit_form').find('#quantityId').val(data.dept.tangible_asset_quantity);
                    $('#company_edit_form').find('#id').val(id);
                    $('#company_edit_form').find('#si').val(si);
                }
            });


        });
        $(document).on('submit', '#company_edit_form', function (e) {
            e.preventDefault();
            var si = $('#company_edit_form').find('#si').val();
            $.ajax({
                url: config.routes.tang_asset_update,
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


                        var rowCount = $('#asset_table >tbody >tr').length + 1;
                        // alert(data.item.users.first_name);
                        $('.unqcompany' + data.item.id).replaceWith(`<tr class="unqcompany` + data.item.id + `">

                 <td>` + data.item.tangible_category.tangible_category_name + ` </td>
                <td>` + data.item.tangible_asset_name + ` </td>
                <td>` + data.item.tangible_asset_quantity + ` </td>


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
                }
            });
        });

    </script>
@endsection
<!-- End custom js for this page-->