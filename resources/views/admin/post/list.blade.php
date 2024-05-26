@extends('admin.layout')
@section('content')
    <!-- Modal Confirm -->
    <div class="modal fade" id="cofirmStaticModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header background-primary">
                    <h5 class="text-white fw-bold m-0" id="exampleModalLabel">Bạn có chắc chắn!</h5>
                </div>
                <form action="" id="approve-form" method="POST">
                    <input type="hidden" id="id-post" name="id_post">
                    @csrf
                    <div class="modal-body">
                        <div class="text-center">
                            <i style="font-size: 80px" class="fa-solid fa-question text-color-primary"></i>
                        </div>
                        <h4 id="text-confirm" class="m-0 mt-3 text-center fw-bold"></h4>
                        <div id="reject-form" class="my-2 d-none">
                            <label for="reasonInput" class="form-label">Lý do</label>
                            <textarea name="reason" class="form-control" id="reasonInput" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy </button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="postModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header background-primary">
                    <h5 class="modal-title text-white" id="postModalLabel">Thông tin bài đăng</h5>
                </div>
                <div class="modal-body">
                    <div id="images-post">
                    </div>
                    <div class="border-top py-2">
                        <h5 id="post-title" class="mb-2 text-center text-color-primary fw-bold"></h5>
                        <div id="services-post" class="row mb-2">
                        </div>
                        <p id="address-post" class="mb-2 fw-bold text-color fs-6"></p>
                        <div id="cost-post" class="row mb-2 text-danger">
                        </div>
                    </div>
                    <div class="border-top py-2">
                        <p class="fw-bold mb-1">Thông tin mô tả:</p>
                        <p id="description-post" class="white-space-pre"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                </div>
            </div>
        </div>
    </div>

    <h1 class="h3 mb-4 text-gray-800">Quản lý tin đăng</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">
                    @if ($id_status == 0)
                        Danh sách tin bị từ chối
                    @elseif($id_status == 1)
                        Danh sách tin chờ duyệt
                    @else
                        Danh sách tin đã duyệt
                    @endif
                </h6>
                <a href="/admin/post/create" class="btn btn-sm btn-primary"><i class="bi bi-window-plus"></i> Thêm
                    mới</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="Table" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th data-orderable="false">Ảnh</th>
                            <th>Tác giả</th>
                            <th>Địa chỉ</th>
                            <th>Ngày đăng</th>
                            <th>Giá phòng</th>
                            <th>Trạng thái</th>
                            @if ($id_status == 0)
                                <th data-orderable="false">Lý do</th>
                            @endif
                            <th data-orderable="false">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="align-middle">{{ $post->id }}</td>
                                <td class="align-middle">
                                    <img class="object-fit-cover" width="40px" height="40px"
                                        src="{{ $post->images[0]->url }}" alt="">
                                </td>
                                <td class="align-middle"><img class="rounded-circle object-fit-cover me-2" width="30px"
                                        height="30px" src="{{ $post->author->avatar_url }}"
                                        alt="">{{ $post->author->name }}</td>
                                <td class="align-middle">{{ $post->ward->ward_name }},
                                    {{ $post->district->district_name }}</td>
                                <td class="align-middle">{{ $post->created_at }}</td>
                                <td class="align-middle fs-6 fw-bold text-warning">
                                    {{ number_format($post->rent) }}</td>
                                <td class="align-middle">
                                    <small
                                        class="p-1 text-center rounded text-white m-0 {{ $post->getStatus->color }}">{{ $post->getStatus->status_name }}</small>
                                </td>
                                @if ($id_status == 0)
                                    <td class="align-middle">{{ $post->reject_reason->reason }}</td>
                                @endif
                                <td class="align-middle">
                                    <div class="d-flex">
                                        <div onclick="viewPost('{{ $post->id }}')" data-toggle="modal"
                                            data-target="#userModal" data-bs-toggle="modal" data-bs-target="#postModal"
                                            class="btn btn-sm btn-success mx-1" title="Xem thông tin"><i
                                                class="bi bi-eye"></i></i></div>
                                        <a href="/admin/post/edit/{{ $post->id }}" class="btn btn-sm btn-info mx-1"><i
                                            class="bi bi-pencil-square"></i></a>
                                        @if ($post->id_status == 1)
                                            <div class="btn btn-sm btn-warning mx-1" data-bs-toggle="modal"
                                                data-bs-target="#cofirmStaticModal"
                                                onclick="showConfirmPost('{{ $post->id }}', 'approve' )"><i
                                                    class="fa-solid fa-square-check"></i></div>
                                            <div class="btn btn-sm btn-warning mx-1" data-bs-toggle="modal"
                                                data-bs-target="#cofirmStaticModal"
                                                onclick="showConfirmPost('{{ $post->id }}', 'reject' )"><i
                                                    class="fa-solid fa-square-xmark"></i></div>
                                        @endif
                                        @if ($post->id_status == 2)
                                            <div class="btn btn-sm btn-warning mx-1" data-bs-toggle="modal"
                                                data-bs-target="#cofirmStaticModal"
                                                onclick="showConfirmPost('{{ $post->id }}', 'reject' )"><i
                                                    class="fa-solid fa-square-xmark"></i></div>
                                        @endif
                                        @if ($post->id_status == 0)
                                            <div class="btn btn-sm btn-warning mx-1" data-bs-toggle="modal"
                                                data-bs-target="#cofirmStaticModal"
                                                onclick="showConfirmPost('{{ $post->id }}', 'approve' )"><i
                                                    class="fa-solid fa-square-check"></i></div>
                                        @endif
                                        <div onclick="showConfirmPost('{{ $post->id }}', 'delete' )"
                                            class="btn btn-sm btn-danger mx-1" title="Xóa" data-bs-toggle="modal"
                                            data-bs-target="#cofirmStaticModal"><i class="bi bi-trash"></i></div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
