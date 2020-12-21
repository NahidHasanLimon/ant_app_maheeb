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

        /*.modal-dialog {*/
        /*    !*max-width: 500px;*!*/
        /*    max-width: 90% !important;*/
        /*    margin: 1.75rem auto;*/
        /*}*/

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
                    <div
                        class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                        <div class="align-items-center m-4 d-inline-flex">
                            <a class="btn btn-primary btn-sm add_btn" href="" data-toggle="modal"
                               data-target="#add_projects_modal" id="add_sub_department_btn">
                                <i class="fa fa-plus">Add Project</i>
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
                                                <th>Client</th>
                                                <th>Project Name</th>
                                                <th>KAM</th>
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

                                                        <td>{{$item->lead_company->lead_company_name}}</td>
                                                        <td>{{$item->projects_name}}</td>
                                                        <td>{{$item->user->first_name}}</td>

                                                        <td>
                                                            <button
                                                                class="btn view_btn view_project_btn_class commonbtn"
                                                                data-id="{{$item->id}}"
                                                                data-target="#view_project_modal"
                                                                data-toggle="modal">
                                                                <i class="fa fa-eye"></i>
                                                            </button>

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

    <div class="modal fade" id="view_project_modal" name="view_project_modal_name" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="text-center font-weight-bolder" id="">Project Details</h5>
                <form method="post" name="projects_view_form" id="projects_view_form">
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card-body text-center d-flex flex-column justify-content-center">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Company</label>
                                            <select class="form-control" id="company_id"
                                                    name="company_name" disabled="disabled">
                                                <option selected="selected" value="">Select a company</option>
                                                @foreach($companies as $company)
                                                    <option
                                                        value="{{$company->id}}">{{$company->lead_company_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="department_name">Brand</label>
                                            <select class="form-control" id="brand_id"
                                                    name="brand_name" disabled>
                                                <option selected="selected" value="">Select a brand</option>
                                                @foreach($brands as $brand)
                                                    <option
                                                        value="{{$brand->id}}">{{$brand->lead_brand_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="department_name">Project Name</label>
                                            <input id="project_id" class="form-control"
                                                   name="project_name" type="text"
                                                   placeholder="Enter Project Name.." disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Project Status Category</label>
                                            <select class="form-control" id="status_cat_id"
                                                    name="status_cat_name" disabled>
                                                <option selected="selected" value="">Select a category</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Project Status</label>
                                            <select class="form-control" id="status_id"
                                                    name="status_name" disabled>
                                                <option selected="selected" value="">Select a Status</option>
                                                @foreach($statuses as $status)
                                                    <option
                                                        value="{{$status->id}}">{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">KAM</label>
                                            <select class="form-control" id="kam_id" name="kam_name" disabled>
                                                <option selected="selected" value="">Select a Kam</option>
                                                @foreach($users as $user)
                                                    <option
                                                        value="{{$user->id}}">{{$user->first_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="department_name">Work Order
                                                Month</label>
                                            <input id="work_order_month_id" class="form-control"
                                                   name="work_order_month" type="date"
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Project Complete Month</label>
                                            <input id="project_com_month_id" class="form-control"
                                                   name="project_com_month_name"
                                                   type="date"
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="department_name">Revenue</label>
                                            <input id="rev_id" class="form-control" name="rev_name"
                                                   type="text"
                                                   placeholder="Enter Revenue " disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Cost</label>
                                            <input id="cost_id" class="form-control" name="cost_name"
                                                   type="text"
                                                   placeholder="Enter Cost" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="department_name">Usable Revenue</label>
                                            <input id="usable_rev_id" class="form-control"
                                                   name="usable_rev_name" type="text"
                                                   placeholder="Enter Usable Revenue" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Cash/Bank</label>
                                            <select class="form-control" id="cash_bank_id"
                                                    name="cash_bank_name" disabled>
                                                <option selected="selected" value="">Select a
                                                    cash/bank
                                                </option>
                                                @foreach($cash_bank as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6 pb-4">
                                        <label class="" for="journal_link">Journal Link</label>
                                        <input id="journal_link_id" class="form-control"
                                               name="journal_link_name" type="text"
                                               placeholder="Enter Journal Link" disabled>
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

    <div class="modal fade bd-example-modal-lg" id="add_projects_modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 col-xl-12 grid-margin stretch-card">

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
                                                            <label for="department_name">Company</label>
                                                            <select class="form-control" id="company_id"
                                                                    name="company_name">
                                                                <option selected="selected" value="">Select a company
                                                                </option>
                                                                @foreach($companies as $company)
                                                                    <option
                                                                        value="{{$company->id}}">{{$company->lead_company_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="" for="department_name">Brand</label>
                                                            <select class="form-control" id="brand_id"
                                                                    name="brand_name">
                                                                <option selected="selected" value="">Select Company First
                                                                </option>
{{--                                                                @foreach($brands as $brand)--}}
{{--                                                                    <option--}}
{{--                                                                        value="{{$brand->id}}">{{$brand->lead_brand_name}}</option>--}}
{{--                                                                @endforeach--}}
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="" for="department_name">Project Name</label>
                                                            <input id="project_id" class="form-control"
                                                                   name="project_name" type="text"
                                                                   placeholder="Enter Project Name.." >
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="department_name">Project Status Category</label>
                                                            <select class="form-control" id="status_cat_id"
                                                                    name="status_cat_name">
                                                                <option selected="selected" value="">Select a category
                                                                </option>
                                                                @foreach($categories as $cat)
                                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="department_name">Project Status</label>
                                                            <select class="form-control" id="status_id"
                                                                    name="status_name">
                                                                <option selected="selected" value="">Select Status Category First
                                                                </option>
{{--                                                                @foreach($statuses as $status)--}}
{{--                                                                    <option--}}
{{--                                                                        value="{{$status->id}}">{{$status->name}}</option>--}}
{{--                                                                @endforeach--}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="department_name">KAM</label>
                                                            <select class="form-control" id="kam_id" name="kam_name">
                                                                <option selected="selected" value="">Select a Kam
                                                                </option>
                                                                @foreach($users as $user)
                                                                    <option
                                                                        value="{{$user->id}}">{{$user->first_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="" for="department_name">Work Order
                                                                Month</label>
                                                            <input id="work_order_month_id" class="form-control"
                                                                   name="work_order_month" type="date"
                                                                   >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="department_name">Project Complete Month</label>
                                                            <input id="project_com_month_id" class="form-control"
                                                                   name="project_com_month_name"
                                                                   type="date"
                                                                   >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="" for="department_name">Revenue</label>
                                                            <input id="rev_id" class="form-control" name="rev_name"
                                                                   type="text"
                                                                   placeholder="Enter Revenue " >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="department_name">Cost</label>
                                                            <input id="cost_id" class="form-control" name="cost_name"
                                                                   type="text"
                                                                   placeholder="Enter Cost" >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="" for="department_name">Usable Revenue</label>
                                                            <input id="usable_rev_id" class="form-control"
                                                                   name="usable_rev_name" type="text"
                                                                   placeholder="Enter Usable Revenue" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="department_name">Cash/Bank</label>
                                                            <select class="form-control" id="cash_bank_id"
                                                                    name="cash_bank_name">
                                                                <option selected="selected" value="">Select a
                                                                    cash/bank
                                                                </option>
                                                                @foreach($cash_bank as $key=>$value)
                                                                    <option value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-md-6 pb-4">
                                                        <label class="" for="journal_link">Journal Link</label>
                                                        <input id="journal_link_id" class="form-control"
                                                               name="journal_link_name" type="text"
                                                               placeholder="Enter Journal Link" >
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
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-lg" role="document">
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
                                            <label for="department_name">Company</label>
                                            <select class="form-control" id="company_id"
                                                    name="company_name">
                                                <option selected="selected" value="">Select a company</option>
                                                @foreach($companies as $company)
                                                    <option
                                                        value="{{$company->id}}">{{$company->lead_company_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="department_name">Brand</label>
                                            <select class="form-control" id="brand_id"
                                                    name="brand_name">
                                                <option selected="selected" value="">Select a Company First</option>
{{--                                                @foreach($brands as $brand)--}}
{{--                                                    <option--}}
{{--                                                        value="{{$brand->id}}">{{$brand->lead_brand_name}}</option>--}}
{{--                                                @endforeach--}}
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="department_name">Project Name</label>
                                            <input id="project_id" class="form-control"
                                                   name="project_name" type="text"
                                                   placeholder="Enter Project Name.." >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Project Status Category</label>
                                            <select class="form-control" id="status_cat_id"
                                                    name="status_cat_name">
                                                <option selected="selected" value="">Select a category</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Project Status</label>
                                            <select class="form-control" id="status_id"
                                                    name="status_name">
                                                <option selected="selected" value="">Select a category First</option>
{{--                                                @foreach($statuses as $status)--}}
{{--                                                    <option--}}
{{--                                                        value="{{$status->id}}">{{$status->name}}</option>--}}
{{--                                                @endforeach--}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">KAM</label>
                                            <select class="form-control" id="kam_id" name="kam_name">
                                                <option selected="selected" value="">Select a Kam</option>
                                                @foreach($users as $user)
                                                    <option
                                                        value="{{$user->id}}">{{$user->first_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="department_name">Work Order
                                                Month</label>
                                            <input id="work_order_month_id" class="form-control"
                                                   name="work_order_month" type="date"
                                                   >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Project Complete Month</label>
                                            <input id="project_com_month_id" class="form-control"
                                                   name="project_com_month_name"
                                                   type="date"
                                                   >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="department_name">Revenue</label>
                                            <input id="rev_id" class="form-control" name="rev_name"
                                                   type="text"
                                                   placeholder="Enter Revenue " >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Cost</label>
                                            <input id="cost_id" class="form-control" name="cost_name"
                                                   type="text"
                                                   placeholder="Enter Cost" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="department_name">Usable Revenue</label>
                                            <input id="usable_rev_id" class="form-control"
                                                   name="usable_rev_name" type="text"
                                                   placeholder="Enter Usable Revenue" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_name">Cash/Bank</label>
                                            <select class="form-control" id="cash_bank_id"
                                                    name="cash_bank_name">
                                                <option selected="selected" value="">Select a
                                                    cash/bank
                                                </option>
                                                @foreach($cash_bank as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6 pb-4">
                                        <label class="" for="journal_link">Journal Link</label>
                                        <input id="journal_link_id" class="form-control"
                                               name="journal_link_name" type="text"
                                               placeholder="Enter Journal Link" >
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


        jQuery(document).ready(function () {
            jQuery('select[name="company_name"]').on('change', function () {
                var countryID = jQuery(this).val();
                if (countryID) {
                    jQuery.ajax({
                        url: 'new-project/get-brand/' + countryID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            jQuery('select[name="brand_name"]').empty();
                            jQuery.each(data, function (key, value) {
                                $('select[name="brand_name"]').append('<option value="' + value.id + '">' + value.lead_brand_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="brand_name"]').empty();
                }
            });
        });


        jQuery(document).ready(function () {
            jQuery('select[name="status_cat_name"]').on('change', function () {
                var countryID = jQuery(this).val();
                if (countryID) {
                    jQuery.ajax({
                        url: 'new-project/get-status/' + countryID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            jQuery('select[name="status_name"]').empty();
                            jQuery.each(data, function (key, value) {
                                $('select[name="status_name"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="status_name"]').empty();
                }
            });
        });



        var config = {
            routes: {
                new_projects_store: "{!! route('new-project.post') !!}",
                new_projects_delete: "{!! route('new-project.delete') !!}",
                new_projects_detail: "{!! route('new-project.detail') !!}",
                new_projects_view: "{!! route('new-project.view') !!}",
                new_projects_update: "{!! route('new-project.update') !!}",

            }
        };


        $(document).on('submit', '#add_projects_form', function (event) {
            event.preventDefault();
            $.ajax({
                url: config.routes.new_projects_store,
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

                            '' + data.item.lead_company.lead_company_name + '',
                            '' + data.item.projects_name + '',
                            '' + data.item.user.first_name + '',


                            '<button type="button" class="btn view_btn view_project_btn_class commonbtn" data-toggle="modal" data-id="' + data.item.id + '" data-target="#view_project_modal" id="view_project_btn">   <i class="fa fa-eye"></i>   </button> <button type="button" class="btn edit_btn edit_projects commonbtn" data-toggle="modal" data-id="' + data.item.id + '" data-target="#exampleModal">   <i class="fa fa-pencil"></i>   </button><button type="button" class="btn delete_btn delete_projects commonbtn" data-id="' + data.item.id + '">   <i class="fa fa-trash"></i>   </button>'


                        ]);
                        projects_table.draw();


                        toastr.success('Information was Created successfully');
                        setTimeout(function () {
                            $('#add_projects_modal').modal('hide');
                        }, 1500);
                        $('#add_projects_form').trigger('reset');

                    } else {
                        toastr.error("Failed to store");
                    }
                },
                error: function (data, errorThrown) {
                    toastr.error("An error has occurred");

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
                    url: config.routes.new_projects_delete,
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
                    error: function (data, errorThrown) {
                        toastr.error("An error has occurred");

                    }
                });
            }
        });

        $(document).on('click', '.view_project_btn_class', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'show';
            console.log(id, si);

            $.ajax({
                url: config.routes.new_projects_view,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },

                success: function (data) {

                    $('#projects_view_form').find('#company_id').val(data.projects.lead_company.id);
                    $('#projects_view_form').find('#brand_id').html(data.lead_brand_option);
                    $('#projects_view_form').find('#project_id').val(data.projects.projects_name);
                    $('#projects_view_form').find('#status_cat_id').val(data.projects.status_category.id);
                    $('#projects_view_form').find('#status_id').html(data.status_cat_option);
                    $('#projects_view_form').find('#kam_id').val(data.projects.user.id);
                    $('#projects_view_form').find('#work_order_month_id').val(data.projects.work_order_month);
                    $('#projects_view_form').find('#project_com_month_id').val(data.projects.project_complete_month);
                    $('#projects_view_form').find('#rev_id').val(data.projects.revenue);
                    $('#projects_view_form').find('#cost_id').val(data.projects.cost);
                    $('#projects_view_form').find('#usable_rev_id').val(data.projects.usable_revenue);
                    $('#projects_view_form').find('#cash_bank_id').val(data.projects.type);
                    $('#projects_view_form').find('#journal_link_id').val(data.projects.journal_link);

                },
                error: function (data, errorThrown) {
                    toastr.error("An error has occurred");

                }
            });


        });


        $(document).on('click', '.edit_projects', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var si = $(this).data('serial');
            var type = 'edit';
            // console.log(id,si);

            $.ajax({
                url: config.routes.new_projects_detail,
                type: "get",
                data: {
                    id: id,
                    type: type,
                },

                success: function (data) {
                    console.log(data)
                    // console.log(data.projects.subcategories.projects_sub_category_name);
                    var type = "";

                    if (data.projects.type === 1) {
                        type = "Cash";
                    } else {
                        type = "Bank";
                    }


                    $('#projects_edit_form').find('#company_id').val(data.projects.lead_company.id);
                    $('#projects_edit_form').find('#brand_id').html(data.lead_brand_option);
                    $('#projects_edit_form').find('#project_id').val(data.projects.projects_name);
                    $('#projects_edit_form').find('#status_cat_id').val(data.projects.status_category.id);
                    $('#projects_edit_form').find('#status_id').html(data.status_cat_option);
                    $('#projects_edit_form').find('#kam_id').val(data.projects.user.id);
                    $('#projects_edit_form').find('#work_order_month_id').val(data.projects.work_order_month);
                    $('#projects_edit_form').find('#project_com_month_id').val(data.projects.project_complete_month);
                    $('#projects_edit_form').find('#rev_id').val(data.projects.revenue);
                    $('#projects_edit_form').find('#cost_id').val(data.projects.cost);
                    $('#projects_edit_form').find('#usable_rev_id').val(data.projects.usable_revenue);
                    $('#projects_edit_form').find('#cash_bank_id').val(data.projects.type);
                    $('#projects_edit_form').find('#journal_link_id').val(data.projects.journal_link);
                    $('#projects_edit_form').find('#id').val(id);
                    $('#projects_edit_form').find('#si').val(si);
                },
                error: function (data, errorThrown) {
                    toastr.error("An error has occurred");

                }
            });


        });
        $(document).on('submit', '#projects_edit_form', function (e) {
            e.preventDefault();
            var si = $('#projects_edit_form').find('#si').val();
            $.ajax({
                url: config.routes.new_projects_update,
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


//                         var rowCount = $('#projects_table >tbody >tr').length + 1;
//                         // alert(data.item.users.first_name);
                        $('.unqcompany' + data.item.id).replaceWith(`<tr class="unqcompany` + data.item.id + `">


                <td>` + data.item.lead_company.lead_company_name + `</td>
                <td>` + data.item.projects_name + `</td>
                <td>` + data.item.user.first_name + `</td>


<td>

                <button type="button" class="btn view_btn view_project_btn_class commonbtn" data-toggle="modal" data-target="#view_project_modal" id="view_project_btn" data-id="` +data.item.id + `">   <i class="fa fa-eye"></i>   </button>

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
                error: function (data, errorThrown) {
                    toastr.error("An error has occurred");

                }
            });
        });

    </script>
@endsection
<!-- End custom js for this page-->
