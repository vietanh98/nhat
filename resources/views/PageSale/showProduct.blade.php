@extends('PageSale.main')
@section('content')
    <section class="detail-product" style="margin-top: 80px">
        <div class="container-fluid">
            <div class="breadcrumb-wp">
                <ol class="breadcrumb">
                    <li><a class="pink" href="#"><i
                                class="glyphicon glyphicon-home"></i>Danh mục sản phẩm /</a>
                    </li>
                    <li><a href=""></a>{{!empty($item) ? $item->category_name:null}}
                    </li>
                    <li class="active"></li>
                </ol>
            </div>
            <div class="row">
                <div class="category-list col-lg-2 col-md-2 col-sm-12 col-xs-12 pl-5">
                    <div class="left-column-block">
                        <div class="title-left-menu">
                            <h3>Danh mục sản phẩm</h3>
                        </div>
                        <div class="menu-left">
                            <div class="menu-category nav navbar">
                                <ul class="navbar-nav">
                                    @foreach($dataProduct as $item)
                                        <form method="get" class="show-detail-product"
                                              action="{{route('JapanCosmetic.product.category',$item->cate_id)}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="cate_id" id='get-id'
                                                   value="{{!empty($item) ? $item->cate_id:null}}"/>
                                        </form>
                                        <input type="hidden" name="cate_id" value="{{$item->cate_id}}">
                                        <li class="nav-item"><a id="parent-id-7" data-cat-id="7" data-option="off"
                                                                href="{{route('JapanCosmetic.product.category', $item->cate_id)}}">{{$item->category_name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 row">
                    @foreach($getProduct as $data)
                        <div class="col-md-3 float-left mt-5 mb-5 product-list">
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
                                                text-align: center !important;z-index: 1;">-{{$data->product_discount}}%
                                        </div>
                                    @endif
                                @endforeach
                                <form method="get" class="show-detail-product"
                                      action="{{route('JapanCosmetic.detailProduct',$data->product_id)}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="product-id" id='get-id'
                                           value="{{!empty($data) ? $data->product_id:null}}"/>
                                    <a href="{{route('JapanCosmetic.detailProduct',$data->product_id)}}">
                                        <img src="{{asset('image/'.$data->product_image)}}" alt="Image"
                                             style="width: 70%;height: 190.27px;transition: all 0.2s;margin-left: 40px;margin-right: 40px;">
                                    </a>
                                </form>
                                <div class="btn-module">
                                    <i class="fa fa-search-plus"></i>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-heart-o"></i>
                                    <div class="clearfix"></div>
                                    <a href="javascript:void(0);" data-id="{{ $data->product_id }}"
                                       class=" add-to-cart text-decoration-none" role="button"><i
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
                            <div class="button-buy btn btn-success w-50 mt-2"
                                 style=" margin-left: 55px;margin-right: 55px;">
                                <a href="{{route('JapanCosmetic.detailProduct',$data->product_id)}}"
                                   style="color: white; text-decoration: none">Mua Ngay
                                </a></div>
                        </div>
                    @endforeach
                </div>
                <div class="col-2">
                    @include('page.newProduct')
                </div>
            </div>
            <div class="container">
                {!! $links->links() !!}
            </div>
        </div>
        <div class="container">
            <div class="blog">
                <div class="title-content">
                    <a href="#">
                        <h1>Sản phẩm liên quan</h1>
                    </a>
                    <div class="line"></div>
                </div>
                <div class="carousel" style="padding-top: 40px;">
                    <div class="owl-carousel owl-theme">
                        <div class="item slide-bottom">
                            <a href="">
                                <div style="overflow: hidden;">
                                    <img src="{{asset('pageSale/img/san1.jpg')}}" alt="Image">
                                </div>
                                <span>Sân vườn tiểu cảnh đẹp cho ngôi nhà</span>
                                <button class="btn-slide-bottom">Xem chi tiết</button>
                            </a>
                        </div>
                        <div class="item slide-bottom">
                            <a href="">
                                <div style="overflow: hidden;">
                                    <img src="{{asset('pageSale/img/noithat.jpg')}}" alt="Image">
                                </div>
                                <span>Nội thất phòng làm việc</span>
                                <button class="btn-slide-bottom">Xem chi tiết</button>
                            </a>

                        </div>
                        <div class="item slide-bottom">
                            <a href="">
                                <div style="overflow: hidden;">
                                    <img src="{{asset('pageSale/img/san1.jpg')}}" alt="Image">
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
