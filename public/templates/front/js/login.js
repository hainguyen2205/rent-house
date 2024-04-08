function validatePhoneNumber(phoneNumber) {
    var stripped = phoneNumber.replace(/[\D]/g, '');
    if (stripped.length === 10) {
        if (stripped.charAt(0) === '0') {
            return true;
        }
    }
    return false;
}
function validatePassword(password) {
    return (password.length > 4 && password.length < 17) ? true : false;
}
function validateName(name) {
    if (name.trim() === '') {
        return false;
    }
    var specialChars = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    if (specialChars.test(name)) {
        return false;
    }
    var numbers = /\d/;
    if (numbers.test(name)) {
        return false;
    }
    return true;
}
$('#phonenumberInput').on('blur keyup', function () {
    var phoneNumberInput = $(this);
    var phoneNumber = phoneNumberInput.val().trim();
    var invalidFeedback = $('#phonenumberFeedback');
    if (phoneNumber === '') {
        if (!phoneNumberInput.hasClass('is-invalid')) {
            phoneNumberInput.removeClass('is-valid');
            phoneNumberInput.addClass('is-invalid');
            invalidFeedback.text('Số điện thoại không được bỏ trống');
        }
    } else {
        if (!validatePhoneNumber(phoneNumber)) {
            phoneNumberInput.removeClass('is-valid');
            phoneNumberInput.addClass('is-invalid');
            invalidFeedback.text('Số điện thoại không hợp lệ');
        } else {
            phoneNumberInput.removeClass('is-invalid');
            phoneNumberInput.addClass('is-valid');
        }
    }
});

$('#nameInput').on('keyup blur', function () {
    var nameInput = $(this);
    var name = nameInput.val().trim();
    var invalidFeedback = $('#nameFeedback');
    if (name === '') {
        if (!nameInput.hasClass('is-invalid')) {
            nameInput.removeClass('is-valid');
            nameInput.addClass('is-invalid');
            invalidFeedback.text('Tên cá nhân không được bỏ trống');
        }
    } else {
        if (!validateName(name)) {
            nameInput.removeClass('is-valid');
            nameInput.addClass('is-invalid');
            invalidFeedback.text('Tên cá nhân không hợp lệ');
        } else {
            nameInput.removeClass('is-invalid');
            nameInput.addClass('is-valid');
        }
    }
});
$('#passwordInput').on('keyup blur', function () {
    var passwordInput = $(this);
    var password = passwordInput.val().trim();
    var invalidFeedback = $('#passwordFeedback');
    if (password === '') {
        if (!passwordInput.hasClass('is-invalid')) {
            passwordInput.removeClass('is-valid');
            passwordInput.addClass('is-invalid');
            invalidFeedback.text('Mật khẩu không được bỏ trống');
        }
    } else {
        if (!validatePassword(password)) {
            passwordInput.removeClass('is-valid');
            passwordInput.addClass('is-invalid');
            invalidFeedback.text('Độ dài mật khẩu từ 5 đến 16 ký tự');
        } else {
            passwordInput.removeClass('is-invalid');
            passwordInput.addClass('is-valid');
        }
    }
});
$('#repasswordInput').on('keyup blur', function () {
    var repasswordInput = $(this);
    var password = repasswordInput.val().trim();
    var invalidFeedback = $('#repasswordFeedback');
    var originalPassword = $('#passwordInput').val().trim();

    if (password === '') {
        if (!repasswordInput.hasClass('is-invalid')) {
            repasswordInput.removeClass('is-valid');
            repasswordInput.addClass('is-invalid');
            invalidFeedback.text('Hãy nhập lại mật khẩu');
        }
    } else {
        if (password === originalPassword) {
            repasswordInput.removeClass('is-invalid');
            repasswordInput.addClass('is-valid');
        } else {
            repasswordInput.removeClass('is-valid');
            repasswordInput.addClass('is-invalid');
            invalidFeedback.text('Nhập lại mật khẩu không chính xác');
        }
    }
});