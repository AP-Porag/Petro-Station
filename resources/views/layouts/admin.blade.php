<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('frontend/img/272px-90px-Logo.png')}}" type="image/x-icon"/>
    <title>@yield('title')</title>
@yield('style')
{{--    <link rel="stylesheet" href="{{asset('css/app.css')}}">--}}
<!-- Custom fonts for this template-->
    <link href="{{asset('dashboard/css/style.css')}}">
    <link href="{{asset('dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body id="page-top">

<div class="" id="app"> {{--id="app"--}}
<!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <li class="sidebar-brand d-flex justify-content-between mb-4">
                <a href="{{route('home')}}" class="sidebar-brand-icon">
                    <img src="{{asset('dashboard/img/272px-90px-Logo.png')}}"
                         alt="{{asset('dashboard/img/272px-90px-Logo.png')}}" class="img-fluid">
                </a>
                {{--  <div class="sidebar-brand-text mt-3"><a href="{{route('home')}}" class=""></a>BD-Provat</div>  --}}
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ \Illuminate\Support\Facades\Route::current()->getName() == 'home' ? 'active' : '' }}">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User Settings
            </div>

            <!-- Nav Item - start here Collapse Menu -->
            <!-- Nav Item - User Management -->
            <li class="nav-item {{ request()->segment(2) == 'user' ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-user-plus"></i>
                    <span>User Management</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">User List</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Vendor Settings
            </div>
            <!-- Nav Item - Post Management -->
            <li class="nav-item {{ request()->segment(2) == 'purchase' ? 'active' : '' }}">
                <a class="nav-link collapsed text-capitalize" href="#" data-toggle="collapse"
                   data-target="#collapsePurchase"
                   aria-expanded="true" aria-controls="collapsePost">
                    <i class="fa fa-file-alt"></i>
                    <span class="text-capitalize">Purchase</span>
                </a>
                <div id="collapsePurchase" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item text-capitalize" href="{{route('purchase.index')}}">Purchase List</a>
                        <a class="collapse-item text-capitalize" href="{{route('purchase.create')}}">Add new Purchase</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ request()->segment(2) == 'vendor' ? 'active' : '' }}">
                <a class="nav-link collapsed text-capitalize" href="#" data-toggle="collapse"
                   data-target="#collapsePost"
                   aria-expanded="true" aria-controls="collapsePost">
                    <i class="fa fa-file-alt"></i>
                    <span class="text-capitalize">Vendors</span>
                </a>
                <div id="collapsePost" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item text-capitalize" href="{{route('vendor.index')}}">Vendors List</a>
                        <a class="collapse-item text-capitalize" href="{{route('vendor.create')}}">Add new Vendor</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Notification -->
            <li class="nav-item {{ request()->segment(2) == 'notification' ? 'active' : '' }}">
                <a class="nav-link" href="#">
                    <div class="d-flex justify-content-between">
                        <span><i class="fa fa-bell"></i>Notifications</span>
                        <span class="badge badge-danger badge-counter mr-3">13</span>
                    </div>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        {{--                        notification dropdown--}}
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                {{--                                @if($notifications->count() > 0)--}}
                                <span class="badge badge-danger badge-counter">13</span>
                                {{--                                @endif--}}

                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Unseen Notifications
                                </h6>
                                {{--                                @foreach($notifications as $notification)--}}
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div>

                                    </div>
                                </a>
                                {{--                                @endforeach--}}
                                {{--                                @if($notifications->count() > 0)--}}
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                    Notifications</a>
                                {{--                                @else--}}
                                <p class="dropdown-item text-center small text-gray-500">You have no Notifications</p>
                                {{--                                @endif--}}
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        {{--                        Dropdown--}}

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <ul class="list-group">
                                    <li style="list-style: none;"><span
                                            class="mr-2 d-none d-lg-inline text-primary middle text-capitalize">{{Auth::user()->name}}</span>
                                    </li>
                                    <li style="list-style: none;">
                                        <span class="mr-2 d-none d-lg-inline text-info small text-capitalize">
{{--                                            @foreach(Auth::user()->roles as $role)--}}
                                            {{--                                                {{ $role->name }}--}}
                                            {{--                                            @endforeach--}}
                                            Role-Name
                                        </span>
                                    </li>
                                </ul>

                                <img class="img-profile rounded-circle" src="{{Auth::user()->profile->profilePicture}}"
                                     alt="{{Auth::user()->name}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in bg-gradient-primary"
                                 aria-labelledby="userDropdown">
                                <a class="dropdown-item text-light" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <div class="">
                                    <a class="dropdown-item text-light" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 text-capitalize">@yield('module')</h1>
                        <div class="content">
                            @yield('breadcumb')
                        </div>
                    </div>

                    <div class="content">
                        @yield('content')
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Petro-Station  @php echo date('Y') @endphp</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


{{--<script src="{{asset('js/app.js')}}"></script>--}}
<!-- Bootstrap core JavaScript-->
    <script src="{{asset('dashboard/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('dashboard/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('dashboard/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('dashboard/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('dashboard/js/demo/chart-pie-demo.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('script')
    <script>
        @if(\Illuminate\Support\Facades\Session::has('success'))
        toastr.success("{{\Illuminate\Support\Facades\Session::get('success')}}");
        @endif
    </script>
</body>

</html>
