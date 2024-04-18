@extends('layout')
@section('content')
    <div class="background-primary py-3">
        <div class="container">
            <form class="row" action="">
                <div class="col-md-5 col-sm-12">
                    <input class="form-control" type="text" placeholder="Cổng chính CNTT">
                </div>
                <div class="col-md-7 col-sm-12 d-flex justify-content-between">

                    <select class="mx-1 form-select search-filer-input" class="" name="district" id="districtSelect2"
                        aria-label="Default select example">
                        <option value="">Quận/Huyện</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                        @endforeach
                    </select>

                    <select class="mx-1 form-select search-filer-input" name="ward" id="wardSelect"
                        aria-label="Default select example">
                        <option value="">Phường/Xã</option>
                    </select>

                    <div class="mx-1 dropdown search-filer-input">
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

                    <div class="mx-1 dropdown search-filer-input">
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

                    <button class="btn btn-light"><i class="bi bi-search"></i> Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container post-list pt-4 pb-5">
        <div class="font-opensans">
            <h3 class="text-color text-center">DANH SÁCH BÀI ĐĂNG</h3>
            <p class="text-color fst-italic text-center">Tìm kiếm: Đại học CNTT, TP Thái Nguyên, Phường Tân Thịnh 300,000đ
                đến 1,000,000đ, 12m2 đến 25m2</p>
            <span>Khám phá 8 bài đăng</span>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="card w-75 border-left-primary shadow">
                    <div class="card-header fw-bold">
                        Tìm theo khoảng giá
                    </div>
                    <div class="card-body">
                        <p class="card-text">500,000đ - 800,000đ</p>
                        <p class="card-text">800,000đ - 1,000,000đ</p>
                        <p class="card-text">1,000,000đ - 1,300,000đ</p>
                        <p class="card-text">1.300,000đ - 1,600,000đ</p>
                        <p class="card-text">1,600,000đ trở lên</p>
                    </div>
                </div>
                <div class="card w-75  border-left-primary shadow my-4">
                    <div class="card-header fw-bold">
                        Tìm theo diện tích
                    </div>
                    <div class="card-body">
                        <p class="card-text">Dưới 15m²</p>
                        <p class="card-text">15m² - 30m²</p>
                        <p class="card-text">30m² trở lên</p>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="row row-cols-sm-1 row-cols-lg-2">
                    @foreach ($posts as $post)
                        <div class="card p-0 m-2 shadow-sm" style="width: 19rem;">
                            <a href="/post/single/{{ $post->id }}" class="text-color">
                                <img class="object-fit-cover" width="300px" height="200px"
                                    src="{{ $post->images[0]->url }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title mb-1">
                                        {{ strlen($post->title) > 25 ? substr($post->title, 0, 29) . '...' : $post->title }}
                                    </h5>
                                    <div class="d-flex justify-content-start">
                                        <p style="font-size: 12px" class="mt-1 me-1 mb-0"><i class="bi bi-clock"></i> 15
                                            giờ
                                            trước</p>
                                        <p style="font-size: 12px" class="mt-1 mx-1 mb-0"><i class="bi bi-eye"></i>
                                            {{ $post->views }} lượt xem</p>
                                        <p style="font-size: 12px" class="mt-1 mx-1 mb-0"><i
                                                class="bi bi-person-heart"></i>
                                            {{ $post->interests }} quan tâm</p>
                                    </div>
                                    <div style="font-size: 12px" class="post-services d-flex justify-content-start py-1">
                                        <p class="mt-1 me-1 mb-0"><i class="fa-solid fa-ruler"></i> {{ $post->acreage }}m2
                                        </p>
                                        @foreach ($post->services as $service)
                                            <p class="mt-1 mx-1 mb-0">{!! html_entity_decode($service->icon) !!}{{ $service->services_name }}</p>
                                        @endforeach
                                    </div>
                                    <p class="mb-0 my-1"><i
                                            class="fa-solid fa-location-dot me-1"></i>{{ $post->ward->ward_name }},
                                        {{ $post->district->district_name }}
                                    </p>
                                    <p class="mb-0 my-1 text-danger"> <i style="color: black" class="bi bi-coin"></i>
                                        {{ $post->rent }} đ/tháng</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
