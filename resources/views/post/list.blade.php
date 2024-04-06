@extends('layout')
@section('content')
    <div class="search-bar py-3">
        <div class="container">
            <form class="d-flex justify-content-between" action="">
                <input class="form-control w-50" type="text" placeholder="Cổng chính CNTT">
                <select class="custom-input" name="district" id="">
                    <option value="1">Quận/Huyện</option>
                </select>
                <select class="custom-input" name="ward" id="">
                    <option value="">Phường/Xã</option>
                </select>
                <div class="dropdown">
                    <button class="py-2 custom-input dropdown-toggle w-100" type="button" id="triggerId"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mức giá
                    </button>
                    <div style="width: 300px;" class="dropdown-menu" aria-labelledby="triggerId">
                        <div class="px-2 d-flex">
                            <input name="min-price" type="number" class="form-control" placeholder="300.000đ">
                            <i class="mt-2 bi bi-arrow-right"></i>
                            <input name="max-price" type="number" class="form-control" placeholder="1.000.000đ">
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="py-2 custom-input dropdown-toggle w-100" type="button" id="triggerId"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Diện tích
                    </button>
                    <div style="width: 200px;" class="dropdown-menu" aria-labelledby="triggerId">
                        <div class="px-2 d-flex">
                            <input name="min-acreage" type="number" class="form-control" placeholder="15m²">
                            <i class="mt-2 bi bi-arrow-right"></i>
                            <input name="max-acreage" type="number" class="form-control" placeholder="25m²">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary"><i class="bi bi-search"></i> Tìm kiếm</button>
            </form>
        </div>
    </div>
    <div class="container post-list pt-4">
        <div class="font-opensans">
            <h3 class="text-color text-center">DANH SÁCH BÀI ĐĂNG</h3>
            <p class="text-color fst-italic text-center">Tìm kiếm: Đại học CNTT, TP Thái Nguyên, Phường Tân Thịnh 300,000đ
                đến 1,000,000đ, 12m2 đến 25m2</p>
            <span>Khám phá 8 bài đăng</span>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="card w-75">
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
                <div class="card w-75 my-4">
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
                    @for ($i = 1; $i <= 8; $i++)
                        <div class="card p-0 m-2" style="width: 45%;">
                            <img src="/templates/front/images/uuu8.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1">Tìm người thuê trọ {{ $i }}</h5>
                                <div class="d-flex justify-content-start">
                                    <p class="mt-1 me-1 mb-0"><i class="bi bi-clock"></i> 15 giờ trước</p>
                                    <p class="mt-1 mx-1 mb-0"><i class="bi bi-eye"></i> 15 lượt xem</p>
                                    <p class="mt-1 mx-1 mb-0"><i class="bi bi-person-heart"></i> 15 quan tâm</p>
                                </div>
                                <div class="post-services d-flex justify-content-start py-1">
                                    <p class="mt-1 me-1 mb-0"><i class="fa-solid fa-ruler"></i> 25m2</p>
                                    <p class="mt-1 mx-1 mb-0"><i class="fa-solid fa-temperature-three-quarters"></i> Nóng lạnh</p>
                                    <p class="mt-1 mx-1 mb-0"><i class="fa-solid fa-fan"></i> Điều hòa</p>
                                    <p class="mt-1 mx-1 mb-0"><i class="fa-solid fa-toilet"></i> Khép kín</p>
                                </div>
                                <p class="mb-0 my-1"><i class="fa-solid fa-location-dot"></i> Thành phố Thái Nguyên,
                                    Phường Tân Thịnh
                                </p>
                                <p class="mb-0 my-1 text-danger"> <i style="color: black" class="bi bi-coin"></i>
                                    1.000.000 đ/tháng</p>
                            </div>
                            <div class="card-footer">
                                <p class="fw-bold text-decoration-underline fst-italic text-end m-0">Xem chi tiết</p>
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </div>

    </div>
@endsection
