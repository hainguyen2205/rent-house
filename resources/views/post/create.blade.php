@extends('layout')
@section('content')
    <div class="main-content">
        <div class="container d-flex justify-content-center">
            <div class="create-post-block card w-50 my-5">
                <div class="card-header background-primary py-3">
                    <h4 class="card-title mb-1 fw-bold text-center text-white">TẠO BÀI ĐĂNG</h4>
                    <p class="cart-text m-0 text-center text-white">Vui lòng nhập thông tin về phòng trọ để đăng bài</p>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="mb-2">
                            <label class="form-label" for="titleTextarea">Tiêu đề</label>
                            <textarea class="form-control is-invalid" name="title" id="titleTextarea" cols="30" rows="2"></textarea>
                            <div class="invalid-feedback">Vui lòng nhập tiêu đề.</div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="describeTextarea">Mô tả</label>
                            <textarea class="form-control is-invalid" name="descripbe" id="describeTextarea" cols="30" rows="3"></textarea>
                            <div class="invalid-feedback">Vui lòng nhập mô tả.</div>
                        </div>
                        <div class="input-group mb-2">
                            <input type="file" class="form-control is-invalid" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            <div class="invalid-feedback">Vui lòng chọn ít nhất 1 ảnh.</div>
                        </div>
                        <label class="form-label" for="addressSelect">Địa chỉ</label>
                        <div class="mb-2 row g-3">
                            <div class="col-md-6">
                                <select class="form-select is-invalid" name="district" id="districtSelect">
                                    <option value="1">Thành phố Thái Nguyên</option>
                                </select>
                                <div class="invalid-feedback">Vui lòng chọn địa chỉ</div>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select is-invalid" name="ward" id="wardSelect">
                                    <option value="1">Phường Tân Thịnh</option>
                                </select>
                                <div class="invalid-feedback">Vui lòng chọn địa chỉ</div>
                            </div>
                        </div>
                        <label class="form-label" for="serviceCheck">Dịch vụ</label>
                        <div class="ms-3 mb-2 row">
                            <div class="form-check col-md-4">
                                <input type="checkbox" class="form-check-input" name="services[]" value="1">
                                <label for="" class="form-check-label">Nóng lạnh</label>
                            </div>
                            <div class="form-check col-md-4">
                                <input type="checkbox" class="form-check-input" name="services[]" value="2">
                                <label for="" class="form-check-label">Điều hòa</label>
                            </div>
                            <div class="form-check col-md-4">
                                <input type="checkbox" class="form-check-input" name="services[]" value="3">
                                <label for="" class="form-check-label">Khép kín</label>
                            </div>
                        </div>
                        <div class="mb-2 row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="acreageInput">Diện tích phòng (m²)</label>
                                <input type="number" id="acreageInput" class="form-control is-invalid">
                                <div class="invalid-feedback">
                                    Diện tích không hợp lệ
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="rentInput">Giá phòng (VND/Tháng)</label>
                                <input type="number" id="rentInput" class="form-control is-invalid">
                                <div class="invalid-feedback">
                                    Số tiền không hợp lệ
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="electricityPriceInput">Giá điện (VND/Số)</label>
                                <input type="number" id="electricityPriceInput" class="form-control is-invalid">
                                <div class="invalid-feedback">
                                    Số tiền không hợp lệ
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="waterPriceInput">Giá nước (VND/Khối)</label>
                                <input type="number" id="waterPriceInput" class="form-control is-invalid">
                                <div class="invalid-feedback">
                                    Số tiền không hợp lệ
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 form-check">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label fst-italic" for="">Đồng ý đăng với mức phí 15k/bài đăng</label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" disabled class="btn btn-primary">Đăng tin ngay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
