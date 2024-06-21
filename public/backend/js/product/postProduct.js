//Hàm thêm user
$(function () {

    $('#form-create-product').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/admin/product/post-create-product',
            data: $('#form-create-product').serialize(),
            success: function (data) {
                if (data.success == true) {
                    // window.location.replace('/admin/user/list');
                    swal({
                        text: 'Thêm sản phẩm thành công',
                        icon: 'success'
                    }).then(function () {
                        window.location.replace('/admin/product/list');
                    });
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
        });

    });

});

//Hàm hiển thị hình ảnh
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
            $('#image').attr('style', 'display:block');
        }
        reader.readAsDataURL(input.files[0]);
    }
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
            url: '/admin/product/upload-image',
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

//update User
//Hàm update user
$(function () {

    $('#form-update-product').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/admin/product/post-update',
            data: $('#form-update-product').serialize(),
            success: function (data) {
                if (data.success == true) {
                    swal({
                        text: "Sửa sản phẩm thành công",
                        icon:"success"
                    }).then(function(){
                        window.location.replace('/admin/product/list');
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


//delete user
$(function () {

    $('.delete_form').on('submit', function (e) {

        e.preventDefault();
        // var inputData = $(this).serialize(id);
        var id = $('#get-id').attr('data-id');
        // console.log(id);
        swal({
            title: "Bạn chắc chắn xóa sản phẩm  này chứ",
            text: "Nếu bạn xóa sản phẩm  này thì bạn sẽ không lấy lại được",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "/admin/product/delete-product/" + id,
                    type: 'DELETE', // Just delete Latter Capital Is Working Fine
                    dataType: "JSON",
                    data: id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    success: function (data) {
                        if (data.success == true) {
                            swal("Xóa sản phẩm thành công", {
                                icon: "success",
                            }).then(function () {
                                window.location.replace('/admin/product/list');
                            });
                        }
                    }
                });

            }
        });


    });

});



