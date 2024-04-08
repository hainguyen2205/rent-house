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
                                <h3 class="mb-4">Đăng ký</h3>
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
                            <div class="d-flex justify-content-between">
                                <div class="me-1 w-50 form-floating mb-3 ">
                                    <input type="tel" class="form-control" id="phonenumberInput" placeholder=""
                                        required>
                                    <label for="phonenumberInput"><i class="bi bi-telephone"></i> Số điện thoại</label>
                                    <div class="invalid-feedback" id="phonenumberFeedback">
                                        Số điện thoại không hợp lệ!
                                    </div>
                                </div>
                                <div class="ms-1 w-50 form-floating mb-3">
                                    <input type="text" id="nameInput" class="form-control" placeholder="" required>
                                    <label class="label" for="nameInput"><i class="bi bi-person"></i> Tên cá nhân</label>
                                    <div class="invalid-feedback" id="nameFeedback">
                                        Tên cá nhân không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" id="passwordInput" class="form-control" placeholder="" required>
                                <label class="label" for="passwordInput"><i class="bi bi-lock"></i> Mật khẩu</label>
                                <div class="invalid-feedback" id="passwordFeedback">
                                    Mật khẩu không hợp lệ!
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" id="repasswordInput" class="form-control" placeholder="" required>
                                <label class="label" for="repasswordInput"><i class="bi bi-lock"></i> Nhập lại mật
                                    khẩu</label>
                                <div class="invalid-feedback" id="repasswordFeedback">
                                    Mật khẩu không hợp lệ!
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Đăng
                                    Ký</button>
                            </div>
                        </form>
                        <p class="text-center">Đã có tài khoản? <a data-toggle="tab" href="/login">Đăng nhập</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
