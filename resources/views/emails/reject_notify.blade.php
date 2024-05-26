@extends('emails.layout_mail')
@section('content')
    <p>Bài viết của bạn với tiêu đề <span style="font-weight: bold">"{{ $post->title }}"</span> đã bị từ chối do vi phạm về quy định đăng bài của chúng tôi.</p>
    <p>Lý do là: <span style="font-weight: bold">{{ $post->reject_reason->reason }}</span></p>
    <p>Phí đăng tin sẽ được hoàn lại trong thời gian sớm nhất</p>
    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
    <p>Bạn có thể xem qua các câu hỏi thường gặp tại website của chúng tôi hoặc liên hệ trực tiếp qua số điện thoại hỗ trợ.</p>
@endsection