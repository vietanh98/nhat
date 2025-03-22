@extends('layouts.main')
@section('title', 'Quản lý sản phẩm')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title float-left">Bảng Quản lý Sản phẩm </h4>
                    <a href="{{route('product.create')}}" class="float-right btn btn-outline-secondary"
                       style="padding: 11px 15px;">
                    <span class="material-icons">
                        add
                    </span>
                        <p style="margin-bottom: 0px; float: right;font-weight: 900;">Thêm Sản phẩm</p>
                    </a>
                    <button type="button" class="btn btn-success float-right" data-toggle="modal"
                            data-target="#myModal">
                        Xem chi tiết
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Mã sản phẩm
                            </th>
                            <th>
                                Tên sản phẩm
                            </th>

                            <th>
                                Hình ảnh sản phẩm
                            </th>
                            <th>
                                Giá sản phẩm
                            </th>
                            <th>
                                Số lượng sản phẩm
                            </th>
                            <th class="text-center">
                                Chức năng
                            </th>
                            </thead>
                            <tbody>
                            @foreach($product as $item)
                                <tr>
                                    <td>
                                        {{$item->product_id}}
                                    </td>
                                    <td>
                                        {{$item->product_code}}
                                    </td>
                                    <td>
                                        {{$item->product_name}}
                                    </td>
                                    <td>
                                        <img src="{{secure_asset('image/'.$item->product_image	)}}" height="50px"
                                             width="50px">
                                    </td>
                                    <td>
                                        <?php
                                        echo number_format($item->product_price) . 'VNĐ';
                                        ?>
                                    </td>

                                    <td>
                                        {{$item->product_quantity}}
                                    </td>
                                    <td style="width: 2%">
                                        <a href="{{route('product.update', $item->product_id)}}">
                                            <button class="btn btn-info">Sửa sản phẩm</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" class="delete_form"
                                              action="{{route('product.delete',$item->product_id)}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" data-id="{{$item->product_id }}"
                                                   value="delete" id="get-id"/>
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {!! $product->links() !!}
    </div>
    <div class="modal" id="myModal">
        <div class="modal-container">

        <!-- Modal body -->
            <div class="modal-body">
                <div class="card" style="margin-top: 200px; background: white">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title float-left">Chi tiết sản phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Mã sản phẩm
                                </th>
                                <th>
                                    Tên sản phẩm
                                </th>
                                <th>
                                    Id danh mục
                                </th>
                                <th>
                                    Hình ảnh sản phẩm
                                </th>
                                <th>
                                    Giá sản phẩm
                                </th>
                                <th>
                                    Thương hiệu sản phẩm
                                </th>
                                <th>
                                    Sản phẩm giảm giá
                                </th>
                                <th>
                                    Số lượng sản phẩm
                                </th>
                                <th>
                                    Mô tả
                                </th>
                                <th>
                                    ID nhà cung cấp
                                </th>
                                <th>
                                    Trạng thái sản phẩm
                                </th>
                                <th>
                                    Ngày thêm
                                </th>
                                <th>
                                    Ngày sửa
                                </th>

                                </thead>
                                @foreach($product as $item)
                                    <tbody>
                                    <tr>
                                        <td>
                                            {{$item->product_id}}
                                        </td>
                                        <td>
                                            {{$item->product_code}}
                                        </td>
                                        <td>
                                            {{$item->product_name}}
                                        </td>
                                        <td>
                                            {{$item->category_id}}
                                        </td>
                                        <td>
                                            <img src="{{secure_asset('image/'.$item->product_image	)}}" height="50px"
                                                 width="50px">
                                        </td>
                                        <td>
                                            <?php
                                            echo number_format($item->product_price) . 'VNĐ';
                                            ?>
                                        </td>
                                        <td>
                                            {{$item->product_brand}}
                                        </td>
                                        <td>
                                            {{$item->product_discount}}
                                        </td>
                                        <td>
                                            {{$item->product_quantity}}
                                        </td>
                                        <td>
                                            {{$item->product_description}}
                                        </td>
                                        <td>
                                            {{$item->supplier_id}}
                                        </td>
                                        @if($item->product_status ==1)
                                            <td>
                                                còn hàng
                                            </td>
                                        @endif
                                        @if($item->product_status == 2)
                                            <td>
                                                Hết hàng
                                            </td>
                                        @endif
                                        <td>
                                            {{$item->created_at}}
                                        </td>
                                        <td>
                                            {{$item->updated_at}}
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->

        </div>
    </div>

    <script src="{{secure_asset('backend/js/product/postProduct.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        $(function () {
            $('#orderModal').modal({
                keyboard: true,
                backdrop: "static",
                show: false,

            }).on('show', function () {
                var getIdFromRow = $(this).data('orderid');
                //make your ajax call populate items or what even you need
                $(this).find('#orderDetails').html($('<b> Order Id selected: ' + getIdFromRow + '</b>'))
            });

            $(".table-striped").find('tr[data-target]').on('click', function () {
                //or do your operations here instead of on show of modal to populate values to modal.
                $('#orderModal').data('orderid', $(this).data('id'));
            });

        });
    </script>

@endsection
