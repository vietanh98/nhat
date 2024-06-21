//Hàm thêm user
$(function () {

    $('#form-create-customer').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/customer/post-create-customer',
            data: $('#form-create-customer').serialize(),
            success: function (data) {
                if (data.success == true) {
                    swal({
                        text: 'Đăng ký tài khoản thành công',
                        icon: 'success'
                    }).then(function () {
                        window.location.replace('/JapanCosmetic');
                    });
                    // window.location.replace('/admin/user/list');

                } else {
                    var email = data.error_email;
                    console.log(email);
                    if (email) {
                        $('#exist_email').html('<p>' + email + '</p>');
                    } else {
                        $('#exist_email').html('');
                    }
                    var errors = data.errors;
                    console.log(errors);
                    var input_focus = '';
                    Object.keys(errors).forEach(function (item, key) {
                        if (input_focus == '') {
                            input_focus = item;
                        }
                        $('#errors_' + item).text(errors[item][0]);
                        $('#'+item).keyup(function () {
                            $("#errors_"+item).empty();
                        });
                    });
                    $('#errors_' + input_focus).focus();
                }
            }
        });

    });

});

