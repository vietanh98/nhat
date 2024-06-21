<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('PageSale/css/payStyle.css')}}">
<div id="aml_pb_wrap" class="aml-box-highlight aml-highlight-item aml_pb-bottom-left "
     onclick="autoAdsMaxLeadTrackingBoxHighlight()"
     style="height: auto; width: auto; z-index: 2147483646; bottom: 16px;">
    <div class="text left"
         style="font-size: 17px; font-weight: 800; color: rgb(198, 40, 40); text-transform: uppercase;">0988459063
    </div>
    <div class="aml-icon-box call-trap right" style="width: auto; height: auto; background: rgb(198, 40, 40);">
        <div class="icon"
             style="background: url(&quot;https://cdn.autoads.asia/maxlead/themes/master/img/boxhighlight/MultiChannel/WhiteIcon/Call.svg&quot;) center center no-repeat; width: 43px; height: 43px;">
        </div>
    </div>
</div>
<form action="{{route('order.post-create-order')}}" method='POST' class="" id="form-pay"
      enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="block-pay-page">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="block-payment-info">
                        <div class="wrap-box">
                            <div class="logo">
                                <a href="https://depdepstores.com/"><img class="img-fluid"
{{--                                                                         src="https://res.cloudinary.com/novaonx2/image/upload/v1586334888/16044/asset-6%281586334887%29.png"--}}
                                                                         alt=""></a>
                            </div>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="https://depdepstores.com/gio-hang">Giỏ hàng </a>
                                </li>
                                <li class="breadcrumb-item active">Thanh toán</li>
                            </ol>
                            <div class="address_form_setting payment-info mb-3">
                                <h5 class="mb-3">Thông tin giao hàng</h5>
                                <div class="form-payment">
                                    <div class="row">
                                        <div class="col-md-6 mb-2 customer-name">
                                            <div class="form-group custom mb-3">
                                                <div class="input-item">
                                                    <input type="text" id="fullname" maxlength="60" name="customer_name"
                                                            required  data-bv-field="fullname">
                                                    <label for="name" class="text-secondary">Họ tên</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2 customer-phone">
                                            <div class="form-group custom mb-3">
                                                <div class="input-item">
                                                    <input type="text" maxlength="15" id="phone" name="phone"
                                                           required="" data-bv-field="phone">
                                                    <label for="name" class="text-secondary">Số điện thoại</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group custom mb-4">
                                        <div class="input-item full has-success">
                                            <input type="text" id="address" maxlength="50" name="address" value=""
                                                   data-bv-field="address">
                                            <label for="name" class="text-secondary">Địa chỉ</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-s customer-address">
                                            <div class="form-group mb-0">
                                                <div class="bs-select">
                                                    <div class="dropdown bootstrap-select"><select name="city_delivery"
                                                                                                   id="city_delivery"
                                                                                                   class="selectpicker"
                                                                                                   title="Tỉnh / thành"
                                                                                                   data-bv-field="city_delivery"
                                                                                                   tabindex="-98">
                                                        </select>
                                                        <button type="button"
                                                                class="btn dropdown-toggle bs-placeholder btn-light"
                                                                data-toggle="dropdown" role="button"
                                                                data-id="city_delivery" title="Tỉnh / thành"
                                                                aria-expanded="false">
                                                            <div class="filter-option">
                                                                <div class="filter-option-inner">
                                                                    <div class="filter-option-inner-inner">Tỉnh / thành
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                        <div class="dropdown-menu" role="combobox"
                                                             style="max-height: 356.9px; overflow: hidden; min-height: 116px; min-width: 208px; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -2px, 0px);"
                                                             x-placement="top-start">
                                                            <div class="inner show" role="listbox" aria-expanded="false"
                                                                 tabindex="-1"
                                                                 style="max-height: 338.9px; overflow-y: auto; min-height: 98px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="help-block" data-bv-validator="notEmpty"
                                                   data-bv-for="city_delivery" data-bv-result="NOT_VALIDATED"
                                                   style="display: none;">Vui lòng điền vào trường này.</small></div>
                                        <div class="col-md-4 col-s customer-address">
                                            <div class="form-group mb-0">
                                                <div class="bs-select">
                                                    <div class="dropdown bootstrap-select"><select class="selectpicker"
                                                                                                   title="Quận / huyện"
                                                                                                   name="district_delivery"
                                                                                                   id="district_delivery"
                                                                                                   tabindex="-98">
                                                            <option class="bs-title-option" value=""></option>
                                                        </select>
                                                        <button type="button"
                                                                class="btn dropdown-toggle bs-placeholder btn-light"
                                                                data-toggle="dropdown" role="button"
                                                                data-id="district_delivery" title="Quận / huyện"
                                                                aria-expanded="false">
                                                            <div class="filter-option">
                                                                <div class="filter-option-inner">
                                                                    <div class="filter-option-inner-inner">Quận / huyện
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                        <div class="dropdown-menu" role="combobox"
                                                             x-placement="top-start"
                                                             style="max-height: 356.9px; overflow: hidden; min-height: 0px; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -2px, 0px);">
                                                            <div class="inner show" role="listbox" aria-expanded="false"
                                                                 tabindex="-1"
                                                                 style="max-height: 338.9px; overflow-y: auto; min-height: 0px;">
                                                                <ul class="dropdown-menu inner show"></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-s customer-address">
                                            <div class="form-group mb-0">
                                                <div class="bs-select">
                                                    <div class="dropdown bootstrap-select dropup"><select
                                                            title="Phường / xã" class="selectpicker"
                                                            name="ward_delivery" id="ward_delivery" tabindex="-98">
                                                            <option class="bs-title-option" value=""></option>
                                                        </select>
                                                        <button type="button"
                                                                class="btn dropdown-toggle bs-placeholder btn-light"
                                                                data-toggle="dropdown" role="button"
                                                                data-id="ward_delivery" title="Phường / xã"
                                                                aria-expanded="false">
                                                            <div class="filter-option">
                                                                <div class="filter-option-inner">
                                                                    <div class="filter-option-inner-inner">Phường / xã
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                        <div class="dropdown-menu" role="combobox"
                                                             x-placement="top-start"
                                                             style="max-height: 371.1px; overflow: hidden; min-height: 0px; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -2px, 0px);">
                                                            <div class="inner show" role="listbox" aria-expanded="false"
                                                                 tabindex="-1"
                                                                 style="max-height: 353.1px; overflow-y: auto; min-height: 0px;">
                                                                <ul class="dropdown-menu inner show"></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="payment-info mb-3">
                                <h5>Phương thức vận chuyển</h5>
                                <div class="form-radio">
                                    <div id="delivery_methods">
                                        <div class="box-radio delivery_methods"><label class="custom-check">
                                                <input checked="" class="input payment_trans_J&amp;T Express"
                                                       type="radio" data-price="40,000" value="-1" name="payment_trans">
                                                <span>J&amp;T Express</span>
                                                <span class="checkmark"></span>
                                            </label>
                                            <span
                                                class="custom-payment payment_trans_fee_-1">30.000đ</span></div>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="payment-info mb-5" id="payment-trigger">
                                <h5>Phương thức thanh toán</h5>
                                <div class="form-radio">
                                    <div class="box-radio">
                                        <label class="custom-check">
                                            <input class="input" checked="" type="radio" value="1"
                                                   name="payment_method">
                                            <span>Thanh toán khi nhận hàng (COD)</span>
                                            <span class="checkmark"></span>
                                        </label>
                                        <span class="tip">
                                </span>
                                    </div>
                                </div>
                                <div class="form-radio mt-3">
                                    <div class="box-radio">
                                        <label class="custom-check">
                                            <input class="input" checked="" type="radio" value="2"
                                                   name="payment_method">
                                            <span>Thanh toán qua thẻ ngân hàng</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 50px">
                            <textarea style="height: 100px" class="form-control" name="order_note" rows="2" placeholder="Ghi chú"
                                      data-bv-field="order_note" required></textarea>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                        <div class="block-payment-cart" style="padding:10px">
                            <div class="wrap-box">
                                <h4 class="title">Đơn hàng (<span>{{ count((array) session('cart')) }}</span> sản phẩm)
                                </h4>
                                <div class="cart-list-product mb-3">
                                    <table class="cart-product-item">
                                        <tbody>
                                        <?php $total = 0 ?>
                                        @if(session('cart'))
                                            @foreach((array) session('cart') as $id => $details)
                                                <?php $total += $details['product_price'] * $details['product_quantity'] ?>
                                                <input type="hidden" name="product_code" value="{{$details['product_id']}}">
                                                <input type="hidden" name="product_price"
                                                       value="{{$details['product_price']}}">
                                                <input type="hidden" name="product_quantity"
                                                       value="{{$details['product_quantity']}}">
                                                <tr class="cart-product w-100">
                                                    <td class="thumb">
                                                        <img class="img"
                                                             src="{{asset('image/'.$details['product_image'])}}"
                                                             alt="">
                                                    </td>
                                                    <td class="thumb"><span class="count-cart"
                                                                            style="    position: absolute; top: -43px;left: -27px;background: #ed592a;color: wheat; border-radius: 50%;padding: 3px 10px;">{{ $details['product_quantity']}}</span>
                                                    </td>
                                                    <td class="cart-product-info">
                                                        <a class="name header-font" href="">
                                                            {{$details['product_name']}}
                                                        </a>
                                                    </td>
                                                    <td class="price">
                                                        <?php
                                                        echo number_format($details['product_price']);
                                                        ?>
                                                        đ
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="block-cart-total">
                                    <div class="item-group">
                                        <p class="title-price header-font">Giá sản phẩm:</p>
                                        <span class="price price_product_only"> <?php
                                            echo number_format($total);
                                            ?>
                                    đ</span>
                                    </div>
                                    <div class="item-group">
                                        <p class="title-price header-font"> Vận chuyển:</p>
                                        <span class="price price_trans_only">
                                    <?php
                                            $ship = 30000;
                                            echo number_format($ship);
                                            ?>
                                    đ
                                </span>
                                        <input type="hidden" id="shipping_fee" name="shipping_fee" value="40,000">
                                    </div>
                                </div>
                                <hr>
                                <div class="block-cart-total">
                                    <div class="item-group">
                                        <p class="title-price header-font">Tổng tiền:</p>
                                        <span class="price_total">
                                    <?php
                                            $total_pay = $total + $ship;
                                            echo number_format($total_pay);
                                            ?>
                                    đ
                                        <input type="hidden" name="total_money" value="{{$total_pay}}">
                                </span>
                                    </div>
                                    <div class="item-group">
                                        <p class="title-price header-font"> Khuyến mãi </p>
                                        <span class="">0đ</span>

                                    </div>
                                </div>
                                <div class="total-price">
                                    <span>Thành tiền:</span>
                                    <strong class="price_total_after_discount">
                                        <?php
                                        echo number_format($total_pay);
                                        ?>
                                        đ</strong>
                                </div>
                                <div class="form-group">
                                    <div class="input-item">
                                    </div>
                                    <div class="cart-action">
                                        <a href="{{route('JapanCosmetic.cart')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="11"
                                                 viewBox="0 0 7 11"
                                                 fill="none">
                                                <path
                                                    d="M6.75434 10.7932C6.68059 10.8588 6.59301 10.9108 6.49661 10.9463C6.40021 10.9817 6.29688 11 6.19252 11C6.08817 11 5.98484 10.9817 5.88844 10.9463C5.79203 10.9108 5.70446 10.8588 5.63071 10.7932L0.232896 6.00485C0.159065 5.93938 0.100493 5.86163 0.0605315 5.77605C0.0205696 5.69047 4.72194e-07 5.59874 4.80293e-07 5.50609C4.88392e-07 5.41345 0.0205697 5.32172 0.0605316 5.23614C0.100493 5.15056 0.159065 5.07281 0.232896 5.00734L5.63071 0.218941C5.70378 0.150784 5.79148 0.0963025 5.88865 0.0587087C5.98581 0.0211149 6.09047 0.00117069 6.19645 5.01328e-05C6.30244 -0.00107138 6.4076 0.0166555 6.50575 0.0521837C6.60389 0.0877119 6.69303 0.140323 6.76791 0.206916C6.84279 0.273511 6.9019 0.352737 6.94175 0.439928C6.98159 0.527119 7.00138 0.620511 6.99993 0.714596C6.99848 0.808681 6.97582 0.901557 6.93331 0.987748C6.89079 1.07394 6.82926 1.1517 6.75236 1.21645L1.91636 5.50609L6.75236 9.79574C6.82632 9.86109 6.88504 9.93875 6.92518 10.0243C6.96531 10.1098 6.98606 10.2015 6.98624 10.2941C6.98643 10.3868 6.96604 10.4785 6.92625 10.5642C6.88646 10.6498 6.82804 10.7277 6.75434 10.7932Z"
                                                    fill="#ED592A"></path>
                                            </svg>
                                            Quay về giỏ hàng </a>
                                        <button type="submit" class="btn btn-payment-success" onclick="">Hoàn tất đơn hàng
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="">
    $(function () {
        $('#form-pay').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '/order/post-create-order',
                data: $('#form-pay').serialize(),
                success: function (data) {
                    if (data.success == true) {
                        console.log('1234423434');
                        // window.location.replace('/admin/user/list');
                        swal({
                            text: 'Bạn đã thanh toán thành công',
                            icon: 'success'
                        }).then(function () {
                            window.location.replace('/JapanCosmetic');
                        });
                    }
                }

            });

        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
