$('#Table').DataTable({
    "order": []
});
function isValidImage(file) {
    return file.type.startsWith('image/');
}
$('.alert').each(function () {
    if ($(this).text().trim().length > 0) {
        var alertElement = $(this);
        setTimeout(function () {
            alertElement.addClass('show');
        }, 200);
        setTimeout(function () {
            alertElement.removeClass('show');
            setTimeout(function () {
                alertElement.addClass('d-none');
            }, 500);
        }, 5000);
    }
});
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

function displayValidateNotify(element) {
    var $element = $(element);
    var invalidFeedback = $element.siblings('.invalid-feedback');
    if (invalidFeedback.length === 0) {
        invalidFeedback = $element.parent().find('.invalid-feedback');
    }
    if (invalidFeedback.text().trim() != '') {
        $element.addClass('is-invalid');
    }
}

$('input.form-control, select.form-select, textarea.form-control').each(function () {
    displayValidateNotify(this);
});


displayValidateNotifyImage();

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
function fetchUser(userId) {
    $.ajax({
        url: '/admin/user/getuser',
        method: 'GET',
        data: { id: userId },
        dataType: 'json',
        success: function (response) {
            console.log('Thông tin người dùng:', response);
            $('#user-avatar').attr('src', response['avatar_url']);
            $('#user-name').text(response['name']);
            $('#user-phone').text(response['phone']);
            $('#user-mail').text(response['email']);
            $('#user-id').val(response['id']);
        },
        error: function (xhr, status, error) {
            console.error('Lỗi khi yêu cầu thông tin người dùng:', error);
        }
    });
}
//User Confirm Form
function showDeleteForm(userId) {
    if (userId !== '') {
        $('#user-id').val(userId);
    }
}
function showConfirmUser(userId, typeAction) {
    var textareaHTML = `
        <div class="form-floating" id="textarea-block-reason">
            <textarea class="form-control"  placeholder="" name="reason"></textarea>
            <label for="floatingTextarea2">Lý do khóa</label>
        </div>
        `;
    $('#user-id-2').val(userId);
    if (typeAction === 'block') {
        $('#user-form').attr('action', '/admin/user/block');
        $('#title-action').text('Xác nhận khóa tài khoản này?')
        if ($('#textarea-block-reason').length === 0) {
            $('#form-body').append(textareaHTML);
        }
    } else if (typeAction === 'unblock') {
        $('#user-form').attr('action', '/admin/user/unblock');
        $('#title-action').text('Xác nhận mở khóa tài khoản này?')
        $('#textarea-block-reason').remove();
    }
}
//Post Confirm Form
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