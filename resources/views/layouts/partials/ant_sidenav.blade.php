<div class="sidenav" id="sidenav-main">
    <!-- Sidenav header -->
    <div class="sidenav-header d-flex align-items-center ml-5">
        <a class="navbar-brand" href="{{route('ant.dashboard')}}">
            <img style=" width: 100%; height: 50px;" src="{{asset('backend/img/theme/light/ant_2.png')}}"
                 class="navbar-brand-img" alt="...">
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
                    <h5 class="mb-0 text-white">{{Auth::user()->last_name}}</h5>
                    <!--<span class="d-block text-sm text-white opacity-8 mb-3">Web Architect</span>-->
{{--                    <span class="d-block text-sm text-white opacity-8 mb-3">Designation</span>--}}
                    <span class="d-block text-sm text-white opacity-8 mb-3">

                          @foreach(Auth::user()->user_designation() as $item)

                            {{$item->designation_name}}
                            @if (!$loop->last),@endif
                        @endforeach

                    </span>
                    <a href="#" style="width: 47%;height: 37px;"
                       class="btn btn-sm btn-white btn-icon rounded-pill shadow hover-translate-y-n3">
                        <!--<span class="btn-inner&#45;&#45;icon"><i class="fas fa-coins"></i></span>-->
                        {{--<span id="tag_line_text" style="" class="btn-inner--text">#vyrevy</span>--}}
                        <span id="tag_line_text" style="" class="btn-inner--text text-sm">{{Auth::user()->nick_name ?Auth::user()->nick_name:"No Nickname"}}</span>
                    </a>
                </div>
            </div>
            <!-- User info -->
            <!-- Actions -->
            <!--<div   id=""  class="w-100 mt-4 actions d-flex justify-content-between">-->
            <div id="top_icon" class="mt-n2">
                <a href="{{route('user-profile')}}" class="action-item action-item-lg text-white pl-0">
                    <i class="fas fa-user"></i>
                </a>
                @hasanyrole('Super-Admin|Admin')
                <a href="{{ route('admin.dasboard') }}" class="action-item action-item-lg text-white">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    @else
                        <a href="#modal-chat" class="action-item action-item-lg text-white" data-toggle="modal">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            @endhasanyrole


                        </a>
                        <a href="{{ route('logout') }}" class="action-item action-item-lg text-white pr-0">
                            <i class="fas fa-sign-out-alt"></i>


                        </a>
            </div>

        </div>


    </div>


    <!-- Whole Sidebar starts from here -->
    <div id="whole_sidebar" class="nav-application clearfix">

        {{--First sidebar starts from here--}}

        <div class="first_sidebar">
            <nav>
                <ul class="mcd-menu_1">
                    <li>

                        <a id="home_anchor" style="" href="{{route('ant.dashboard')}}" class="active">
                            <span class="li_image"><i id="home_icon" class="fas fa-home fa-2x"></i></span>

                            <span id="home_text" style="" class="li_text">Ant <br> Home</span>

                        </a>

                    </li>
                    <li id="part_1">
                        <a href="{{route('user.holiday.index')}}">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Holiday_black.png')}}"
                                     style="margin-top: 7px">
                            </span>
                            {{--<span id="holiday_text" class="li_text">View Your<br>Holidays</span>--}}
                            <span id="" class="holiday_text">View Your<br>Holiday</span>
                        </a>
                    </li>
                    <li>
                        {{--                        <a href="{{route('user.attendance.view')}}">--}}
                        <a href="#">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Your task_Black.png')}}" style="">
                            </span>
                            <span class="li_text">Your <br>Task</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{route('ant.dashboard')}}" class="">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Your performance_black.png')}}"
                                     style="margin-top: 0px">
                            </span>
                            <span class="li_text">Your <br>Performance</span>
                        </a>
                    </li>


                    <li id="">
                        <a href="{{route('user.attendance.view')}}" class="">
                            <span class="li_image">
                                <img class="test_img"
                                     src="{{asset('backend/img/theme/light/Attendnce-black.png')}}"
                                     alt="Image placeholder" style="">
                            </span>
                            <span class="li_text">Your <br>Attendance</span>
                        </a>

                    </li>

                    <li>
                        <a href="#">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Project_black.png')}}" style="">
                            </span>
                            <span class="li_text">Your <br>Project</span>
                        </a>

                    </li>


                    <li id="lead_generation_page">
                        <a href="{{route('ant-information.index')}}" class="">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Lead_black.png')}}" style="">
                            </span>
                            <span class="li_text">Your  <br>Information</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('ask-for-leave.index')}}" class="a7">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Leave_black.png')}}" style="">
                            </span>
                            <span class="li_text">Ask for <br>Leaves</span>
                        </a>
                    </li>


                </ul>
            </nav>
        </div>

    {{--First sidebar ends  here--}}

    <!--Second Sidebar starts here-->

        <div class="">
            <div class="second_sidebar">
                <!--<nav>-->
                <ul class="mcd-menu">
                    <li id="list_0">

                        <a style="" href="{{route('ant.dashboard')}}" class="">
                            <span class="li_image"><i style="font-size:50px;margin-left: 28px "
                                                      class="fas fa-home fa-2x"></i></span>

                            <span class="li_text">Ant <br>Home</span>
                        </a>

                    </li>
                    <li id="list_2">
                        <a href="{{route('user.holiday.index')}}" id="a2">
                            <span class="li_image">
                                  <img class="test_img" alt="Image placeholder"
                                       src="{{asset('backend/img/theme/light/Holiday_black.png')}}"
                                       style="margin-top: 7px">
                            </span>
                            {{--<span class="li_text">View Your<br>Holidays</span>--}}
                            <span class="holiday_text">View Your<br>Holiday</span>
                        </a>
                    </li>
                    <li id="list_4">
                        <a href="#">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Your task_Black.png')}}" style="">
                            </span>
                            <span class="li_text">Your <br> Task</span>
                        </a>
                    </li>
                    <li id="list_5">
                        <a href="#" id="a5" class="">
                    <span class="li_image">
                    <img class="test_img" alt="Image placeholder"
                         src="{{asset('backend/img/theme/light/Your performance_black.png')}}" style="">
                    </span>
                            <span class="li_text">Your <br>Performance</span>
                        </a>
                    </li>

                    <li id="list_1">
                        <a id="a1" href="{{route('user.attendance.view')}}">
                            <span class="li_image">
                                <img id="hr_image" class="test_img"
                                     src="{{asset('backend/img/theme/light/Attendnce-black.png')}}"
                                     alt="Image placeholder">
                            </span>
                            <span class="li_text">Your <br>Attendance</span>
                        </a>

                    </li>

                    <li id="list_3">
                        <a href="#">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Project_black.png')}}" style=" ">
                            </span>
                            <span class="li_text">Your <br>Project</span>
                        </a>

                    </li>


                    <li id="lead_generation_list">
                        <a href="{{route('ant-information.index')}}" id="lead_generation_link" class="">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Lead_black.png')}}" style="">
                            </span>
                            <span class="li_text">Your <br>Information</span>
                        </a>
                    </li>

                    <li id="ask_for_leave">
                        <a href="{{route('ask-for-leave.index')}}" id="afl_link" class="a7">
                            <span class="li_image">
                                <img class="test_img" alt="Image placeholder"
                                     src="{{asset('backend/img/theme/light/Leave_black.png')}}" style="">
                            </span>
                            <span class="li_text">Ask for<br>Leave</span>
                        </a>
                    </li>
                </ul>
                <!--</nav>-->
            </div>
        </div>
        <!--Second Sidebar ends here-->
    </div>
</div>
