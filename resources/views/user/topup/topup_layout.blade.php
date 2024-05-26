@extends('user.layout_profile')
@section('right_content')
    <div class="mb-3 border-bottom pb-2">
        <h3 class="text-color-primary fw-bold mb-0"> Nạp tiền vào tài khoản </h3>
        <p class="mb-0 text-color">Bạn có thể chọn các phương thức thanh toán khả dựng bên dưới</p>
    </div>
    <div class="row">
        <div class="col-3 border-end">
            <div class="list-group">
                <div class="list-group-item background-primary text-white">
                    Phương thức thanh toán
                </div>
                <a href="/profile/topup/vnpay" class="list-group-item" aria-current="true">
                    <img width="25px" class="object-fit-cover me-2" src="/templates/front/images/vnpay-logo.png" alt="">
                    <span class="fw-bold">VnPay</span>
                </a>
                <a href="/profile/topup/vietqr" class="list-group-item">
                    <img width="25px" class="object-fit-cover me-2" src="/templates/front/images/vietqr-logo.png" alt="">
                    <span class="fw-bold">VietQR</span>
                </a>
            </div>
        </div>
        <div class="col-9">
            @yield('topup_content')
        </div>
    </div>
@endsection
