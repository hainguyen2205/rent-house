@extends('layout')
@section('content')
    <div class="main-content pb-5">
        <div class="container pt-4">
            <div class="row">
                <div class="col-8">
                    <div class="d-flex justify-content-center">
                        <div class="card w-75 images-carousel">
                            @foreach ($post->images as $image)
                                <div class="mx-2 w-100">
                                    <img class="object-fit-scale" src="{{ $image->url }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="card w-75 mt-5">
                            <div class="card-header fst-italic">
                                Thông tin phòng trọ
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold fs-5 my-1 text-center">{{ $post->title }}</h5>
                                <div class="d-flex justify-content-start">
                                    <p class="mt-1 me-2 my-1"><i class="bi bi-clock"></i> {{ $post->created_at }}</p>
                                    <p class="mt-1 mx-2 my-1"><i class="bi bi-eye"></i> {{ $post->views }} lượt xem</p>
                                    <p class="mt-1 mx-2 my-1"><i class="bi bi-person-heart"></i> {{ $post->interests }} quan
                                        tâm
                                    </p>
                                </div>
                                <div class="post-services d-flex justify-content-start">
                                    <p class="mt-1 me-2 my-1"><i class="fa-solid fa-ruler"></i> {{ $post->acreage }}m2</p>
                                    @foreach ($post->services as $service)
                                        <p class="mt-1 mx-2 my-1">{!! html_entity_decode($service->icon) !!} {{ $service->services_name }} </p>
                                    @endforeach
                                </div>
                                <p class="my-1"><i class="fa-solid fa-location-dot me-2"></i>{{ $post->ward->ward_name }},
                                    {{ $post->district->district_name }}
                                </p>
                                <div class="post-services d-flex justify-content-start">
                                    <p class="mt-1 me-2 my-1 text-danger"><i class="text-dark fa-solid fa-money-bill"></i>
                                        Phòng: {{ number_format($post->rent) }} đ/tháng</p>
                                    <p class="mt-1 me-2 my-1 text-danger"><i class="text-dark fa-solid fa-faucet"></i>
                                        Nước: {{ number_format($post->water_price) }} đ/khối</p>
                                    <p class="mt-1 me-2 my-1 text-danger"><i
                                            class="text-dark fa-solid fa-plug-circle-bolt"></i>
                                        Điện: {{ number_format($post->electric_price) }} đ/số</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p class="fw-bold fst-italic mb-1">Mô tả:</p>
                                <p class="card-text white-space-pre">{{ $post->description }}</p>
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
                <div class="col-md-4 col-sm-12">
                    <div class="w-100">
                        @if (Auth::user()->id == $post->author->id)
                            <div class="card">
                                <div class="card-header fw-bold">
                                    Những người quan tâm
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Nguyễn Văn Anh - 0965188209 - 2024-04-06</li>
                                    <li class="list-group-item">Nguyễn Văn Anh - 0965188209 - 2024-04-06</li>
                                    <li class="list-group-item">Nguyễn Văn Anh - 0965188209 - 2024-04-06</li>
                                </ul>
                            </div>
                        @else
                            <div class="card">
                                <div class="card-body d-flex justify-content-center ">
                                    <div class="w-75">
                                        <div class="d-flex justify-content-center">
                                            <img class="cicle-border" width="80px"
                                                height="80px"src="{{ $post->author->avatar_url }}" alt="">
                                        </div>
                                        <p class="text-center fw-bold fs-5 my-2">{{ $post->author->name }}</p>
                                        <div class="rounded bg-success text-white text-center fw-bold py-2"><i
                                                class="bi bi-telephone-fill"></i> {{ $post->author->phone }}</div>
                                        <button class="btn btn-danger rounded w-100 mt-2 fw-bold"><i
                                                class="bi bi-heart-fill"></i> Quan tâm</button>
                                    </div>
                                </div>
                            </div>
                        @endif



                        <div class="card mt-4">
                            <div class="card-header fw-bold">
                                Cùng khu vực
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach ($related_address_posts as $post)
                                    <li class="list-group-item p-2">
                                        <div class="posts">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="/post/single/{{ $post->id }}">
                                                        <img width="120px" height="110px"
                                                            src="{{ $post->images[0]->url }}" class="rounded-start"
                                                            alt="...">
                                                    </a>
                                                </div>
                                                <div class="col-md-8">
                                                    <a href="/post/single/{{ $post->id }}">
                                                        <h5 class="card-tile mt-3 mb-1">
                                                            {{ Str::of($post->title)->words(5, '...') }}</h5>
                                                    </a>
                                                    <p class="card-text text-danger m-0"> <i
                                                            class="bi bi-coin text-color"></i>
                                                        {{ number_format($post->rent) }} đ/tháng</p>
                                                    <p class="card-text"><i class="fa-solid fa-location-dot"></i>
                                                        {{ Str::of($post->ward->ward_name . ', ' . $post->district->district_name)->words(10, '...') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="/post/list?id_ward={{ $post->id_ward }}&id_district={{ $post->id_district }}">
                                <div class="card-footer text-end">
                                    Xem thêm >>
                                </div>
                            </a>
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
                            @foreach ($posts_of_author as $post)
                                <div class="carousel-cell mb-3 mx-2 card" style="width: 18rem;">
                                    <a href="/post/single/{{ $post->id }}"><img width="270px" height="180px"
                                            src="{{ $post->images[0]->url }}"class="card-img-top object-fit-fill"
                                            alt="..."></a>
                                    <div class="card-body">
                                        <a href="/post/single/{{ $post->id }}">
                                            <p class="card-title mb-1 fw-bold text-capitalize fs-5">
                                                {{ Str::of($post->title)->words(5, '...') }}
                                            </p>
                                        </a>
                                        <div class="post-services d-flex justify-content-start">
                                            <p class="mb-0 me-1"><i class="fa-solid fa-ruler"></i> {{ $post->acreage }}m2
                                            </p>
                                            @foreach ($post->services as $service)
                                                <p class="mb-0 mx-1">{!! html_entity_decode($service->icon) !!}{{ $service->services_name }}
                                                </p>
                                            @endforeach
                                        </div>
                                        <p class="mb-0 my-1"><i class="fa-solid fa-location-dot"></i>
                                            {{ Str::of($post->ward->ward_name . ', ' . $post->district->district_name)->words(7, '...') }}
                                        </p>
                                        <p class="mb-0 my-1 text-danger"> <i class="bi bi-coin text-dark"></i>
                                            {{ number_format($post->rent) }} đ/tháng</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
