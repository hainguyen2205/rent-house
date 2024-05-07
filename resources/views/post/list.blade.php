@extends('layout')
@section('content')
    <div class="background-primary py-3">
        <div class="container">
            <form class="row" action="/post/list" method="GET">
                <div class="col-md-6 col-sm-12">
                    <input class="w-100 form-control" type="text" name="title" placeholder="Đại học CNTT...">
                </div>
                <div class="col-md-5 col-sm-8">
                    <div class="h-100 d-flex align-items-center">
                        <div class="row">
                            <div class="col-3">
                                <select class="w-100 custom-select bg-transparent border border-0" name="id_district"
                                    id="districtSelect">
                                    <option value="">Quận/Huyện</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->district_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="w-100 custom-select bg-transparent border border-0" name="id_ward"
                                    id="wardSelect">
                                    <option class="" value="">Phường/Xã</option>
                                </select>
                            </div>
                            <div class="col-3 d-flex justify-content-center">
                                <div class="filter-post positon-relative">Diện tích <i style="font-size: 11px"
                                        class="ms-2 fa-solid fa-angle-down"></i>
                                    <div class="p-1 bg-light border custom-dropdown">
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
                            <div class="col-3 d-flex justify-content-center">
                                <div class="filter-post positon-relative">Mức giá <i style="font-size: 11px"
                                        class="ms-2 fa-solid fa-angle-down"></i>
                                    <div class="p-1 bg-light custom-dropdown">
                                        <div class="d-flex align-items-center">
                                            <input class="form-control" name="min_rent" min="1000"
                                                placeholder="600.000đ" type="number">
                                            <i class="text-dark bi bi-arrow-right mx-1"></i>
                                            <input class="form-control" name="max_rent" min="1000"
                                                placeholder="800.000đ" type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-4 p-0">
                    <button type="submit" class="btn btn-light"><i class="fa-solid fa-magnifying-glass fa-bounce"></i> Tìm
                        kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container post-list pt-4 pb-2">
        <div class="font-opensans">
            <h3 class="text-color text-center">DANH SÁCH BÀI ĐĂNG</h3>
            @if ($search_title != '')
                <p class="text-color fst-italic text-center">Tìm kiếm: {{ $search_title }}</p>
            @endif
            @if (count($posts) != 0)
                <span class="custom-span">Khám phá {{ count($posts) }} bài đăng</span>
            @endif
        </div>
        <div class="mb-3">
            <div class="dropdown">
                <div id="orderby-btn" class="bg-transparent d-inline p-2 cursor-pointer fs-5 border-bottom">
                    <i class="bi bi-funnel"></i> Sắp xếp
                </div>
                <ul class="dropdown-menu" id="orderby-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="cursor-pointer">
                        <p class="dropdown-item mb-0" onclick="orderByPosts('news')">Mới nhất</p>
                    </li>
                    <li class="cursor-pointer">
                        <p class="dropdown-item mb-0" onclick="orderByPosts('views')">Xem nhiều</p>
                    </li>
                    <li class="cursor-pointer">
                        <p class="dropdown-item mb-0" onclick="orderByPosts('interests')">Được quan tâm</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mb-3">
            @if (count($posts) == 0)
                <div class="p-5 text-center mb-8">
                    <img width="80px" src="/templates/front/images/emptybox.png" alt="" srcset="">
                    <p>Không có bài đăng nào phù hợp</p>
                </div>
            @endif
            @foreach ($posts as $post)
                <div class="col-md-3 col-sm-6 mb-3 px-2">
                    <div class="post-box-item w-100 border rounded shadow-sm pb-2">
                        <div class="img-post position-relative">
                            <img class="object-fit-cover rounded-top w-100 h-100" src="{{ $post->images[0]->url }}"
                                alt="...">
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
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
