@extends('layout')
@section('content')
    <div class="main-content">
        <div class="container d-flex justify-content-center">
            <div class="create-post-block card my-5">
                <div class="card-header background-primary py-3">
                    <h4 class="card-title mb-1 fw-bold text-center text-white">TẠO BÀI ĐĂNG</h4>
                    <p class="cart-text m-0 text-center text-white">Vui lòng nhập thông tin về phòng trọ để đăng bài</p>
                </div>
                <div class="card-body">
                    <form action="/post/create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label" for="titleTextarea">Tiêu đề</label>
                            <textarea class="form-control" name="title" id="titleTextarea" cols="30" rows="2"></textarea>
                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="describeTextarea">Mô tả</label>
                            <textarea class="form-control" name="description" id="describeTextarea" cols="30" rows="3"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Ảnh phòng</label>
                            <div id="preview-img" class="preview-img mx-1 d-flex w-100">
                            </div>
                            <div data-mdb-button-init data-mdb-ripple-init>
                                <label id="label-image" class="form-label btn btn-outline-secondary m-0" for="imageInput"><i
                                        class="bi bi-card-image"></i> Tải ảnh</label>
                                <input type="file" class="form-control is-invalid d-none" multiple accept="image/*"
                                    id="imageInput" />
                                <div class="invalid-feedback">{{ $errors->first('images') }}</div>
                            </div>
                        </div>
                        <label class="form-label" for="addressSelect">Địa chỉ</label>
                        <div class="mb-2 row g-3">
                            <div class="col-md-6">
                                <select class="form-select" name="id_district" id="districtSelect">
                                    <option value="">Quận/Huyện</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">{{ $errors->first('id_district') }}</div>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select" name="id_ward" id="wardSelect">
                                    <option value="">Phường/Xã</option>
                                </select>
                                <div class="invalid-feedback">{{ $errors->first('id_ward') }}</div>
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
                                <input type="number" id="acreageInput" name="acreage" class="form-control">
                                <div class="invalid-feedback">{{ $errors->first('acreage') }}</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="rentInput">Giá phòng (VND/Tháng)</label>
                                <input type="number" name="rent" id="rentInput" class="form-control" pattern="[0-9]{1,3}(?:[0-9]{3})*">
                                <div class="invalid-feedback">{{ $errors->first('rent') }}</div>
                            </div>
                        </div>
                        <div class="mb-2 row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="electricityPriceInput">Giá điện (VND/Số)</label>
                                <input type="number" name="electric_price" id="electricityPriceInput"
                                    class="form-control">
                                <div class="invalid-feedback">{{ $errors->first('electric_price') }}</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="waterPriceInput">Giá nước (VND/Khối)</label>
                                <input type="number" id="waterPriceInput" name="water_price" class="form-control">
                                <div class="invalid-feedback">{{ $errors->first('water_price') }}</div>
                            </div>
                        </div>
                        <div class="mb-2 form-check">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label fst-italic" for="">Đồng ý đăng với mức phí 15k/bài
                                đăng</label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Đăng tin ngay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
