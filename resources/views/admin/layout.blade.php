<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nhachothue - Admin</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="/templates/admin/css/admin.min.css" rel="stylesheet">
    <link href="/templates/admin/css/style.css" rel="stylesheet">

    <script src="/templates/admin/js/main.js" defer></script>
    <script src="/templates/admin/js/chart/chart.js" defer></script>
    <script src="/templates/admin/js/sidebar.min.js" defer></script>
</head>

<body id="page-top" class="siderbar-toggled">
    <div class="position-fixed top-0 end-0 m-3 z-3">
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade shadow-lg" role="alert">
                <strong><i class="bi bi-exclamation-circle"></i> Warning!</strong> {{ Session::get('error') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade shadow-lg" role="alert">
                <strong><i class="bi bi-exclamation-circle"></i> Warning!</strong> Kiểm tra lại các thông tin.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible shadow-lg" role="alert">
                <strong><i class="bi bi-check-circle"></i> Success!</strong> {{ Session::get('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div id="wrapper">
        {{-- toggled --}}
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-icon">
                    <svg width="25px" viewBox="0 -0.5 24 24" id="meteor-icon-kit__solid-home" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.49613 11.9696L11.4961 6.13622C11.8075 5.95459 12.1925 5.95459 12.5039 6.13622L22.5039 11.9696C22.8111 12.1488 23 12.4777 23 12.8333V21.8423C23 22.3946 22.5523 22.8423 22 22.8423H2C1.44772 22.8423 1 22.3946 1 21.8423V12.8333C1 12.4777 1.18891 12.1488 1.49613 11.9696zM0 9.1013V7.41667C0 7.061 0.188911 6.7321 0.496129 6.55289L11.4961 0.13622C11.8075 -0.045407 12.1925 -0.045407 12.5039 0.13622L23.5039 6.55289C23.8111 6.7321 24 7.061 24 7.41667V9.1013C24 9.6535 23.5523 10.1013 23 10.1013C22.8229 10.1013 22.6491 10.0543 22.4961 9.965L12.5039 4.13622C12.1925 3.95459 11.8075 3.95459 11.4961 4.13622L1.50387 9.965C1.02682 10.2433 0.414501 10.0822 0.136221 9.6051C0.0470084 9.4522 0 9.2783 0 9.1013zM6 13.8423C5.44772 13.8423 5 14.29 5 14.8423V17.8423C5 18.3946 5.44772 18.8423 6 18.8423H9C9.55229 18.8423 10 18.3946 10 17.8423V14.8423C10 14.29 9.55229 13.8423 9 13.8423H6zM14 13.8423C13.4477 13.8423 13 14.29 13 14.8423V22.8423H18V14.8423C18 14.29 17.5523 13.8423 17 13.8423H14z"
                                fill="#fff"></path>
                        </g>
                    </svg>
                </div>
                <div class="sidebar-brand-text mx-1 mt-2">NhaChoThue</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Khách
            </div>

            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-people-fill"></i>
                    <span>Người dùng</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý người dùng</h6>
                        <a class="collapse-item" href="/admin/user/list">Danh sách người dùng</a>
                        <a class="collapse-item" href="/admin/feedback/list">Phản hồi người dùng</a>
                        <a class="collapse-item" href="#">Nạp tiền</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi bi-postcard-fill"></i>
                    <span>Tin đăng</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý tin đăng</h6>
                        <a class="collapse-item" href="/admin/post/list/pending">Tin chờ duyệt</a>
                        <a class="collapse-item" href="/admin/post/list/approved">Tin đã duyệt</a>
                        <a class="collapse-item" href="/admin/post/list/rejected">Tin từ chối</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Nội dung
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/admin/service/list">
                    <i class="fa-solid fa-house-signal"></i>
                    <span>Dịch vụ</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/type-house/list">
                    <i class="bi bi-house-add-fill"></i>
                    <span>Loại hình nhà</span></a>
            </li>
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Tương tác
            </div>

            <li class="nav-item">
                <a class="nav-link" href="/admin/feedback/list">
                    <i class="bi bi-chat-fill"></i>
                    <span>Phản hồi</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                       
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile object-fit-cover rounded-circle"
                                    src="{{ Auth::user()->avatar_url }}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/logout" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="/templates/admin/js/jquery.min.js"></script>
    <script src="/templates/admin/js/bootstrap.bundle.min.js"></script>
    <script src="/templates/admin/js/jquery.easing.min.js"></script>
    <script src="/templates/admin/js/chart/Chart.min.js"></script>
</body>

</html>
