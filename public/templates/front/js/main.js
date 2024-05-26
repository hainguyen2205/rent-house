['.popular-posts-carousel', '.images-carousel'].forEach(selector => {
  new Flickity(document.querySelector(selector), {
    cellAlign: 'left',
    contain: true,
    wrapAround: true,
    autoPlay: true,
    percentPosition: selector === '.images-carousel'
  });
});
$('#table').DataTable({
  "order": [],
  "language": {
    "info": "Hiển thị từ _START_ đến _END_ của _TOTAL_ bản ghi",
    "lengthMenu": "_MENU_ bản ghi mỗi trang",
    "search": "Tìm kiếm"
  }
});
// window.addEventListener('DOMContentLoaded', () => {
//   tinymce.init({
//       selector: '#describeTextarea',
//       skin: false,
//       content_css: false
//   });
// });
var currentUrl = window.location.href;

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

submitFormIfAgree();

displayValidateNotify('#description-feedback');
displayValidateNotify('#title-feedback');

displayValidateNotifyImage();
displayValidateNotify('#titleTextarea');
displayValidateNotify('#typeHouseSelect');
displayValidateNotify('#districtSelect');
displayValidateNotify('#wardSelect');
displayValidateNotify('#acreageInput');
displayValidateNotify('#rentInput');
displayValidateNotify('#electricityPriceInput');
displayValidateNotify('#waterPriceInput');

displayValidateNotify('#nameInput');
displayValidateNotify('#passwordInput');
displayValidateNotify('#emailInput');
displayValidateNotify('#repasswordInput');
displayValidateNotify('#addressInput');
displayValidateNotify('#phonenumberInput');
displayValidateNotify('#amountInput');

//Feedback form
$('#title-feedback').on('blur keyup', function () {
  var invalidFeedback = $(this).next('.invalid-feedback');
  var titleValue = $(this).val().trim();
  if (!isNotEmpty(titleValue)) {
    updateValidationState($(this), invalidFeedback, false, 'Tiêu đề không được bỏ trống');
  } else {
    handleInputValidation($(this), invalidFeedback, validateTitleFeedback, 'Tiêu đề không quá 30 ký tự');
  }
});

$('#description-feedback').on('blur keyup', function () {
  var invalidFeedback = $(this).next('.invalid-feedback');
  var titleValue = $(this).val().trim();
  if (!isNotEmpty(titleValue)) {
    updateValidationState($(this), invalidFeedback, false, 'Nôi dụng không được bỏ trống');
  } else {
    handleInputValidation($(this), invalidFeedback, validateDescriptionFeedback, 'Nội dung không quá 255 ký tự');
  }
});

//Post form
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

//User form
$('#phonenumberInput').on('blur keyup', function () {
  handleInputValidation($(this), $('#phonenumberFeedback'), validatePhoneNumber, 'Số điện thoại không hợp lệ');
});
$('#emailInput').on('blur keyup', function () {
  handleInputValidation($(this), $('#emailFeedback'), validateEmail, 'Địa chỉ email không hợp lệ');
});

$('#nameInput').on('keyup blur', function () {
  handleInputValidation($(this), $('#nameFeedback'), validateName, 'Tên cá nhân không hợp lệ');
});

$('#passwordInput').on('keyup blur', function () {
  handleInputValidation($(this), $('#passwordFeedback'), validatePassword, 'Độ dài mật khẩu từ 5 đến 16 ký tự');
});

$('#repasswordInput').on('keyup blur', function () {
  var repasswordInput = $(this);
  var originalPassword = $('#passwordInput').val().trim();
  handleInputValidation(repasswordInput, $('#repasswordFeedback'), function (password) {
    return password === originalPassword;
  }, 'Nhập lại mật khẩu không chính xác');
});


