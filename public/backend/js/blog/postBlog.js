//Hàm thêm user
$(function () {

    $('#form-create-blog').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/admin/blog/post-create-blog',
            data: $('#form-create-blog').serialize(),
            success: function (data) {
                if (data.success == true) {
                    // window.location.replace('/admin/user/list');
                    swal({
                        text: 'Thêm bài viết thành công',
                        icon: 'success'
                    }).then(function () {
                        window.location.replace('/admin/blog/list');
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
                        $('#'+item).keyup(function () {
                            $("#errors_" + item).empty();
                        });
                    });
                    $('#errors_' + input_focus).focus();
                }
            }
        });

    });

});
//Hàm update danh mục
$(function () {

    $('#form-update-blog').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/admin/blog/post-update',
            data: $('#form-update-blog').serialize(),
            success: function (data) {
                if (data.success == true) {
                    swal({
                        text: "Sửa bài viết thành công",
                        icon: "success"
                    }).then(function () {
                        window.location.replace('/admin/blog/list');
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

    $('.form-delete-blog').on('submit', function (e) {

        e.preventDefault();
        // var inputData = $(this).serialize(id);
        var id = $('#get-id').attr('data-id');
        // console.log(id);
        swal({
            title: "Bạn chắc chắn xóa bài viết này chứ",
            text: "Nếu bạn xóa bài viết này thì bạn sẽ không lấy lại được",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "/admin/blog/delete-blog/" + id,
                    type: 'DELETE', // Just delete Latter Capital Is Working Fine
                    dataType: "JSON",
                    data: id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    success: function (data) {
                        if (data.success == true) {
                            swal("Xóa bài viết thành công", {
                                icon: "success",
                            }).then(function () {
                                window.location.replace('/admin/blog/list');
                            });
                        }
                    }
                });

            }
        });

    });

});
