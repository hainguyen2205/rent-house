@extends('layout_2')
@section('left-content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="color-primary" href="/">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quy định đăng tin</li>
        </ol>
    </nav>
    <h2 class="fw-bold">Quy định đăng tin</h2>
    <h3 class="fw-bold">A. QUY ĐỊNH CHUNG:</h3>
    <p>- Không sử dụng bất kỳ thiết bị, phần mềm, quy trình, phương tiện để can thiệp hay cố gắng can thiệp vào hoạt động
        đúng đắn trên nhachothue.online</p>
    <p>- Không được đăng ký tài khoản và khai báo những thông tin giả mạo; nick gây hiểu nhầm với những thành viên khác</p>
    <p>- Không được phép đăng tin liên quan đến các vấn đề mà Pháp luật Việt Nam không cho phép.</p>
    <p>- Không được đăng những bài viết, thông tin có nội dung vi phạm pháp luật; đả kích, bôi nhọ, chỉ trích hay bàn luận
        về chính trị, tôn giáo, phản động, kỳ thị văn hóa, dân tộc, cũng như vi phạm khác liên quan đến thuần phong mỹ tục
        của dân tộc Việt Nam.</p>
    <p>- Không được xâm phạm quyền lợi, uy tín, đời tư của các cá nhân hay thành viên khác, không được dùng ngôn từ tục tĩu,
        thóa mạ trong các thông tin tham gia.</p>
    <p>- Không được lợi dụng website để tuyên truyền, đề xướng, lôi kéo với những nội dung không lành mạnh.</p>
    <p>- Phải dùng ngôn từ trong sáng, rõ ràng, đúng chính tả.</p>

    <h3 class="fw-bold">B. QUY ĐỊNH VỀ TIN ĐĂNG (CÁC TRƯỜNG HỢP TIN ĐĂNG KHÔNG ĐƯỢC DUYỆT)</h3>
    <p><strong>1. </strong>Tiêu đề và nội dung tin đăng bằng tiếng Việt, có dấu, chữ thường, chỉ viết hoa đầu
        câu
        và danh từ riêng, đúng chính tả, câu văn mạch lạc, rõ ràng, không chèn các ký tự đặc biệt, không dùng dấu gạch dưới
        ( _ ) để ngắt câu hay đặt ở đầu câu. <strong>Lưu ý: tin đăng tiêu đề/nội dung IN HOA, sẽ không được
            duyệt hiển thị.</strong></p>
    <p><strong>2. </strong>Giữa các đoạn văn cách nhau không quá 1 hàng ký tự, không để khoảng trống, <strong>không dùng dấu
            chấm dấu phẩy các ký tự đặc biệt liên tiếp tạo thành dòng,</strong> không để từ
        khóa bên dưới nội dung mô tả của tin đăng.</p>
    <p><strong>3. </strong>Tin đăng không được để lộ các thông tin liên lạc cá nhân như: <strong>Số điện thoại;
            Email;...</strong></p>
    <p><strong>4. </strong>Website chỉ duyệt các tin đăng về cho thuê thuộc các chuyên mục: <strong>cho thuê phòng trọ, cho
            thuê nhà, cho thuê căn hộ/chung cư</strong>. Không được đăng các tin cho thuê ngoài các chuyên mục nêu trên. Mỗi
        tin đăng chỉ được đăng tin về cho thuê, không đăng đồng thời cả bán và cho thuê.</p>
    <p><strong>5. </strong>Không đăng tin trùng dưới bất kỳ hình thức tin đăng nào, tin trùng sẽ bị xóa.</p>
    <p>+ Một căn (sản phẩm cho thuê) cho thuê cùng giá, cùng diện tích, đăng lặp lại dù nội dung có khác nhau => Không duyệt
        tin.</p>
    <p>+ Một căn (sản phẩm cho thuê) khác giá, khác diện tích, khác địa chỉ mà đăng trùng nội dung => Không duyệt tin.</p>
    <p>+ Một căn (sản phẩm cho thuê) xác định tại một địa chỉ nhưng cố tình đăng phủ nhiều khu vực đường, phường, quận/huyện
        khác nhau (mặc dù soạn nội dung tin khác nhau) => Không duyệt tin. </p>
    <p>+ Các căn (sản phẩm cho thuê) khác nhau nhưng đăng cùng một hình ảnh => Không duyệt tin.</p>
    <p>+ Hình ảnh sai thực tế, để hình người, chân dung... => Không duyệt tin.</p>
    <p><strong>6. </strong>Tin đăng phải điền <strong>đầy đủ, chính xác địa chỉ: số nhà, tên đường, tên phường, quận/huyện.
            Những tin đăng điền thiếu hoặc không chính xác địa chỉ có thể không được duyệt hiển thị. </strong></p>
    <p><strong>7. </strong>Thông tin giá cho thuê căn (sản phẩm cho thuê) trong nội dung tin đăng và ô nhập mức giá phải
        đúng với giá thực tế cho thuê. </p>
    <p><strong>8. </strong>Tin đăng cho thuê căn (sản phẩm cho thuê) phải điền đầy đủ các thông tin tại các trường thông tin
        ở giao diện đăng tin theo nội dung tin đăng.</p>
    <p><strong>9. </strong>Tin đăng khi hết hạn nếu khách hàng không gia hạn lại sau thời gian nhất định hệ thống sẽ tự
        động xóa đi.</p>
    <h3 class="fw-bold">C. QUY ĐỊNH VỀ TÀI KHOẢN:</h3>
    <p>- Tại Nhachothue, chúng tôi rất quan tâm đến vấn đề minh bạch thông tin, vì vậy tài khoản phải cung cấp thông tin
        thật của người sử dụng (họ tên, số điện thoại...).</p>
    <p>- Số điện thoại sử dụng của tài khoản sẽ được xác thực trước khi đăng tin</p>
    <p>- Tài khoản sẽ được đánh dấu "đã xác thực" sau khi ban quản trị website nhận được thông tin cung cấp từ chủ tài khoản
        (bao gồm chứng minh nhân dân, bằng lái hoặc các thông tin liên quan).</p>
    <h5 class="fw-bold">NHỮNG LÝ DO KHIẾN TÀI KHOẢN BỊ KHÓA</h5>
    <p>- Tạo nhiều tài khoản ảo: cố tình tạo nhiều tài khoản để lách quy định giới hạn tin đăng trên mỗi tài khoản.</p>
    <p>- Đăng tin không đúng sự thật: cố ý cung cấp nội dung sai, giả mạo so với giao dịch thực tế (bao gồm thông tin về bất
        động sản, giá, hình ảnh, địa chỉ...) và hướng khách hàng đến 1 giao dịch khác, điều này làm ảnh hưởng rất lớn đến
        lòng tin, uy tín của website Nhachothue đối với người dùng. Nếu bất động sản đã giao dịch xong, xin vui lòng cập
        nhật lại trạng thái của tin đăng (đã bán, đã cho thuê).</p>
    <p>- Đăng nội dung trùng lặp: cùng 1 bất động sản nhưng đăng nhiều lần, gây trùng lặp nội dung trên website. Nếu muốn
        đưa tin đăng lên cao, vui lòng sử dụng tính năng <strong>UP TOP</strong></p>
    <p>- Sử dụng phần mềm UP TOP tự động được cung cấp bởi bên thứ 3 ngoài kiểm soát của Nhachothue, khiến máy chủ quá tải
        gây ảnh hưởng tốc độ website. Nếu có nhu cầu UP TOP tự động vui lòng sử dụng tính năng được cung cấp bởi Nhachothue
        để website hoạt động ổn định.</p>
    <h3 id="fee" class="fw-bold">D. QUY ĐỊNH VỀ CHI PHÍ: <span class="fw-bold fst-italic text-danger">(hiện tại)</span></h3>
    <p><strong>1. Phí đăng tin: </strong>Hiện tại khi đăng tin phí đăng: <strong class="text-danger">15k/1 tin và có thời gian hiển thị là 30 ngày.</strong></p>
    <p><strong>2. Phí sửa tin:</strong> Mỗi tin đăng sẽ có 1 lần được chỉnh sửa 1 lần và <strong class="text-danger">không bị mất phí</strong></p>
    <p><strong>3. Hoàn lại phí đăng tin:</strong> Hiện tại nếu đăng tin mà bị từ chối duyệt, tài khoản sẽ được hoàn lại <strong class="text-danger">100% phí đăng</strong></p>
@endsection
