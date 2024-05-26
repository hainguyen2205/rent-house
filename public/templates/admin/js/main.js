$('#Table').DataTable({
    "order": [],
    "language": {
        "info": "Hiển thị từ _START_ đến _END_ của _TOTAL_ bản ghi",
        "lengthMenu": "_MENU_ bản ghi mỗi trang",
        "search": "Tìm kiếm",
        "emptyTable": "Không có dữ liệu trong bảng",
        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
        "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
        "infoFiltered": "(lọc từ _MAX_ mục tổng cộng)"
    }
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
function showReplyForm(feedbackId) {
    if (feedbackId != '') {
        $.ajax({
            url: '/admin/feedback/getfeedback',
            method: 'GET',
            data: { id: feedbackId },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                $('#id_feedback').val(response['id']);
                $('#title_feedback').val(response['title']);
            },
            error: function (xhr, status, error) {
                console.error('Lỗi khi yêu cầu:', error);
            }
        });
    }
}

function showTopUpRequestForm(id, action) {
    $('#topup-id').val(id);
    if (action == 'success') {
        $('#topup-form').attr('action', '/admin/topup/success');
        $('#topup-title-action').text('Xác nhận hoàn thành yêu cầu nạp này?')
    }
    if (action == 'cancel') {
        $('#topup-form').attr('action', '/admin/topup/cancel');
        $('#topup-title-action').text('Xác nhận hủy bỏ yêu cầu nạp này?')
    }
}
function showFeedbackList(feedbackId) {
    if (feedbackId != '') {
        $.ajax({
            url: '/admin/feedback/getfeedback',
            method: 'GET',
            data: { id: feedbackId },
            dataType: 'json',
            success: function (response) {
                $('#id-feedback').val(response['id']);
                $('#title-feedback').val(response['title']);
                $('#description-feedback').val(response['description']);
                $('#list-reply-feedback').empty();
                response.get_reply.forEach(function (reply) {
                    $('#list-reply-feedback').append(' <li class="list-group-item">' + reply['description'] + '</li>')
                });
            },
            error: function (xhr, status, error) {
                console.error('Lỗi khi yêu cầu:', error);
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
    if (idPost != '') {
        $('#id-post').val(idPost);
        if (actionType === 'approve') {
            if (!$('#reject-form').hasClass('d-none')) $('#reject-form').addClass('d-none');
            $('#approve-form').attr('action', '/admin/post/approve');
            $('#text-confirm').text('Xác nhận duyệt bài này?');
        }
        if (actionType === 'reject') {
            reason = $('#reasonInput').val();
            if ($('#reject-form').hasClass('d-none')) $('#reject-form').removeClass('d-none');
            $('#approve-form').attr('action', '/admin/post/reject');
            $('#text-confirm').text('Xác nhận từ chối bài này?');
        }
        if (actionType === 'delete') {
            reason = $('#reasonInput').val();
            if (!$('#reject-form').hasClass('d-none')) $('#reject-form').addClass('d-none');
            $('#approve-form').attr('action', '/admin/post/delete');
            $('#text-confirm').text('Xác nhận xóa bài này?');
        }
    }
}
function showServiceForm(serviceId) {
    if (serviceId == '') {
        $('#staticBackdropLabel').text("Thêm mới dịch vụ");
        $('#service-form').attr('action', '/admin/service/create');
        $('#service-id').val(null);
        $('#service-name').val(null);
        $('#service-icon').val(null);
        $('#service-submit').text('Thêm mới');
    } else {
        $('#service-form').attr('action', '/admin/service/update');
        $('#staticBackdropLabel').text("Cập nhật dịch vụ");
        $('#service-submit').text('Cập nhật');

        $.ajax({
            url: '/admin/service/getservice',
            method: 'GET',
            data: { id: serviceId },
            dataType: 'json',
            success: function (response) {
                $('#service-id').val(response.id);
                $('#service-name').val(response.services_name);
                $('#service-icon').val(response.icon);
            },
            error: function (xhr, status, error) {
                console.error('Lỗi khi yêu cầu thông tin:', error);
            }
        });
    }
}
function showTypeHouseForm(Id) {
    if (Id == '') {
        $('#staticBackdropLabel').text("Thêm mới loại hình nhà");
        $('#type-form').attr('action', '/admin/type-house/create');
        $('#type-id').val(null);
        $('#type-name').val(null);
        $('#type-submit').text('Thêm mới');
    } else {
        $('#type-form').attr('action', '/admin/type-house/update');
        $('#staticBackdropLabel').text("Cập nhật loại hình nhà");
        $('#type-submit').text('Cập nhật');
        $.ajax({
            url: '/admin/type-house/get',
            method: 'GET',
            data: { id: Id },
            dataType: 'json',
            success: function (response) {
                $('#type-id').val(response.id);
                $('#type-name').val(response.type_name);
            },
            error: function (xhr, status, error) {
                console.error('Lỗi khi yêu cầu thông tin:', error);
            }
        });
    }
}

// $('#reasonInput').on('keyup', function () {
//     var url = $("#btn-confirm").attr("href")
//     var reasonIndex = url.indexOf('?reason=');
//     if (reasonIndex !== -1) {
//         url = url.substring(0, reasonIndex);
//     }
//     $("#btn-confirm").attr('href', url + '?reason=' + $(this).val());
// });

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
$('#imageInput').on('input', function () {
    // console.log("Input event fired");
    var imgCount = $('#preview-img img').length;
    if (imgCount > 5) {
        alert('Ảnh tối đa là 6');
    } else {
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
                    for (let index = 0; index < url_array.length; index++) {
                        if (url_array[index] != '') {
                            var html = '<div class="position-relative mx-1 mb-2">' +
                                '<div onclick="removeImage(this)" class="btn-remove-img">' +
                                '<i class="text-white bi bi-x"></i>' +
                                '</div>' +
                                '<div class="">' +
                                '<img width="120px" height="160px" class="object-fit-cover" src="' + url_array[index] + '" alt="">' +
                                '<input class="d-none" type="hidden" name="images[]" value="' + url_array[index] + '">' +
                                '</div>' +
                                '</div>';
                            $('#preview-img').append(html);
                        }
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
});
function removeImage(element) {
    element.parentNode.remove();
}
$('#districtSelect').on('change', function () {
    var idDistrict = $(this).val();
    var wardSelect = '#wardSelect';
    var invalidFeedback = $(this).next('.invalid-feedback');
    fetchWards(idDistrict, wardSelect);
});
function fetchWards(idDistrict, wardSelect) {
    if (idDistrict != '') {
        $.ajax({
            url: '/address/getwards',
            type: 'GET',
            data: {
                id_district: idDistrict
            },
            success: function (response) {
                var wards = response.wards;
                $(wardSelect).children('option:not([value=""])').remove();
                for (let index = 0; index < wards.length; index++) {
                    $(wardSelect).append('<option value="' + wards[index].id + '">' + wards[index].ward_name + '</option>')
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
}