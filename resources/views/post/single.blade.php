@extends('layout')
@section('content')
    <div class="main-content pb-5">
        <div class="container pt-4">
            <div class="row">
                <div class="col-8">
                    <div class="d-flex justify-content-center">
                        <div class="card w-75 images-carousel">
                            <div class="mx-2 w-100">
                                <img src="/templates/front/images/ff3.jpg" alt="">
                            </div>
                            <div class="mx-2 w-100">
                                <img src="/templates/front/images/ffg4.jpg" alt="">
                            </div>
                            <div class="mx-2 w-100">
                                <img src="/templates/front/images/fgfg4.jpg" alt="">
                            </div>
                            <div class="mx-2 w-100">
                                <img src="/templates/front/images/rttr.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="card w-75 mt-5">
                            <div class="card-header fst-italic">
                                Thông tin phòng trọ
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fs-4 my-1 text-center">Tìm người thuê trọ</h5>
                                <div class="mb-0 d-flex">
                                    <img class="cicle-border" width="30px" height="30px"
                                        src="/templates/front/images/avatar-temp.jpg" alt="">
                                    <p class="fw-bold fs-5 my-0 mx-2">Nguyễn Văn Hải</p>
                                </div>
                                <p class="my-1"><i class="fa-solid fa-calendar-days"></i> 2024-04-06 15:26:44</p>
                                <div class="d-flex justify-content-start">
                                    <p class="mt-1 me-2 my-1"><i class="bi bi-clock"></i> 15 giờ trước</p>
                                    <p class="mt-1 mx-2 my-1"><i class="bi bi-eye"></i> 15 lượt xem</p>
                                    <p class="mt-1 mx-2 my-1"><i class="bi bi-person-heart"></i> 15 quan tâm</p>
                                </div>
                                <div class="post-services d-flex justify-content-start">
                                    <p class="mt-1 me-2 my-1"><i class="fa-solid fa-ruler"></i> 25m2</p>
                                    <p class="mt-1 mx-2 my-1"><i class="fa-solid fa-temperature-three-quarters"></i> Nóng
                                        lạnh</p>
                                    <p class="mt-1 mx-2 my-1"><i class="fa-solid fa-fan"></i> Điều hòa</p>
                                    <p class="mt-1 mx-2 my-1"><i class="fa-solid fa-toilet"></i> Khép kín</p>
                                </div>
                                <p class="my-1"><i class="fa-solid fa-location-dot"></i> Thành phố Thái Nguyên,
                                    Phường Tân Thịnh
                                </p>
                                <div class="post-services d-flex justify-content-start">
                                    <p class="mt-1 me-2 my-1 text-danger"><i style="color: black"
                                            class="fa-solid fa-money-bill"></i>
                                        Phòng: 1.000.000 đ/tháng</p>
                                    <p class="mt-1 me-2 my-1 text-danger"><i style="color: black"
                                            class="fa-solid fa-faucet"></i>
                                        Nước: 35,500 đ/khối</p>
                                    <p class="mt-1 me-2 my-1 text-danger"><i style="color: black"
                                            class="fa-solid fa-plug-circle-bolt"></i>
                                        Điện: 3,500 đ/số</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p class="fw-bold fst-italic mb-1">Mô tả:</p>
                                <p class="card-text">Nhachothue.com là một nền tảng tương tác trực tuyến tiên tiến, mang đến
                                    trải nghiệm độc đáo cho người dùng trong quá trình tìm kiếm và cho thuê phòng trọ. Với
                                    giao diện đơn giản, dễ sử dụng và tối ưu hóa cho mọi thiết bị, trang web giúp người dùng
                                    tiết kiệm thời gian và nỗ lực trong việc tìm kiếm nơi ở lý tưởng.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="card w-75">
                            <div class="card-header fst-italic">
                                18 lượt đánh giá
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex ">
                                    <img class="cicle-border" width="45px" height="45px"
                                        src="/templates/front/images/avatar-temp.jpg" alt="">
                                    <div class="ms-3 w-100">
                                        <div class="avt-user d-flex justify-content-between">
                                            <p class="card-title fw-bold mb-0">Nguyễn Văn Hải</p>
                                            <small class="text-end">12 giờ trước</small>
                                        </div>
                                        <p class=" card-text">Hãy thuê ngay bạn nhé.</p>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex ">
                                    <img class="cicle-border" width="45px" height="45px"
                                        src="/templates/front/images/avatar-temp.jpg" alt="">
                                    <div class="ms-3 w-100">
                                        <div class="avt-user d-flex justify-content-between">
                                            <p class="card-title fw-bold mb-0">Nguyễn Văn Hải</p>
                                            <small class="text-end">12 giờ trước</small>
                                        </div>
                                        <p class=" card-text">Nhachothue.com là một nền tảng tương tác trực tuyến tiên tiến,
                                            mang đến
                                            trải nghiệm độc đáo cho người dùng trong quá trình tìm kiếm và cho thuê phòng
                                            trọ. Với
                                            giao diện đơn giản, dễ sử dụng và tối ưu hóa cho mọi thiết bị, trang web giúp
                                            người dùng
                                            tiết kiệm thời gian và nỗ lực trong việc tìm kiếm nơi ở lý tưởng.</p>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex ">
                                    <img class="cicle-border" width="45px" height="45px"
                                        src="/templates/front/images/avatar-temp.jpg" alt="">
                                    <div class="ms-3 w-100">
                                        <div class="avt-user d-flex justify-content-between">
                                            <p class="card-title fw-bold mb-0">Nguyễn Văn Hải</p>
                                            <small class="text-end">12 giờ trước</small>
                                        </div>
                                        <p class=" card-text">Nhachothue.com là một nền tảng tương tác trực tuyến tiên tiến,
                                            mang đến
                                            trải nghiệm độc đáo cho người dùng trong quá trình tìm kiếm và cho thuê phòng
                                            trọ. Với
                                            giao diện đơn giản, dễ sử dụng và tối ưu hóa cho mọi thiết bị, trang web giúp
                                            người dùng
                                            tiết kiệm thời gian và nỗ lực trong việc tìm kiếm nơi ở lý tưởng.</p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="w-100">
                        <div class="card">
                            <div class="card-header fw-bold">
                                Những người quan tâm
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nguyễn Văn A - 0965188209 - 2024-04-06 12:30:22</li>
                                <li class="list-group-item">Nguyễn Văn A - 0965188209 - 2024-04-06 12:30:22</li>
                                <li class="list-group-item">Nguyễn Văn A - 0965188209 - 2024-04-06 12:30:22</li>
                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header fw-bold">
                                Cùng khu vực
                            </div>
                            <ul class="list-group list-group-flush">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li class="list-group-item p-2">
                                        <div class="posts">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="/templates/front/images/fgfg4.jpg"
                                                        class="rounded-start w-100 h-100" alt="...">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5 class="card-tile mt-3 mb-1">Phòng trọ giá rẻ</h5>
                                                    <p class="card-text text-danger m-0"> <i style="color: black"
                                                            class="bi bi-coin"></i>
                                                        1.000.000 đ/tháng</p>
                                                    <p class="card-text"><i class="fa-solid fa-location-dot"></i> Thành
                                                        phố
                                                        Thái
                                                        Nguyên,
                                                        Phường Tân Thịnh
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                            <div class="card-footer text-end">
                                Xem thêm >>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="posts-same-author mt-3 d-flex justify-content-end">
                <div class="card w-100">
                    <div class="card-header fst-italic">
                        Phòng cùng người đăng
                    </div>
                    <div class="card-body">
                        <div class="popular-posts-carousel mb-3">
                            @for ($i = 1; $i <= 8; $i++)
                                <div class="carousel-cell mb-3 mx-2 card" style="width: 17rem;">
                                    <img src="/templates/front/images/uuu8.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1">Tìm người thuê trọ {{ $i }}</h5>
                                        <div class="post-services d-flex justify-content-between">
                                            <p class="mb-0"><i class="fa-solid fa-ruler"></i> 25m2</p>
                                            <p class="mb-0"><i class="fa-solid fa-temperature-three-quarters"></i> Nóng
                                                lạnh</p>
                                            <p class="mb-0"><i class="fa-solid fa-fan"></i> Điều hòa</p>
                                            <p class="mb-0"><i class="fa-solid fa-toilet"></i> Khép kín</p>
                                        </div>
                                        <p class="mb-0 my-1"><i class="fa-solid fa-location-dot"></i> Thành phố Thái
                                            Nguyên,
                                            Phường Tân Thịnh
                                        </p>
                                        <p class="mb-0 my-1 text-danger"> <i style="color: black" class="bi bi-coin"></i>
                                            1.000.000 đ/tháng</p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
