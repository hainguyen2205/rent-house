@extends('admin.layout')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Quản lý người dùng</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Sửa thông người dùng</h6>
                <a class="btn btn-sm btn-danger" href="/admin/user/list">Hủy</a>
            </div>
        </div>
        <div class="card-body d-flex justify-content-center">
            <div class="w-100">
                <form action="/admin/user/update" method="POST">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="avatar-show col-12 mb-2 text-center">
                            <img id="avatar-preview" width="100px" height="100px"
                                src="{{ $user->avatar_url }}" class="rounded-circle object-fit-cover"
                                alt="">
                            <input id="avatar-url-input" name="avatar_url" type="hidden" value="{{ $user->avatar_url }}">
                            <div data-mdb-button-init data-mdb-ripple-init class="mt-2">
                                <label id="label-image" class="form-label m-0 object-fill-cover" for="avatarInput"><i
                                        class="bi bi-pencil-square"></i> Thay
                                    đổi</label>
                                <input type="file" class="form-control is-invalid d-none" accept="image/*"
                                    id="avatarInput" />
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Tên đầy đủ</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Giới tính</label>
                            <select name="gender_id" class="form-select" id="">
                                <option value="">Giới tính</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}"
                                        {{ $gender->id == $user->gender_id ? 'selected' : '' }}>{{ $gender->gender }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">{{ $errors->first('gender_id') }}</div>
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" name="phone" value="{{ $user->phone }}">
                            <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{ $user->date_of_birth }}">
                            <div class="invalid-feedback">{{ $errors->first('date_of_birth') }}</div>
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                            <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Phân quyền</label>
                            <select name="role" class="form-select">
                                <option value="">Chọn quyền</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $role->id == $user->role ? 'selected' : '' }}>
                                        {{ $role->role_name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">{{ $errors->first('role') }}</div>
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Số dư</label>
                            <input type="number" class="form-control" name="account_balance" value="{{ $user->account_balance }}">
                            <div class="invalid-feedback">{{ $errors->first('account_balance') }}</div>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" name="password">
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        </div>
                        <div class="col-12 mb-2 mt-3 text-center">
                            <button class="btn btn-primary" type="submit">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
