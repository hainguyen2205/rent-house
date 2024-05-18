@extends('layout')
@section('content')
    <div class="main-content pb-4">
        <div class="container pt-4">
            <div class="row px-md-5 px-sm-0 mx-2">
                <div class="col-md-8 col-sm-12">
                    <div class="w-100 images-carousel shadow">
                        @foreach ($post->images as $image)
                            <div class="images-carousel-cell d-flex justify-content-center ">
                                <img class="w-100 h-100 rounded" src="{{ $image->url }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="bg-light rounded shadow mt-5">
                        <div class="py-4 px-5">
                            <h4 class="fw-bold fs-3 mb-3 text-color-primary text-center">{{ $post->title }}</h4>
                            <div class="post-info">
                                <div class="row mb-2 text-success pt-2">
                                    <p class="col-4 text-start fs-6 mb-0"><i class="bi bi-clock"></i>
                                        {{ $post->created_at }}</p>
                                    <p class="col-4 text-center fs-6 mb-0"><i class="bi bi-eye"></i> {{ $post->views }}
                                        Lượt xem</p>
                                    <p class="col-4 text-center fs-6 mb-0"><i class="bi bi-person-heart"></i>
                                        0 Quan tâm</p>
                                </div>
                                <div class="row mb-2 fw-bold text-color border-top pt-2">
                                    <p class="mb-0 col-3"><i class="fa-solid fa-ruler"></i> Diện tích:
                                        {{ $post->acreage }}m2</p>
                                    @foreach ($post->services as $service)
                                        <p class="mb-0 col-3">{!! html_entity_decode($service->icon) !!} {{ $service->services_name }} </p>
                                    @endforeach
                                </div>
                                <div class="row mb-2 text-danger">
                                    <p class="mb-0 col-4 fs-6 fw-bold"><i class="text-dark fa-solid fa-money-bill"></i>
                                        Phòng: {{ number_format($post->rent) }} đ/tháng</p>
                                    <p class="mb-0 col-4 fs-6 fw-bold"><i class="text-dark fa-solid fa-faucet"></i>
                                        Nước: {{ number_format($post->water_price) }} đ/khối</p>
                                    <p class="mb-0 col-4 fs-6 fw-bold"><i
                                            class="text-dark fa-solid fa-plug-circle-bolt"></i>
                                        Điện: {{ number_format($post->electric_price) }} đ/số</p>
                                </div>
                                <div class="py-2 border-top">
                                    <p class="fw-bold text-color-primary mb-1 fs-5">Thông tin mô tả:</p>
                                    {{-- {!! $post->description !!} --}}
                                    <p class="card-text white-space-pre">{{ $post->description }}</p>
                                </div>
                                <div class="border-top pt-2">
                                    <p class="mb-2 text-color-primary fw-bold fs-5"><i
                                            class="fa-solid fa-location-dot me-1"></i> Địa
                                        chỉ: <span class="fs-6 text-color">{{ $post->ward->ward_name }},
                                            {{ $post->district->district_name }}, Tỉnh Thái Nguyên.</span>
                                    </p>
                                    <iframe class="w-100" height="250px"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118726.8900234756!2d105.721087550852!3d21.57751697621483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313526e41a2f48ff%3A0x9af085049fb0466f!2zVHAuIFRow6FpIE5ndXnDqm4sIFRow6FpIE5ndXnDqm4sIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1715786824727!5m2!1svi!2s"
                                        style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="bg-light rounded shadow mt-3 d-none">
                        <div class="py-4 px-5">
                            <p class="border-bottom fw-bold text-color-primary mb-0 pb-2">Nhận được 3 lượt đánh giá</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex ">
                                    <img class="cicle-border" width="45px" height="45px"
                                        src="\templates\admin\images\undraw_profile_1.svg" alt="">
                                    <div class="ms-3 w-100">
                                        <div class="avt-user d-flex justify-content-between">
                                            <p class="card-title fw-bold mb-0">Nguyễn Thị Bưởi</p>
                                            <small class="text-end">12 giờ trước</small>
                                        </div>
                                        <p class=" card-text">Hãy thuê ngay bạn nhé.</p>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex ">
                                    <img class="cicle-border" width="45px" height="45px"
                                        src="\templates\admin\images\undraw_profile_2.svg" alt="">
                                    <div class="ms-3 w-100">
                                        <div class="avt-user d-flex justify-content-between">
                                            <p class="card-title fw-bold mb-0">Nguyễn Văn Quang</p>
                                            <small class="text-end">12 giờ trước</small>
                                        </div>
                                        <p class=" card-text">Phòng sạch sẽ và tiện nghi đầy đủ. Chủ nhà thân thiện và hỗ
                                            trợ nhiệt tình. Tôi rất hài lòng với trải nghiệm ở đây!</p>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex ">
                                    <img class="cicle-border" width="45px" height="45px"
                                        src="\templates\admin\images\undraw_profile_3.svg" alt="">
                                    <div class="ms-3 w-100">
                                        <div class="avt-user d-flex justify-content-between">
                                            <p class="card-title fw-bold mb-0">Hoàng Thị Mai</p>
                                            <small class="text-end text">12 giờ trước</small>
                                        </div>
                                        <p class=" card-text">Phòng có vẻ không được bảo quản kỹ lưỡng. Tiếng ồn từ môi
                                            trường xung quanh là vấn đề. Không gian này cần được cải thiện để tạo ra một môi
                                            trường sống tốt hơn.</p>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex ">
                                    <img class="cicle-border" width="45px" height="45px"
                                        src="{{ Auth::user()->avatar_url }}" alt="">
                                    <div class="ms-3 w-100">
                                        <div class="form-floating mb-2">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" rows="2"></textarea>
                                            <label for="floatingTextarea2">Bình luận</label>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-sm btn-primary shadow-sm">
                                                <i class="bi bi-send-fill"></i> Bình luận
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-xs-none d-md-block">
                    <div class="w-100">
                        @if (Auth::user()->id == $post->author->id)
                            <div class="rounded py-2 bg-light shadow">
                                <div class="px-2">
                                    <p class="fw-bold text-color-primary mx-2 mb-0 border-bottom pb-2">
                                        Những người quan tâm
                                    </p>
                                    <ul class="list-group list-group-flush">
                                        @if (count($user_interested_list) > 0)
                                            @foreach ($user_interested_list as $item)
                                                <li class="list-group-item">
                                                    <div class="d-flex">
                                                        <img width="40px" height="40px"
                                                            class="object-fit-cover rounded rounded-circle"
                                                            src="{{ $item->user->avatar_url }}" alt="">
                                                        <div class="ms-3">
                                                            <p class="m-0 fw-bold">{{ $item->user->name }} -
                                                                {{ $item->user->phone }}</p>
                                                            <small class="m-0">{{ $item->created_at }}</small>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <div class="text-center py-2">
                                                <img width="40px" src="/templates/front/images/man.png" alt=""
                                                    srcset="">
                                                <small class="m-0 text-color">Không có người quan tâm!</small>
                                            </div>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="rounded py-4 bg-light shadow">
                                <div class="card-body d-flex justify-content-center ">
                                    <div class="w-75">
                                        <div class="d-flex justify-content-center">
                                            <img class="cicle-border object-fit-cover" width="80px"
                                                height="80px"src="{{ $post->author->avatar_url }}" alt="">
                                        </div>
                                        <p class="text-center fw-bold fs-5 my-2">{{ $post->author->name }}</p>
                                        @if ($was_interested != 0)
                                            <div class="rounded bg-info text-white text-center fw-bold py-2"><i
                                                    class="bi bi-telephone-fill"></i> {{ $post->author->phone }}</div>
                                            <button disabled class="btn btn-danger rounded w-100 mt-2 fw-bold"><i
                                                    class="bi bi-heart-fill"></i> Đã quan tâm</button>
                                        @else
                                            <div class="rounded bg-info text-white text-center fw-bold py-2"><i
                                                    class="bi bi-telephone-fill"></i>
                                                {{ Str::of($post->author->phone)->limit(4, '******') }} </div>
                                            <a href="/post/interest/{{ $post->id }}"
                                                class="btn btn-danger rounded w-100 mt-2 fw-bold"><i
                                                    class="bi bi-heart-fill"></i> Quan tâm để hiện số</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="rounded py-2 mt-3 bg-light shadow">
                            <div class="px-2">
                                <p class="fw-bold text-color-primary mx-2 mb-0 pb-2">Tin cùng khu vực</p>
                                @if (count($related_address_posts) < 1)
                                    <div class="text-center py-2">
                                        <img width="40px" src="/templates/front/images/man.png" alt=""
                                            srcset="">
                                        <p class="m-0 text-color">Không có bài đăng phù hợp!</p>
                                    </div>
                                @else
                                    <ul class="list-group list-group-flush">
                                        @foreach ($related_address_posts as $post)
                                            <li class="list-group-item p-2">
                                                <div class="posts">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="img-post position-relative w-100">
                                                                <img height="110px" src="{{ $post->images[0]->url }}"
                                                                    class="w-100 rounded-start" alt="...">
                                                                <a href="/post/single/{{ $post->id }}"
                                                                    class="btn btn-primary position-absolute top-50 start-50 translate-middle"><i
                                                                        class="bi bi-eye"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 details-post">
                                                            <a href="/post/single/{{ $post->id }}">
                                                                <p class="fw-bold fs-5 mb-0">
                                                                    {{ Str::of($post->title)->words(5, '...') }}</p>
                                                            </a>
                                                            <p class="card-text text-danger m-0"> <i
                                                                    class="bi bi-coin text-color"></i>
                                                                {{ number_format($post->rent) }} đ/tháng</p>
                                                            <h6><i class="fa-solid fa-location-dot"></i>
                                                                {{ $post->ward->ward_name }},
                                                                {{ $post->district->district_name }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row px-5 mx-3 mt-3">
                <div class="bg-light mx-2 p-3 rounded shadow">
                    <p class="fw-bold text-color-primary fs-6 ms-3 mb-0 pb-2">Tin cùng người đăng</p>
                    @if (count($posts_of_author) < 1)
                        <div class="p-3 text-center mb-8">
                            <img class="mb-3" width="75px" src="/templates/front/images/man.png" alt=""
                                srcset="">
                            <p class="m-0">Không có bài đăng nào phù hợp!</p>
                        </div>
                    @endif
                    @if (count($posts_of_author) > 3)
                        <div class="popular-posts-carousel mb-4 mt-2">
                            @foreach ($posts_of_author as $post)
                                <div class="popular-posts-cell w-100 mx-2 border rounded pb-2">
                                    <div class="img-post position-relative mb-2">
                                        <img class="object-fit-cover w-100 rounded-top h-100"
                                            src="{{ $post->images[0]->url }}" alt="...">
                                        <a href="/post/single/{{ $post->id }}"
                                            class="btn btn-primary position-absolute top-50 start-50 translate-middle"><i
                                                class="bi bi-eye"></i> Xem chi
                                            tiết</a>
                                    </div>
                                    <div class="details-post px-3 mx-2">
                                        <a class="hover-text" href="/post/single/{{ $post->id }}">
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
                            @endforeach
                        </div>
                    @else
                        <div class="row mt-4">
                            @foreach ($posts_of_author as $post)
                                <div class="col-md-3 col-sm-6 mb-3 px-2">
                                    <div class="post-box-item w-100 border rounded pb-2">
                                        <div class="img-post position-relative">
                                            <img class="object-fit-cover rounded-top w-100 h-100"
                                                src="{{ $post->images[0]->url }}" alt="...">
                                            <a href="/post/single/{{ $post->id }}"
                                                class="btn btn-primary position-absolute top-50 start-50 translate-middle"><i
                                                    class="bi bi-eye"></i> Xem chi
                                                tiết</a>
                                        </div>
                                        <div class="details-post px-3 mt-2 mx-2">
                                            <p class="fs-4 fw-bold mb-1 text-center">
                                                {{ $post->title }}
                                            </p>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
