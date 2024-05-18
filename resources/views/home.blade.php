@extends('layout')
@section('content')
    <div class="main-content">
        <div class="search-block d-flex justify-content-center align-items-center py-5">
            <div class="search-box px-5 py-5 w-75">

                <div class="d-sm-none d-md-block mb-3">
                    <h1 class="fs-1 m-0 fw-bold mb-3 text-color">Website kết nối người thuê và chủ phòng trọ, căn hộ</h1>
                    <span class="fs-5 fst-italic text-color">Kết nối bạn với hàng vạn phòng trọ tiện nghi theo nhu
                        cầu</span>
                </div>

                <form class="text-center" action="/post/list" method="GET">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <input class="form-control" name="title" type="text" placeholder="Cổng chính CNTT">
                        </div>
                        <div class="col-6 mb-3">
                            <select class="w-100 form-select custom-select border border-0 text-dark" name="id_district"
                                id="districtSelect2">
                                <option value="">Quận/Huyện</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->district_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <select class="w-100 form-select custom-select border border-0 text-dark" name="id_ward"
                                id="wardSelect2">
                                <option value="">Phường/Xã</option>
                            </select>
                        </div>
                        <div class="col-4 mb-3">
                            <select class="w-100 form-select custom-select border border-0 text-dark" name="type_house">
                                <option value="">Loại hình nhà</option>
                                @foreach ($type_houses as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mb-3 d-flex justify-content-center">
                            <div class="form-control filter-post positon-relative text-dark">
                                <div class="d-flex justify-content-between">
                                    <p class="m-0 d-inline text-start">Diện tích</p>
                                    <i style="font-size: 11px" class="mt-2 fa-solid fa-angle-down"></i>
                                </div>
                                <div style="margin-left: -13px; margin-top:10px"
                                    class="p-1 bg-light border custom-dropdown">
                                    <div class="d-flex align-items-center">
                                        <input class="form-control" name="min_acreage" min="1" placeholder="15m2"
                                            type="number">
                                        <i class="text-dark bi bi-arrow-right mx-1"></i>
                                        <input class="form-control" name="max_acreage" min="1" placeholder="25m2"
                                            type="number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-3 d-flex justify-content-center">
                            <div class="form-control filter-post positon-relative text-dark">
                                <div class="d-flex justify-content-between">
                                    <p class="m-0 d-inline text-start">Mức giá</p>
                                    <i style="font-size: 11px" class="mt-2 fa-solid fa-angle-down"></i>
                                </div>
                                <div style="margin-left: -13px; margin-top: 12px" class="p-1 bg-light custom-dropdown">
                                    <div class="d-flex align-items-center">
                                        <input class="form-control" name="min_rent" min="0" placeholder="600.000đ"
                                            type="number">
                                        <i class="text-dark bi bi-arrow-right mx-1"></i>
                                        <input class="form-control" name="max_rent" min="0" placeholder="800.000đ"
                                            type="number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Tìm kiếm</button>
                </form>
            </div>
        </div>

        <div class="districts-block py-4">
            <div class="block-top">
            </div>
            <div class="container">
                <h1 class="py-4 mb-4 text-center fw-bold fs-2 text-white position-relative">Khám phá ngay phòng trọ tại khu
                    vực của
                    bạn</h1>
                <div class="districts">
                    <div class="district-item thainguyen-bg">
                        <a href="/post/list?id_district=1">
                            <div class="item-title text-white">
                                <p class="fw-bold fs-5">TP. Thái Nguyên</p>
                                <p class="fs-6">{{ $post_count['thainguyen'] }} tin đăng </p>
                            </div>
                        </a>
                    </div>

                    <div class="district-item songcong-bg">
                        <a href="/post/list?id_district=2">
                            <div class="item-title text-white">
                                <p class="fw-bold fs-5">TP. Sông Công</p>
                                <p class="fs-6">{{ $post_count['songcong'] }} tin đăng</p>
                            </div>
                        </a>
                    </div>
                    <div class="district-item phoyen-bg">
                        <a href="/post/list?id_district=8">
                            <div class="item-title text-white">
                                <p class="fw-bold fs-5">TP. Phổ Yên</p>
                                <p class="fs-6">{{ $post_count['phoyen'] }} tin đăng</p>
                            </div>
                        </a>
                    </div>
                    <div class="district-item phubinh-bg">
                        <a href="/post/list?id_district=9">
                            <div class="item-title text-white">
                                <p class="fw-bold fs-5">Huyện Phú Bình</p>
                                <p class="fs-6">{{ $post_count['phubinh'] }} tin đăng</p>
                            </div>
                        </a>
                    </div>
                    <div class="district-item daitu-bg">
                        <a href="/post/list?id_district=7">
                            <div class="item-title text-white">
                                <p class="fw-bold fs-5">Huyện Đại Từ</p>
                                <p class="fs-6">{{ $post_count['daitu'] }} tin đăng</p>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="popular-posts-block pb-4">
            <div class="container">
                <h4 class="fw-bold mb-4 text-color">Phòng trọ đang được quan tâm</h4>
                <div class="popular-posts-carousel">
                    @foreach ($popular_posts as $post)
                        <div class="popular-posts-cell w-100 mx-2 border rounded shadow-sm pb-2">
                            <div class="img-post position-relative mb-2">
                                <img class="object-fit-cover w-100 rounded-top h-100" src="{{ $post->images[0]->url }}"
                                    alt="...">
                                <a href="/post/single/{{ $post->id }}"
                                    class="btn btn-primary position-absolute top-50 start-50 translate-middle"><i
                                        class="bi bi-eye"></i> Xem chi
                                    tiết</a>
                            </div>
                            <div class="details-post px-3 mx-2">
                                <a href="/post/single/{{ $post->id }}">
                                    <p class="fs-5 fw-bold mb-1 text-center">
                                        {{ $post->title }}
                                    </p>
                                </a>
                                <div class="row mb-1">
                                    <p class="mb-0 fs-6 col-6"><i class="bi bi-clock"></i>
                                        {{ $post->created_at->diffInHours($now) }} giờ trước</p>
                                    <p class="mb-0 fs-6 col-6"><i class="fa-solid fa-ruler"></i>
                                        {{ $post->acreage }}m2
                                    </p>
                                </div>
                                <div class="mb-1 border-top">
                                    <p class="mb-0 mt-1 fs-6 text-danger"><i class="text-dark fa-solid fa-money-bill"></i>
                                        Giá: {{ number_format($post->rent) }} đ/tháng</p>
                                </div>
                                <div class="border-top">
                                    <p class="mb-0 fs-6 text-wrap"><i
                                            class="fa-solid fa-location-dot me-1"></i>{{ $post->ward->ward_name }},
                                        {{ $post->district->district_name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="features-block mt-5 py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 my-2">
                        <a href="post/list/">
                            <div class="card text-center shadow border-bottom-primary">
                                <div class="card-body">
                                    <svg width="50px" height="50px" viewBox="0 0 64 64"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        aria-hidden="true" role="img" class="iconify iconify--emojione"
                                        preserveAspectRatio="xMidYMid meet" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M33 11.8c0 .5-.5 1-1 1s-1-.5-1-1V1c0-.6.5-1 1-1s1 .4 1 1v10.8"
                                                fill="#b2c1c0">
                                            </path>
                                            <path fill="#e5dec1" d="M4 28h56v32H4z"> </path>
                                            <path
                                                d="M60.5 19.8c-.5-1-1.8-1.8-3-1.8H6.4c-1.1 0-2.5.8-3 1.8L.1 26.2c-.5 1 0 1.8 1.1 1.8h61.4c1.1 0 1.6-.8 1.1-1.8l-3.2-6.4"
                                                fill="#d33b23"> </path>
                                            <g fill="#d6eef0">
                                                <path
                                                    d="M15 45c0 .5-.4 1-1 1H8c-.6 0-1-.5-1-1v-4c0-.5.4-1 1-1h6c.6 0 1 .5 1 1v4">
                                                </path>
                                                <path
                                                    d="M15 35c0 .5-.4 1-1 1H8c-.6 0-1-.5-1-1v-4c0-.5.4-1 1-1h6c.6 0 1 .5 1 1v4">
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
                                            <path
                                                d="M15 55c0 .5-.4 1-1 1H8c-.6 0-1-.5-1-1v-4c0-.5.4-1 1-1h6c.6 0 1 .5 1 1v4"
                                                fill="#d6eef0"> </path>
                                            <g fill="#dbb471">
                                                <path
                                                    d="M14 57H8c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5H8">
                                                </path>
                                                <path d="M10.5 50.5h1v6h-1z"> </path>
                                            </g>
                                            <g fill="#d6eef0">
                                                <path
                                                    d="M57 45c0 .5-.5 1-1 1h-6c-.5 0-1-.5-1-1v-4c0-.5.5-1 1-1h6c.5 0 1 .5 1 1v4">
                                                </path>
                                                <path
                                                    d="M57 35c0 .5-.5 1-1 1h-6c-.5 0-1-.5-1-1v-4c0-.5.5-1 1-1h6c.5 0 1 .5 1 1v4">
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
                                            <path
                                                d="M57 55c0 .5-.5 1-1 1h-6c-.5 0-1-.5-1-1v-4c0-.5.5-1 1-1h6c.5 0 1 .5 1 1v4"
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
                                            <path d="M32 22c-.5 0-1 .5-1 1v4c0 .5.5 1 1 1s1-.5 1-1v-4c0-.5-.5-1-1-1"
                                                fill="#b2c1c0">
                                            </path>
                                            <path d="M32 26h-2c-.5 0-1 .5-1 1s.5 1 1 1h2c.5 0 1-.5 1-1s-.5-1-1-1"
                                                fill="#f15744">
                                            </path>
                                            <path d="M33 2v7.4c4 3.2 8-6.9 12-3.7C41 0 37 7.6 33 2z" fill="#b4d7ee">
                                            </path>
                                            <path
                                                d="M32.9 40.3c-.5-.4-1.4-.4-1.9 0c-2.1 1.5-9 5.7-9 5.7v2h20v-2s-6.9-4.2-9.1-5.7"
                                                fill="#f15744"> </path>
                                            <path
                                                d="M63 60H1c-.6 0-1 .5-1 1v2c0 .5.4 1 1 1h62c.5 0 1-.5 1-1v-2c0-.5-.5-1-1-1"
                                                fill="#666"> </path>
                                            <path fill="#e8e8e8" d="M20 62h24v2H20z"> </path>
                                            <path fill="#d0d0d0" d="M22 60h20v2H22z"> </path>
                                            <g fill="#666">
                                                <path d="M29.1 53.5h1.4v.7h-1.4z"> </path>
                                                <path d="M33.5 53.5h1.4v.7h-1.4z"> </path>
                                            </g>
                                        </g>
                                    </svg>
                                    <h5 class= "mt-3 mb-0 fs-5 text-color">Phòng trọ gần trường</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 my-2">
                        <a href="/post/list">
                            <div class="card text-center shadow border-bottom-success">
                                <div class="card-body">
                                    <svg width="50px" height="50px" viewBox="0 0 1024 1024" class="icon"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M663.4 736h192v167.5h-192z" fill="#A4A9AD"></path>
                                            <path
                                                d="M681.2 790.3h82.3v39.6h-82.3zM773 843h82.3v39.6H773zM663.4 736h192v45h-192z"
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
                                            <path d="M263.1 786.7h227.7v28.5H263.1zM263.1 840.8h227.7v28.5H263.1z"
                                                fill="">
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
                                    <h5 class= "mt-3 mb-0 fs-5 text-color">Phòng trọ gần khu công nghiệp</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 my-2">
                        <a href="/post/list?type_house=4">
                            <div class="card text-center shadow border-bottom-warning">
                                <div class="card-body">
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="50px" height="50px"
                                        viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve"
                                        fill="#000000">
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
                                                    <rect x="16" y="34" fill="#45AAB8" width="6" height="6">
                                                    </rect>
                                                    <rect x="42" y="34" fill="#45AAB8" width="6" height="6">
                                                    </rect>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <h5 class= "mt-3 mb-0 fs-5 text-color">Căn hộ/Chung cư mini</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 my-2">
                        <a href="/post/list?type_house=3">
                            <div class="card text-center shadow border-bottom-danger">
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
                                                <path d="M23 8H22H10H9C9 4.13 12.13 1 16 1C19.87 1 23 4.13 23 8Z"
                                                    fill="#668077">
                                                </path>
                                                <path d="M22 8V11C22 14.87 19 18 16 18C13 18 10 14.87 10 11V8H22Z"
                                                    fill="#FFE6EA">
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
                                    <h5 class=" mt-3 mb-0 fs-5 text-color">Tìm bạn ở ghép</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="new-posts-block py-4">
            <div class="container">
                <h4 class="fw-bold pb-3 fs-4 text-color">Tin đăng phòng mới</h4>
                <div class="row mb-3">
                    @foreach ($new_posts as $post)
                        <div class="col-md-3 col-sm-6 mb-3 px-2">
                            <div class="post-box-item w-100 border rounded shadow-sm pb-2">
                                <div class="img-post position-relative">
                                    <img class="object-fit-cover rounded-top w-100 h-100"
                                        src="{{ $post->images[0]->url }}" alt="...">
                                    <a href="/post/single/{{ $post->id }}"
                                        class="btn btn-primary position-absolute top-50 start-50 translate-middle"><i
                                            class="bi bi-eye"></i> Xem chi
                                        tiết</a>
                                </div>
                                <div class="details-post px-3 mt-2 mx-2">
                                    <a href="/post/single/{{ $post->id }}">
                                        <p class="fs-4 fw-bold mb-1 text-center">
                                            {{ $post->title }}
                                        </p>
                                    </a>
                                    <div class="row mb-1">
                                        <p class="mb-0 fs-6 col-6"><i class="bi bi-clock"></i>
                                            {{ $post->created_at->diffInHours($now) }} giờ trước</p>
                                        <p class="mb-0 fs-6 col-6"><i class="fa-solid fa-ruler"></i>
                                            {{ $post->acreage }}m2
                                        </p>
                                    </div>
                                    <div class="mb-1 border-top">
                                        <p class="mb-0 mt-1 fs-6 text-danger"><i
                                                class="text-dark fa-solid fa-money-bill"></i>
                                            Giá: {{ number_format($post->rent) }} đ/tháng</p>
                                    </div>
                                    <div class="border-top">
                                        <p class="mb-0 fs-6 text-wrap"><i
                                                class="fa-solid fa-location-dot me-1"></i>{{ $post->ward->ward_name }},
                                            {{ $post->district->district_name }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
