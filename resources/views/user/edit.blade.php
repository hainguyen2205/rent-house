@extends('user.layout_profile')
@section('right_content')
    <h3 class="fw-bold card-title mb-4 text-center">Thay đổi thông tin cá nhân</h3>
    <div class="px-md-5">
        <form action="/profile/update" method="POST">
            @csrf
            <div class="avatar-show position-relative mb-3 text-center">
                @if (Auth::user()->avatar_url == null)
                    <img id="avatar-preview" width="120px" height="120px" src="/templates/front/images/undraw_profile.svg"
                        class="cicle-border object-fit-cover" alt="">
                @else
                    <img id="avatar-preview" width="120px" height="120px" src="{{ Auth::user()->avatar_url }}"
                        class="cicle-border object-fit-cover" alt="">
                @endif

                <input id="avatar-url-input" name="avatar_url" type="hidden" value="{{ Auth::user()->avatar_url }}">
                <div data-mdb-button-init data-mdb-ripple-init class="mt-2">
                    <label id="label-image" class="form-label m-0 object-fill-cover" for="avatarInput"><i
                            class="bi bi-pencil-square"></i> Thay
                        đổi</label>
                    <input type="file" class="form-control is-invalid d-none" accept="image/*" id="avatarInput" />
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label class="form-label" for="nameInput"><i class="bi bi-person"></i> Tên đầy
                        đủ</label>
                    <input type="text" id="nameInput" name="name" class="form-control"
                        value="{{ Auth::user()->name }}">
                    <div class="invalid-feedback" id="nameFeedback">{{ $errors->first('name') }}</div>
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label" for="gender-select"><i class="bi bi-gender-ambiguous"></i> Giới tính</label>
                    <select class="form-select" name="gender_id" id="gender-select">
                        <option value="">Giới tính</option>
                        @foreach ($genders as $gender)
                            <option value="{{ $gender->id }}"
                                {{ Auth::user()->gender_id == $gender->id ? 'selected' : '' }}>
                                {{ $gender->gender }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label" for="phoneInput"><i class="bi bi-telephone"></i> Số điện
                        thoại</label>
                    <input type="tel" id="phoneInput" disabled class="form-control" required
                        value="{{ Auth::user()->phone }}">
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label" for="emailInput"><i class="bi bi-envelope-at"></i> Địa chỉ email <small class="text-danger">(nhận thông báo)</small></label>
                    <input type="email" id="emailInput" name="email" class="form-control" required
                        value="{{ Auth::user()->email }}">
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label" for="dateInput"><i class="bi bi-calendar-event"></i> Ngày
                        sinh</label>
                    <input type="date" id="dateInput" name="date_of_birth" class="form-control"placeholder=""
                        value="{{ Auth::user()->date_of_birth }}">
                    <div class="invalid-feedback" id="nameFeedback">{{ $errors->first('date_of_birth') }}</div>
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label" for="addressInput"><i class="bi bi-geo-alt-fill"></i> Địa
                        chỉ</label>
                    <input type="tel" id="addressInput" name="address" class="form-control"
                        value="{{ Auth::user()->address }}">
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label" for="passwordInput"><i class="bi bi-lock"></i> Mật khẩu mới</label>
                    <input type="password" id="passwordInput" name="password" class="form-control">
                    <div class="invalid-feedback" id="passwordFeedback">{{ $errors->first('password') }}</div>
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label" for="repasswordInput"><i class="bi bi-lock"></i> Nhập lại mật khẩu
                        mới</label>
                    <input type="password" id="repasswordInput" name="repassword" class="form-control">
                    <div class="invalid-feedback" id="repasswordFeedback">{{ $errors->first('repassword') }}</div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Cập
                    nhật</button>
            </div>
        </form>
    </div>
@endsection
