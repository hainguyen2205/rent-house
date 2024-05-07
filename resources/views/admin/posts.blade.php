@extends('admin.layout')
@section('content')
    <div class="flex justify-content-center">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong><i class="bi bi-check-circle"></i> Success!</strong> {{ Session::get('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                <strong><i class="bi bi-exclamation-circle"></i> Warning!</strong> Kiểm tra lại các thông tin.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong><i class="bi bi-exclamation-circle"></i> Warning!</strong> {{ Session::get('error') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Modal Confirm -->
    <div class="modal fade" id="cofirmStaticModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header background-primary">
                    <h5 class="text-white fw-bold m-0" id="exampleModalLabel">Xác nhận thao tác!</h5>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i style="font-size: 80px" class="fa-solid fa-question text-color-primary"></i>
                    </div>
                    <p id="text-confirm" class="m-0 mt-3 text-center"></p>
                    <div id="reject-form" class="my-2 d-none">
                        <label for="reasonInput" class="form-label">Lý do</label>
                        <input type="text" class="form-control" id="reasonInput">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy </button>
                    <a href="" id="btn-confirm" class="btn btn-primary">Xác nhận</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="postModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Thông tin bài đăng</h5>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>

    <h1 class="h3 mb-4 text-gray-800">Quản lý tin đăng</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Danh sách người dùng</h6>
                <button onclick="showCreateForm()" data-toggle="modal" data-target="#userModal"
                    class="btn btn-sm btn-primary"><i class="fa-solid fa-user-plus"></i> Thêm mới</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="custom-table table table-sm table-bordered table-hover" id="userTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="text-color">Ảnh</th>
                            <th>Tác giả</th>
                            <th>Địa chỉ</th>
                            <th>Diện tích</th>
                            <th>Giá phòng</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="align-middle">
                                    <img class="object-fit-cover" width="40px" height="40px"
                                        src="{{ $post->images[0]->url }}" alt="">
                                </td>
                                <td class="align-middle">{{ $post->author->name }}</td>
                                <td class="align-middle">{{ $post->ward->ward_name }},
                                    {{ $post->district->district_name }}</td>
                                <td class="align-middle">{{ $post->acreage }}</td>
                                <td class="align-middle fs-6 fw-bold text-warning">
                                    {{ number_format($post->rent) }}</td>
                                <td class="align-middle">
                                    <small
                                        class="p-1 text-center rounded text-white m-0 {{ $post->getStatus->color }}">{{ $post->getStatus->status_name }}</small>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center">
                                        <div data-toggle="modal" data-target="#userModal" class="btn btn-sm btn-info"
                                            title="Sửa thông tin"><i class="bi bi-pencil-square"></i></div>

                                        <div class="btn mx-2 btn-sm btn-danger" title="Xóa" data-toggle="modal"
                                            data-target="#confirmModal"><i class="bi bi-trash"></i></div>

                                        <div class="dropdown">
                                            <div class="btn btn-sm btn-secondary" data-toggle="dropdown"><i
                                                    class="bi bi-three-dots-vertical"></i></div>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <div onclick="viewPost('{{ $post->id }}')" class="dropdown-item"
                                                    data-bs-toggle="modal" data-bs-target="#postModal"><i
                                                        class="fa-solid fa-eye"></i>
                                                    Xem
                                                    chi tiết </div>
                                                @if ($post->id_status == 1)
                                                    <div class="dropdown-item" data-bs-toggle="modal" data-bs-target="#cofirmStaticModal" onclick="showConfirmPost('{{ $post->id}}', 'approve' )"><i class="fa-solid fa-square-check"></i>
                                                        Duyệt bài</div>
                                                    <div class="dropdown-item" data-bs-toggle="modal" data-bs-target="#cofirmStaticModal" onclick="showConfirmPost('{{ $post->id}}', 'reject' )"><i class="fa-solid fa-square-xmark"></i>
                                                        Từ chối</div>
                                                @endif
                                                @if ($post->id_status == 2)
                                                    <div class="dropdown-item" data-bs-toggle="modal" data-bs-target="#cofirmStaticModal" onclick="showConfirmPost('{{ $post->id}}', 'reject' )"><i class="fa-solid fa-square-xmark"></i>
                                                        Từ chối</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
@endsection
