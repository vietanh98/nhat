<div class="modal" id="myModal">
    <div class="modal-container">
    {{--            <div class="modal-content w-100" style="margin-top: 200px; background: #1a2035;">--}}

    <!-- Modal Header -->
    {{--                <div class="modal-header">--}}
    {{--                    <h4 class="modal-title">Modal Heading</h4>--}}
    {{--                    <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
    {{--                </div>--}}

    <!-- Modal body -->
        <div class="modal-body">
            <div class="card" style="margin-top: 200px; background: white">
                <div class="card-header card-header-primary">
                    <h4 class="card-title float-left">Chi tiết sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <span class="material-icons">
                        add
                    </span>

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
                            <tbody>
                                <tr>
                                    <td>
                                        {{$product->product_id}}
                                    </td>
                                    <td>
                                        {{$product->product_code}}
                                    </td>
                                    <td>
                                        {{$product->product_name}}
                                    </td>
                                    <td>
                                        {{$product->category_id}}
                                    </td>
                                    <td>
                                        <img src="{{secure_asset('image/'.$product->product_image	)}}" height="50px"
                                             width="50px">
                                    </td>
                                    <td>
                                        <?php
                                        echo number_format($product->product_price) . 'VNĐ';
                                        ?>
                                    </td>
                                    <td>
                                        {{$product->product_brand}}
                                    </td>
                                    <td>
                                        {{$product->product_discount}}
                                    </td>
                                    <td>
                                        {{$product->product_quantity}}
                                    </td>
                                    <td>
                                        {{$product->product_description}}
                                    </td>
                                    <td>
                                        {{$product->supplier_id}}
                                    </td>
                                    @if($product->product_status ==1)
                                        <td>
                                            còn hàng
                                        </td>
                                    @endif
                                    @if($product->product_status == 2)
                                        <td>
                                            Hết hàng
                                        </td>
                                    @endif
                                    <td>
                                        {{$product->created_at}}
                                    </td>
                                    <td>
                                        {{$product->updated_at}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
        </div>

        <!-- Modal footer -->

    </div>
</div>
