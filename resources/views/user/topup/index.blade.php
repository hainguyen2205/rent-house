@extends('user.topup.topup_layout')
@section('topup_content')
    @if (Session::has('result'))
        <div class="px-4 mt-4 text-center">
            @if (Session::get('result') == 'success')
                <h3 class="mb-2 fw-bold text-color-primary"> <i class=" fa-regular fa-circle-check fa-bounce"></i> THANH TOÁN
                    THÀNH CÔNG!</h3>
                <p class="text-color mb-0 fst-italic">Cảm ơn bạn đã sử dụng dịch vụ</p>
            @elseif(Session::get('result') == 'cancelled')
                <h3 class="mb-2 fw-bold text-color-primary"> <i class=" fa-regular fa-circle-check fa-bounce"></i> HỦY YÊU CẦU
                    THANH TOÁN THÀNH CÔNG!</h3>
                <p class="text-color mb-0 fst-italic">Cảm ơn bạn đã sử dụng dịch vụ</p>
            @else
                <h3 class="mb-2 fw-bold text-danger"><i class="fa-solid fa-circle-exclamation fa-shake"></i> THANH TOÁN THẤT
                    BẠI!</h3>
                <p class="text-danger mb-0 fst-italic">Vui lòng kiểm tra lại thông thanh toán và thử lại.</p>
                <p class="text-danger mb-0 fst-italic">Hoặc liên hệ với đội ngũ hỗ trợ để được xử lý trong thời gian sớm
                    nhất.</p>
            @endif
        </div>
    @else
        <h4 class="text-center mt-5 mb-0 text-color-primary">Vui lòng chọn phương thức thanh toán</h4>
    @endif
@endsection
