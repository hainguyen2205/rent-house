['.popular-posts-carousel', '.images-carousel'].forEach(selector => {
  new Flickity(document.querySelector(selector), {
    cellAlign: 'left',
    contain: true,
    wrapAround: true,
    autoPlay: true,
    percentPosition: selector === '.images-carousel'
  });
});

// Validation Form
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
      // $('#imageInput').addClass
    } else {
      $('#label-image').addClass('btn-outline-danger');
    }
  }
}

function displayValidateNotify(input) {
  var invalidFeedback = $(input).next('.invalid-feedback');
  if (invalidFeedback.text() != '') {
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

$('#phonenumberInput').on('blur keyup', function () {
  handleInputValidation($(this), $('#phonenumberFeedback'), validatePhoneNumber, 'Số điện thoại không hợp lệ');
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

// End Validation Form

// Ajax Upload Image
$('#imageInput').on('change', function () {
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
            $('#preview-img').append('<img class="mx-1 mb-2" src="' + url_array[index] + '" alt="">');
            $('#preview-img').append('<input type="hidden" name="images[]" value="' + url_array[index] + '">');
          }
        }
      }
    },
    error: function (xhr, status, error) {
      console.error(xhr.responseText);
    }
  });
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

$('#wardSelect').on('change', function () {
  var invalidFeedback = $(this).next('.invalid-feedback');
  handleInputValidation($(this), invalidFeedback, defaulValidate, "Vui lòng chọn địa chỉ.");
})
// Ajax Get Ward's Name
$('#districtSelect').on('change', function () {
  var invalidFeedback = $(this).next('.invalid-feedback');
  handleInputValidation($(this), invalidFeedback, defaulValidate, "Vui lòng chọn địa chỉ.")
  if ($(this).val() != '') {
    $.ajax({
      url: '/address/getwards',
      type: 'GET',
      data: {
        id_district: $(this).val()
      },
      success: function (response) {
        wards = response.wards;
        $('#wardSelect').children('option:not([value=""])').remove();
        for (let index = 0; index < wards.length; index++) {
          $('#wardSelect').append('<option value="' + wards[index].id + '">' + wards[index].ward_name + '</option>')
        }

      },
      error: function (xhr, status, error) {
        console.error(error);
      }
    });
  }
})
$('#districtSelect2').on('change', function () {
  if ($(this).val() != '') {
    $.ajax({
      url: '/address/getwards',
      type: 'GET',
      data: {
        id_district: $(this).val()
      },
      success: function (response) {
        wards = response.wards;
        $('#wardSelect').children('option:not([value=""])').remove();
        for (let index = 0; index < wards.length; index++) {
          $('#wardSelect').append('<option value="' + wards[index].id + '">' + wards[index].ward_name + '</option>')
        }

      },
      error: function (xhr, status, error) {
        console.error(error);
      }
    });
  }
})




