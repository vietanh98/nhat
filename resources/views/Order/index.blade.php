@extends('layouts.main')
@section('title', 'Quản lý đơn hàng')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title float-left">Bảng Quản lý Đơn hàng </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Order ID
                            </th>
                            <th>
                                Tên khách hàng
                            </th>
                            <th>
                                Số điện thoại
                            </th>
                            <th>
                                Địa chỉ
                            </th>
                            <th>
                                Phương thức thanh toán
                            </th>
                            <th>
                                Ghi chú
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>
                                Product ID
                            </th>
                            <th>
                                Giá sản phẩm
                            </th>
                            <th>
                                Số lượng sản phẩm
                            </th>
                            <th>
                                Tổng tiền
                            </th>
                            <th>
                                Created At
                            </th>
                            <th>
                                Updated At
                            </th>
                            <th class="text-center">
                                Chức năng
                            </th>
                            </thead>
                            <tbody>
                            @foreach($dataOrder as $item)
                                <tr>
                                    <td>
                                        {{$item->order_id}}
                                    </td>
                                    <td>
                                        {{$item->user_name}}
                                    </td>
                                    <td>
                                        {{$item->phone}}
                                    </td>
                                    <td>
                                        {{$item->address}}
                                    </td>
                                    @if($item->payment_methods == 1 )
                                        <td>
                                            Thanh toán khi nhận hàng
                                        </td>
                                    @endif
                                    @if($item->payment_methods == 2)
                                        <td>
                                            Thanh toán khi nhận hàng
                                        </td>
                                    @endif
                                    <td>
                                        {{$item->note}}
                                    </td>
                                    @if($item->status == 1)
                                    <td>
                                        Đang vận chuyển
                                    </td>
                                    @endif
                                    @if($item->status == 2)
                                    <td>
                                        Đã vận chuyển
                                    </td>
                                    @endif
                                    @if($item->status == 3)
                                    <td>
                                        Đơn hàng bị hủy
                                    </td>
                                    @endif
                                    <td>
                                        {{$item->product_id}}
                                    </td>
                                    <td>
                                        {{$item->odetail_unit_price}}
                                    </td>
                                    <td>
                                        {{$item->odetail_quantity}}
                                    </td>
                                    <td>
                                        {{$item->odetail_total_money}}
                                    </td>
                                    <td>
                                        {{$item->created_at}}
                                    </td>
                                    <td>
                                        {{$item->updated_at}}
                                    </td>
                                    <td style="width: 2%">
                                        <a href="{{route('order.post-update', $item->order_id)}}">
                                            <button class="btn btn-info">Edit</button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {!! $link->links() !!}
    </div>
    <script src="{{secure_asset('backend/js/supplier/postSupplier.js')}}"></script>
@endsection
