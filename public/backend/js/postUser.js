//Hàm thêm user
$(function () {

    $('#form-create-user').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/admin/user/post-create-user',
            data: $('#form-create-user').serialize(),
            success: function (data) {
                if (data.success == true) {
                    // window.location.replace('/admin/user/list');
                    swal({
                        text: 'Thêm người dùng thành công',
                        icon: 'success'
                    }).then(function () {
                        window.location.replace('/admin/user/list');
                    });
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
                    });
                    $('#errors_' + input_focus).focus();
                }
            }
        });

    });

});

//Hàm hiển thị hình ảnh
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        // console.log(reader);
        reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
                $('#image').attr('style', 'display:block');
            }
        }
        reader.readAsDataURL(input.files[0]);
    }

$("#avatar").change(function () {
    readURL(this);
});

// function removeMessageError(event) {
//     var input_name = event.target.name;
//     $("#errors_" + input_name).empty();
// }

//Hàm upload file
$(function () {
    $("#avatar").change(function () {

        var fd = new FormData();
        var files = $('#avatar')[0].files[0];
        fd.append('avatar', files);

        $.ajax({
            url: '/admin/user/upload-image',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            success: function (fd) {
                if (fd != '') {
                    $('#img').val(fd.filename);
                } else {
                    alert('upload error')
                }
            },
        });

    });
});
$(function (event) {
    // var input_name = event.target.name;
    // console.log(input_name);
    $("#name").keyup(function () {
        $("#errors_name").empty();
    });
    $("#email").keyup(function () {
        $("#errors_email").empty();
    });
    $("#password").keyup(function () {
        $("#errors_password").empty();
    });
    $("#confirmPassword").keyup(function () {
        $("#errors_confirmPassword").empty();
    });
    $("#address").keyup(function () {
        $("#errors_address").empty();
    });
    $("#phone").keyup(function () {
        $("#errors_phone").empty();
    });
    $("#email").keyup(function () {
        $("#exist_email").empty();
    });
});

//update User


//delete user
$(function () {

    $('.delete_form').on('submit', function (e) {

        e.preventDefault();
        // var inputData = $(this).serialize(id);
        var id = $('#get-id').attr('data-id');
        console.log(id);
        // console.log(id);
        swal({
            title: "Bạn chắc chắn xóa người dùng này chứ",
            text: "Nếu bạn xóa người dùng này thì bạn sẽ không lấy lại được",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "/admin/user/delete-user/" + id,
                    type: 'DELETE', // Just delete Latter Capital Is Working Fine
                    dataType: "JSON",
                    data: id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    success: function (data) {
                        if (data.success == true) {
                            swal("Xóa người dùng thành công", {
                                icon: "success",
                            }).then(function () {
                                window.location.replace('/admin/user/list');
                            });
                        }
                    }
                });

            }
        });


    });

});




