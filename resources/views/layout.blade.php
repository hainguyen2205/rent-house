<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhachothue @if (isset($title))
            - {{ $title }}
        @endif
    </title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="/templates/front/css/style.css" rel="stylesheet">
    <link href="/templates/front/css/flickity.css" rel="stylesheet">
    <script src="/templates/front/js/main.js" defer></script>
    @if (isset($jss) && !empty($jss))
        @foreach ($jss as $js)
            <script src="/templates/front/js/{{ $js }}" defer></script>
        @endforeach
    @endif
</head>

<body class="mulish">
    @if (Auth::check())
        <div class="feedback-box position-fixed cursor-pointer bg-success shadow" data-bs-toggle="modal"
            data-bs-target="#feedbackModal">
            <i class="fs-4 fa-solid fa-headset fa-shake"></i>
        </div>
        <div class="modal fade right" id="feedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-bottom-right">
                <div class="modal-content">
                    <div class="modal-header flex-column justify-content-center">
                        <h5 class="modal-title fw-bold" id="exampleModalLabel">Hãy chia sẻ vấn đề của bạn!</h5>
                        <img width="80px" height="80px" class="mt-3"
                            src="\templates\front\images\customer-service-support-svgrepo-com.svg" alt="">
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title-feedback" class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" name="title" id="title-feedback" required>
                            </div>
                            <div >
                                <label for="description-feedback" class="form-label">Nôi dung phản hồi</label>
                                <textarea class="form-control" name="description" id="description-feedback" required rows="3"></textarea>
                            </div>
                        </div>
                        <div class="px-3 pb-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-light mx-2 w-25" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary mx-2 w-25"><i class="bi bi-send-fill"></i> Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @include('header')
    <div class="background-content">
        @yield('content')
    </div>
    @include('footer')
</body>
<script src="/templates/front/js/flickity.js"></script>

</html>