// Validation Form
function defaulValidate() {
  return true;
}
function validateEmail(email) {
  const regix = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return regix.test(String(email).toLowerCase());
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
function validateTitleFeedback(title) {
  return title.trim().length <= 30;
}
function validateDescriptionFeedback(title) {
  return title.trim().length <= 255;
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
function showConfirmForm(id_post, action) {
  $('#id_post').val(id_post);
  if (action == 'hide') {
    $('#title-action').text('Bạn có chắc chắn muốn ẩn tin này')
    $('#confirmBtn').text('Ẩn tin')
    $('#action-form').attr('action', '/post/hide');
  }
  if (action == 'delete') {
    $('#title-action').text('Bạn có chắc chắn muốn xóa tin này')
    $('#confirmBtn').text('Xóa tin')
    $('#action-form').attr('action', '/post/delete');
  }

}

// Ajax Upload Image
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
              // $('#preview-img').append('<img class="mx-1 mb-2" src="' + url_array[index] + '" alt="">');
              // $('#preview-img').append('<input type="hidden" name="images[]" value="' + url_array[index] + '">');
              var html = '<div class="position-relative mx-1 mb-2">' +
                '<div onclick="removeImage(this)" class="btn-remove-img">' +
                '<i class="text-white bi bi-x"></i>' +
                '</div>' +
                '<div class="w-100">' +
                '<img class="object-fit-cover" src="' + url_array[index] + '" alt="">' +
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
function submitFormIfAgree() {
  if ($('#agree-checkbox').prop('checked')) {
    $('#submit-btn').prop('disabled', false);
  }
  else $('#submit-btn').prop('disabled', true);
}
$('#agree-checkbox').on('change', function () {
  if ($(this).prop('checked')) {
    $('#submit-btn').prop('disabled', false);
  }
  else $('#submit-btn').prop('disabled', true);
})
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

$('#wardSelect').on('change', function () {
  var invalidFeedback = $(this).next('.invalid-feedback');
  handleInputValidation($(this), invalidFeedback, defaulValidate, "Vui lòng chọn địa chỉ.");
})
$('#typeHouseSelect').on('change', function () {
  var invalidFeedback = $(this).next('.invalid-feedback');
  handleInputValidation($(this), invalidFeedback, defaulValidate, "Vui lòng chọn loại nhà.");
})

// Ajax Get Ward's Name
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

$('#districtSelect').on('change', function () {
  var idDistrict = $(this).val();
  var wardSelect = '#wardSelect';
  var invalidFeedback = $(this).next('.invalid-feedback');
  handleInputValidation($(this), invalidFeedback, defaulValidate, "Vui lòng chọn địa chỉ.");
  fetchWards(idDistrict, wardSelect);
});

$('#districtSelect2').on('change', function () {
  var idDistrict = $(this).val();
  var wardSelect = '#wardSelect2';
  fetchWards(idDistrict, wardSelect);
});

function toggleDropdown(element) {
  var dropdown = $(element).find('.custom-dropdown');
  var dropdownVisible = dropdown.hasClass('show');

  if (dropdownVisible) {
    dropdown.removeClass('show');
  } else {
    $('.custom-dropdown').removeClass('show');
    dropdown.addClass('show');
  }
}
$('.filter-post').click(function (event) {
  event.stopPropagation();
  toggleDropdown(this);
});
$('.custom-dropdown').click(function (event) {
  event.stopPropagation();
});

$(document).click(function () {
  $('.custom-dropdown').removeClass('show');
});

$('#orderby-btn').on('click', function () {
  var isDropdownMenuVisible = $('#orderby-menu').hasClass('show');
  if (!isDropdownMenuVisible) $('#orderby-menu').addClass('show');
  else $('#orderby-menu').removeClass('show')
});

function orderByPosts(key) {
  var url = new URL(window.location.href);
  if (url.searchParams.has('orderby')) {
    url.searchParams.delete('orderby');
  }
  url.searchParams.set('orderby', key);
  window.location.href = url.toString();
}





