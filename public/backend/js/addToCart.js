$(".add-to-cart").click(function (e) {
    e.preventDefault();

    var ele = $(this);

    ele.siblings('.btn-loading').show();

    $.ajax({
        url: '/JapanCosmetic/addCart' + '/' + ele.attr("data-id"),
        method: "get",
        data: {_token: '{{ csrf_token() }}'},
    dataType: "json",
        success: function (response) {
            if (response.success == true){
                swal('Bạn đã thêm thành công sản phẩm vào giỏ hàng');
            }
        ele.siblings('.btn-loading').hide();

        $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
        $("#header-bar").html(response.data);
    }
});
});
//     $(".update-cart").click(function (e) {
//         e.preventDefault();
//
//         var ele = $(this);
//
//         var parent_row = ele.parents("tr");
//
//         var quantity = parent_row.find(".quantity").val();
//
//         var product_subtotal = parent_row.find("span.product-subtotal");
//
//         var cart_total = $(".cart-total");
//
//         var loading = parent_row.find(".btn-loading");
//
//         loading.show();
//
//         $.ajax({
//             url: '/JapanCosmetic/updateCart',
//             method: "patch",
//             data: {_token: '{{ csrf_token() }}',
//                 id: ele.attr("data-id"), quantity: quantity},
//         dataType: "json",
//             success: function (response) {
//
//             loading.hide();
//
//             $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
//
//             $("#header-bar").html(response.data);
//
//             product_subtotal.text(response.subTotal);
//
//             cart_total.text(response.total);
//         }
//     });
//     });
//
// $(".remove-from-cart").click(function (e) {
//     e.preventDefault();
//
//     var ele = $(this);
//
//     var parent_row = ele.parents("tr");
//
//     var cart_total = $(".cart-total");
//
//     if(confirm("Are you sure")) {
//         $.ajax({
//             url: '/JapanCosmetic/removeCart',
//             method: "DELETE",
//             data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
//         dataType: "json",
//             success: function (response) {
//
//             parent_row.remove();
//
//             $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
//
//             $("#header-bar").html(response.data);
//
//             cart_total.text(response.total);
//         }
//     });
//     }
// });

