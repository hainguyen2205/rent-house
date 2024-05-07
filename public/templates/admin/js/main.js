function isValidImage(file) {
    return file.type.startsWith('image/');
}
function defaulValidate() {
    return true;
}
function validateImage(input) {
    var files = input.prop('files');
    for (var i = 0; i < files.length; i++) {
        var fileName = files[i].name.toLowerCase();
        if (fileName.endsWith('.jpg') || fileName.endsWith('.jpeg') || fileName.endsWith('.png') || fileName.endsWith('.gif')) {
            return true;
        }
    }
    return false;
}
function isNotEmpty(input) {
    return input.trim().length > 0;
}
function isValidImage(file) {
    return file.type.startsWith('image/');
}
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
function handleInputValidation(input, feedback, validationFunction, errorMessage) {
    var value = input.val().trim();
    if (value === '') {
        updateValidationState(input, feedback, false, errorMessage);
    } else {
        if (!validationFunction(value)) {
            updateValidationState(input, feedback, false, errorMessage);
        } else {
            updateValidationState(input, feedback, true, '');
        }
    }
}

function updateValidationState(input, feedback, isValid, message) {
    if (isValid) {
        input.removeClass('is-invalid').addClass('is-valid');
        feedback.text('');
    } else {
        input.removeClass('is-valid').addClass('is-invalid');
        feedback.text(message);
    }
}

function displayValidateNotifyImage() {
    var invalidFeedback = $('#imageInput').next('.invalid-feedback');
    if (invalidFeedback.text() != '') {
        if ($('#label-image').hasClass('btn-outline-secondary')) {
            $('#label-image').removeClass('btn-outline-secondary');
            $('#label-image').addClass('btn-outline-danger');
        } else {
            $('#label-image').addClass('btn-outline-danger');
        }
    }
}

function displayValidateNotify(input) {
    var invalidFeedback = $(input).next('.invalid-feedback');
    if (invalidFeedback.length === 0) {
        invalidFeedback = $(input).parent().find('.invalid-feedback');
    }
    if (invalidFeedback.text().trim() != '') {
        $(input).addClass('is-invalid');
    }
}

$('#titleTextarea').on('blur keyup', function () {
    var invalidFeedback = $(this).next('.invalid-feedback');
    handleInputValidation($(this), invalidFeedback, isNotEmpty, 'Tiêu đề không được bỏ trống');
});

$('#acreageInput').on('blur keyup', function () {
    var invalidFeedback = $(this).next('.invalid-feedback');
    handleInputValidation($(this), invalidFeedback, isNotEmpty, 'Diện tích không được bỏ trống');
});

$('#rentInput').on('blur keyup', function () {
    var invalidFeedback = $(this).next('.invalid-feedback');
    handleInputValidation($(this), invalidFeedback, isNotEmpty, 'Giá phòng không được bỏ trống');
});

$('#electricityPriceInput').on('blur keyup', function () {
    var invalidFeedback = $(this).next('.invalid-feedback');
    handleInputValidation($(this), invalidFeedback, isNotEmpty, 'Giá điện không được bỏ trống');
});

$('#waterPriceInput').on('blur keyup', function () {
    var invalidFeedback = $(this).next('.invalid-feedback');
    handleInputValidation($(this), invalidFeedback, isNotEmpty, 'Giá nước không được bỏ trống');
});

$('#phoneInput').on('blur keyup', function () {
    handleInputValidation($(this), $('#phoneFeedback'), validatePhoneNumber, 'Số điện thoại không hợp lệ');
});

$('#nameInput').on('keyup blur', function () {
    handleInputValidation($(this), $('#nameFeedback'), validateName, 'Tên cá nhân không hợp lệ');
});

$('#passwordInput').on('keyup blur', function () {
    handleInputValidation($(this), $('#passwordFeedback'), validatePassword, 'Độ dài mật khẩu từ 5 đến 16 ký tự');
});


displayValidateNotifyImage();
displayValidateNotify('#titleTextarea');
displayValidateNotify('#districtSelect');
displayValidateNotify('#wardSelect');
displayValidateNotify('#acreageInput');
displayValidateNotify('#rentInput');
displayValidateNotify('#electricityPriceInput');
displayValidateNotify('#waterPriceInput');

