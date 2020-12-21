<div class="sidenav" id="sidenav-main">
    <!-- Sidenav header -->
    <div class="sidenav-header d-flex align-items-center ml-5">
        <a class="navbar-brand" href="{{route('antHome')}}">
            <img style=" " src="{{asset('backend/img/logo/antapplogo_suva.png')}}"
                 class="navbar-brand-img img-fluid" alt="logo">

        </a>
        <div class="ml-auto">
            <!-- Sidenav toggler -->
            <div class="sidenav-toggler sidenav-toggler-dark d-md-none" data-action="sidenav-unpin"
                 data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- User mini profile -->
    <div class="sidenav-user d-flex flex-column align-items-center justify-content-between text-center">
        <!-- Avatar -->

        <div class="user_style">
            <div>
                <a href="#" class="avatar rounded-circle avatar-xl">
                    <img alt="Image placeholder" style="" src="{{asset('backend/img/user_photo/'.Auth::user()->photo) }}"
                         class="user_photo_height_width">
                </a>
                <div class="mt-4 pt-2">
                    <h5 class="mb-0 text-white">{{Auth::user()->first_name}} {{Auth::user()->middle_name}} </h5>
{{--                    <span class="d-block text-sm text-white opacity-8 mb-3">Creative Director</span>--}}
                    <span class="d-block text-sm text-white opacity-8 mb-3">

                        @foreach(Auth::user()->user_designation() as $item)

                            {{$item->designation_name}}
                            @if (!$loop->last),@endif
                            @endforeach

