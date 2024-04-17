<header class="mulish">
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light">
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <a class="navbar-brand" href="/"><svg width="30px" viewBox="0 -0.5 24 24"
                        id="meteor-icon-kit__solid-home" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.49613 11.9696L11.4961 6.13622C11.8075 5.95459 12.1925 5.95459 12.5039 6.13622L22.5039 11.9696C22.8111 12.1488 23 12.4777 23 12.8333V21.8423C23 22.3946 22.5523 22.8423 22 22.8423H2C1.44772 22.8423 1 22.3946 1 21.8423V12.8333C1 12.4777 1.18891 12.1488 1.49613 11.9696zM0 9.1013V7.41667C0 7.061 0.188911 6.7321 0.496129 6.55289L11.4961 0.13622C11.8075 -0.045407 12.1925 -0.045407 12.5039 0.13622L23.5039 6.55289C23.8111 6.7321 24 7.061 24 7.41667V9.1013C24 9.6535 23.5523 10.1013 23 10.1013C22.8229 10.1013 22.6491 10.0543 22.4961 9.965L12.5039 4.13622C12.1925 3.95459 11.8075 3.95459 11.4961 4.13622L1.50387 9.965C1.02682 10.2433 0.414501 10.0822 0.136221 9.6051C0.0470084 9.4522 0 9.2783 0 9.1013zM6 13.8423C5.44772 13.8423 5 14.29 5 14.8423V17.8423C5 18.3946 5.44772 18.8423 6 18.8423H9C9.55229 18.8423 10 18.3946 10 17.8423V14.8423C10 14.29 9.55229 13.8423 9 13.8423H6zM14 13.8423C13.4477 13.8423 13 14.29 13 14.8423V22.8423H18V14.8423C18 14.29 17.5523 13.8423 17 13.8423H14z"
                                fill="#478ac9"></path>
                        </g>
                    </svg></a>
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/post/create">Đăng bài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/post/list">Danh sách bài đăng</a>
                    </li>
                </ul>

            </div>
            <div class="d-flex py-2 my-2 my-lg-0">
                @if (Auth::check())
                    <div class="dropdown open">
                        <div class="d-flex avatar-block dropdown-toggle" type="button" id="triggerId"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img width="38px" height="38px" class="cicle-border mt-1" src="{{ Auth::user()->avatar_url }}"
                                alt="">
                            <div class="ps-1">
                                <p style="font-size: 14px" class="fw-bold m-0">{{ Auth::user()->name }}</p>
                                <p style="font-size: 13px" class="m-0"><i class="bi bi-coin"> </i><span>{{  Auth::user()->account_balance}} vnd</span> </p>
                            </div>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-md-start" aria-labelledby="triggerId">
                            <li><a class="dropdown-item" href="/profile"><i class="bi bi-person-video"></i> Thông tin cá
                                    nhân</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-cash"></i> Nạp tiền</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-postcard"></i> Quản lý bài
                                    đăng</a></li>
                            <li><a class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-right"></i> Đăng
                                    xuất</a></li>
                        </ul>
                    </div>
                @else
                    <a class="nav-link me-2" href="/register"><button class="btn btn-light">Đăng ký</button></a>
                    <a class="nav-link" href="/login"><button class="btn btn-primary">Đăng nhập</button></a>
                @endif
            </div>

        </nav>
    </div>
</header>
