@extends('user.layout_profile')
@section('right_content')
    @if (count($posts) == 0)
        <div class="p-5 text-center mb-8">
            <img width="80px" src="/templates/front/images/emptybox.png" alt="" srcset="">
            <p>Không có bài đăng nào phù hợp</p>
        </div>
    @endif
    @foreach ($posts as $post)
        <a href="/post/single/{{ $post->id }}" class="text-color">
            <div class="post-item border mb-3 w-100">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <img src="{{ $post->images[0]->url }}" class="rounded-start object-fit-cover w-100 h-100"
                            alt="...">
                    </div>
                    <div class="col-md-8 col-sm-12 h-100">
                        <div class="p-2 row">
                            <h5 class="card-tile mt-md-3 mt-sm-1 mb-1 col-12">
                                {{ Str::of($post->title)->words(10, '...') }}</h5>
                            <p class="my-1 col-md-12"><i
                                    class="fa-solid fa-location-dot me-2"></i>{{ $post->ward->ward_name }},
                                {{ $post->district->district_name }}</p>
                            <small class="card-text text-danger my-1 col-md-5 col-sm-12"> <i
                                    class="text-color bi bi-coin"></i>
                                {{ number_format($post->rent) }} đ/tháng</small>
                            <small class="card-text text-danger my-1 col-md-4 col-sm-12"> <i
                                    class="text-color fa-solid fa-faucet"></i>
                                {{ number_format($post->water_price) }} đ/khối</small>
                            <small class="card-text text-danger my-1 col-md-3 col-sm-12"> <i
                                    class="text-color fa-solid fa-plug-circle-bolt"></i>
                                {{ number_format($post->electric_price) }} đ/số</small>
                            <small class="col-12">{{ Str::of($post->description)->words(20, '...') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
@endsection
