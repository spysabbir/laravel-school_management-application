<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ config('app.name') }} - Dashboard">
	<meta name="author" content="{{ config('app.name') }}">
	<meta name="keywords" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name') }} - @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('template') }}/images/favicon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('template') }}/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('template') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/datatable/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/datatable/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="{{ asset('template') }}/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/sweetalert2/sweetalert2.min.css">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('template') }}/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="{{ asset('template') }}/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

    <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('template') }}/css/demo2/style.css">
    <!-- End layout styles -->

    <link rel="stylesheet" href="{{ asset('template') }}/vendors/toastr/toastr.css" >

    <style>
        .dataTables_wrapper .dt-buttons button {
            background-color: #f8f9fa;
        }
        .dataTables_wrapper .dt-buttons button:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
	<div class="main-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="{{ Auth::user()->user_type === 'backend' ? route('backend.dashboard') : route('dashboard') }}" class="sidebar-brand">
                    <span>{{ config('app.name') }}</span>
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                @include('layouts.navigation')
            </div>
        </nav>

        <nav class="settings-sidebar">
            <div class="sidebar-body">
                <a href="javaScript:void(0);" class="settings-sidebar-toggler">
                    <i data-feather="settings"></i>
                </a>
                <div class="theme-wrapper">
                    <h6 class="text-muted mb-2">Light Theme:</h6>
                    <a class="theme-item" href="{{ Auth::user()->user_type === 'backend' ? route('backend.dashboard') : route('dashboard') }}">
                        <img src="{{ asset('template') }}/images/screenshots/light.jpg" alt="light theme">
                    </a>
                    <h6 class="text-muted mb-2">Dark Theme:</h6>
                    <a class="theme-item active" href="{{ Auth::user()->user_type === 'backend' ? route('backend.dashboard') : route('dashboard') }}">
                        <img src="{{ asset('template') }}/images/screenshots/dark.jpg" alt="light theme">
                    </a>
                </div>
            </div>
        </nav>

        <!-- partial -->
        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <form class="search-form">
                        <div class="input-group">
                            <div class="input-group-text">
                                <i data-feather="search"></i>
                            </div>
                            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="grid"></i>
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
                                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                                    <p class="mb-0 fw-bold">Web Apps</p>
                                </div>
                            <div class="row g-0 p-1">
                                <div class="col-3 text-center">
                                    <a href="pages/apps/chat.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="message-square" class="icon-lg mb-1"></i><p class="tx-12">Chat</p></a>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="pages/apps/calendar.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="calendar" class="icon-lg mb-1"></i><p class="tx-12">Calendar</p></a>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="pages/email/inbox.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="mail" class="icon-lg mb-1"></i><p class="tx-12">Email</p></a>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="pages/general/profile.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="instagram" class="icon-lg mb-1"></i><p class="tx-12">Profile</p></a>
                                </div>
                            </div>
                                <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                                    <a href="javascript:;">View all</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="mail"></i>
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
                                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                                    <p>9 New Messages</p>
                                    <a href="javascript:;" class="text-muted">Clear all</a>
                                </div>
                                <div class="p-1">
                                <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                    <div class="me-3">
                                    <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="d-flex justify-content-between flex-grow-1">
                                    <div class="me-4">
                                        <p>Leonardo Payne</p>
                                        <p class="tx-12 text-muted">Project status</p>
                                    </div>
                                    <p class="tx-12 text-muted">2 min ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                    <div class="me-3">
                                    <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="d-flex justify-content-between flex-grow-1">
                                    <div class="me-4">
                                        <p>Carl Henson</p>
                                        <p class="tx-12 text-muted">Client meeting</p>
                                    </div>
                                    <p class="tx-12 text-muted">30 min ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                    <div class="me-3">
                                    <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="d-flex justify-content-between flex-grow-1">
                                    <div class="me-4">
                                        <p>Jensen Combs</p>
                                        <p class="tx-12 text-muted">Project updates</p>
                                    </div>
                                    <p class="tx-12 text-muted">1 hrs ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                    <div class="me-3">
                                    <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="d-flex justify-content-between flex-grow-1">
                                    <div class="me-4">
                                        <p>Amiah Burton</p>
                                        <p class="tx-12 text-muted">Project deatline</p>
                                    </div>
                                    <p class="tx-12 text-muted">2 hrs ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                    <div class="me-3">
                                    <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="d-flex justify-content-between flex-grow-1">
                                    <div class="me-4">
                                        <p>Yaretzi Mayo</p>
                                        <p class="tx-12 text-muted">New record</p>
                                    </div>
                                    <p class="tx-12 text-muted">5 hrs ago</p>
                                    </div>
                                </a>
                                </div>
                                <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                                    <a href="javascript:;">View all</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="bell"></i>
                                <div class="indicator">
                                    <div class="circle"></div>
                                </div>
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                                    <p>6 New Notifications</p>
                                    <a href="javascript:;" class="text-muted">Clear all</a>
                                </div>
                                <div class="p-1">
                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <i class="icon-sm text-white" data-feather="gift"></i>
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p>New Order Recieved</p>
                                            <p class="tx-12 text-muted">30 min ago</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <i class="icon-sm text-white" data-feather="alert-circle"></i>
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p>Server Limit Reached!</p>
                                            <p class="tx-12 text-muted">1 hrs ago</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                        <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p>New customer registered</p>
                                            <p class="tx-12 text-muted">2 sec ago</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <i class="icon-sm text-white" data-feather="layers"></i>
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p>Apps are ready for update</p>
                                            <p class="tx-12 text-muted">5 hrs ago</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <i class="icon-sm text-white" data-feather="download"></i>
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p>Download completed</p>
                                            <p class="tx-12 text-muted">6 hrs ago</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                                    <a href="javascript:;">View all</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="wd-30 ht-30 rounded-circle" src="{{ asset('uploads/profile_photo') }}/{{ Auth::user()->profile_photo }}" alt="profile">
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">
                                        <img class="wd-80 ht-80 rounded-circle" src="{{ asset('uploads/profile_photo') }}/{{ Auth::user()->profile_photo }}" alt="">
                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder">{{ Auth::user()->name }}</p>
                                        <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <ul class="list-unstyled p-1">
                                    <li class="dropdown-item p-0">
                                        <a href="{{ Auth::user()->user_type === 'backend' ? route('backend.profile.edit') : route('profile.edit') }}" class="text-body ms-0 d-block p-2">
                                            <i class="me-2 icon-md" data-feather="user"></i>
                                            <span>Profile Edit</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item p-0">
                                        <a href="{{ Auth::user()->user_type === 'backend' ? route('backend.profile.setting') : route('profile.setting') }}" class="text-body ms-0 d-block p-2">
                                            <i class="me-2 icon-md" data-feather="settings"></i>
                                            <span>Profile Setting</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item p-0">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}"  onclick="event.preventDefault(); this.closest('form').submit();" class="text-body ms-0 d-block p-2">
                                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->

            <div class="page-content">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Welcome to @yield('title')</h4>
                    </div>
                    @if (request()->routeIs('dashboard') || request()->routeIs('backend.dashboard'))
                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                            <span class="input-group-text input-group-addon bg-transparent border-primary">
                            <i data-feather="calendar" class=" text-primary"></i></span>
                            <input type="text" class="form-control border-primary bg-transparent" disabled>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                            <i class="btn-icon-prepend" data-feather="printer"></i>
                            Print Report
                        </button>
                        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                            <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                            Download Report
                        </button>
                    </div>
                    @else
                    <nav class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ Auth::user()->user_type === 'backend' ? route('backend.dashboard') : route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                        </ol>
                    </nav>
                    @endif
                </div>

                @yield('content')

            </div>

            <!-- partial:partials/_footer.html -->
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                <p class="text-muted mb-1 mb-md-0">Copyright © {{ date('Y') }} <a href="{{ config('app.url') }}" target="_blank">{{ config('app.name') }}</a>.</p>
                <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
            </footer>
            <!-- partial -->

        </div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('template') }}/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
    <script src="{{ asset('template') }}/vendors/chartjs/Chart.min.js"></script>
    <script src="{{ asset('template') }}/vendors/jquery.flot/jquery.flot.js"></script>
    <script src="{{ asset('template') }}/vendors/jquery.flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('template') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('template') }}/vendors/apexcharts/apexcharts.min.js"></script>

    <script src="{{ asset('template') }}/vendors/datatable/js/jquery.dataTables.js"></script>
    <script src="{{ asset('template') }}/vendors/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('template') }}/vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('template') }}/vendors/datatable/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('template') }}/vendors/datatable/js/jszip.min.js"></script>
    <script src="{{ asset('template') }}/vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="{{ asset('template') }}/vendors/datatable/js/buttons.print.min.js"></script>

	<script src="{{ asset('template') }}/vendors/select2/select2.min.js"></script>
    <script src="{{ asset('template') }}/vendors/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('template') }}/vendors/toastr/toastr.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('template') }}/vendors/feather-icons/feather.min.js"></script>
	<script src="{{ asset('template') }}/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
    <script src="{{ asset('template') }}/js/dashboard-dark.js"></script>
    <script src="{{ asset('template') }}/js/datepicker.js"></script>

    <script src="{{ asset('template') }}/js/data-table.js"></script>
	<script src="{{ asset('template') }}/js/select2.js"></script>
	<!-- End custom js for this page -->

    @yield('script')

    <script>
        $(document).ready(function() {
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif
        });
    </script>
</body>
</html>
