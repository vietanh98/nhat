@extends('PageSale.main')
@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="breadcrumb-wp">
            <ol class="breadcrumb">
                <li><a class="pink" href="#"><i
                            class="fa fa-home"></i>/ </a>
                </li>
                <li><p style="color: #777"> Giỏ hàng của bạn</p>
                </li>
                <li class="active"></li>
            </ol>
        </div>
        <span id="status"></span>

        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>

            <?php $total = 0 ?>

            @if(session('cart'))
                @foreach((array) session('cart') as $id => $details)

                    <?php $total += $details['product_price'] * $details['product_quantity'] ?>

                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('image/'.$details['product_image']) }}" width="100" height="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">
                            <?php
                            echo number_format($details['product_price']) . 'VNĐ'
                            ?></td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['product_quantity'] }}" class="form-control quantity" min="1"/>
                        </td>
                        <td data-th="Subtotal" class="text-center"><span class="product-subtotal">
                                <?php
                                $subtotal =$details['product_price'] * $details['product_quantity'];
                                echo number_format($subtotal)
                                ?> </span>VNĐ</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                            <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
                        </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
            <tfoot>
            <tr>
                <td><a href="{{route('JapanCosmetic') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total <span class="cart-total"><?php
                            echo number_format($total)
                            ?></span>VNĐ</strong>
                </td>
            </tr>
            </tfoot>
        </table>
        <div class="button-readmore" >
            <a href="{{route('JapanCosmetic.pay')}}" style="padding: 12px;
    font-weight: normal;
    background: #e91f6b;
    color: #fff!important;
    text-transform: uppercase;
    border-radius: 5px;
    font-size: 14px;
    text-decoration: none;
    font-weight: 600;">Tiến hành thanh toán</a>
        </div>
    </div>
@endsection

