@extends('layout')
@section('content')
    <div class="container position-relative">
        <div class="row py-5">
            <div class="col-md-3 col-sm-12 mb-2">
                <div class="card d-flex flex-column position-relative py-4 border-left-primary shadow">
                    <div class="card-body">
                        <div>
                            <a href="/profile/edit" class="position-absolute top-0 end-0 mt-2 me-4"><i
                                    class="bi bi-pencil-square"></i>
                                Sửa</a>
                            <div class="text-center">
                                @if (Auth::user()->avatar_url == null)
                                    <img width="80px" height="80px" src="/templates/front/images/undraw_profile.svg"
                                        class="cicle-border object-fit-cover" alt="">
                                @else
                                    <img width="80px" height="80px" src="{{ Auth::user()->avatar_url }}"
                                        class="cicle-border object-fit-cover" alt="">
                                @endif
                                <p class="my-1 fw-bold fs-5">{{ Auth::user()->name }}</p>
                                <p class="my-1"><i class="bi bi-telephone"></i> {{ Auth::user()->phone }}</p>
                                <p class="my-1"><i class="fa-solid fa-coins"></i> Số dư:
                                    {{ number_format(Auth::user()->account_balance) }}đ
                                </p>
                                <a href="/profile/topup" class="btn btn-outline-primary"><i class="bi bi-cash-coin"></i> Nạp tiền +</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="card d-flex h-100 flex-column border-left-primary shadow py-2">
                    <div class="card-body">
                        @yield('right_content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
