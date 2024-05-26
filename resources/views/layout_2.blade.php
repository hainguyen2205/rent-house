@extends('layout')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-8">
                <div class="card h-100 border border-1 shadow">
                    <div class="card-body">
                        @yield('left-content')
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card border border-1 shadow">
                    <div class="card-body">
                        <p class="fw-bold text-color-primary mb-2">Tin đăng mới</p>
                        <ul class="list-group list-group-flush">
                            @foreach ($posts as $post)
                                <li class="list-group-item py-2 px-0">
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
                                                <p class="card-text text-danger m-0"> <i class="bi bi-coin text-color"></i>
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
                    </div>
                </div>

                <div class="card mt-3 border border-1 shadow">
                    <div class="card-body">
                        <p class="fw-bold text-color-primary mb-2">Có thể bạn quan tâm</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item py-2 px-0">
                                <a href="/news/scam-warnings">Cẩn thận các kiểu lừa đảo khi thuê phòng trọ</a>
                            </li>
                            <li class="list-group-item py-2 px-0">
                                <a href="/news/share-tips">Kinh nghiệm thuê phòng sinh viên</a>
                            </li>
                            <li class="list-group-item py-2 px-0">
                                <a href="/news/tips-for-posting">Mẹo đăng tin nhà ở cho thuê hiệu quả</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
