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

        /*#fire_emp_card{*/
        /*height: 700px;*/
        /*}*/


    </style>

@endsection

@section('content')

    <div class="top_text">
        <h1>Fire Employees</h1>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">
        {{--<div class="modal-dialog modal-md" role="document">--}}
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{--<h5 class="text-center font-weight-bolder" id="">Assign Employees</h5>--}}
                <form method="post" name="fire_emp_form" id="fire_emp_form">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="text-center">Are you sure, you want to fire this employee?</h6>

                                </div>

                            </div>

                            <div class="card-body text-center d-flex justify-content-center">

                                <div class="">

                                    <div class="col-md-6 float-left">
                                        {{--<button type="submit" class="btn btn-success sub_btn">Yes</button>--}}
                                        <button type="submit" class="btn btn-success sub_btn">Yes</button>
                                    </div>
                                    <div class="col-md-6 float-right">
                                        <button type="button" style="" class="btn btn-danger sub_btn"
                                                data-dismiss="modal">No
                                        </button>

                                    </div>

                                </div>


                                <input type="hidden" id="id" name="id" class="form-control">
                                <input type="hidden" id="si" class="form-control">
                                {{--</div>--}}

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center d-flex flex-column justify-content-center">
                        {{--<button type="submit" class="btn btn-primary sub_btn">Assign</button>--}}
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

                <div style="position: relative" class="card-body">

                    <div class="row justify-content-between align-items-center mx-2 pt-4">

                        <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                            <div class="align-items-center m-4 d-inline-flex">
                                <label id="total_left_employee">
                                    @if($left =="")
                                        You have no assigned employees
                                    @else
                                        You Have total <span id="left_employee">{{$left}} </span > assigned employee
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

{{--                    <button id="let_emp_btn" class=""--}}
{{--                            data-target="">--}}
{{--                        <a href="#" class="left_employee">--}}
{{--                            --}}{{--You Have total <span class="d-block mb-2 ">{{$left}} employees</span>--}}

{{--                            @if($left =="")--}}
{{--                                    You have no assigned employees--}}
{{--                                @else--}}
{{--                                You Have total <span class="d-block mb-2 ">{{$left}} employees</span></a>--}}
{{--                            @endif--}}

{{--                    </button>--}}


                    <div style="border: none" class="card">
                        <div class="card-title">
                            <div class="preview">
                            </div>
                        </div>
                        <div class="test"></div>
                        <div id="fire_emp_card" class="card-body">
                            <div id="maheeb" class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
{{--                                        <table id="order-listing" class="table holiday_table">--}}
                                        <table id="fire_table" class="table holiday_table">
                                            {{--<table id="employee_list_table" class="table holiday_table">--}}
                                            {{--<thead id="holiday_head" >--}}
                                            <thead>

                                            <tr class="myTableHead">
                                                {{--<tr class="myHead">--}}
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <th>Activity</th>
                                            </tr>

                                            </thead>

                                            <tbody class="holiday_row" id="fireTableAppend">

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
                                                        <td>{{$item->users->mobile_number}}</td>
                                                        <td>{{$item->users->email}}</td>
                                                        <td>


                                                            <button type="button"
                                                                    data-serial="{{$loop->index + 1}}"
                                                                    class="btn-primary btn-round-lg btn-lg fire_btn fireemp commonbtn"
                                                                    data-id="{{$item->user_id}}" data-toggle="modal"
                                                                    data-target="#exampleModal">
{{--                                                                <img src="{{asset('backend/img/theme/light/fire.png')}}"--}}
{{--                                                                     alt="">--}}
                                                                Fire
                                                            </button>
                                                            {{--<button type="button"--}}
                                                            {{--data-serial="{{$loop->index + 1}}"--}}
                                                            {{--class="btn deletecompany commonbtn"--}}
                                                            {{--data-id="{{$user->id}}">--}}
                                                            {{--<img src="{{asset('backend/img/theme/light/fire.png')}}"--}}
                                                            {{--alt="">--}}
                                                            {{--</button>--}}


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


@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')

    <script type="text/javascript">

        var fire_table = $('#fire_table').DataTable({
            sDom: 'lrtip',
            "paging": false,
            fixedHeader: true
        });
        $('#search_datatable_input').on('keyup', function () {
            fire_table.search(this.value).draw();

        });

        jQuery(function ($) {
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

            console.log(path);
            $('ul a').each(function () {
                if (this.href === path) {
                    // console.log ($("a[href == path]").find('id'));
                    $("#employee_role_mng").addClass("active");
                    $("#fire_emp_roles").css({
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


        var config = {
            routes: {
                fire_employee_detail: "{!! route('fire-employee.detail') !!}",
                fire_employee_update: "{!! route('fire-employee.update') !!}",

            }
        };

        // $(document).on('click', '.deletecompany', function (e) {
        //     e.preventDefault();
        //     var id = $(this).data('id');
        //     var tr = $(this).closest('tr');
        //     var type = 'show';
        //     // alert(id);
        //     if (confirm('Are You Sure to Delete ?')) {
        //         $.ajax({
        //             url: config.routes.fire_employee_store,
        //             type: "get",
        //             data: {
        //                 id: id
        //             },
        //             success: function (data) {
        //                 console.log(data);
        //                 toastr.success('Employee has fired successfully');
        //                 tr.fadeOut(1000, function(){
        //                     $(this).remove();
        //                 });
        //             }
        //         });
        //     }
        // });


        $(document).on('submit', '#fire_emp_form', function (e) {
            e.preventDefault();
            var si = $('#fire_emp_form').find('#si').val();
            $.ajax({
                url: config.routes.fire_employee_update,
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

                    $("#fireTableAppend").html(data.table);
                    // $(".left_employee").html(data.left);
                    $("#total_left_employee").html(data.left);

                    toastr.success('Employee has fired successfully');
                    setTimeout(function () {
                        $('#exampleModal').modal('hide');
                    }, 1500);
                    $('#fire_emp_form').trigger('reset');
                }
            });
        });


        $(document).on('click', '.fireemp', function (e) {

            e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');

            var tr = $(this).closest('tr');
            console.log(tr);
            // console.log(id,si);
            $.ajax({
                url: config.routes.fire_employee_detail,
                type: "get",
                data: {
                    id: id,
                    // type: type,
                },

                success: function (data) {
                    console.log(data);

                    // fireEmp();

                    $('#fire_emp_form').find('#id').val(id);
                    $('#fire_emp_form').find('#si').val(si);
                }
            });


        });


        // function fireEmp() {
        //     $(document).on('submit', '#fire_emp_form', function (e) {
        //         e.preventDefault();
        //         var si = $('#fire_emp_form').find('#si').val();
        //
        //         toastr.success('Employee has fired successfully');
        //         setTimeout(function () {
        //             $('#exampleModal').modal('hide');
        //         }, 1500);
        //         $('#fire_emp_form').trigger('reset');
        //         tr.fadeOut(1000, function(){
        //             $(this).remove();
        //         });
        //
        //     });
        // }


    </script>


@endsection
<!-- End custom js for this page-->
