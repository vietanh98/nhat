@extends('PageSale.main')
@section('content')
    <!-- banner slider -->
    @include('PageSale.slider')
    <!-- content -->
    <section class="content">
        <div class="hotline">
            <a href="tel:0988459063" class="text-decoration-none pink">
                <span class="before-hotline">Hotline:</span>
                <span class="hotline-number">0988459063(Zalo/Viber)</span>
            </a>

        </div>
        <div class="container">
            <div class="ins-discount-badge-56" style=" background-color: #da291c;border-radius: 50%;width: 50px; height: 50px;font-weight: bold;color: white;padding-top: 12px;font-size: 17px;left: 0;top: 65%; position: absolute;
    text-align: center !important;">-50%
            </div>
            @foreach($dataProduct as $item)
                <div class="product-chair">
                    <div class="title-content">
                        <a href="#">
                            <h1>{{$item->category_name}}</h1>
                        </a>
                        <div class="line"></div>
                    </div>
                    <div class="list-product">
                        <div class="row">
                            @foreach($item->products as $data)
                                <div class="col-md-3">
                                    <div class="product-hover">
                                        <?php
                                        $discount = [
                                            '10',
                                            '20',
                                            '30',
                                            '40',
                                            '50'
                                        ];
                                        ?>
                                        @foreach($discount as $sale)
                                            @if($data->product_discount == $sale)
                                                <div class="ins-discount-badge-56" style=" background-color: #da291c;border-radius: 50%;width: 50px; height: 50px;font-weight: bold;color: white;padding-top: 12px;font-size: 17px;left: 230px;top: 5%; position: absolute;
                                                text-align: center !important; z-index: 1;">-{{$data->product_discount}}%
                                                </div>
                                            @endif
                                        @endforeach
                                        <input type="hidden" name="product-id" id='get-id'
                                               value="{{!empty($data) ? $data->product_id:null}}"/>
                                        <a href="{{route('JapanCosmetic.detailProduct',$data->product_id)}}">
                                            <img src="{{secure_asset('image/'.$data->product_image)}}" alt="Image">
                                        </a>
                                        <div class="btn-module">
                                            <i class="fa fa-search-plus"></i>
                                            <div class="clearfix"></div>
                                            <i class="fa fa-heart-o"></i>
                                            <div class="clearfix"></div>
                                            <a href="javascript:void(0);" data-id="{{ $data->product_id }}"
                                               class=" add-to-cart" role="button"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class='name-product'>
                                        <p>{{$data->product_name}}</p>
                                    </div>
                                    <div class="price" style="display: grid">
                                        @foreach($discount as $sale)
                                            @if($data->product_discount == $sale)
                                                <span>
                                                <?php
                                                    $price = ($data->product_price) - ($data->product_price * $data->product_discount) / 100;
                                                    echo number_format($price) . 'VNĐ';
                                                    ?>
                                            </span>
                                            @endif
                                        @endforeach
                                        @if($data->product_discount == 10 || $data->product_discount == 20 ||$data->product_discount == 30||$data->product_discount == 40||$data->product_discount == 50)
                                            <span style="color: #5a6268!important; text-decoration: line-through;">
                                            <?php
                                                echo number_format($data->product_price) . 'VNĐ';
                                                ?>
                                        </span>
                                        @endif
                                            @if($data->product_discount == 0)
                                                <span>
                                            <?php
                                                    echo number_format($data->product_price) . 'VNĐ';
                                                    ?>
                                        </span>
                                            @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="blog">
                    <div class="title-content">
                        <a href="#">
                            <h1>blog</h1>
                        </a>
                        <div class="line"></div>
                    </div>
                    <div class="carousel" style="padding-top: 40px;">
                        <div class="owl-carousel owl-theme">
                            <div class="item slide-bottom">
                                <a href="">
                                    <div style="overflow: hidden;">
                                        <img src="{{secure_asset('pageSale/img/san1.jpg')}}" alt="Image">
                                    </div>
                                    <span>Sân vườn tiểu cảnh đẹp cho ngôi nhà</span>
                                    <button class="btn-slide-bottom">Xem chi tiết</button>
                                </a>
                            </div>
                            <div class="item slide-bottom">
                                <a href="">
                                    <div style="overflow: hidden;">
                                        <img src="{{secure_asset('pageSale/img/noithat.jpg')}}" alt="Image">
                                    </div>
                                    <span>Nội thất phòng làm việc</span>
                                    <button class="btn-slide-bottom">Xem chi tiết</button>
                                </a>

                            </div>
                            <div class="item slide-bottom">
                                <a href="">
                                    <div style="overflow: hidden;">
                                        <img src="{{secure_asset('pageSale/img/san1.jpg')}}" alt="Image">
                                    </div>
                                    <span>Các mẫu chung cư đẹp 2018</span>
                                    <button class="btn-slide-bottom">Xem chi tiết</button>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-readmore">
                    <a href="">
                        <button>Xem thêm</button>
                    </a>
                </div>
        </div>
    </section>
@endsection
