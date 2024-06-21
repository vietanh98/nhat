{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"--}}
{{--      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
<style>
    .tborder, .woocommerce .checkout h3, h1.page-title:not(.title) {
        font-family: UTMFlavour;
        text-align: left;
        padding: 5px 0;
        color: #ec5598;
        font-size: 18px;
        text-transform: uppercase;
        font-weight: 600;
        margin: 0;
    }

    .tborder:after, .woocommerce .checkout h3:after, h1.page-title:not(.title):after {
        content: "";
        display: block;
        height: 2px;
        width: 50px;
        margin: 5px 0;
        background-color: #ec5598;
    }

    #sidebar-right ul {
        padding-left: 0px;
    }

    .woocommerce ul.cart_list, .woocommerce ul.product_list_widget {
        list-style: none outside;
        padding: 0;
        margin: 0;
    }

    #sidebar-right ul li {
        border-bottom: 1px dotted #cfcfcf;
        list-style-type: none;
    }

    .woocommerce ul.cart_list li, .woocommerce ul.product_list_widget li {
        padding: 4px 0;
        margin: 0;
        list-style: none;
    }

    .woocommerce ul.cart_list li img, .woocommerce ul.product_list_widget li img {
        width: 90px;
        float: left;
        margin-right: 4px;
        margin-left: 0;
    }

    .woocommerce ul.cart_list li img, .woocommerce ul.product_list_widget li img {
        float: right;
        margin-left: 4px;
        width: 32px;
        height: auto;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    #sidebar-right ul li a {
        line-height: 1.4;
        color: #4d4d4d;
        display: block;
        padding: 5px 0;
    }

    .woocommerce ul.cart_list li, .woocommerce ul.product_list_widget li {
        padding: 4px 0;
        margin: 0;
        list-style: none;
    }

    .product_list_widget li .amount {
        color: #ec5598;
        font-size: 16px;
        font-weight: 600;
    }

    .woocommerce ul.cart_list li::after, .woocommerce ul.product_list_widget li::after {
        clear: both;
    }

    .woocommerce ul.cart_list li::after, .woocommerce ul.cart_list li::before, .woocommerce ul.product_list_widget li::after, .woocommerce ul.product_list_widget li::before {
        content: ' ';
        display: table;
    }
</style>
<div class="col-12">
    <div class="col-12" id="sidebar-right" style="background-color: #f5f5f5">
        <aside id="woocommerce_products-2" class="widget woocommerce widget_products"><h4 class="tborder bg-title">Sản phẩm
                Mới nhất</h4>
            <ul class="product_list_widget">
                @foreach($newProduct as $item)
                    <li>
                        <div class="wgp_pro">
                            <a href="https://rbvietnam.com/product/bo-san-pham-tre-hoa-lan-da-daily-beauty-age-away-vitalizing">
                                <img width="300" height="300"
                                     src="{{asset('image/'.$item->product_image)}}"
                                     class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" style="width: 90px; height: 90px"> <span class="product-title">{{$item->product_name}}</span>
                            </a>
                            <span class="wrap_price"><span class="woocommerce-Price-amount amount">{{$item->product_price}}<span
                                        class="woocommerce-Price-currencySymbol">₫</span></span></span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </aside>
        <div class="clearfix"></div>
            <aside id="news-posts-2" class="widget dns_recent_entries" style="margin-top: 100px"><h4 class="tborder bg-title">Chuyên gia tư vấn</h4>
                <ul class="dns_recent_posts dns_list_style">
                    <li>
                        <a href="https://rbvietnam.com/diem-mat-5-toner-lam-sach-kiem-tri-mun-luon-trong-tinh-trang-het-hang-vi-qua-hot.html">Điểm
                            mặt 5 toner làm sạch kiêm trị mụn luôn trong tình trạng hết hàng vì quá hot!</a>
                    </li>
                    <li>
                        <a href="https://rbvietnam.com/bo-tui-ngay-3-cach-lam-trang-da-cap-toc-chang-so-bat-nang-trong-ngay-he-nay.html">Bỏ
                            túi ngay 3 cách giúp trắng da cấp tốc chẳng sợ bắt nắng trong ngày hè này</a>
                    </li>
                    <li>
                        <a href="https://rbvietnam.com/can-do-loi-hai-triet-long-vinh-vien-bang-phuong-phap-tu-nhien-va-cong-nghe-cao.html">Cân
                            đo lợi hại: triệt lông vĩnh viễn bằng phương pháp tự nhiên và công nghệ cao</a>
                    </li>
                </ul>
            </aside>
    </div>
</div>

