@extends('emails.layout_mail')
@section('content')
    <p>Bài viết của bạn với tiêu đề <span style="font-weight: bold">"{{ $post->title }}"</span> đã được duyệt thành công.</p>
    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Bạn có thể xem bài viết vừa đăng của mình thông qua chức năng "Quản lý tin cá nhân" tại giao diện trang chủ</p>
    <p>Bạn có thể xem qua các câu hỏi thường gặp tại website của chúng tôi hoặc liên hệ trực tiếp qua số điện thoại hỗ trợ.</p>
@endsection