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
                            <textarea class="form-control" name="title" id="titleTextarea" cols="30" rows="2">{{ old('title') }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Ảnh phòng</label>
                            <div id="preview-img" class="preview-img mx-1 d-flex w-100">
                            </div>
                            <div data-mdb-button-init data-mdb-ripple-init>
                                <label id="label-image"
                                    class="form-label btn btn-outline-secondary m-0"
                                    for="imageInput"><i class="bi bi-card-image"></i> Tải ảnh</label>
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
                                        <option value="{{ $district->id }}"
                                            {{ old('id_district') == $district->id ? 'selected' : '' }}>
                                            {{ $district->district_name }}</option>
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
                            @foreach ($services as $service)
                                <div class="form-check col-md-4">
                                    <input type="checkbox" class="form-check-input" name="services[]"
                                        value="{{ $service->id }}"{{ is_array(old('services')) && in_array($service->id, old('services')) ? ' checked' : '' }}>
                                    <label for="" class="form-check-label">{{ $service->services_name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-2 row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="acreageInput">Diện tích phòng
                                    (m²)</label>
                                <input type="number" id="acreageInput" name="acreage" class="form-control" value="{{ old('acreage') }}">
                                <div class="invalid-feedback">{{ $errors->first('acreage') }}</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="rentInput">Giá phòng
                                    (VND/Tháng)</label>
                                <input type="number" name="rent" id="rentInput" class="form-control"
                                    pattern="[0-9]{1,3}(?:[0-9]{3})*" value="{{ old('rent') }}">
                                <div class="invalid-feedback">{{ $errors->first('rent') }}</div>
                            </div>
                        </div>
                        <div class="mb-2 row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="electricityPriceInput">Giá điện
                                    (VND/Số)</label>
                                <input type="number" name="electric_price" id="electricityPriceInput" class="form-control" value="{{ old('electric_price') }}">
                                <div class="invalid-feedback">{{ $errors->first('electric_price') }}</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="waterPriceInput">Giá nước
                                    (VND/Khối)</label>
                                <input type="number" id="waterPriceInput" name="water_price" class="form-control" value="{{ old('water_price') }}">
                                <div class="invalid-feedback">{{ $errors->first('water_price') }}</div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="typeHouseSelect">Loại hình
                                nhà</label>
                            <select class="form-select" name="type_house" id="typeHouseSelect">
                                <option value="">Chọn</option>
                                @foreach ($type_houses as $type)
                                    <option value="{{ $type->id }}" {{ old('type_house') == $type->id ? 'selected' : '' }}>{{ $type->type_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">{{ $errors->first('type_house') }}</div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="describeTextarea">Mô tả</label>
                            <textarea class="form-control" name="description" id="describeTextarea" cols="30" rows="3">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-2 form-check">
                            <input id="agree-checkbox" type="checkbox" class="form-check-input">
                            <label class="form-check-label" for="">Đồng ý đăng với <a href="#" class="link-primary text-decoration-underline fst-italic">các điều khoản</a></label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button id="submit-btn" type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Đăng tin ngay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
