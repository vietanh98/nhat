<section>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 map-face">
                    <div class="fb-page"
                         data-href="https://www.facebook.com/Order-h&#xe0;ng-auth-ch&#xed;nh-h&#xe3;ng-gi&#xe1;-r&#x1ebb;-527041391082817/"
                         data-tabs="timeline" data-width="300" data-height="189" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                         data-show-facepile="true"><blockquote cite="https://www.facebook.com/Order-h&#xe0;ng-auth-ch&#xed;nh-h&#xe3;ng-gi&#xe1;-r&#x1ebb;-527041391082817/"
                         class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Order-h&#xe0;ng-auth-ch&#xed;nh-h&#xe3;ng-gi&#xe1;-r&#x1ebb;-527041391082817/">Order hàng auth chính hãng giá rẻ</a></blockquote>
                    </div>
                </div>
                <div class="col-md3 mxh">
                    <a href="https://www.facebook.com/"><img src="{{asset('pageSale/img/facebook_icon.jpg')}}"
                                                             alt="Image"></a>
                    <a href="http://tweeter.com/"><img src="{{asset('pageSale/img/tweeter_icon.jpg')}}" alt="Image"></a>
                    <a href="https://www.google.com/"><img src="{{asset('pageSale/img/google_icon.jpg')}}" alt="Image"></a>
                    <a href=""><img src="{{asset('pageSale/img/in_icon.jpg')}}" alt="Image"></a>
                    <a href="https://www.youtube.com/?gl=VN"><img src="{{asset('pageSale/img/youtube_icon.jpg')}}"
                                                                  alt="Image"></a>
                </div>
                <div class="col-md-3 information" style="padding-left: 90px;">
                    <p>Thông tin liên hệ</p>
                    <ul>
                        <li>
                            <a href="">Giới thiệu</a>
                        </li>
                        <li>
                            <a href="">Kho mẫu</a>
                        </li>
                        <li>
                            <a href="">Chính sách</a>
                        </li>
                        <li>
                            <a href="">Hình thức thanh toán</a>
                        </li>
                        <li>
                            <a href="">Lợi ích khách hàng</a>
                        </li>
                        <li>
                            <a href="">FAQS</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 contact-footer" style="padding-left: 75px;">
                    <p>Liên hệ</p>
                    <ul>
                        <li>
                            <span style="font-weight: 600;">TPHCM</span>
                            <img src="{{asset('pageSale/img/viber-24.png')}}" alt="Image"
                                 style="width:18px; height:18px;margin-left: 50px;">
                            <img src="{{asset('pageSale/img/zalo-icon.jpg')}}" alt="Image"
                                 style="width:18px; height:18px;">
                            <p style="font-size: 14px;padding-top: 7px; text-transform: none;font-weight: 100;">
                                Mr.ViệtAnh<b style="color: red;"> 0988459063</b></p>
                        </li>
                        <li>
                            <span style="font-weight: 600;">Hà Nội</span>
                            <img src="{{asset('pageSale/img/viber-24.png')}}" alt="Image"
                                 style="width:18px; height:18px;margin-left: 50px;">
                            <img src="{{asset('pageSale/img/zalo-icon.jpg')}}" alt="Image"
                                 style="width:18px; height:18px;">
                            <p style="font-size: 14px;padding-top: 7px; text-transform: none;font-weight: 100;">
                                Mr.Tích<b style="color: red;"> 0903 935 666</b></p>
                        </li>
                        <li>
                            <span style="font-weight: 600;">Đà Nẵng</span>
                            <img src="{{asset('pageSale/img/viber-24.png')}}" alt="Image"
                                 style="width:18px; height:18px;margin-left: 50px;">
                            <img src="{{asset('pageSale/img/zalo-icon.jpg')}}" alt="Image"
                                 style="width:18px; height:18px;">
                            <p style="font-size: 14px;padding-top: 7px; text-transform: none;font-weight: 100;">
                                Mr.Phúc<b style="color: red;"> 0903 935 666</b></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- carousel slide -->
<script src="{{asset('pageSale/slider/docs/assets/vendors/jquery.min.js')}}"></script>
<script src="{{asset('pageSale/slider/dist/owl.carousel.min.js')}}"></script>
<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script src="{{asset('backend/js/pageSale/postPageSale.js')}}"></script>
<script src="{{asset('backend/js/zoomerang.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{--add link--}}
<script>
    $('.owl-carousel').owlCarousel({
        margin: 10,
        loop: true,
        autoWidth: true,
        items: 5,
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        dots: false
    });
</script>
<!-- Modal -->
<script type="text/javascript">

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    // Initialize popover component
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>
<script>
    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("top-menu").style.top = "0px";
        } else {
            document.getElementById("top-menu").style.top = "145px";
        }
    }
</script>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>
{{--<script>--}}
{{--    $(document).ready(function(){--}}
{{--        $('#btn-show').click(function(){--}}
{{--            $('#myImg').hide();--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
<script>
    Zoomerang
        .config({
            maxHeight: 400,
            maxWidth: 400,
            bgColor: '#000',
            bgOpacity: .85,
            onOpen: openCallback,
            onClose: closeCallback,
            onBeforeOpen: beforeOpenCallback,
            onBeforeClose: beforeCloseCallback
        })
        .listen('.zoom')

    function openCallback (el) {
        console.log('zoomed in on: ')
        console.log(el)
    }

    function closeCallback (el) {
        console.log('zoomed out on: ')
        console.log(el)
    }

    function beforeOpenCallback (el) {
        console.log('on before zoomed in on:')
        console.log(el)
    }

    function beforeCloseCallback (el) {
        console.log('on before zoomed out on:')
        console.log(el)
    }

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=2428682397240341&autoLogAppEvents=1"></script>
<script src="{{asset('backend/js/addToCart.js')}}"></script>
<script>
    $(".update-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        var parent_row = ele.parents("tr");

        var quantity = parent_row.find(".quantity").val();

        var product_subtotal = parent_row.find("span.product-subtotal");

        var cart_total = $(".cart-total");

        var loading = parent_row.find(".btn-loading");

        loading.show();

        $.ajax({
            url: '/JapanCosmetic/updateCart',
            method: "patch",
            data: {_token: '{{ csrf_token() }}',
                id: ele.attr("data-id"), quantity: quantity},
            dataType: "json",
            success: function (response) {

                loading.hide();

                $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                $("#header-bar").html(response.data);

                product_subtotal.text(response.subTotal);

                cart_total.text(response.total);
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        var parent_row = ele.parents("tr");

        var cart_total = $(".cart-total");

        if(confirm("Are you sure")) {
            $.ajax({
                url: '/JapanCosmetic/removeCart',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                dataType: "json",
                success: function (response) {

                    parent_row.remove();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                    $("#header-bar").html(response.data);

                    cart_total.text(response.total);
                }
            });
        }
    });

</script>

