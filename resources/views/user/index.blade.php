@extends('user.layout_profile')
@section('right_content')
    <div class="px-5">
        <div class="list-group list-group-flush">
            <div class="list-group-item">
                <div class="row">
                    <p class="col-md-2 col-sm-6 m-0 fw-bold">Họ tên</p>
                    <p class="col-md-10 col-sm-6 m-0">{{ Auth::user()->name }}</p>
                </div>
            </div>
            <div class="list-group-item">
                <div class="row">
                    <p class="col-md-2 col-sm-6 m-0 fw-bold">Giới tính</p>
                    <p class="col-md-10 col-sm-6 m-0">
                        @if (Auth::user()->gender_id && Auth::user()->genders)
                            {{ Auth::user()->genders->gender }}                            
                        @endif
                    </p>
                </div>
            </div>
            <div class="list-group-item">
                <div class="row">
                    <p class="col-md-2 col-sm-6 m-0 fw-bold">Ngày sinh</p>
                    <p class="col-md-10 col-sm-6 m-0">{{ Auth::user()->date_of_birth }}</p>
                </div>
            </div>
            <div class="list-group-item">
                <div class="row">
                    <p class="col-md-2 col-sm-6 m-0 fw-bold">Email</p>
                    <p class="col-md-10 col-sm-6 m-0">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <div class="list-group-item">
                <div class="row">
                    <p class="col-md-2 col-sm-6 m-0 fw-bold">Số điện thoại</p>
                    <p class="col-md-10 col-sm-6 m-0">{{ Auth::user()->phone }}</p>
                </div>
            </div>
            <div class="list-group-item">
                <div class="row">
                    <p class="col-md-2 col-sm-6 m-0 fw-bold">Địa chỉ</p>
                    <p class="col-md-10 col-sm-6 m-0">{{ Auth::user()->address }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
