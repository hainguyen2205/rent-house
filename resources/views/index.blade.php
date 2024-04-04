@extends('layout')
@section('content')
    <div class="main-content">
        <div class="search-block">
            <div class="search-box px-5 py-5">
                <h1 class="fs-1">Website kết nối người thuê và chủ phòng trọ, căn hộ</h1>
                <h4 class="fs-5">Kết nối bạn với hàng vạn phòng trọ tiện nghi theo nhu cầu</h4>
                <form class="text-center mt-4" action="/#" method="GET">
                    <input class="form-control my-3" type="text" placeholder="Cổng chính CNTT">
                    <div class="box-filter d-flex justify-content-evenly">
                        <select class="mr-3 form-select" class="" name="district" id="">
                            <option value="1">Tp Thái Nguyên</option>
                        </select>
                        <select class="form-select mx-3" name="ward" id="">
                            <option value="1">Tân Thịnh</option>
                            <option value="2">Thịnh Đán</option>
                            <option value="3">Phan Đình Phùng</option>
                        </select>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <input type="text" class="dropdown-item">
                                <input type="text" class="dropdown-item">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-3 btn btn-primary">Tìm kiếm</button>
                </form>
            </div>
        </div>
        <div class="districts-block py-4">
            <div class="block-top">
            </div>
            <div class="container">
                <h1 class="pt-3 pb-4 my-0 text-center fs-2 text-white">Khám phá ngay phòng trọ tại khu vực của bạn</h1>
                <div class="districts">
                    {{-- <a href="#"> --}}
                    <div class="district-item item-1">
                        <img src="/images/tpthainguyen.jpg" alt="">
                        <div class="item-title">
                            <p>TP. Thái Nguyên</p>
                            <p>9 tin đăng</p>
                        </div>
                    </div>
                    {{-- </a> --}}
                    <div class="district-item item-2">
                        <img src="/images/songcong.jpg" alt="">
                        <div class="item-title">
                            <p>TP. Sông Công</p>
                            <p>9 tin đăng</p>
                        </div>
                    </div>
                    <div class="district-item item-3">
                        <img src="/images/phoyen.jpg" alt="">
                        <div class="item-title">
                            <p>TP. Phổ Yên</p>
                            <p>9 tin đăng</p>
                        </div>
                    </div>
                    <div class="district-item item-4">
                        <img src="/images/phubinh.jpg" alt="">
                        <div class="item-title">
                            <p>Huyện Phú Bình</p>
                            <p>9 tin đăng</p>
                        </div>
                    </div>
                    <div class="district-item item-5">
                        <img src="/images/daitu.jpg" alt="">
                        <div class="item-title">
                            <p>Huyện Đại Từ</p>
                            <p>9 tin đăng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="popular-posts-block">
            <div class="container">
                <h1 class="fw-bold">Phòng trọ đang được quan tâm</h1>
                <div class="posts d-flex justify-content-space-between">
                    <div class="mx-2 card" style="width: 18rem;">
                        <img src="/images/uuu8.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                    <div class="mx-2 card" style="width: 18rem;">
                        <img src="/images/fgfggf54.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="mx-2 card" style="width: 18rem;">
                        <img src="/images/phubinh.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
