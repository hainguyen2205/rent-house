@extends('admin.layout')
@section('content')
    <div class="flex justify-content-center">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong><i class="fa-regular fa-circle-check fa-bounce"></i> Success!</strong> {{ Session::get('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                <strong><i class="fa-regular fa-circle-xmark fa-bounce"></i> Warning!</strong> Kiểm tra lại các thông tin.
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

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header background-primary">
                    <h5 class="text-white fw-bold m-0" id="exampleModalLabel">Xác nhận thao tác!</h5>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i style="font-size: 80px" class="fa-solid fa-question text-color-primary"></i>
                    </div>
                    <p class="m-0 mt-3 text-center">Xác nhận xóa tài khoản này?</p>
                    <p id="userInfo" class="m-0 mt-2 text-center text-info fw-bold"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <a id="btn-confirm" href="#" class="btn btn-primary">Xóa</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade show" id="userModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header background-primary">
                    <h5 id="modal-title" class="text-white fw-bold m-0" id="exampleModalLabel"></h5>
                </div>
                <form id="userForm" action="" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="avatar-show position-relative mb-3 text-center">
                            <img id="avatar-preview" width="100px" height="100px"
                                src="/templates/front/images/undraw_profile.svg" class="rounded-circle object-fit-cover"
                                alt="">
                            <input id="avatar-url-input" name="avatar_url" type="hidden" value="">
                            <div class="mt-2">
                                <label id="label-image" class="form-label m-0 object-fill-cover" for="avatarInput"><i
                                        class="bi bi-pencil-square"></i> Thay
                                    đổi</label>
                                <input type="file" class="form-control is-invalid d-none" accept="image/*"
                                    id="avatarInput" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nameInput"><i class="bi bi-person"></i> Tên đầy
                                đủ</label>
                            <input type="text" id="nameInput" name="name" class="form-control" value="">
                            <div class="invalid-feedback" id="nameFeedback">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label class="form-label" for="phoneInput"><i class="bi bi-telephone"></i> Số điện
                                    thoại</label>
                                <input type="tel" id="phoneInput" name="phone" class="form-control" required
                                    value="">
                                <div class="invalid-feedback" id="phoneFeedback">{{ $errors->first('phone') }}</div>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="dateInput"><i class="bi bi-calendar-event"></i> Ngày
                                    sinh</label>
                                <input type="date" id="dateInput" name="date_of_birth"
                                    class="form-control"placeholder="" value="">
                                <div class="invalid-feedback" id="nameFeedback">{{ $errors->first('date_of_birth') }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="addressInput"><i class="bi bi-geo-alt-fill"></i> Địa
                                chỉ</label>
                            <input type="tel" id="addressInput" name="address" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="passwordInput"><i class="bi bi-lock"></i> Mật khẩu mới</label>
                            <input type="password" id="passwordInput" name="password" class="form-control">
                            <div class="invalid-feedback" id="passwordFeedback">{{ $errors->first('password') }}</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
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
                            <th class="text-color">Avatar</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Ngày sinh</th>
                            <th>Địa chỉ</th>
                            <th>Số dư</th>
                            <th>Phân quyền</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
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
                                    <div class="d-flex justify-content-center">
                                        <div data-toggle="modal" data-target="#userModal" class="btn btn-sm btn-info"
                                            title="Sửa thông tin" onclick="showUpdateForm('{{ $user->id }}')"><i
                                                class="bi bi-pencil-square"></i></div>

                                        <div onclick="showConfirm('{{ $user->id }}', '{{ $user->name }}', 'delete')"
                                            class="btn mx-2 btn-sm btn-danger" title="Xóa" data-toggle="modal"
                                            data-target="#confirmModal"><i class="bi bi-trash"></i></div>

                                        <div class="dropdown">
                                            <div class="btn btn-sm btn-secondary" data-toggle="dropdown"><i
                                                    class="bi bi-three-dots-vertical"></i></div>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i>
                                                    Xem
                                                    thông tin</a>
                                                @if ($user->status_of_account == 1)
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa-solid fa-lock"></i>
                                                        Khóa tài khoản</a>
                                                @else
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa-solid fa-lock-open"></i> Mở khóa</a>
                                                @endif
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-coins"></i>
                                                    Nạp tiền</a>
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
                {{ $users->links() }}
            </div>

        </div>
    </div>
@endsection
