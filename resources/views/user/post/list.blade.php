@extends('user.layout_profile')
@section('right_content')
    <div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-center mb-2">
                        <i class="d-block fs-1 text-color fa-solid fa-trash-can"></i>
                    </div>
                    <h5 class="text-center mb-2 text-color">Bạn có chắc chắn muốn xóa bài đăng này?</h5>
                    <div class="mb-2 d-flex justify-content-center">
                        <button type="button" class="btn btn-light mx-2 border" data-bs-dismiss="modal">Quay lại</button>
                        <a id="confirmBtn" href="" class="btn btn-danger mx-2">Xóa tin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3 class="text-center text-color-primary fw-bold mb-3 border-bottom pb-3"> Danh sách bài {{ $title_status }} </h3>
    @if (count($posts) == 0)
        <div class="p-3 text-center mb-8">
            <img class="mb-3" width="75px" src="/templates/front/images/man.png" alt="" srcset="">
            <p class="m-0">Không có bài đăng nào phù hợp!</p>
        </div>
    @endif
    @foreach ($posts as $post)
        <div class="d-flex justify-content-center">
            <div style="width: 80%">
                <div class="post-item border rounded shadow mb-3 w-100">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="img-post position-relative">
                                <img src="{{ $post->images[0]->url }}" class="rounded-start object-fit-cover w-100 h-100"
                                    alt="...">
                                <a href="/post/single/{{ $post->id }}"
                                    class="btn btn-primary position-absolute top-50 start-50 translate-middle"><i
                                        class="bi bi-eye"></i> Xem</a>
                            </div>
                            {{-- <a href="/post/single/{{ $post->id }}" class="text-color">
                                <img src="{{ $post->images[0]->url }}" class="rounded-start object-fit-cover w-100 h-100"
                                    alt="...">
                            </a> --}}
                        </div>
                        <div class="col-md-8 col-sm-12 h-100 position-relative">
                            <div class="position-absolute top-0 end-0 mt-2 me-4">
                                <a href="/post/edit/{{ $post->id }}" class="btn btn-sm btn-primary">Sửa</a>
                                <button class="btn btn-sm btn-danger" onclick="showConfirmForm('{{ $post->id }}')"
                                    data-bs-toggle="modal" data-bs-target="#confirmModal">Xóa</button>
                            </div>
                            <div class="p-2 row">
                                <a href="/post/single/{{ $post->id }}" class="text-color mt-md-3 mt-sm-1 mb-1 col-12">
                                    <h5 class="card-tile m-0">
                                        {{ Str::of($post->title)->words(7, '...') }}</h5>
                                </a>
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

            </div>

        </div>
    @endforeach
    <div class="d-flex justify-content-end mt-3 me-5">
        {{ $posts->links() }}
    </div>
@endsection
