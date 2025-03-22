<!-- Header -->
<section>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 welcom-text">
                    <p style="margin-bottom: 0px; margin-top: 5px;">Chào mừng bạn đến với mỹ phẩm Nhật Bản</p>
                </div>
                <div class="col-md-6 button-header">
                    <button class="btn-header" data-toggle="modal" data-target="#modalLoginForm"><i
                            class="fa fa-user"></i> Đăng nhập
                    </button>
                    {{--modal Đăng nhập--}}
                    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <!--Content-->
                            <div class="modal-content form-elegant">
                                <!--Header-->
                                <div class="modal-header text-center">
                                    <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Đăng nhập</strong></h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!--Body-->
                                <div class="modal-body mx-4">
                                    <!--Body-->
                                    <div class="md-form mb-5">
                                        <input type="email" id="Form-email1" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="Form-email1">Your email</label>
                                    </div>

                                    <div class="md-form pb-3">
                                        <input type="password" id="Form-pass1" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label>
                                        <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="#" class="blue-text ml-1">
                                                Password?</a></p>
                                    </div>

                                    <div class="text-center mb-3">
                                        <button type="button" class="btn btn-primary w-25">Sign in</button>
                                    </div>
                                    <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in
                                        with:</p>

                                    <div class="row my-3 d-flex justify-content-center">
                                        <!--Facebook-->
                                        <a href="https://accounts.google.com/"><img src="{{asset('image/google-icon.png')}}" style="width: 30px; margin-right: 20px"></a>
                                        <!--Twitter-->
                                        <a href="https://www.facebook.com/"><img src="{{asset('image/icon-facebook.png')}}" style="width: 30px"></a>
                                        <!--Google +-->
                                        <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="fab fa-google-plus-g"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!--/.Content-->
                        </div>
                    </div>

                    {{--                     Modal đăng ký--}}
                    <button class="btn-header" style="margin-right:10px;" data-toggle="modal"
                            data-target="#sig_up"><i class="fa fa-user-plus"></i> Đăng
                        ký
                    </button>
                    <!-- modal đăng ký -->
                    <div class="modal fade" id="sig_up" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalLabel">Đăng ký thành viên</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('customer.post-create-customer')}}" method='POST'
                                          class="w-70 m-auto form-user"
                                          id="form-create-customer">
                                        {{ csrf_field() }}
                                        <div class="card-body">
                                            <div class="row col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>UserName</label>
                                                        <input type="text" class="form-control" name="name" id="name">
                                                        <p id="errors_name" style="color: red;"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                               id="email">
                                                        <p id="errors_email" style="color: red;"></p>
                                                    </div>
                                                </div>
                                                <div class="w-100">
                                                    <p id="exist_email"
                                                       style="color: red; margin-right: 17px; margin-bottom: 0px; float: right"></p>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" class="form-control" name="password"
                                                                   id="password">
                                                            <p id="errors_password" style="color: red;"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input type="password" class="form-control"
                                                                   name="confirmPassword" id="confirmPassword">
                                                            <p id="errors_confirmPassword" style="color: red;"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Địa chỉ</label>
                                                            <input type="text" class="form-control" name="address"
                                                                   id="address">
                                                            <p id="errors_address" style="color: red;"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Telephone</label>
                                                            <input type="tel" class="form-control" name="phone"
                                                                   id="phone">
                                                            <p id="errors_phone" style="color: red;"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Ngày sinh</label>
                                                        <input id="datepicker" name="date_of_birth">
                                                        <p id="errors_date_of_birth" style="color: red"></p>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        <input type="hidden" id="img" name="img" value="customer.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 m-auto" style="margin-top: 30px!important;">
                                                <button type="submit" class="btn btn-primary btn-create-user"
                                                        id="btn-create">Đăng ký
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The modal đăng nhập-->
                    <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalLabel">Flip-flop</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    đăng nhập ở đây
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bottom header -->
    <div class="bottom-header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo-header">
                        <img src="{{asset('PageSale/img/logo.jpg')}}" alt="Image">
                    </div>
                </div>
                <div class="search col-md-6">
                    <form method="GET" action="" id="header-search">
                        <input type="text" name="keyword" placeholder=" Nhập tên hoặc mã sản phẩm" class="text-search"
                               value="{{!empty($keyword) ? $keyword:null}}">
                        <div class="top-search">
                            <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
                        </div>
                        {{ csrf_field() }}
                    </form>

                </div>
                <div class="col-md-3 top-cart">
                    <a href="{{route('JapanCosmetic.cart')}}" class="text-decoration-none">
                        <img src="{{asset('pageSale/img/cart-icon.jpg')}}" alt="Image" style="float: left;">
                        <span class="badge badge-pill badge-danger" style="position: absolute;top: 64px;left: 106px;">{{ count((array) session('cart')) }}</span>
                        <div class="text-cart">
                            <p>Giỏ hàng</p>
                            <span>Sản phẩm</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu top -->
    <div class="top-menu" id="top-menu">
        <div class="container">
            <div class="navbar navbar-expand-sm" style="text-transform: uppercase; margin-bottom: 0px;">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a href="{{route('JapanCosmetic')}}" class="active" style="color: white;">trang chủ</a>
                    </li>
                    <li class="nav-item has-chirl">
                        <a href="#">Danh mục sản phẩm</a>
                        <div class="chirl-menu">
                            <ul>
                                @foreach($dataProduct as $item)
                                    <li>
                                        <a href="{{route('JapanCosmetic.product.category', $item->cate_id)}}"
                                           style="font-size: 14px; color: white;font-weight: 100;text-transform: none;">
                                            {{$item->category_name}}
                                        </a><span>+</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('JapanCosmetic.cheap')}}">giá tốt nhất</a>
                    </li>
                    <li class="nav-item has-chirl">
                        <a href="#">Thương hiệu nổi bật</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('JapanCosmetic.Blog')}}">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('JapanCosmetic.contact')}}">contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>



