//Hàm update user
$(function () {

    $('#form-update-user').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/admin/user/post-update',
            data: $('#form-update-user').serialize(),
            success: function (data) {
                if (data.success == true) {
                    // $('#message_success').html('<p style="\n' +
                    //     '    color: aliceblue;\n' +
                    //     '    font-size: 20px;\n' +
                    //     '    background: royalblue;\n' +
                    //     '    padding: 30px;\n' +
                    //     '    font-family: none;">'+data.message+'</p>');
                    swal({
                        text: "Sửa Người dùng thành công",
                        icon:"success"
                    }).then(function(){
                        window.location.replace('/admin/user/list');
                    });
                }
                else{
                    var errors = data.errors;
                    console.log(errors);
                    var input_focus = '';
                    Object.keys(errors).forEach(function (item, key) {
                        if (input_focus == '') {
                            input_focus = item;
                        }
                        $('#errors_' + item ).text(errors[item][0]);
                    });
                    $('#errors_' + input_focus).focus();
                }
            }
        });

    });

});
