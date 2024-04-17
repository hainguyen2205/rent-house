@extends('user.layout_profile')
@section('right_content')
    <h3 class="fw-bold card-title mb-4 text-center">Thay đổi thông tin cá nhân</h3>
    <form action="#" method="GET">
        @csrf
        <div class="avatar-show position-relative mb-3 text-center">
            <img id="avatar-preview" width="120px" height="120px" src="{{ Auth::user()->avatar_url }}" class="cicle-border object-fit-cover"
                alt="">
            <div data-mdb-button-init data-mdb-ripple-init class="mt-2">
                <label id="label-image" class="form-label m-0 object-fill-cover" for="avatarInput"><i class="bi bi-pencil-square"></i> Thay
                    đổi</label>
                <input type="file" name="avatar_url" class="form-control is-invalid d-none" accept="image/*"
                    id="avatarInput" />
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nameInput"><i class="bi bi-person"></i> Tên đầy
                đủ</label>
            <input type="text" id="nameInput" name="name" class="form-control" required
                value="{{ Auth::user()->name }}">
            <div class="invalid-feedback" id="nameFeedback">Tên cá nhân không hợp lệ!</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="dateInput"><i class="bi bi-calendar-event"></i> Ngày
                sinh</label>
            <input type="date" id="dateInput" name="date_of_birth" class="form-control"placeholder="" required
                value="{{ Auth::user()->date_of_birth }}">
            <div class="invalid-feedback" id="nameFeedback">Ngày sinh không hợp lệ!</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="phoneInput"><i class="bi bi-telephone"></i> Số điện
                thoại</label>
            <input type="tel" id="phoneInput" disabled class="form-control" required value="{{ Auth::user()->phone }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="addressInput"><i class="bi bi-geo-alt-fill"></i> Địa
                chỉ</label>
            <input type="tel" id="addressInput" name="address" class="form-control" value="{{ Auth::user()->address }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="passwordInput"><i class="bi bi-lock"></i> Mật khẩu
                mới</label>
            <input type="password" id="passwordInput" name="password" class="form-control">
            <div class="invalid-feedback" id="passwordFeedback">
                Mật khẩu không hợp lệ!
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="repasswordInput"><i class="bi bi-lock"></i> Nhập lại
                mật
                khẩu</label>
            <input type="password" id="repasswordInput" name="repassword" class="form-control">
            <div class="invalid-feedback" id="repasswordFeedback">
                Mật khẩu không hợp lệ!
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Cập
                nhật</button>
        </div>
    </form>
@endsection
