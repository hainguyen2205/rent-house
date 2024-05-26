@extends('layout_2')
@section('left-content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="color-primary" href="/">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
        </ol>
    </nav>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="/news/posting-rules">
                <div class="d-flex">
                    <img class="post-thumbnail rounded" src="/templates/front/images/thumbnail-rules.png" alt="thumbnail">
                    <div class="ms-3 mt-3">
                        <h4 class="fw-bold">Những quy định cần biết khi đăng tin tại Nhachothue</h4>
                        <p class="text-color">Cung cấp các quy định và hướng dẫn chi tiết về việc đăng tin cho thuê nhà tại
                            Nhachothue. Bạn sẽ tìm thấy thông tin quan trọng về những yêu cầu và tiêu chuẩn cần tuân thủ để
                            đảm bảo tin đăng của bạn được phê duyệt nhanh...</p>
                    </div>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="/faq">
                <div class="d-flex">
                    <img class="post-thumbnail rounded" src="/templates/front/images/faq.png" alt="thumbnail">
                    <div class="ms-3 mt-3">
                        <h4 class="fw-bold">Những câu hỏi thường gặp</h4>
                        <p class="text-color">Những câu hỏi thường gặp khi bắt đầu sử dụng website tìm kiếm và đăng tin nhà
                            ở cho thuê Nhachothue.online</p>
                    </div>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="/news/share-tips">
                <div class="d-flex">
                    <img class="post-thumbnail rounded" src="/templates/front/images/thumbnail-image-1.png" alt="thumbnail">
                    <div class="ms-3 mt-3">
                        <h4 class="fw-bold">Chia sẻ 10 kinh nghiệm khi thuê phòng trọ cho sinh
                            viên</h4>
                        <p class="text-color">Kinh nghiệm "đắt giá" dành cho sinh viên khi tìm thuê phòng
                            trọ. Thuê phòng trọ xung quanh khu vực trường học. Việc thuê phòng trọ gần
                            trường học sẽ...</p>
                    </div>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="/news/scam-warnings">
                <div class="d-flex">
                    <img class="post-thumbnail rounded" src="/templates/front/images/thumbnail-image-2.jpg" alt="thumbnail">
                    <div class="ms-3 mt-3">
                        <h4 class="fw-bold">Cẩn thận các kiểu lừa đảo khi thuê phòng trọ</h4>
                        <p class="text-color">Kinh nghiệm "đắt giá" dành cho sinh viên khi tìm thuê phòng
                            trọ. Thuê phòng trọ xung quanh khu vực trường học. Việc thuê phòng trọ gần
                            trường học sẽ...</p>
                    </div>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="/news/tips-for-posting">
                <div class="d-flex">
                    <img class="post-thumbnail rounded" src="/templates/front/images/thumbnail-image-3.png" alt="thumbnail">
                    <div class="ms-3 mt-3">
                        <h4 class="fw-bold">Chia sẻ "mẹo" đăng tin cho thuê phòng trọ hiệu quả tại NhaChoThue
                        </h4>
                        <p class="text-color">Việc đăng tin cho thuê phòng trọ trên các kênh trực tuyến như
                            nhachothue.online
                            đang trở thành xu hướng phổ biến. Đây là cách thức hiệu quả giúp chủ trọ tiếp cận được nhiều...
                        </p>
                    </div>
                </div>
            </a>
        </li>
    </ul>
@endsection
