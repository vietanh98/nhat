@extends('PageSale.main')
@section('content')
    <section class="detail-product" style="margin-top: 80px">
        <div class="container">
            @foreach($getData as $data)
                <div class="breadcrumb-wp">
                    <ol class="breadcrumb">
                        <li><a class="pink" href="#"><i
                                    class="glyphicon glyphicon-home"></i>{{!empty($data) ? $data->product_name:null}} /</a>
                        </li>
                        <li>
                            <a href="https://studionoithat.com/ghe"></a>{{!empty($data) ? $data->product_description:null}}
                        </li>
                        <li class="active"></li>
                    </ol>
                </div>
                <div class="row">
                    <div class="category-list col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="left-column-block">
                            <div class="title-left-menu">
                                <h3>Danh mục sản phẩm</h3>
                            </div>
                            <div class="menu-left">
                                <div class="menu-category nav navbar">
                                    <ul class="navbar-nav">
                                        @foreach($dataProduct as $item)
                                            <li class="nav-item">
                                                <a id="parent-id-7" data-cat-id="7" data-option="off"
                                                   href="{{route('JapanCosmetic.product.category', $item->cate_id)}}">{{$item->category_name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="quick-view-wp product-detail-wp">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                    <div class="slider-product-wp">
                                        <div class="gallery">
                                            <div class="full">
                                                <img alt=""
                                                     src="{{secure_asset('image/'.$data->product_image)}}"
                                                     style="display: inline;" class="zoom">
                                            </div>
                                            <div class="clear"></div>
                                            <div class="previews">
                                                <ul>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <form action="https://studionoithat.com/cart/add-to-cart" id="add-to-cart"
                                          method="post"
                                          accept-charset="utf-8">
                                        <input type="hidden" name="cartkey" value="">
                                        <input type="hidden" name="id" value="2309">
                                        <div class="des-product-wp">
                                            <h1 class="title-des">{{!empty($data) ? $data->product_name:null}}</h1>
                                            <p class="status">Tình trạng : <span
                                                    class="pink"><?php if ($data->product_status == 1) {
                                                        echo "còn hàng";
                                                    } else {
                                                        echo "hết hàng";
                                                    }?></span></p>
                                            <p class="status">Mã sản phẩm : <span
                                                    class="pink">{{!empty($data) ? $data->product_code:null}}</span></p>
                                            <p class="status">Giảm giá : <span
                                                    class="pink">{{!empty($data) ? $data->product_discount:null}} %</span></p>
                                            <hr>
                                            <div class="product-price-block">
                                                <p class="product-price ">
                                                    ₫ <?php
                                                    $price = ($data->product_price- ($data->product_price*$data->product_discount)/100);
                                                    echo number_format($price) ?></p>
                                            </div>
                                            <hr>


                                            <div class="form-inline button-product-detail">
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity"
                                                           style="width: 65px" value="1" min="1"/>
                                                    <a class="btn btn-cart  add-to-cart" product-detail="1"
                                                       href="{{route('JapanCosmetic.addCart',$data->product_id)}}"
                                                       data-id="{{ $data->product_id }}"><i
                                                            class="fa fa-cart-plus"></i> Đặt mua hàng</a>
                                                    <i class="fa fa-circle-o-notch fa-spin btn-loading"
                                                       style="font-size:24px; display: none"></i>
                                                </div>
                                                <div class="form-group">
                                                    <a class="btn btn-wishlist" style="margin-right:0px"><i
                                                            class="fa fa-heart-o"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="row">

                                <div class="short-des col-sm-12 col-xs-12">
                                    <ul class="nav nav-tabs" style="font-size:17px">
                                        <li class="nav active"><a href="#produc-des" data-toggle="tab"
                                                                  aria-expanded="true"> Mô
                                                tả sản phẩm</a></li>
                                        <li class="nav"><a href="#tab-gh" data-toggle="tab" aria-expanded="false"> Giao
                                                hàng </a></li>
                                        <li class="nav"><a href="#tab-th" data-toggle="tab" aria-expanded="false"> Trả
                                                hàng </a>
                                        </li>
                                        <li class="nav"><a href="#tab-bh" data-toggle="tab" aria-expanded="false"> Bảo
                                                hành </a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content" style="margin-top:15px; margin-bottom:10px">
                                        <div class="tab-pane fade active in" id="produc-des">
                                            <h2>{{!empty($data) ? $data->product_description:null}}.</h2>
                                        </div>
                                        <div class="tab-pane fade" id="tab-gh">
                                            <div align="justify">
                                                <p>
                                                    <font color="#ff00ff"><strong>I. Vận chuyển/
                                                            shipping</strong></font></p>
                                                <p>
                                                    <font color="#ff00ff"><strong>A. Gói tiết kiệm:</strong> </font><br>
                                                    <br>
                                                    - Địa điểm: nơi xe tải 2 tấn (hẻm rộng &gt; 5m) có thể vào được.</p>
                                                <p>
                                                    - Đưa hàng nặng, cồng kềnh lên lầu cao ( hoặc chung cư bằng thang
                                                    bộ): Quý
                                                    Khách xin vui lòng sử dụng gói giao theo yêu cầu ở dưới đây<br>
                                                    - Thời gian giao hàng: trong vòng 5 ngày đối với nội thành ( 12 ngày
                                                    đối với
                                                    ngoại tỉnh) kể từ ngày xác nhận đơn hàng. Bộ phận giao hàng sẽ thông
                                                    báo giờ
                                                    giao hàng trước 1 ngày. <br>
                                                    <br>
                                                    <strong><font color="#ff00ff">B. Gói dịch vụ: </font></strong><br>
                                                    - Địa điểm giao hàng: đường cấm xe tải, vào hẻm nhỏ, hoặc khiêng vác
                                                    lên
                                                    tầng lầu cao cần ít nhất 2 người.</p>
                                                <p>
                                                    - Thời gian giao hàng: giao ngay trong ngày theo giờ yêu cầu nếu
                                                    hàng có sẵn
                                                    tại kho trung chuyển.</p>
                                                <p>
                                                    &nbsp;</p>
                                                <p>
                                                    <font color="#ff00ff"><strong>2. Lắp ráp/
                                                            installation</strong></font>
                                                </p>
                                                <p>
                                                    - Giá vận chuyển trên đây đã gồm kèm dịch vụ lắp ráp miễn phí đối
                                                    với các
                                                    thành phố có kho trung chuyển.
                                                </p>

                                                <p>
                                                    - QUý khách cần các dịch vụ khác như khoan bắt lên tường, tháo bỏ đồ
                                                    cũ, cắt
                                                    thêm kính... Quý khách vui lòng liên hệ trước với chúng tôi để biết
                                                    chi phí
                                                    cụ thể.
                                                </p>
                                                <p>
                                                    <font color="#ff00ff">* Thông tin hữu ích: </font>Tất cả các sản
                                                    phẩm đồ gỗ
                                                    tại Studionoithat.com được thiết kế theo tiêu chuẩn quốc tế. Các
                                                    liên kết,
                                                    lỗ ốc vít, số lượng ốc cũng được thiết kế và tính toán chính xác để
                                                    mọi
                                                    người đều có thể tự mình lắp ráp một cách dễ dàng.
                                                </p>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-th">
                                            <p align="justify">
                                                Đổi trả khi hàng hóa không đúng chất lượng công bố</p>
                                            <p align="justify">
                                                Để đảm bảo quyền lợi của khách hàng và trách nhiệm của bên vận chuyển,
                                                khách
                                                hàng cần kiểm tra hàng hóa kỹ khi nhận hàng. Ngay khi nhận hàng, Quý
                                                khách có
                                                thể yêu cầu đổi hàng nếu hàng không đảm bảo chất lượng.</p>
                                            <p align="justify">
                                                Đổi trả khi không phù hợp với căn nhà</p>
                                            <p align="justify">
                                                Ngay khi giao hàng, Quý khách vẫn có thể trả hàng nếu sản phẩm không phù
                                                hợp với
                                                nội thất chung, Quý Khách sẽ phải thanh toán chi phí vận chuyển:</p>
                                            <p align="justify">
                                                + Chi phí vận chuyển. Trong trường hợp Quý khách đổi ý sau&nbsp; khi xe
                                                giao
                                                hàng đã đi thì Quý khách sẽ phải trả chi phí vận chuyển 2 chiều ( chiều
                                                đi và
                                                chiều về) để công ty điều xe khác đến lấy lại hàng. Lưu ý, khi trả lại
                                                hàng, bao
                                                bì và linh kiện kèm theo phải đầy đủ. Chi phí bao bì trên thị trường
                                                hiện nay
                                                rất đắt ( thường 1 thùng carton lớn khoảng hơn 100.000 Đ) do vậy, cần
                                                bảo quản
                                                kỹ thùng khi quyết định trả hàng.</p>
                                            <p align="justify">
                                                + Quý khách sẽ không được trả lại tiền hàng sau khi đã hoàn tất thanh
                                                toán.</p>

                                            <p align="justify">
                                                <font style="font-weight: bold; color: rgb(255, 0, 255);">Trường hợp
                                                    không được
                                                    trả hàng</font></p>
                                            <p align="justify">
                                                Trong bất kể trường nào sau khi hoàn tất việc giao hàng và thanh toán
                                                tiền mua
                                                hàng, chúng tôi không chấp thuận việc đổi hay trả hàng do đã hoàn tất
                                                việc thanh
                                                toán cho nhà máy.</p>
                                            <p align="justify">
                                                Trường hợp sản phẩm mất bao bì, không còn nguyên vẹn hoặc hư hỏng do lỗi
                                                khách
                                                hàng Studionoithat.com có quyền từ chối việc trả hàng như trên.</p>
                                        </div>
                                        <div class="tab-pane fade" id="tab-bh">
                                            <p>
                                                <strong>Thời hạn bảo hành theo quy định của nhà máy</strong></p>
                                            <p>
                                                Mọi sản phẩm của chúng tôi được bảo hành trong vòng 6 tháng kể từ ngày
                                                ghi trên
                                                phiếu giao hàng.</p>
                                            <p>
                                                <strong>Các lỗi được bảo hành trong 6 tháng</strong></p>
                                            <p>
                                                a. Gãy vỡ do thiết kế hoặc có lỗi trong quá trình sản xuất. Không bảo
                                                hành nếu
                                                sử dụng sản phẩm sai mục đích.</p>
                                            <p>
                                                b. Sơn bị bong tróc do không dính vào gỗ.</p>
                                            <p>
                                                c. Sản phẩm bị mối mọt ăn từ phía trong gỗ ra.</p>
                                            <p>
                                                <strong>Phương thức bảo hành</strong></p>
                                            <p>
                                                Tùy theo mức độ hư hỏng chúng tôi sẽ tiến hành theo thứ tự các ưu tiên
                                                như
                                                sau:</p>
                                            <p>
                                                1. Sơn dặm, sửa, gia cố sản phẩm: thực hiện trong vòng 1 tuần</p>
                                            <p>
                                                2. Đổi sản phẩm tương tự: thực hiện trong vòng 2 tuần nếu sản phẩm đang
                                                có sẵn
                                                hàng trên web.</p>
                                            <p>
                                                3. Hoàn lại tiền sản phẩm không gồm phí vận chuyển: thực hiện trong vòng
                                                1 tháng
                                                kể từ ngày thông báo không còn hàng để thay thế.</p>
                                            <p>
                                                <strong>Thủ tục bảo hành</strong></p>
                                            <p>
                                                1. Liên hệ với bộ phận bán hàng để cung cấp các thông tin: thông tin
                                                liên hệ,
                                                lỗi bị hư hỏng, mã số đơn hàng.</p>
                                            <p>
                                                2. Sản phẩm chỉ được bảo hành tại nhà máy. Chúng tôi sẽ thu xếp hẹn ngày
                                                nhận
                                                sản phẩm để bảo hành trong vòng 7 ngày. Chúng tôi không chịu chi phí vận
                                                chuyển
                                                nhận và đổi sản phẩm bảo hành. Chi phí vận chuyển tính theo chính sách
                                                tính phí
                                                vận chuyển giao hàng tiêu chuẩn.</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
