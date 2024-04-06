@extends('layout')
@section('content')
    <div class="main-content">
        <div class="search-block">
            <div class="search-box px-5 py-5">
                <h1 class="fs-1">Website kết nối người thuê và chủ phòng trọ, căn hộ</h1>
                <h4 class="fs-5">Kết nối bạn với hàng vạn phòng trọ tiện nghi theo nhu cầu</h4>
                <form class="text-center mt-4" action="/#" method="GET">
                    <input class="form-control my-3" name="title" type="text" placeholder="Cổng chính CNTT">
                    <div class="box-filter d-flex justify-content-between">
                        <select class="mr-3 form-select search-filer-input" class="" name="district" id=""
                            aria-label="Default select example">
                            <option value="1">Tp Thái Nguyên</option>
                        </select>
                        <select class="form-select search-filer-input" name="ward" id=""
                            aria-label="Default select example">
                            <option value="1">Tân Thịnh</option>
                            <option value="2">Thịnh Đán</option>
                            <option value="3">Phan Đình Phùng</option>
                        </select>
                        <div class="dropdown search-filer-input">
                            <button class="form-control dropdown-toggle w-100" type="button" id="triggerId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Mức giá
                            </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <div class="px-2 d-flex justify-content-center">
                                    <input name="min-price" type="number" class="form-control" placeholder="300.000đ">
                                    <svg class="mx-1 mt-1" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g class="  input-price" id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                            stroke-linejoin="round"></g>
                                        <g class="  input-price" id="SVGRepo_iconCarrier">
                                            <path d="M4 12H20M20 12L16 8M20 12L16 16" stroke="#000000" class="  input-price"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                    <input name="max-price" type="number" class="form-control" placeholder="1.000.000đ">
                                </div>
                            </div>
                        </div>
                        <div class="dropdown search-filer-input">
                            <button class="form-control dropdown-toggle w-100" type="button" id="triggerId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Diện tích
                            </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <div class="px-2 d-flex justify-content-between">
                                    <input name="min-acreage" type="number" class="form-control" placeholder="15m²">
                                    <svg class="mx-1 mt-1" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M4 12H20M20 12L16 8M20 12L16 16" stroke="#000000" class="  input-price"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                    <input type="number" name="max-acreage" class="form-control" placeholder="25m²">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-3 btn btn-primary"><i class="bi bi-search"></i> Tìm kiếm</button>
                </form>
            </div>
        </div>
        <div class="districts-block py-4">
            <div class="block-top">
            </div>
            <div class="container">
                <h1 class="py-4 mb-4 text-center fs-2 text-white">Khám phá ngay phòng trọ tại khu vực của bạn</h1>
                <div class="districts">
                    <div class="district-item">
                        <img src="templates/front/images/tpthainguyen.jpg" alt="">
                        <div class="item-title">
                            <p>TP. Thái Nguyên</p>
                            <p>9 tin đăng</p>
                        </div>
                    </div>
                    <div class="district-item">
                        <img src="templates/front/images/songcong.jpg" alt="">
                        <div class="item-title">
                            <p>TP. Sông Công</p>
                            <p>9 tin đăng</p>
                        </div>
                    </div>
                    <div class="district-item">
                        <img src="templates/front/images/phoyen.jpg" alt="">
                        <div class="item-title">
                            <p>TP. Phổ Yên</p>
                            <p>9 tin đăng</p>
                        </div>
                    </div>
                    <div class="district-item">
                        <img src="templates/front/images/phubinh.jpg" alt="">
                        <div class="item-title">
                            <p>Huyện Phú Bình</p>
                            <p>9 tin đăng</p>
                        </div>
                    </div>
                    <div class="district-item">
                        <img src="templates/front/images/daitu.jpg" alt="">
                        <div class="item-title">
                            <p>Huyện Đại Từ</p>
                            <p>9 tin đăng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="popular-posts-block pb-4">
            <div class="container">
                <h4 class="fw-bold mb-4 py-3">Phòng trọ đang được quan tâm</h4>
                <div class="popular-posts-carousel">
                    @for ($i = 1; $i <= 8; $i++)
                        <div class="carousel-cell mb-3 mx-2 card" style="width: 17rem;">
                            <img src="templates/front/images/uuu8.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1">Tìm người thuê trọ {{ $i }}</h5>
                                <div class="post-services d-flex justify-content-start py-1">
                                    <div class="service d-flex pe-2">
                                        <svg fill="#383838" width="18px" viewBox="0 0 32 32" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>temperature-quarter</title>
                                                <path
                                                    d="M20.75 6.008c0-6.246-9.501-6.248-9.5 0v13.238c-1.235 1.224-2 2.921-2 4.796 0 3.728 3.022 6.75 6.75 6.75s6.75-3.022 6.75-6.75c0-1.875-0.765-3.572-2-4.796l-0.001-0zM16 29.25c-2.9-0-5.25-2.351-5.25-5.251 0-1.553 0.674-2.948 1.745-3.909l0.005-0.004 0.006-0.012c0.13-0.122 0.215-0.29 0.231-0.477l0-0.003c0.001-0.014 0.007-0.024 0.008-0.038l0.006-0.029v-13.52c-0.003-0.053-0.005-0.115-0.005-0.178 0-1.704 1.381-3.085 3.085-3.085 0.060 0 0.12 0.002 0.179 0.005l-0.008-0c0.051-0.003 0.11-0.005 0.17-0.005 1.704 0 3.085 1.381 3.085 3.085 0 0.063-0.002 0.125-0.006 0.186l0-0.008v13.52l0.006 0.029 0.007 0.036c0.015 0.191 0.101 0.36 0.231 0.482l0 0 0.006 0.012c1.076 0.966 1.75 2.361 1.75 3.913 0 2.9-2.35 5.25-5.25 5.251h-0zM16.75 21.367v-3.765c0-0.414-0.336-0.75-0.75-0.75s-0.75 0.336-0.75 0.75v0 3.765c-1.164 0.338-2 1.394-2 2.646 0 1.519 1.231 2.75 2.75 2.75s2.75-1.231 2.75-2.75c0-1.252-0.836-2.308-1.981-2.641l-0.019-0.005zM26.5 2.25c-1.795 0-3.25 1.455-3.25 3.25s1.455 3.25 3.25 3.25c1.795 0 3.25-1.455 3.25-3.25v0c-0.002-1.794-1.456-3.248-3.25-3.25h-0zM26.5 7.25c-0.966 0-1.75-0.784-1.75-1.75s0.784-1.75 1.75-1.75c0.966 0 1.75 0.784 1.75 1.75v0c-0.001 0.966-0.784 1.749-1.75 1.75h-0z">
                                                </path>
                                            </g>
                                        </svg>
                                        <p style="font-size: 11px" class="ms-1 mt-1 mb-0">Nóng lạnh</p>
                                    </div>
                                    <div class="service d-flex pe-2">
                                        <svg viewBox="0 0 1024 1024" width="18px" class="mr-1" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" fill="#383838" stroke="#383838">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M500.6 653.5c37.1 58.4 34.2 76.3 1.9 108.6-41.2 41.2-46.4 73.4-1.9 143.4 4.2 6.5 12.8 8.4 19.3 4.3 6.5-4.2 8.4-12.8 4.3-19.3-37.1-58.4-34.2-76.3-1.9-108.6 41.2-41.2 46.4-73.4 1.9-143.4-4.2-6.5-12.8-8.4-19.3-4.3-6.5 4.1-8.5 12.8-4.3 19.3zM276.6 653.5c37.1 58.4 34.2 76.3 1.9 108.6-41.2 41.2-46.4 73.4-1.9 143.4 4.2 6.5 12.8 8.4 19.3 4.3 6.5-4.2 8.4-12.8 4.3-19.3-37.1-58.4-34.2-76.3-1.9-108.6 41.2-41.2 46.4-73.4 1.9-143.4-4.2-6.5-12.8-8.4-19.3-4.3-6.5 4.1-8.4 12.8-4.3 19.3zM726.5 762.1c-41.2 41.2-46.4 73.4-1.9 143.4 4.2 6.5 12.8 8.4 19.3 4.3 6.5-4.2 8.4-12.8 4.3-19.3-37.1-58.4-34.2-76.3-1.9-108.6 41.2-41.2 46.4-73.4 1.9-143.4-4.2-6.5-12.8-8.4-19.3-4.3-6.5 4.2-8.4 12.8-4.3 19.3 37.1 58.4 34.2 76.3 1.9 108.6zM64.4 226.1v223.8c0 61.9 50.1 112.1 112 112.1h672c61.8 0 112-50.2 112-112.1V226.1c0-61.9-50.1-112.1-112-112.1h-672c-61.8 0-112 50.2-112 112.1z"
                                                    fill="#000000"></path>
                                                <path
                                                    d="M120.4 226.1c0-30.9 25.1-56.1 56-56.1h672c30.9 0 56 25.1 56 56.1v223.8c0 30.9-25.1 56.1-56 56.1h-672c-30.9 0-56-25.1-56-56.1V226.1z"
                                                    fill="#FFFFFF"></path>
                                                <path
                                                    d="M400.4 268c0-23.1 18.4-42 41.7-42h84.5c23.2 0 41.7 19.1 41.7 42 0 23.1-18.4 42-41.7 42h-84.5c-23.1 0-41.7-19.1-41.7-42zM232.4 268c0-23.2 19-42 42-42 23.2 0 42 19 42 42 0 23.2-19 42-42 42-23.2 0-42-19-42-42zM246.4 394h532v-28h-532v28zM246.4 450h532v-28h-532v28z"
                                                    fill="#000000"></path>
                                                <path
                                                    d="M428.4 268c0 7.5 6.1 14 13.7 14h84.5c7.7 0 13.7-6.3 13.7-14 0-7.5-6.1-14-13.7-14h-84.5c-7.7 0-13.7 6.3-13.7 14zM260.4 268c0 7.5 6.3 14 14 14 7.5 0 14-6.3 14-14 0-7.5-6.3-14-14-14-7.5 0-14 6.3-14 14z"
                                                    fill="#FFFFFF"></path>
                                            </g>
                                        </svg>
                                        <p style="font-size: 11px" class="ms-1 mt-1 mb-0">Điều hòa</p>
                                    </div>
                                    <div class="service d-flex pe-2">
                                        <svg width="18px" class="mr-1" viewBox="0 0 100 100" data-name="Layer 1"
                                            id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <defs>
                                                    <style>
                                                        .cls-1 {
                                                            fill: none;
                                                            stroke: #231f20;
                                                            stroke-miterlimit: 10;
                                                            stroke-width: 2px;
                                                        }

                                                        .cls-2 {
                                                            fill: #231f20;
                                                        }
                                                    </style>
                                                </defs>
                                                <g>
                                                    <path class="cls-1"
                                                        d="M23.13,35.26v-15.12c0-1.36,1.1-2.46,2.46-2.46h10.41s.06,0,.09,0h.03c.66-.03,1.33,.21,1.84,.71l5.88,5.88-3.48,3.48-5.15-5.15h-7.15v28.08h-4.92v-14.15">
                                                    </path>
                                                    <path class="cls-1"
                                                        d="M54.06,27.96l-10.02,10.02-4.28-4.29c-1.47-1.47-1.47-3.86,0-5.34l4.69-4.69c1.47-1.47,3.86-1.47,5.34,0l4.28,4.29Z">
                                                    </path>
                                                    <path class="cls-1"
                                                        d="M56.76,29.41c0,.44-.17,.88-.51,1.22l-9.54,9.55c-.67,.67-1.76,.67-2.44,0-.34-.34-.51-.78-.51-1.22s.17-.88,.51-1.22l9.54-9.54c.67-.67,1.76-.67,2.44,0,.34,.34,.51,.78,.51,1.22Z">
                                                    </path>
                                                </g>
                                                <g>
                                                    <rect class="cls-2" height="2.84" width="1.16" x="52.61"
                                                        y="42.88"></rect>
                                                    <g>
                                                        <g>
                                                            <rect class="cls-2" height="2.84" width="1.16" x="49.92"
                                                                y="40.04"></rect>
                                                            <rect class="cls-2" height="2.84" width="1.16" x="49.92"
                                                                y="45.72"></rect>
                                                            <rect class="cls-2" height=".23" width="1.16" x="49.92"
                                                                y="59.7"></rect>
                                                        </g>
                                                        <g>
                                                            <rect class="cls-2" height="2.84" width="1.16" x="55.43"
                                                                y="40.27"></rect>
                                                            <rect class="cls-2" height="2.84" width="1.16" x="55.43"
                                                                y="45.95"></rect>
                                                            <rect class="cls-2" height=".45" width="1.16" x="55.42"
                                                                y="59.7"></rect>
                                                        </g>
                                                        <rect class="cls-2" height="2.12" width="1.16" x="52.62"
                                                            y="48.56"></rect>
                                                    </g>
                                                </g>
                                                <path class="cls-1"
                                                    d="M83.29,55.2c0,1.24-.5,2.37-1.32,3.18-.82,.82-1.94,1.32-3.18,1.32H23.22c-2.49,0-4.5-2.01-4.5-4.5,0-1.24,.5-2.37,1.32-3.19,.79-.79,1.88-1.3,3.09-1.32h55.66c2.49,0,4.5,2.02,4.5,4.51Z">
                                                </path>
                                                <path class="cls-1"
                                                    d="M78.36,65.67v8.78c0,5.01-4.06,9.06-9.06,9.06H33.36c-5.01,0-9.07-4.05-9.07-9.06v-14.75h54.07v5">
                                                </path>
                                            </g>
                                        </svg>
                                        <p style="font-size: 11px" class="ms-1 mt-1 mb-0">Khép kín</p>
                                    </div>
                                </div>
                                <div class="post-address d-flex py-1">
                                    <svg viewBox="0 0 1024 1024" width="18px" fill="#000000" class="icon"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M512 1012.8c-253.6 0-511.2-54.4-511.2-158.4 0-92.8 198.4-131.2 283.2-143.2h3.2c12 0 22.4 8.8 24 20.8 0.8 6.4-0.8 12.8-4.8 17.6-4 4.8-9.6 8.8-16 9.6-176.8 25.6-242.4 72-242.4 96 0 44.8 180.8 110.4 463.2 110.4s463.2-65.6 463.2-110.4c0-24-66.4-70.4-244.8-96-6.4-0.8-12-4-16-9.6-4-4.8-5.6-11.2-4.8-17.6 1.6-12 12-20.8 24-20.8h3.2c85.6 12 285.6 50.4 285.6 143.2 0.8 103.2-256 158.4-509.6 158.4z m-16.8-169.6c-12-11.2-288.8-272.8-288.8-529.6 0-168 136.8-304.8 304.8-304.8S816 145.6 816 313.6c0 249.6-276.8 517.6-288.8 528.8l-16 16-16-15.2zM512 56.8c-141.6 0-256.8 115.2-256.8 256.8 0 200.8 196 416 256.8 477.6 61.6-63.2 257.6-282.4 257.6-477.6C768.8 172.8 653.6 56.8 512 56.8z m0 392.8c-80 0-144.8-64.8-144.8-144.8S432 160 512 160c80 0 144.8 64.8 144.8 144.8 0 80-64.8 144.8-144.8 144.8zM512 208c-53.6 0-96.8 43.2-96.8 96.8S458.4 401.6 512 401.6c53.6 0 96.8-43.2 96.8-96.8S564.8 208 512 208z"
                                                fill=""></path>
                                        </g>
                                    </svg>
                                    <p style="font-size: 11px" class="mb-0 ms-1">Thành phố Thái Nguyên, Phường Tân Thịnh
                                    </p>
                                </div>
                                <div class="post-price d-flex py-1">
                                    <svg viewBox="0 0 24 24" width="16px" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M12 17V17.5V18" stroke="#1C274C" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path d="M12 6V6.5V7" stroke="#1C274C" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path
                                                d="M15 9.5C15 8.11929 13.6569 7 12 7C10.3431 7 9 8.11929 9 9.5C9 10.8807 10.3431 12 12 12C13.6569 12 15 13.1193 15 14.5C15 15.8807 13.6569 17 12 17C10.3431 17 9 15.8807 9 14.5"
                                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path
                                                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                    </svg>
                                    <p class="mb-0 ms-1 text-danger">1.000.000 đ/tháng</p>
                                </div>

                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="features-block mt-5 py-4">
            <div class="container d-flex justify-content-between">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <svg width="50px" height="50px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                            class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M33 11.8c0 .5-.5 1-1 1s-1-.5-1-1V1c0-.6.5-1 1-1s1 .4 1 1v10.8" fill="#b2c1c0">
                                </path>
                                <path fill="#e5dec1" d="M4 28h56v32H4z"> </path>
                                <path
                                    d="M60.5 19.8c-.5-1-1.8-1.8-3-1.8H6.4c-1.1 0-2.5.8-3 1.8L.1 26.2c-.5 1 0 1.8 1.1 1.8h61.4c1.1 0 1.6-.8 1.1-1.8l-3.2-6.4"
                                    fill="#d33b23"> </path>
                                <g fill="#d6eef0">
                                    <path d="M15 45c0 .5-.4 1-1 1H8c-.6 0-1-.5-1-1v-4c0-.5.4-1 1-1h6c.6 0 1 .5 1 1v4">
                                    </path>
                                    <path d="M15 35c0 .5-.4 1-1 1H8c-.6 0-1-.5-1-1v-4c0-.5.4-1 1-1h6c.6 0 1 .5 1 1v4">
                                    </path>
                                </g>
                                <g fill="#dbb471">
                                    <path
                                        d="M14 36.5H8c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5H8">
                                    </path>
                                    <path d="M10.5 30h1v6h-1z"> </path>
                                    <path
                                        d="M14 47H8c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5H8">
                                    </path>
                                    <path d="M10.5 40.5h1v6h-1z"> </path>
                                </g>
                                <path d="M15 55c0 .5-.4 1-1 1H8c-.6 0-1-.5-1-1v-4c0-.5.4-1 1-1h6c.6 0 1 .5 1 1v4"
                                    fill="#d6eef0"> </path>
                                <g fill="#dbb471">
                                    <path
                                        d="M14 57H8c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5H8">
                                    </path>
                                    <path d="M10.5 50.5h1v6h-1z"> </path>
                                </g>
                                <g fill="#d6eef0">
                                    <path d="M57 45c0 .5-.5 1-1 1h-6c-.5 0-1-.5-1-1v-4c0-.5.5-1 1-1h6c.5 0 1 .5 1 1v4">
                                    </path>
                                    <path d="M57 35c0 .5-.5 1-1 1h-6c-.5 0-1-.5-1-1v-4c0-.5.5-1 1-1h6c.5 0 1 .5 1 1v4">
                                    </path>
                                </g>
                                <g fill="#dbb471">
                                    <path
                                        d="M56 36.5h-6c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5h-6">
                                    </path>
                                    <path d="M52.5 30h1v6h-1z"> </path>
                                    <path
                                        d="M56 47h-6c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5h-6">
                                    </path>
                                    <path d="M52.5 40.5h1v6h-1z"> </path>
                                </g>
                                <path d="M57 55c0 .5-.5 1-1 1h-6c-.5 0-1-.5-1-1v-4c0-.5.5-1 1-1h6c.5 0 1 .5 1 1v4"
                                    fill="#d6eef0"> </path>
                                <g fill="#dbb471">
                                    <path
                                        d="M56 57h-6c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5h-6">
                                    </path>
                                    <path d="M52.5 50.5h1v6h-1z"> </path>
                                </g>
                                <path
                                    d="M32.8 11.6c-.4-.3-1.1-.3-1.6 0L11.8 27.4c-.4.3-.4.6.2.6h40c.5 0 .7-.3.2-.6L32.8 11.6"
                                    fill="#f15744"> </path>
                                <path
                                    d="M48.2 27.4L32.8 14.6c-.4-.4-1.1-.4-1.5 0L15.8 27.4c-.5.3-.4.6.2.6h2v32h28V28h2c.5 0 .7-.3.2-.6"
                                    fill="#f9f3d9"> </path>
                                <path fill="#e5dec1" d="M24 45h16v15H24z"> </path>
                                <path fill="#42ade2" d="M26 45h12v15H26z"> </path>
                                <g fill="#89664c">
                                    <path
                                        d="M20.2 38c.3.1.7.2 1.1.2c.5 0 .7-.2.7-.4s-.2-.4-.7-.5c-.7-.2-1.2-.6-1.2-1.1c0-.7.6-1.2 1.7-1.2c.5 0 .9.1 1.1.2l-.2.7c-.2-.1-.5-.2-.9-.2s-.6.2-.6.4s.2.4.8.5c.8.3 1.1.6 1.1 1.2s-.6 1.2-1.8 1.2c-.5 0-1-.1-1.2-.2l.1-.8">
                                    </path>
                                    <path
                                        d="M26.9 38.8c-.2.1-.6.2-1.1.2c-1.5 0-2.3-.8-2.3-1.9c0-1.3 1.1-2.1 2.4-2.1c.5 0 .9.1 1.1.2l-.2.7c-.2-.1-.5-.1-.8-.1c-.8 0-1.4.4-1.4 1.3c0 .8.5 1.3 1.4 1.3c.3 0 .6-.1.8-.1l.1.5">
                                    </path>
                                    <path d="M28.5 35.1v1.5h1.6v-1.5h1V39h-1v-1.6h-1.6V39h-1v-3.9h1"> </path>
                                    <path
                                        d="M36 37c0 1.3-.9 2-2.1 2c-1.3 0-2.1-.9-2.1-2c0-1.2.8-2 2.1-2s2.1.9 2.1 2m-3.2 0c0 .8.4 1.3 1.1 1.3c.7 0 1-.6 1-1.3c0-.7-.4-1.3-1.1-1.3c-.6 0-1 .6-1 1.3">
                                    </path>
                                    <path
                                        d="M40.6 37c0 1.3-.9 2-2.1 2c-1.3 0-2.1-.9-2.1-2c0-1.2.8-2 2.1-2c1.4 0 2.1.9 2.1 2m-3.1 0c0 .8.4 1.3 1.1 1.3c.7 0 1-.6 1-1.3c0-.7-.4-1.3-1.1-1.3c-.6 0-1 .6-1 1.3">
                                    </path>
                                    <path d="M41.3 35.1h1v3.1H44v.7h-2.7v-3.8"> </path>
                                </g>
                                <circle cx="32" cy="26" r="7" fill="#dbb471"> </circle>
                                <circle cx="32" cy="26" r="5" fill="#ffffff"> </circle>
                                <path fill="#e5dec1" d="M31.5 45h1v15h-1z"> </path>
                                <path d="M32 22c-.5 0-1 .5-1 1v4c0 .5.5 1 1 1s1-.5 1-1v-4c0-.5-.5-1-1-1" fill="#b2c1c0">
                                </path>
                                <path d="M32 26h-2c-.5 0-1 .5-1 1s.5 1 1 1h2c.5 0 1-.5 1-1s-.5-1-1-1" fill="#f15744">
                                </path>
                                <path d="M33 2v7.4c4 3.2 8-6.9 12-3.7C41 0 37 7.6 33 2z" fill="#b4d7ee"> </path>
                                <path d="M32.9 40.3c-.5-.4-1.4-.4-1.9 0c-2.1 1.5-9 5.7-9 5.7v2h20v-2s-6.9-4.2-9.1-5.7"
                                    fill="#f15744"> </path>
                                <path d="M63 60H1c-.6 0-1 .5-1 1v2c0 .5.4 1 1 1h62c.5 0 1-.5 1-1v-2c0-.5-.5-1-1-1"
                                    fill="#666"> </path>
                                <path fill="#e8e8e8" d="M20 62h24v2H20z"> </path>
                                <path fill="#d0d0d0" d="M22 60h20v2H22z"> </path>
                                <g fill="#666">
                                    <path d="M29.1 53.5h1.4v.7h-1.4z"> </path>
                                    <path d="M33.5 53.5h1.4v.7h-1.4z"> </path>
                                </g>
                            </g>
                        </svg>
                        <h5 class="card-title mt-3 mb-0">Phòng trọ gần trường</h5>
                    </div>
                </div>
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <svg width="50px" height="50px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M663.4 736h192v167.5h-192z" fill="#A4A9AD"></path>
                                <path d="M681.2 790.3h82.3v39.6h-82.3zM773 843h82.3v39.6H773zM663.4 736h192v45h-192z"
                                    fill=""></path>
                                <path
                                    d="M872.4 720.3c0-5.2-4.3-9.5-9.5-9.5H655.8c-5.2 0-9.5 4.3-9.5 9.5v31.5c0 5.2 4.3 9.5 9.5 9.5h207.1c5.2 0 9.5-4.3 9.5-9.5v-31.5z"
                                    fill="#D68231"></path>
                                <path
                                    d="M738.6 82.1c-21.3 0-40.5 8.8-54.2 23-11.6-7.3-25.4-11.6-40.2-11.6-41.6 0-75.4 33.7-75.4 75.4v1c-43 6.6-76 43.7-76 88.6 0 49.5 40.1 89.6 89.6 89.6S672 308 672 258.5c0-6.5-0.7-12.7-2-18.8 10.8-4 20.5-10.3 28.3-18.5 11.6 7.3 25.4 11.6 40.2 11.6 41.6 0 75.4-33.7 75.4-75.4 0-41.6-33.7-75.3-75.3-75.3z"
                                    fill="#D1D3D3"></path>
                                <path d="M673 258.4H492l-39.8 645.1h260.5z" fill="#333E48"></path>
                                <path
                                    d="M679 357.2H485.9l-1.8 28.5h196.7l-1.8-28.5z m3.6 57.8H482.3l-1.8 28.5h203.8l-1.7-28.5z"
                                    fill="#D68231"></path>
                                <path d="M131.4 546.8h490.9v356.7H131.4z" fill="#A4A9AD"></path>
                                <path
                                    d="M540 773.2h82.3v39.6H540zM131.2 725.2h82.3v39.6h-82.3zM411 576.2h82.3v39.6H411zM233.2 546.8h82.3v39.6h-82.3zM201.8 829.9h82.3v39.6h-82.3zM573.6 664.3c0-10.4-8.5-19-19-19H199.1c-10.4 0-19 8.5-19 19v34.9c0 10.4 8.5 19 19 19h355.5c10.4 0 19-8.5 19-19v-34.9z"
                                    fill=""></path>
                                <path
                                    d="M573.6 634.8c0-10.4-8.5-19-19-19H199.1c-10.4 0-19 8.5-19 19v34.9c0 10.4 8.5 19 19 19h355.5c10.4 0 19-8.5 19-19v-34.9z"
                                    fill="#FFFFFF"></path>
                                <path
                                    d="M554.6 615.8H199.1c-10.4 0-19 8.5-19 19V659c0-10.4 8.5-19 19-19h355.5c10.4 0 19 8.5 19 19v-24.2c0-10.4-8.5-19-19-19z"
                                    fill=""></path>
                                <path
                                    d="M131.4 472.6v74.2h81.8l-74.3-74.3c-3-3-7.5-4.6-7.5 0.1zM213.2 472.6v74.2H295l-74.3-74.3c-2.9-3-7.5-4.6-7.5 0.1zM295.1 472.6v74.2h81.8l-74.3-74.3c-3-3-7.5-4.6-7.5 0.1z"
                                    fill="#D1D3D3"></path>
                                <path
                                    d="M376.9 472.6v74.2h81.8l-74.3-74.3c-3-3-7.5-4.6-7.5 0.1zM458.7 472.6v74.2h81.8l-74.3-74.3c-3-3-7.5-4.6-7.5 0.1zM540.5 472.6v74.2h81.8L548 472.5c-2.9-3-7.5-4.6-7.5 0.1zM263.1 756.3h227.7v147.2H263.1z"
                                    fill="#D1D3D3"></path>
                                <path d="M263.1 786.7h227.7v28.5H263.1zM263.1 840.8h227.7v28.5H263.1z" fill="">
                                </path>
                                <path
                                    d="M260.1 615.8h28.5v72.9h-28.5zM362.6 615.8h28.5v72.9h-28.5zM465.2 615.8h28.5v72.9h-28.5z"
                                    fill="#A4A9AD"></path>
                                <path
                                    d="M199.1 630.1c-2.6 0-4.7 2.2-4.7 4.7v34.9c0 2.6 2.2 4.7 4.7 4.7h355.5c2.6 0 4.7-2.2 4.7-4.7v-34.9c0-2.6-2.2-4.7-4.7-4.7H199.1zM554.6 703H199.1c-18.3 0-33.2-14.9-33.2-33.2v-34.9c0-18.3 14.9-33.2 33.2-33.2h355.5c18.3 0 33.2 14.9 33.2 33.2v34.9c0.1 18.3-14.8 33.2-33.2 33.2z"
                                    fill="#D68231"></path>
                                <path
                                    d="M957.9 933.3c0 4.2-3.5 7.7-7.7 7.7h-875c-4.2 0-7.7-3.5-7.7-7.7v-27.5c0-4.2 3.5-7.7 7.7-7.7h875.1c4.2 0 7.7 3.5 7.7 7.7v27.5z"
                                    fill="#333E48"></path>
                            </g>
                        </svg>
                        <h5 class="card-title mt-3 mb-0">Phòng trọ gần khu công nghiệp</h5>
                    </div>
                </div>
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="50px" height="50px" viewBox="0 0 64 64"
                            enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path fill="#F9EBB2"
                                        d="M56,60c0,1.104-0.896,2-2,2H38V47c0-0.553-0.447-1-1-1H27c-0.553,0-1,0.447-1,1v15H10c-1.104,0-2-0.896-2-2 V31.411L32.009,7.403L56,31.394V60z">
                                    </path>
                                    <polygon fill="#F76D57" points="14,6 18,6 18,12.601 14,16.593 "></polygon>
                                    <rect x="28" y="48" fill="#F9EBB2" width="8" height="14"></rect>
                                    <path fill="#F76D57"
                                        d="M61,33c-0.276,0-0.602-0.036-0.782-0.217L32.716,5.281c-0.195-0.195-0.451-0.293-0.707-0.293 s-0.512,0.098-0.707,0.293L3.791,32.793C3.61,32.974,3.276,33,3,33c-0.553,0-1-0.447-1-1c0-0.276,0.016-0.622,0.197-0.803 L31.035,2.41c0,0,0.373-0.41,0.974-0.41s0.982,0.398,0.982,0.398l28.806,28.805C61.978,31.384,62,31.724,62,32 C62,32.552,61.553,33,61,33z">
                                    </path>
                                    <g>
                                        <path fill="#394240"
                                            d="M63.211,29.789L34.438,1.015c0,0-0.937-1.015-2.43-1.015s-2.376,0.991-2.376,0.991L20,10.604V5 c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v13.589L0.783,29.783C0.24,30.326,0,31.172,0,32c0,1.656,1.343,3,3,3 c0.828,0,1.662-0.251,2.205-0.794L6,33.411V60c0,2.211,1.789,4,4,4h44c2.211,0,4-1.789,4-4V33.394l0.804,0.804 C59.347,34.739,60.172,35,61,35c1.657,0,3-1.343,3-3C64,31.171,63.754,30.332,63.211,29.789z M14,6h4v6.601l-4,3.992V6z M36,62h-8 V48h8V62z M56,60c0,1.104-0.896,2-2,2H38V47c0-0.553-0.447-1-1-1H27c-0.553,0-1,0.447-1,1v15H10c-1.104,0-2-0.896-2-2V31.411 L32.009,7.403L56,31.394V60z M61,33c-0.276,0-0.602-0.036-0.782-0.217L32.716,5.281c-0.195-0.195-0.451-0.293-0.707-0.293 s-0.512,0.098-0.707,0.293L3.791,32.793C3.61,32.974,3.276,33,3,33c-0.553,0-1-0.447-1-1c0-0.276,0.016-0.622,0.197-0.803 L31.035,2.41c0,0,0.373-0.41,0.974-0.41s0.982,0.398,0.982,0.398l28.806,28.805C61.978,31.384,62,31.724,62,32 C62,32.552,61.553,33,61,33z">
                                        </path>
                                        <path fill="#394240"
                                            d="M23,32h-8c-0.553,0-1,0.447-1,1v8c0,0.553,0.447,1,1,1h8c0.553,0,1-0.447,1-1v-8 C24,32.447,23.553,32,23,32z M22,40h-6v-6h6V40z">
                                        </path>
                                        <path fill="#394240"
                                            d="M41,42h8c0.553,0,1-0.447,1-1v-8c0-0.553-0.447-1-1-1h-8c-0.553,0-1,0.447-1,1v8 C40,41.553,40.447,42,41,42z M42,34h6v6h-6V34z">
                                        </path>
                                    </g>
                                    <rect x="28" y="48" fill="#506C7F" width="8" height="14"></rect>
                                    <g>
                                        <rect x="16" y="34" fill="#45AAB8" width="6" height="6"></rect>
                                        <rect x="42" y="34" fill="#45AAB8" width="6" height="6"></rect>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <h5 class="card-title mt-3 mb-0">Căn hộ/Chung cư mini</h5>
                    </div>
                </div>
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <svg width="50px" height="50px" viewBox="0 0 32 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g clip-path="url(#clip0_901_3019)">
                                    <path
                                        d="M24 31H8H1C1 31 1.69 27.38 2 26C2.21 25.08 3 23 11 22C11 22 12 25 16 25C20 25 21 22 21 22C29 23 29.79 25.02 30 26C30.29 27.38 31 31 31 31H24Z"
                                        fill="#FFC44D"></path>
                                    <path d="M23 8H22H10H9C9 4.13 12.13 1 16 1C19.87 1 23 4.13 23 8Z" fill="#668077">
                                    </path>
                                    <path d="M22 8V11C22 14.87 19 18 16 18C13 18 10 14.87 10 11V8H22Z" fill="#FFE6EA">
                                    </path>
                                    <path
                                        d="M1 31C1 31 1.687 27.379 2 26C2.208 25.083 3 23 11 22C11 22 12 25 16 25C20 25 21 22 21 22C29 23 29.792 25.021 30 26C30.294 27.384 31 31 31 31M10 11C10 14.866 13 18 16 18C19 18 22 14.866 22 11M8 30V31M24 30V31M6 8H23C23 4.134 19.866 1 16 1C12.134 1 9 4.134 9 8"
                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_901_3019">
                                        <rect width="32px" height="32px" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </g>
                        </svg>
                        <h5 class="card-title mt-3 mb-0">Tìm bạn ở ghép</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="new-posts-block py-4">
            <div class="container">
                <h4 class="fw-bold py-3">Tin đăng phòng mới</h4>
                <div class="new-posts mt-4 mb-3">
                    @for ($i = 1; $i <= 8; $i++)
                        <div class="card mb-1" style="width: 19rem;">
                            <img src="templates/front/images/uuu8.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1">Tìm người thuê trọ {{ $i }}</h5>
                                <div class="post-services d-flex justify-content-start py-1">
                                    <div class="service d-flex pe-2">
                                        <svg fill="#383838" width="18px" viewBox="0 0 32 32" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>temperature-quarter</title>
                                                <path
                                                    d="M20.75 6.008c0-6.246-9.501-6.248-9.5 0v13.238c-1.235 1.224-2 2.921-2 4.796 0 3.728 3.022 6.75 6.75 6.75s6.75-3.022 6.75-6.75c0-1.875-0.765-3.572-2-4.796l-0.001-0zM16 29.25c-2.9-0-5.25-2.351-5.25-5.251 0-1.553 0.674-2.948 1.745-3.909l0.005-0.004 0.006-0.012c0.13-0.122 0.215-0.29 0.231-0.477l0-0.003c0.001-0.014 0.007-0.024 0.008-0.038l0.006-0.029v-13.52c-0.003-0.053-0.005-0.115-0.005-0.178 0-1.704 1.381-3.085 3.085-3.085 0.060 0 0.12 0.002 0.179 0.005l-0.008-0c0.051-0.003 0.11-0.005 0.17-0.005 1.704 0 3.085 1.381 3.085 3.085 0 0.063-0.002 0.125-0.006 0.186l0-0.008v13.52l0.006 0.029 0.007 0.036c0.015 0.191 0.101 0.36 0.231 0.482l0 0 0.006 0.012c1.076 0.966 1.75 2.361 1.75 3.913 0 2.9-2.35 5.25-5.25 5.251h-0zM16.75 21.367v-3.765c0-0.414-0.336-0.75-0.75-0.75s-0.75 0.336-0.75 0.75v0 3.765c-1.164 0.338-2 1.394-2 2.646 0 1.519 1.231 2.75 2.75 2.75s2.75-1.231 2.75-2.75c0-1.252-0.836-2.308-1.981-2.641l-0.019-0.005zM26.5 2.25c-1.795 0-3.25 1.455-3.25 3.25s1.455 3.25 3.25 3.25c1.795 0 3.25-1.455 3.25-3.25v0c-0.002-1.794-1.456-3.248-3.25-3.25h-0zM26.5 7.25c-0.966 0-1.75-0.784-1.75-1.75s0.784-1.75 1.75-1.75c0.966 0 1.75 0.784 1.75 1.75v0c-0.001 0.966-0.784 1.749-1.75 1.75h-0z">
                                                </path>
                                            </g>
                                        </svg>
                                        <p class="ms-1 mt-1 mb-0">Nóng lạnh</p>
                                    </div>
                                    <div class="service d-flex pe-2">
                                        <svg viewBox="0 0 1024 1024" width="18px" class="mr-1" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" fill="#383838" stroke="#383838">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M500.6 653.5c37.1 58.4 34.2 76.3 1.9 108.6-41.2 41.2-46.4 73.4-1.9 143.4 4.2 6.5 12.8 8.4 19.3 4.3 6.5-4.2 8.4-12.8 4.3-19.3-37.1-58.4-34.2-76.3-1.9-108.6 41.2-41.2 46.4-73.4 1.9-143.4-4.2-6.5-12.8-8.4-19.3-4.3-6.5 4.1-8.5 12.8-4.3 19.3zM276.6 653.5c37.1 58.4 34.2 76.3 1.9 108.6-41.2 41.2-46.4 73.4-1.9 143.4 4.2 6.5 12.8 8.4 19.3 4.3 6.5-4.2 8.4-12.8 4.3-19.3-37.1-58.4-34.2-76.3-1.9-108.6 41.2-41.2 46.4-73.4 1.9-143.4-4.2-6.5-12.8-8.4-19.3-4.3-6.5 4.1-8.4 12.8-4.3 19.3zM726.5 762.1c-41.2 41.2-46.4 73.4-1.9 143.4 4.2 6.5 12.8 8.4 19.3 4.3 6.5-4.2 8.4-12.8 4.3-19.3-37.1-58.4-34.2-76.3-1.9-108.6 41.2-41.2 46.4-73.4 1.9-143.4-4.2-6.5-12.8-8.4-19.3-4.3-6.5 4.2-8.4 12.8-4.3 19.3 37.1 58.4 34.2 76.3 1.9 108.6zM64.4 226.1v223.8c0 61.9 50.1 112.1 112 112.1h672c61.8 0 112-50.2 112-112.1V226.1c0-61.9-50.1-112.1-112-112.1h-672c-61.8 0-112 50.2-112 112.1z"
                                                    fill="#000000"></path>
                                                <path
                                                    d="M120.4 226.1c0-30.9 25.1-56.1 56-56.1h672c30.9 0 56 25.1 56 56.1v223.8c0 30.9-25.1 56.1-56 56.1h-672c-30.9 0-56-25.1-56-56.1V226.1z"
                                                    fill="#FFFFFF"></path>
                                                <path
                                                    d="M400.4 268c0-23.1 18.4-42 41.7-42h84.5c23.2 0 41.7 19.1 41.7 42 0 23.1-18.4 42-41.7 42h-84.5c-23.1 0-41.7-19.1-41.7-42zM232.4 268c0-23.2 19-42 42-42 23.2 0 42 19 42 42 0 23.2-19 42-42 42-23.2 0-42-19-42-42zM246.4 394h532v-28h-532v28zM246.4 450h532v-28h-532v28z"
                                                    fill="#000000"></path>
                                                <path
                                                    d="M428.4 268c0 7.5 6.1 14 13.7 14h84.5c7.7 0 13.7-6.3 13.7-14 0-7.5-6.1-14-13.7-14h-84.5c-7.7 0-13.7 6.3-13.7 14zM260.4 268c0 7.5 6.3 14 14 14 7.5 0 14-6.3 14-14 0-7.5-6.3-14-14-14-7.5 0-14 6.3-14 14z"
                                                    fill="#FFFFFF"></path>
                                            </g>
                                        </svg>
                                        <p class="ms-1 mt-1 mb-0">Điều hòa</p>
                                    </div>
                                    <div class="service d-flex pe-2">
                                        <svg width="18px" class="mr-1" viewBox="0 0 100 100" data-name="Layer 1"
                                            id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <defs>
                                                    <style>
                                                        .cls-1 {
                                                            fill: none;
                                                            stroke: #231f20;
                                                            stroke-miterlimit: 10;
                                                            stroke-width: 2px;
                                                        }

                                                        .cls-2 {
                                                            fill: #231f20;
                                                        }
                                                    </style>
                                                </defs>
                                                <g>
                                                    <path class="cls-1"
                                                        d="M23.13,35.26v-15.12c0-1.36,1.1-2.46,2.46-2.46h10.41s.06,0,.09,0h.03c.66-.03,1.33,.21,1.84,.71l5.88,5.88-3.48,3.48-5.15-5.15h-7.15v28.08h-4.92v-14.15">
                                                    </path>
                                                    <path class="cls-1"
                                                        d="M54.06,27.96l-10.02,10.02-4.28-4.29c-1.47-1.47-1.47-3.86,0-5.34l4.69-4.69c1.47-1.47,3.86-1.47,5.34,0l4.28,4.29Z">
                                                    </path>
                                                    <path class="cls-1"
                                                        d="M56.76,29.41c0,.44-.17,.88-.51,1.22l-9.54,9.55c-.67,.67-1.76,.67-2.44,0-.34-.34-.51-.78-.51-1.22s.17-.88,.51-1.22l9.54-9.54c.67-.67,1.76-.67,2.44,0,.34,.34,.51,.78,.51,1.22Z">
                                                    </path>
                                                </g>
                                                <g>
                                                    <rect class="cls-2" height="2.84" width="1.16" x="52.61"
                                                        y="42.88"></rect>
                                                    <g>
                                                        <g>
                                                            <rect class="cls-2" height="2.84" width="1.16" x="49.92"
                                                                y="40.04"></rect>
                                                            <rect class="cls-2" height="2.84" width="1.16" x="49.92"
                                                                y="45.72"></rect>
                                                            <rect class="cls-2" height=".23" width="1.16" x="49.92"
                                                                y="59.7"></rect>
                                                        </g>
                                                        <g>
                                                            <rect class="cls-2" height="2.84" width="1.16" x="55.43"
                                                                y="40.27"></rect>
                                                            <rect class="cls-2" height="2.84" width="1.16" x="55.43"
                                                                y="45.95"></rect>
                                                            <rect class="cls-2" height=".45" width="1.16" x="55.42"
                                                                y="59.7"></rect>
                                                        </g>
                                                        <rect class="cls-2" height="2.12" width="1.16" x="52.62"
                                                            y="48.56"></rect>
                                                    </g>
                                                </g>
                                                <path class="cls-1"
                                                    d="M83.29,55.2c0,1.24-.5,2.37-1.32,3.18-.82,.82-1.94,1.32-3.18,1.32H23.22c-2.49,0-4.5-2.01-4.5-4.5,0-1.24,.5-2.37,1.32-3.19,.79-.79,1.88-1.3,3.09-1.32h55.66c2.49,0,4.5,2.02,4.5,4.51Z">
                                                </path>
                                                <path class="cls-1"
                                                    d="M78.36,65.67v8.78c0,5.01-4.06,9.06-9.06,9.06H33.36c-5.01,0-9.07-4.05-9.07-9.06v-14.75h54.07v5">
                                                </path>
                                            </g>
                                        </svg>
                                        <p class="ms-1 mt-1 mb-0">Khép kín</p>
                                    </div>
                                </div>
                                <div class="post-address d-flex py-1">
                                    <svg viewBox="0 0 1024 1024" width="18px" fill="#000000" class="icon"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M512 1012.8c-253.6 0-511.2-54.4-511.2-158.4 0-92.8 198.4-131.2 283.2-143.2h3.2c12 0 22.4 8.8 24 20.8 0.8 6.4-0.8 12.8-4.8 17.6-4 4.8-9.6 8.8-16 9.6-176.8 25.6-242.4 72-242.4 96 0 44.8 180.8 110.4 463.2 110.4s463.2-65.6 463.2-110.4c0-24-66.4-70.4-244.8-96-6.4-0.8-12-4-16-9.6-4-4.8-5.6-11.2-4.8-17.6 1.6-12 12-20.8 24-20.8h3.2c85.6 12 285.6 50.4 285.6 143.2 0.8 103.2-256 158.4-509.6 158.4z m-16.8-169.6c-12-11.2-288.8-272.8-288.8-529.6 0-168 136.8-304.8 304.8-304.8S816 145.6 816 313.6c0 249.6-276.8 517.6-288.8 528.8l-16 16-16-15.2zM512 56.8c-141.6 0-256.8 115.2-256.8 256.8 0 200.8 196 416 256.8 477.6 61.6-63.2 257.6-282.4 257.6-477.6C768.8 172.8 653.6 56.8 512 56.8z m0 392.8c-80 0-144.8-64.8-144.8-144.8S432 160 512 160c80 0 144.8 64.8 144.8 144.8 0 80-64.8 144.8-144.8 144.8zM512 208c-53.6 0-96.8 43.2-96.8 96.8S458.4 401.6 512 401.6c53.6 0 96.8-43.2 96.8-96.8S564.8 208 512 208z"
                                                fill=""></path>
                                        </g>
                                    </svg>
                                    <p class="mb-0 ms-1">Thành phố Thái Nguyên, Phường Tân Thịnh
                                    </p>
                                </div>
                                <div class="post-price d-flex py-1">
                                    <svg viewBox="0 0 24 24" width="16px" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M12 17V17.5V18" stroke="#1C274C" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path d="M12 6V6.5V7" stroke="#1C274C" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path
                                                d="M15 9.5C15 8.11929 13.6569 7 12 7C10.3431 7 9 8.11929 9 9.5C9 10.8807 10.3431 12 12 12C13.6569 12 15 13.1193 15 14.5C15 15.8807 13.6569 17 12 17C10.3431 17 9 15.8807 9 14.5"
                                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path
                                                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                    </svg>
                                    <p class="mb-0 ms-1 text-danger">1.000.000 đ/tháng</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p class="fw-bold text-decoration-underline fst-italic text-end m-0">Xem chi tiết</p>
                            </div>

                        </div>
                    @endfor
                </div>
                <p class="fw-bold text-decoration-underline fst-italic text-end mx-4">Xem thêm</p>
            </div>
        </div>
    </div>
@endsection
