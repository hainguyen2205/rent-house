@extends('emails.layout_mail')
@section('content')
    <p>Bài viết của bạn với tiêu đề <span style="font-weight: bold">"{{ $post->title }}"</span> đang trong trạng thái chờ duyệt.</p>
    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Chúng tôi sẽ xem xét và phản hồi bạn sớm nhất có thể.</p>
    <p>Trong khi chờ đợi, bạn có thể xem qua các câu hỏi thường gặp tại website của chúng tôi hoặc liên hệ trực tiếp qua số điện thoại hỗ trợ.</p>
@endsection