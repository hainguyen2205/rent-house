@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-12 col-lg-10 my-3">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(/templates/front/images/fgfg4.jpg);">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Đăng nhập</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="#"
                                        class="social-icon d-flex align-items-center justify-content-center"><span
                                            class="fa-brands fa-facebook-f"></span></a>

                                    <a href="#"
                                        class="social-icon d-flex align-items-center justify-content-center"><span
                                            class="fa-brands fa-twitter"></span></a>
                                </p>
                            </div>
                        </div>
                        <form action="#" class="signin-form">
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="phonenumberInput" placeholder="" required>
                                <label for="phonenumberInput"><i class="bi bi-telephone"></i> Số điện thoại</label>
                            <div class="invalid-feedback" id="phonenumberFeedback"></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" id="passwordInput" class="form-control" placeholder="" required>
                                <label class="label" for="passwordInput"><i class="bi bi-lock"></i> Mật khẩu</label>
                                <div class="invalid-feedback" id="passwordFeedback"></div>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Đăng
                                    Nhập</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="form-check w-50 text-start">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Lưu mật khẩu
                                    </label>
                                </div>
                                <div class="w-50 text-md-end">
                                    <a href="#">Quên mật khẩu</a>
                                </div>
                            </div>
                        </form>
                        <p class="text-center pb-5">Chưa có tài khoản? <a data-toggle="tab" href="/register">Đăng ký ngay</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
