<nav class="navbar navbar-main navbar-expand-lg navbar-dark bg-primary navbar-border" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand + Toggler (for mobile devices) -->
        {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}
        <!-- User's navbar -->
        {{--<div class="navbar-user d-lg-none ml-auto">--}}
            {{--<ul class="navbar-nav flex-row align-items-center">--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link nav-link-icon sidenav-toggler" data-action="sidenav-pin" data-target="#sidenav-main"><i class="fas fa-bars"></i></a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link nav-link-icon" data-action="omnisearch-open" data-target="#omnisearch"><i class="fas fa-search"></i></a>--}}
                {{--</li>--}}
                {{--<li class="nav-item dropdown dropdown-animate">--}}
                    {{--<a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell"></i></a>--}}
                    {{--<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-arrow p-0">--}}
                        {{--<div class="py-3 px-3">--}}
                            {{--<h5 class="heading h6 mb-0">Notifications</h5>--}}
                        {{--</div>--}}
                        {{--<div class="list-group list-group-flush">--}}
                            {{--<a href="#" class="list-group-item list-group-item-action">--}}
                                {{--<div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="2 hrs ago">--}}
                                    {{--<div>--}}
                                        {{--<span class="avatar bg-primary text-white rounded-circle">AM</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="flex-fill ml-3">--}}
                                        {{--<div class="h6 text-sm mb-0">Alex Michael <small class="float-right text-muted">2 hrs ago</small></div>--}}
                                        {{--<p class="text-sm lh-140 mb-0">--}}
                                            {{--Some quick example text to build on the card title.--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="list-group-item list-group-item-action">--}}
                                {{--<div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="3 hrs ago">--}}
                                    {{--<div>--}}
                                        {{--<span class="avatar bg-warning text-white rounded-circle">SW</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="flex-fill ml-3">--}}
                                        {{--<div class="h6 text-sm mb-0">Sandra Wayne <small class="float-right text-muted">3 hrs ago</small></div>--}}
                                        {{--<p class="text-sm lh-140 mb-0">--}}
                                            {{--Some quick example text to build on the card title.--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="list-group-item list-group-item-action">--}}
                                {{--<div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="5 hrs ago">--}}
                                    {{--<div>--}}
                                        {{--<span class="avatar bg-info text-white rounded-circle">JM</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="flex-fill ml-3">--}}
                                        {{--<div class="h6 text-sm mb-0">Jason Miller <small class="float-right text-muted">5 hrs ago</small></div>--}}
                                        {{--<p class="text-sm lh-140 mb-0">--}}
                                            {{--Some quick example text to build on the card title.--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="list-group-item list-group-item-action">--}}
                                {{--<div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="2 hrs ago">--}}
                                    {{--<div>--}}
                                        {{--<span class="avatar bg-dark text-white rounded-circle">MJ</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="flex-fill ml-3">--}}
                                        {{--<div class="h6 text-sm mb-0">Mike Thomson <small class="float-right text-muted">2 hrs ago</small></div>--}}
                                        {{--<p class="text-sm lh-140 mb-0">--}}
                                            {{--Some quick example text to build on the card title.--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="list-group-item list-group-item-action">--}}
                                {{--<div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="3 hrs ago">--}}
                                    {{--<div>--}}
                                        {{--<span class="avatar bg-primary text-white rounded-circle">RN</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="flex-fill ml-3">--}}
                                        {{--<div class="h6 text-sm mb-0">Richard Nixon <small class="float-right text-muted">3 hrs ago</small></div>--}}
                                        {{--<p class="text-sm lh-140 mb-0">--}}
                                            {{--Some quick example text to build on the card title.--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="py-3 text-center">--}}
                            {{--<a href="#" class="link link-sm link--style-3">View all notifications</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="nav-item dropdown dropdown-animate">--}}
                    {{--<a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                  {{--<span class="avatar avatar-sm rounded-circle">--}}
                    {{--<img alt="Image placeholder" src="../assets/img/theme/light/team-4-800x800.jpg">--}}
                  {{--</span>--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">--}}
                        {{--<h6 class="dropdown-header px-0">Hi, Heather!</h6>--}}
                        {{--<a href="../application/user/profile.html" class="dropdown-item">--}}
                            {{--<i class="fas fa-user"></i>--}}
                            {{--<span>My profile</span>--}}
                        {{--</a>--}}
                        {{--<a href="../application/account/settings.html" class="dropdown-item">--}}
                            {{--<i class="fas fa-cog"></i>--}}
                            {{--<span>Settings</span>--}}
                        {{--</a>--}}
                        {{--<a href="../application/account/billing.html" class="dropdown-item">--}}
                            {{--<i class="fas fa-credit-card"></i>--}}
                            {{--<span>Billing</span>--}}
                        {{--</a>--}}
                        {{--<a href="../application/shop/orders.html" class="dropdown-item">--}}
                            {{--<i class="fas fa-shopping-basket"></i>--}}
                            {{--<span>Orders</span>--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-divider"></div>--}}
                        {{--<a href="../application/authentication/login.html" class="dropdown-item">--}}
                            {{--<i class="fas fa-sign-out-alt"></i>--}}
                            {{--<span>Logout</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        <!-- Navbar nav -->
        <div class="collapse navbar-collapse navbar-collapse-fade" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">
                <!-- Overview  -->
                <li class="nav-item d-lg-none ">
                    <a class="nav-link" href="../index.html">
                        Overview
                    </a>
                </li>
                <li class="border-top opacity-2 my-2"></li>
                <!-- Home  -->
                <!--<li class="nav-item ">-->
                <!--<a class="nav-link pl-lg-0" href="../application/home.html">-->
                <!--Home-->
                <!--</a>-->
                <!--</li>-->
                <!--&lt;!&ndash; Application menu &ndash;&gt;-->
                <!--<li class="nav-item dropdown dropdown-animate" data-toggle="hover">-->
                <!--<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--Application-->
                <!--</a>-->
                <!--<div class="dropdown-menu dropdown-menu-arrow p-lg-0">-->
                <!--&lt;!&ndash; Top dropdown menu &ndash;&gt;-->
                <!--<div class="p-lg-4">-->
                <!--<div class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">-->
                <!--<a href="#" class="dropdown-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--Project-->
                <!--</a>-->
                <!--<div class="dropdown-menu"><a class="dropdown-item" href="../application/project/card-listing.html">-->
                <!--Card listing-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/project/table-listing.html">-->
                <!--Table listing-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/project/overview.html">-->
                <!--Overview-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/project/create-new.html">-->
                <!--Create new-->
                <!--</a>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">-->
                <!--<a href="#" class="dropdown-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--Task-->
                <!--</a>-->
                <!--<div class="dropdown-menu"><a class="dropdown-item" href="../application/task/table-listing.html">-->
                <!--Table listing-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/task/kanban-board.html">-->
                <!--Kanban board-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/task/create-new.html">-->
                <!--Create new-->
                <!--</a>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">-->
                <!--<a href="#" class="dropdown-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--User-->
                <!--</a>-->
                <!--<div class="dropdown-menu"><a class="dropdown-item" href="../application/user/card-listing.html">-->
                <!--Card listing-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/user/table-listing.html">-->
                <!--Table listing-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/user/profile.html">-->
                <!--Profile-->
                <!--</a>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">-->
                <!--<a href="#" class="dropdown-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--Authentication-->
                <!--</a>-->
                <!--<div class="dropdown-menu"><a class="dropdown-item" href="../application/authentication/login.html">-->
                <!--Login-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/authentication/register.html">-->
                <!--Register-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/authentication/recover.html">-->
                <!--Recover-->
                <!--</a>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">-->
                <!--<a href="#" class="dropdown-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--Account-->
                <!--</a>-->
                <!--<div class="dropdown-menu"><a class="dropdown-item" href="../application/account/profile.html">-->
                <!--Profile-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/account/settings.html">-->
                <!--Settings-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/account/billing.html">-->
                <!--Billing-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/account/notifications.html">-->
                <!--Notifications-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/account/addresses.html">-->
                <!--Addresses-->
                <!--</a>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">-->
                <!--<a href="#" class="dropdown-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--Shop-->
                <!--</a>-->
                <!--<div class="dropdown-menu"><a class="dropdown-item" href="../application/shop/card-listing.html">-->
                <!--Card listing-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/shop/table-listing.html">-->
                <!--Table listing-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/shop/product.html">-->
                <!--Product-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/shop/orders.html">-->
                <!--Orders-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/shop/order-description.html">-->
                <!--Order description-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/shop/cart.html">-->
                <!--Cart-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/shop/sellers.html">-->
                <!--Sellers-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/shop/invoices.html">-->
                <!--Invoices-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/shop/invoice-description.html">-->
                <!--Invoice description-->
                <!--</a>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">-->
                <!--<a href="#" class="dropdown-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--Utility-->
                <!--</a>-->
                <!--<div class="dropdown-menu"><a class="dropdown-item" href="../application/utility/error-404.html">-->
                <!--Error 404-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/utility/error-500.html">-->
                <!--Error 500-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/utility/maintenance-mode.html">-->
                <!--Maintenance mode-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/utility/faq.html">-->
                <!--Faq-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="../application/utility/topic.html">-->
                <!--Topic-->
                <!--</a>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--&lt;!&ndash; Bottom dropdown menu &ndash;&gt;-->
                <!--<div class="dropdown-menu-links rounded-bottom delimiter-top p-lg-4">-->
                <!--<div class="row">-->
                <!--<div class="col-sm-6">-->
                <!--<a href="../application/calendar.html" class="dropdown-item">Calendar</a>-->
                <!--<a href="../application/timeline.html" class="dropdown-item">Timeline</a>-->
                <!--</div>-->
                <!--<div class="col-sm-6">-->
                <!--<a href="../application/task/kanban-board.html" class="dropdown-item">Kanban board</a>-->
                <!--<a href="../application/google-map.html" class="dropdown-item">Google map</a>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--<a class="nav-link" href="../application/widgets.html">-->
                <!--Widgets-->
                <!--</a>-->
                <!--</li>-->
                <!--<li class="nav-item dropdown dropdown-animate" data-toggle="hover">-->
                <!--<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Docs</a>-->
                <!--<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-arrow p-0">-->
                <!--<ul class="list-group list-group-flush">-->
                <!--<li>-->
                <!--<a href="../docs/index.html" class="list-group-item list-group-item-action" role="button">-->
                <!--<div class="media d-flex align-items-center">-->
                <!--&lt;!&ndash; SVG icon &ndash;&gt;-->
                <!--<figure style="width: 50px;">-->
                <!--<img alt="Image placeholder" src="../assets/img/icons/essential/detailed/DOC_File.svg" class="svg-inject img-fluid" style="height: 50px;">-->
                <!--</figure>-->
                <!--&lt;!&ndash; Media body &ndash;&gt;-->
                <!--<div class="media-body ml-3">-->
                <!--<h6 class="mb-1">Documentation</h6>-->
                <!--<p class="mb-0">Awesome section examples for any scenario.</p>-->
                <!--</div>-->
                <!--</div>-->
                <!--</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--<a href="../docs/components/index.html" class="list-group-item list-group-item-action" role="button">-->
                <!--<div class="media d-flex align-items-center">-->
                <!--&lt;!&ndash; SVG icon &ndash;&gt;-->
                <!--<figure style="width: 50px;">-->
                <!--<img alt="Image placeholder" src="../assets/img/icons/essential/detailed/Mobile_UI.svg" class="svg-inject img-fluid" style="height: 50px;">-->
                <!--</figure>-->
                <!--&lt;!&ndash; Media body &ndash;&gt;-->
                <!--<div class="media-body ml-3">-->
                <!--<h6 class="mb-1">Components</h6>-->
                <!--<p class="mb-0">Awesome section examples for any scenario.</p>-->
                <!--</div>-->
                <!--</div>-->
                <!--</a>-->
                <!--</li>-->
                <!--</ul>-->
                <!--<div class="dropdown-menu-links rounded-bottom delimiter-top p-4">-->
                <!--<div class="row">-->
                <!--<div class="col-sm-6">-->
                <!--<a href="../docs/getting-started/installation.html" class="dropdown-item">Installation</a>-->
                <!--<a href="../docs/getting-started/file-structure.html" class="dropdown-item">File structure</a>-->
                <!--<a href="../docs/getting-started/build-tools.html" class="dropdown-item">Build tools</a>-->
                <!--<a href="../docs/getting-started/customization.html" class="dropdown-item">Customization</a>-->
                <!--</div>-->
                <!--<div class="col-sm-6">-->
                <!--<a href="../docs/getting-started/plugins.html" class="dropdown-item">Using plugins</a>-->
                <!--<a href="../docs/components/index.html" class="dropdown-item">Components</a>-->
                <!--<a href="../docs/plugins/animate.html" class="dropdown-item">Plugins</a>-->
                <!--<a href="../docs/support.html" class="dropdown-item">Support</a>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</li>-->
                <!--<li class="border-top opacity-2 my-2"></li>-->
                <!--&lt;!&ndash; Docs menu &ndash;&gt;-->
                <!--<li class="nav-item d-lg-none">-->
                <!--<a class="nav-link" href="../docs/index.html">-->
                <!--Docs-->
                <!--</a>-->
                <!--</li>-->
                <!--<li class="nav-item d-lg-none">-->
                <!--<a class="nav-link" href="../application/authentication/register.html">-->
                <!--Register-->
                <!--</a>-->
                <!--</li>-->
                <!--<li class="nav-item d-lg-none">-->
                <!--<a class="nav-link" href="../application/authentication/login.html">-->
                <!--Sign in-->
                <!--</a>-->
                <!--</li>-->
            </ul><!-- Right menu -->
            <ul class="navbar-nav ml-lg-auto align-items-center d-none d-lg-flex">
                <li class="nav-item">
                    <a href="#" class="nav-link nav-link-icon sidenav-toggler" data-action="sidenav-pin" data-target="#sidenav-main"><i class="fas fa-bars"></i></a>


                </li>
                <li class="nav-item dropdown dropdown-animate">
                    <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media media-pill align-items-center">
                    <span class="avatar rounded-circle">
                      <img class="user_photo_top_right" alt="Image placeholder" src="{{asset('backend/img/user_photo/'.Auth::user()->photo) }}">
                    </span>
                            <div class="ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->first_name}}  {{Auth::user()->last_name}}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                        <h6 class="dropdown-header px-0">Hi, {{Auth::user()->first_name}}</h6>
                        <a href="{{route('user-profile')}}" class="dropdown-item">
                            <i class="fas fa-user"></i>
                            <span>My profile</span>
                        </a>

                        <a href="{{route('viewchange')}}" class="dropdown-item">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            <span>Change Password</span>
                        </a>

                        <div class="dropdown-divider"></div>
                        {{--<a href="#!" class="dropdown-item">--}}
                            {{--<i class="fas fa-sign-out-alt"></i>--}}
                            {{--<span>Logout</span>--}}
                        {{--</a>--}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
