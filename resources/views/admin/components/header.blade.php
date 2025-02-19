<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="/dashboard">
                <!-- Logo icon -->
                <b class="logo-icon ps-2">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{asset('backend/assets/images/logo-icon.png')}}" alt="/dashboard" class="light-logo"
                        width="25" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text ms-2">
                    <!-- dark Logo text -->
                    <img src="{{asset('backend/assets/images/logo-text.png')}}" alt="/dashboard" class="light-logo" />
                </span>
                <!-- Logo icon -->
                <!-- <b class="logo-icon"> -->
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <!-- <img src="{{asset('backend/assets/images/logo-text.png')}}" alt="/dashboard" class="light-logo" /> -->

                <!-- </b> -->
                <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                        data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                </li>
                <!-- ============================================================== -->
                <!-- create new -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item search-box">
                    <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i
                            class="mdi mdi-magnify fs-4"></i></a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control" placeholder="Search &amp; enter" />
                        <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                    </form>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-bell font-24"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('backend/assets/images/users/1.jpg')}}" alt="user" class="rounded-circle"
                            width="31" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-account me-1 ms-1"></i> My
                            Profile</a>
                        <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-wallet me-1 ms-1"></i> My
                            Balance</a>
                        <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-email me-1 ms-1"></i>
                            Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-settings me-1 ms-1"></i>
                            Account
                            Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/admin/logout"><i class="fa fa-power-off me-1 ms-1"></i>
                            Logout</a>
                        <div class="dropdown-divider"></div>
                        <div class="ps-4 p-10">
                            <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded text-white">View
                                Profile</a>
                        </div>
                    </ul>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/specialties"
                        aria-expanded="false"><i class=" fas fa-cog"></i><span class="hide-menu">Specialties</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/users"
                        aria-expanded="false"><i class="me-2 mdi mdi-account"></i><span class="hide-menu">User</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/doctors"
                        aria-expanded="false"><i class="me-2 mdi mdi-account"></i><span class="hide-menu">Doctors</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/posts"
                        aria-expanded="false"><i class="far fa-newspaper"></i><span class="hide-menu">Posts</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/schedules"
                        aria-expanded="false"><i class="fas fa-calendar-check"></i><span class="hide-menu">Schedules</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/contacts"
                        aria-expanded="false"><i class=" fas fa-inbox"></i><span class="hide-menu">Contact</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/charts"
                        aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Charts</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/widgets"
                        aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span
                            class="hide-menu">Widgets</span></a>
                </li>
                <li class="sidebar-item">
                            <a href="/pages-invoice" class="sidebar-link"><i
                                    class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Invoice
                                </span></a>
                        </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->