displayValidateNotify('#nameInput');
displayValidateNotify('#passwordInput');
displayValidateNotify('#repasswordInput');
displayValidateNotify('#addressInput');
displayValidateNotify('#phoneInput');
function showConfirm(userId, userName, actionType) {
    // console.log(userId);
    $('#userInfo').text('ID: ' + userId + ' - Họ tên: ' + userName + '.')
    $('#btn-confirm').attr('href', '/admin/user/delete/' + userId);
}
function clearUserForm() {
    $('#avatar-url-input').val('')
    $('#nameInput').val('');
    $('#phoneInput').val('');
    $('#dateInput').val('');
    $('#addressInput').val('');
    $('#avatar-preview').attr('src', '/templates/front/images/undraw_profile.svg');
    $('#userForm input[name="id"]').remove();
}
function viewPost(postId) {
    console.log(postId);
    $('#images-post img').remove();
    $('#services-post p').remove();
    $('#address-post i').remove();
    $('#address-post').text('');
    $('#cost-post p').remove();
    if (postId !== '') {
        $.ajax({
            url: '/admin/post/getpost',
            method: 'GET',
            data: { id: postId },
            dataType: 'json',
            success: function (response) {
                console.log('Thông tin bài đăng:', response);
                response.images.forEach(function (image) {
                    $('#images-post').append('<img width="100px" height="120px" class="mx-1 mb-2" src="' + image.url + '"alt="">');
                });
                $('#post-title').text(response.title);
                $('#services-post').append('<p class="col-3 m-0 text-color"><i class="fa-solid fa-ruler"></i> ' + response.acreage + 'm2</p>');
                response.services.forEach(function (service) {
                    $('#services-post').append('<p class="mb-0 col-3">' + service.icon + '  ' + service.services_name + '  </p>');
                });
                $('#address-post').append('<i class="fa-solid fa-location-dot me-1"></i> Địa chỉ: ' + response.ward.ward_name + ', ' + response.district.district_name + ', Tỉnh Thái Nguyên.');

                $('#cost-post').append('<p class="mb-0 col-4 fs-6 fw-bold"><i class="text-dark fa-solid fa-money-bill"></i> ' + response.rent + ' đ/tháng</p>');
                $('#cost-post').append('<p class="mb-0 col-4 fs-6 fw-bold"><i class="text-dark fa-solid fa-faucet"></i> ' + response.water_price + ' đ/khối</p>');
                $('#cost-post').append('<p class="mb-0 col-4 fs-6 fw-bold"><i class="text-dark fa-solid fa-plug-circle-bolt"></i> ' + response.electric_price + ' đ/số</p>');
                $('#description-post').text(response.description);
            },
            error: function (xhr, status, error) {
                console.error('Lỗi khi yêu cầu thông tin người dùng:', error);
            }
        });
    }
}
function showUpdateForm(userId) {
    if (userId !== '') {
        $.ajax({
            url: '/admin/user/getuser',
            method: 'GET',
            data: { id: userId },
            dataType: 'json',
            success: function (response) {
                console.log('Thông tin người dùng:', response);
                $('#modal-title').text('Cập nhật thông tin người dùng');
                $('#userForm').attr('action', '/admin/user/update');
                $('#userForm').append('<input type="hidden" name="id" value="' + userId + '">');
                $('#avatar-preview').attr('src', response['avatar_url']);
                $('#avatar-url-input').val(response['avatar_url'])
                $('#nameInput').val(response['name']);
                $('#phoneInput').val(response['phone']);
                $('#dateInput').val(response['date_of_birth']);
                $('#addressInput').val(response['address']);
            },
            error: function (xhr, status, error) {
                console.error('Lỗi khi yêu cầu thông tin người dùng:', error);
            }
        });
    }
}

function showConfirmPost(idPost, actionType) {
    if (actionType === 'approve') {
        if (!$('#reject-form').hasClass('d-none')) $('#reject-form').addClass('d-none');
        $('#btn-confirm').attr('href', '/admin/post/approve/' + idPost);
        $('#text-confirm').text('Xác nhận duyệt bài này?');
    }
    if (actionType === 'reject') {
        reason = $('#reasonInput').val();
        if ($('#reject-form').hasClass('d-none')) $('#reject-form').removeClass('d-none');
        $('#btn-confirm').attr('href', '/admin/post/reject/' + idPost);
        $('#text-confirm').text('Xác nhận từ chối bài này?');
    }
}

$('#reasonInput').on('keyup', function () {
    var url = $("#btn-confirm").attr("href")
    var reasonIndex = url.indexOf('?reason=');
    if (reasonIndex !== -1) {
        url = url.substring(0, reasonIndex);
    }
    $("#btn-confirm").attr('href', url + '?reason=' + $(this).val());
});

function showCreateForm() {
    clearUserForm();
    $('#modal-title').text('Thêm người dùng mới');
    $('#userForm').attr('action', '/admin/user/create');
}
$('#avatarInput').on('change', function () {
    var formData = new FormData();
    var files = $(this)[0].files;
    for (var i = 0; i < files.length; i++) {
        if (isValidImage(files[i])) {
            formData.append('file[]', files[i]);
        }
    }
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/upload',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            if (response.error == false) {
                var url_array = response.urls.split('&&');
                $('#avatar-preview').attr('src', url_array[0]);
                $('#avatar-url-input').val(url_array[0]);
                console.log(url_array[0]);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});