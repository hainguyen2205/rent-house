@extends('layout_2')
@section('left-content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="color-primary" href="/">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Câu hỏi thường gặp</li>
        </ol>
    </nav>
    <h2 class="fw-bold">Câu hỏi thường gặp</h2>
    <h5 class="fw-bold">1. Làm thế nào để đăng tin</h5>
    <p>Để có thể đăng tin lên <strong class="text-color-primary">Nhachothue </strong>trước hết bạn cần đăng ký tài khoản tại
        website, truy cập vào website
        <strong class="text-color-primary">Nhachothue </strong> và kích vào chữ "đăng ký" sau đó điền các thông tin như: Họ
        tên, số điện thoại,email, mật khẩu <strong>(Lưu ý: bạn
            cần nhập chính xác số điện thoại bạn cần khách hàng gọi đến,email để nhận thông báo, mật khẩu thì nên tạo dễ nhớ
            và ghi lại, để sau này bạn
            có thể đăng nhập để đăng tin, chỉnh sửa nội dung vv...)</strong>
    </p>
    <h5 class="fw-bold">2. Vào đâu để xem lại tin đã đăng, chỉnh sửa hoặc ẩn tin đã đăng?</h5>
    <p>Sau khi đã đăng nhập và đăng tin thành công, bạn có thể vào phần <strong>"Quản lý tài khoản" </strong> tìm
        mục <strong>"Quản lý tin đăng" </strong> Và bạn nhìn bên phải của các tin đã đăng, bạn sẽ thấy nút <strong> "Sửa"
        </strong>và <strong>"Ẩn tin đăng"</strong>, bấm vào để thực hiện các thao tác mong muốn. </p>
    <h5 class="fw-bold">3. Đăng tin tại Nhachothue có mất phí không?</h5>
    <p>Hiện tại, khi đăng tin website sẽ thu phí với mức <strong class="text-danger">15k/1tin</strong>, bạn có thể đăng 1
        tin thường hiển thị 30 ngày. </p>
    <p>Bạn có thể tham khảo thêm thông tin tại đường link sau: <a class="text-primary" href="/news/posting-rules">Quy định
            đăng tin</a></p>
    <h5 class="fw-bold">4. Nạp tiền vào tài khoản bằng cách nào?</h5>
    <p>Để nạp tiền, bạn tìm đến nút Nạp tiền trên màn hình, hiện Nhachothue có các hình thức thanh toán sau: </p>
    <p>a). Thanh toán tự động thông qua chuyển khoản qua các kênh: <strong>Ví VnPay, Cổng thanh toán VietQr</strong></p>
    <h5 class="fw-bold">5. Không nhận được tiền khi nạp tiền?</h5>
    <p><strong>Bước 1: </strong>Vào trang <strong>"Quản lý tài khoản" chọn "Lịch sử nạp"</strong> để kiểm tra trạng thái nạp
        tiền.</p>
    <p><strong>Bước 2: </strong>Báo lỗi với quản trị viên thông bao tính năng <strong>"Phản hồi"</strong> phía góc phải màn
        hình.</p>
    <p>Thông thường, các hoạt động nạp tiền sẽ được tự xử lý sau <strong>5-10 phút </strong>. Nếu như sau thời gian đó mà
        chưa nhận được tiền vào tài khoản
        và <strong>"trạng thái nạp"</strong> của yêu cầu nạp đó vẫn ở trạng thái <strong class="text-warning">Chờ xử
            lý</strong>, bạn hãy báo lỗi ngay với quản trị viên thông qua <strong>"Phản hồi"</strong> với mẫu nội dung như
        sau:</p>
    <p class="mb-1"><strong class="text-primary">Tiêu đề: </strong> "Lỗi nạp tiền"</p>
    <p><strong class="text-primary">Mô tả: </strong> "Mã yêu cầu nạp: <span class="text-info fst-italic">(Mã yêu cầu nạp gặp lỗi)</span>"</p>
    <p>Rồi nhấp <strong>"Gửi"</strong>. Nếu như yêu cầu nạp tiền gặp lỗi của bạn hợp lệ, số tiền nạp sẽ được cộng lại trước 48h sau khi xử lý</p>
@endsection
