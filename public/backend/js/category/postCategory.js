//Hàm thêm user
$(function () {

    $('#form-create-category').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/admin/category/post-create-category',
            data: $('#form-create-category').serialize(),
            success: function (data) {
                if (data.success == true) {
                    // window.location.replace('/admin/user/list');
                    swal({
                        text: 'Thêm danh mục thành công',
                        icon: 'success'
                    }).then(function () {
                        window.location.replace('/admin/category/list');
                    });
                } else {
                    var errors = data.errors;
                    console.log(errors);
                    var input_focus = '';
                    Object.keys(errors).forEach(function (item, key) {
                        if (input_focus == '') {
                            input_focus = item;
                            console.log(input_focus);
                        }
                        $('#errors_' + item).text(errors[item][0]);
                    });
                    $('#errors_' + input_focus).focus();
                }
            }
        });

    });

});
//Hàm update danh mục
$(function () {

    $('#form-update-category').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/admin/category/post-update',
            data: $('#form-update-category').serialize(),
            success: function (data) {
                if (data.success == true) {
                    swal({
                        text: "Sửa danh mục thành công",
                        icon: "success"
                    }).then(function () {
                        window.location.replace('/admin/category/list');
                    });
                } else {
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

//Hàm xóa danh mục
$(function () {

    $('.form-delete-category').on('submit', function (e) {

        e.preventDefault();
        // var inputData = $(this).serialize(id);
        var id = $('#get-id').attr('data-id');
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
                    url: "/admin/category/delete-category/" + id,
                    type: 'DELETE', // Just delete Latter Capital Is Working Fine
                    dataType: "JSON",
                    data: id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    success: function (data) {
                        if (data.success == true) {
                            swal("Xóa người dùng thành công", {
                                icon: "success",
                            }).then(function () {
                                window.location.replace('/admin/category/list');
                            });
                        }
                    }
                });

            }
        });

    });

});
