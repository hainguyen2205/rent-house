@extends('admin.layout')
@section('content')
    <div class="modal fade show" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="text-white fw-bold m-0" id="confirmModalLabel">Bạn có chắc chắn?</h5>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i style="font-size: 60px" class="bi bi-trash-fill text-danger"></i>
                        <div class="mt-2">
                            <h4 class="mb-1 fw-bold">Xác nhận xóa tài khoản này?</h4>
                            <p class="mb-0">Hành động này không thể hoàn tác</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                    <form action="/admin/user/delete" method="POST">
                        @csrf
                        <input id="user-id" type="hidden" name="id" value="">
                        <button type="submit" class="btn btn-danger">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade show" id="confirmUserModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header background-primary">
                    <h5 class="text-white fw-bold m-0" id="confirmModalLabel">Bạn có chắc chắn?</h5>
                </div>
                <form id="user-form" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="text-center">
                            <i style="font-size: 60px" class="fa-solid fa-question text-color-primary"></i>
                            <div class="mt-1" id="form-body">
                                <h4 id="title-action" class="mb-1 fw-bold"></h4>
                                <input id="user-id-2" type="hidden" name="id">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h1 class="h3 mb-4 text-gray-800">Quản lý người dùng</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Danh sách người dùng</h6>
                <a class="btn btn-sm btn-primary" href = "/admin/user/create"><i class="fa-solid fa-user-plus"></i> Thêm
                    mới</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="Table">
                    <thead>
                        <tr>
                            <th class="text-nowrap" data-orderable="false">Avatar</th>
                            <th class="text-nowrap">Họ tên</th>
                            <th class="text-nowrap">Số điện thoại</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Ngày sinh</th>
                            <th class="text-nowrap">Địa chỉ</th>
                            <th class="text-nowrap">Số dư</th>
                            <th class="text-nowrap">Phân quyền</th>
                            <th class="text-nowrap">Trạng thái</th>
                            <th class="text-nowrap" data-orderable="false">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="align-middle">
                                    <img class="rounded-circle object-fit-cover" width="40px" height="40px"
                                        src="{{ $user->avatar_url }}" alt="">
                                </td>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ $user->phone }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">{{ $user->date_of_birth }}</td>
                                <td class="align-middle">{{ $user->address }}</td>
                                <td class="align-middle fs-6 fw-bold text-warning">
                                    {{ number_format($user->account_balance) }}</td>
                                <td class="align-middle">
                                    <small
                                        class="p-1 text-center rounded text-white m-0 {{ $user->getRole->color }}">{{ $user->getRole->role_name }}</small>
                                </td>
                                <td class="align-middle">
                                    <small
                                        class="p-1 text-center rounded text-white m-0 {{ $user->status->color }}">{{ $user->status->status_name }}</small>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex">
                                        <a href="/admin/user/update/{{ $user->id }}" class="btn btn-sm btn-info"><i
                                                class="bi bi-pencil-square"></i></a>
                                       
                                        @if ($user->status_of_account == 1)
                                            <div title="Khóa tài khoản"
                                                onclick="showConfirmUser('{{ $user->id }}', 'block')"
                                                class="btn btn-sm btn-warning mx-1" data-toggle="modal"
                                                data-target="#confirmUserModal">
                                                <i class="fa-solid fa-lock"></i>
                                            </div>
                                        @else
                                            <div onclick="showConfirmUser('{{ $user->id }}', 'unblock')"
                                                data-toggle="modal" data-target="#confirmUserModal" title="Mở khóa"
                                                class="btn btn-sm btn-primary mx-1"><i class="fa-solid fa-lock-open"></i></div>
                                        @endif
                                        <div onclick="showDeleteForm('{{ $user->id }}')"
                                            class="btn btn-sm btn-danger" title="Xóa" data-toggle="modal"
                                            data-target="#confirmDeleteModal"><i class="bi bi-trash"></i></div>
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