{{--                        {{Auth::user()->user_designation()->designation_name}}--}}


                    </span>
                    <a id="nick_name-text" href="#"
                       class="btn btn-sm btn-white btn-icon rounded-pill shadow hover-translate-y-n3 text-center">
                        <!--<span class="btn-inner&#45;&#45;icon"><i class="fas fa-coins"></i></span>-->
                        {{--<span id="tag_line_text" style="" class="btn-inner--text">#vyrevy</span>--}}
                        <span id="tag_line_text" style="" class="btn-inner--text text-sm">{{Auth::user()->nick_name ?Auth::user()->nick_name:"No Nickname"}}</span>
                    </a>
                </div>
            </div>
            <!-- User info -->
            <!-- Actions -->
            <!--<div   id=""  class="w-100 mt-4 actions d-flex justify-content-between">-->
            <div id="top_icon" class="">
                <a href="{{route('user-profile')}}" class="action-item action-item-lg text-white pl-0">
                    <i class="fas fa-user"></i>
                </a>
                <a href="{{ route('ant.dashboard') }}" class="action-item action-item-lg text-white">
                    {{-- <i class="fa fa-calendar" aria-hidden="true"></i> --}}
                    <i class="fa fa-eye"></i>
                    {{--  --}}


                </a>
                <a href="{{ route('logout') }}" class="action-item action-item-lg text-white pr-0">
                    <i class="fas fa-sign-out-alt"></i>


                </a>
            </div>

        </div>


    </div>


    <!-- Whole Sidebar starts from here -->
    <div id="whole_sidebar" class="nav-application clearfix mt-5">

        {{--Expanding sidenav starts here--}}


        <div id="item_1" class="expanding_sidenav">
            <button id="btn_1" class="dropdown-btn">Attendance & Leaves


                <i class="fas fa-plus drop_btn"></i>

            </button>
            <div id="dropdown_1" class="dropdown-container mx-2">
                <ul>
                    <li id="test_manage_attendance"><a class="side_link" id="parent_manage_attendance" style=""
                                                       href="#">Attendance <i id="angle_down"
                                                                                     class="fa fa-angle-right angle_down_btn"></i></a>
                        <ul id="attendnace_dropdown" class="submenu_dropdown mx-3">
                            <li><a class="" style="" id="view_edit_attendance"
                                   href="{{ route('admin.attendance.add.attendance') }}">Manage Attendance</a></li>
                            <li><a style="" id="approve_attendance"
                                   href="{{ route('superadmin.approveAttendance.index') }}">Approve Attendance</a></li>
{{--                            <li><a class="side_link disable_btn" id="link_1" style="" href="#">Manage Attendance</a>--}}
                        </ul>

                    </li>

                    <li id="test_10"><a class="side_link" id="parent_1" style="" href="#">Manage Leaves <i
                                    id="angle_down" class="fa fa-angle-right angle_down_btn"></i></a>
                        <ul id="leave_dropdown" class="submenu_dropdown ml-3">
                            <li><a id="approve_leave" href="{{route('approve-leave.index')}}">Approve Leave</a></li>
                            <li><a id="view_edit_leave" href="{{route('viewedit.index')}}">View/Edit Leave</a></li>
                        </ul>

                    </li>
{{--                    <li><a class="side_link" id="link_1" style="" href="{{route('holiday.index')}}">Manage Holidays</a>--}}
                    <li><a class="side_link" id="manage_holiday_id" style="" href="{{route('holiday.index')}}">Manage Holidays</a>
{{--                    <li><a class="side_link disable_btn" id="link_1" style="" href="#">View Attendance Reports</a>--}}
                    </li>

                </ul>
            </div>
            <button id="btn_2" class="dropdown-btn">Employee Management

                <i class="fas fa-plus drop_btn"></i>

            </button>
            <div id="employee_information_dropdown" class="dropdown-container mx-3">

                <ul>
                    <li><a class="" id="new_employee" style="" href="{{route('employee.index')}}">Manage Employee</a>
                    </li>
                    <li><a class="disable_btn" style="" href="#">Approve New employee info</a></li>

                </ul>

            </div>


            <button id="employee_role_mng" class="dropdown-btn">

{{--                Employee Role Management--}}
                Employee Posting
                <i class="fas fa-plus drop_btn"></i>
            </button>
            <div id="emp_role_mng_dropdown" class="dropdown-container mx-2">

                <ul>
                    <li id="mng_emp"><a class="side_link" id="mng_emp_roles" style="" href="#">Manage Employee Roles<i
                                    id="angle_down" class="fa fa-angle-right angle_down_btn"></i></a>
                        <ul class="submenu_dropdown mx-2" id="mng_emp_dropdown">
                            <li><a id="assign_emp_roles" href="{{route('assign-employee.index')}}">Assign Unassigned
                                    Employees</a></li>
                            <li><a id="deassign_emp_roles" href="{{route('de-assign-employee.index')}}">Deassign
                                    Employee Roles</a></li>
                            <li><a id="fire_emp_roles" href="{{route('fire-employee.index')}}">Fire Employees</a></li>
                        </ul>

                    </li>

                </ul>

            </div>
            <button id="task_mng" class="dropdown-btn disable_btn">

                Task Management
                <i class="fas fa-plus drop_btn"></i>
            </button>


            <button class="dropdown-btn disable_btn">

                Performance Evaluation
                <i class="fas fa-plus drop_btn"></i>
            </button>

            <button class="dropdown-btn disable_btn">

                Compensation Management
                <i class="fas fa-plus drop_btn"></i>
            </button>

            <button class="dropdown-btn disable_btn">

                Recruitment
                <i class="fas fa-plus drop_btn"></i>
            </button>


            <button class="dropdown-btn disable_btn">

                Training
                <i class="fas fa-plus drop_btn"></i>
            </button>

        </div>


        <div id="item_2" class="expanding_sidenav">
            <button id="company_structure" class="dropdown-btn">Company Structure
                <i class="fas fa-plus drop_btn"></i>
            </button>

            <div id="company_structure_dropdown" class="dropdown-container ml-3">
                <ul>
{{--                    <li><a class="" style="" id="manage_company" href="{{route('company.index')}}">Manage Companies</a>--}}
{{--                    </li>--}}
                    <li><a style="" id="manage_department" href="{{route('department.index')}}">Manage Departments</a>
                    </li>
                    <li><a id="manage_subdepartment" style="" href="{{route('subDepartment.index')}}">Manage
                            Sub-Departments</a></li>
                    <li><a id="manage_designation" style="" href="{{route('designation.index')}}">Manage
                            Designations</a></li>
                    <li><a class="disable_btn" id="" style="" href="#">Manage
                            Posting</a></li>
                </ul>


            </div>

            <button id="tang_assets" class="dropdown-btn">Manage Tangible Assets
                <i class="fas fa-plus drop_btn"></i>
            </button>

            <div id="tang_assets_dropdown" class="dropdown-container ml-3">
                <ul>
                    <li><a class="" style="" id="manage_tang_category" href="{{route('tang-cat.index')}}">Manage
                            tangible category</a></li>
                    <li><a class="" style="" id="manage_tang_asset" href="{{route('tang-asset.index')}}">Manage tangible
                            assets</a></li>
                    <li><a style="" id="" class="disable_btn" href="#">View Tangible assets report</a></li>
                </ul>

            </div>


            <button id="intangible_assets" class="dropdown-btn disable_btn">Manage Intangible Assets
                <i class="fas fa-plus drop_btn"></i>
            </button>

            <div id="intangible_assets_dropdown" class="dropdown-container ml-3">
                <ul>
                    <li><a class="" style="" id="" href="#">Manage intangible assets category</a></li>
                    <li><a class="" style="" id="" href="#">Manage intangible assets</a></li>
                    <li><a style="" id="" href="#">View inangible assets report</a></li>
                </ul>

            </div>


            <button id="manage_subscription" class="dropdown-btn">Manage Subscription
                <i class="fas fa-plus drop_btn"></i>
            </button>

            <div id="subscription_dropdown" class="dropdown-container ml-3">
                <ul>
                    <li><a class="" style="" id="manage_subscription_li" href="{{route('subscription.index')}}">Manage
                            Subscription</a></li>
                </ul>

            </div>

        </div>


        {{--Project management sidebar items starts here--}}

        <div id="project_management_item" class="expanding_sidenav">


            <button id="project_management_structure_btn" class="dropdown-btn">Manage Projects
                <i class="fas fa-plus drop_btn"></i>
            </button>
            <div id="project_management_dropdown" class="dropdown-container mx-2">


                <ul>

                    <li id="manage_pro_structure"><a class="side_link" id="parent_pro_structure" style=""
                                                     href="#">Projects Structure <i id="angle_down"
                                                                                    class="fa fa-angle-right angle_down_btn"></i></a>

                        <ul id="pro_structure_dropdown" class="submenu_dropdown mx-2">

                            <li><a class="" style="" id="manage_project_category"
                                   href="{{route('projects-category.index')}}">Manage Project Categories</a>
                            </li>

                            <li><a class="" style="" id="manage_project_sub_category"
                                   href="{{route('projects-sub-category.index')}}">Manage Project Sub Categories</a>
                            </li>
                            <li><a class="" style="" id="manage_project_status_category" href="{{route('project-status-category.index')}}">Project Status Categories</a></li>

                            <li><a class="" style="" id="manage_project_status" href="{{route('project-status.index')}}">Project Status</a></li>
{{--                            <li><a class="" style="" id="manage_project_item_category"--}}
{{--                                   href="{{route('project-item-category.index')}}">--}}
{{--                                    Project Item Categories</a>--}}
{{--                            </li>--}}


                        </ul>
                    </li>



                    <li id="mng_pro"><a class="side_link" id="parent_mng_pro_item" style=""
                                        href="#">Projects Items<i id="angle_down"
                                                            class="fa fa-angle-right angle_down_btn"></i></a>
                        <ul id="mng_pro_item_cat_dropdown" class="submenu_dropdown mx-3">


                            <li><a class="" style="" id="manage_project_item_category" href="{{route('project-item-category.index')}}">Project Item Categories</a></li>
                            <li><a class="" style="" id="manage_project_item_sub_category" href="{{route('project-item-sub-category.index')}}">Project Item SubCategories</a></li>
                            <li><a class="" style="" id="manage_item" href="{{route('item.index')}}">Manage Items</a></li>

                        </ul>
                    </li>



                    <li id="mng_pro"><a class="side_link" id="parent_mng_pro" style=""
                                        href="#">Projects<i id="angle_down"
                                                                       class="fa fa-angle-right angle_down_btn"></i></a>
                        <ul id="mng_pro_dropdown" class="submenu_dropdown mx-3">


                            <li><a class="" style="" id="manage_projects" href="{{route('projects.index')}}">Manage
                                    Project</a></li>
                            <li><a class="" style="" id="manage_project_item" href="{{route('project-item.index')}}">Manage
                                    Project Items</a></li>

                        </ul>
                    </li>




                </ul>


            </div>


        </div>


        {{--Project management sidebar items ends here--}}


        <div id="lead_generation_item" class="expanding_sidenav">


            <button id="lead_structure" class="dropdown-btn">Manage Lead Structure
                <i class="fas fa-plus drop_btn"></i>
            </button>
            <div id="lead_structure_dropdown" class="dropdown-container mx-2">
                <ul>
                    <li><a class="" style="" id="manage_industry" href="{{route('lead-industry.index')}}">Industries</a>
                    </li>
                    <li><a style="" id="manage_sub_industry" href="{{route('lead-sub-industry.index')}}">Sub
                            Industries</a></li>
                    <li><a id="manage_product_service" style="" href="{{route('lead-product-service.index')}}">Product
                            or Services</a></li>
                    <li><a id="manage_organizations" style="" href="{{route('lead-company.index')}}">Organizations</a>
                    </li>
                    <li><a id="manage_brands" style="" href="{{route('lead-brand.index')}}">Brands</a></li>
                    <li><a id="manage_brand_product_service" style="" href="{{route('lead-brand-service.index')}}">Brand
                            Product Services</a></li>
                </ul>


            </div>

            <button id="lead_gen_report" class="dropdown-btn disable_btn">View lead gen Report
                <i class="fas fa-plus drop_btn"></i>
            </button>

        </div>
        {{--Expanding sidenav ends here--}}


        {{--First sidenav starts here--}}


        <div class="first_sidebar">
            <nav>
                <ul class="mcd-menu_1">
                    <li>

                        {{--                        <a style="margin-left: 10px;padding-bottom: 23px;" href="{{route('antHome')}}" class="active">--}}
                        <a id="home_anchor" style="" href="{{route('antHome')}}" class="active">
                            <span class="li_image"><i id="home_icon" class="fas fa-home fa-2x"></i></span>

                            <span id="home_text" style="" class="li_text">Ant <br> Home</span>
                        </a>

                    </li>
                    <li id="part_2">
                        <a href="#">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/anthill_Black.png')}}"
                                     style="margin-top: 7px">
                            </span>
                            <span class="li_text">Anthill <br>Management</span>
                        </a>
                    </li>
                    <li id="lead_generation_page">
                        <a href="#" class="">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Lead_black.png')}}" style="">
                            </span>
                            <span class="li_text">Lead <br>Generation</span>
                        </a>
                    </li>


                    <li>
                        <a href="#" class="disable_btn">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/client _mgt_black.png')}}"
                                     style="margin-top: 0px;">
                            </span>
                            <span class="li_text">Client <br>Management</span>
                        </a>
                    </li>


                    <li>
                        <a href="#" class="a7 disable_btn">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/ppt_maker_Black.png')}}" style="">
                            </span>
                            <span class="li_text">Presentation <br>Maker</span>
                        </a>
                    </li>

                    <li id="part_1">
                        <a href="#" class="">
                            <span class="li_image">
                                <img class="test_img"
                                     src="{{asset('backend/img/theme/light/human-resources_black.png')}}"
                                     alt="Image placeholder" style="">
                            </span>
                            <span class="li_text">HR <br>Management</span>
                        </a>

                    </li>

                    <li id="project_management_page">
                        <a href="#">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Project_black.png')}}" style="">
                            </span>
                            <span class="li_text">Project <br>Management</span>
                        </a>

                    </li>


                    <li>
                        <a href="#" class="disable_btn">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Finance_black.png')}}" style="">
                            </span>
                            <span class="li_text">Finance <br>Management</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="a7 disable_btn">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/content_Black.png')}}" style="">
                            </span>
                            <span class="li_text">Content <br>Management</span>
                        </a>
                    </li>


                </ul>
            </nav>
        </div>

    {{--First sidenav ends here--}}


    <!--Second  Sidebar starts from here-->

        <div class="temp_5">
            <div class="second_sidebar">
                <!--<nav>-->
                <ul class="mcd-menu">
                    <li id="list_0">

                        <a style="" href="{{route('antHome')}}" class="">
                            <span class="li_image"><i style="font-size:50px;margin-left: 28px "
                                                      class="fas fa-home fa-2x"></i></span>

                            <span class="li_text">Ant <br>Home</span>
                        </a>

                    </li>
                    <li id="list_2">
                        <a href="#" id="a2">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/anthill_Black.png')}}" style="">
                            </span>
                            <span class="li_text">Anthill <br>Management</span>
                        </a>
                    </li>
                    <li id="lead_generation_list">
                        <a href="#" id="lead_generation_link" class="">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Lead_black.png')}}" style="">
                            </span>
                            <span class="li_text">Lead <br>Generation</span>
                        </a>
                    </li>


                    <li id="list_5">
                        <a href="#" id="a5" class="disable_btn">
                    <span class="li_image">
                    <img class="test_img" alt="Image placeholder"
                         src="{{asset('backend/img/theme/light/client _mgt_black.png')}}" style="">
                    </span>
                            <span class="li_text">Client <br>Management</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="a7 disable_btn">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/ppt_maker_Black.png')}}" style="">
                            </span>
                            <span class="li_text">Presentation Maker</span>
                        </a>
                    </li>


                    <li id="hr_mng_list_second_sb">
                        <a id="a1" href="#">
                            <span class="li_image">
                                <img id="hr_image" class="test_img"
                                     src="{{asset('backend/img/theme/light/human-resources_black.png')}}"
                                     alt="Image placeholder">
                            </span>
                            <span class="li_text">HR <br>Management</span>
                        </a>

                    </li>

                    <li id="project_management_list">
                        <a href="#" id="project_management_link">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Project_black.png')}}" style=" ">
                            </span>
                            <span class="li_text">Project <br>Management</span>
                        </a>

                    </li>
                    <li id="list_4">
                        <a href="#" class="disable_btn">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Finance_black.png')}}" style="">
                            </span>
                            <span class="li_text">Finance <br> Management</span>
                        </a>
                    </li>


                    <li id="list_7">
                        <a href="#" class="a7 disable_btn">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/content_Black.png')}}" style="">
                            </span>
                            <span class="li_text">Content <br>Management</span>
                        </a>
                    </li>
                </ul>
                <!--</nav>-->
            </div>
        </div>

        <!--Second  Sidebar ends here-->
    </div>
</div>
