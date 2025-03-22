@extends('layouts.main')
@section('title', 'Quản lý nhà cung cấp')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title float-left">Bảng Quản lý Nhà cung cấp </h4>
                    <a href="{{route('supplier.create')}}" class="float-right btn btn-outline-secondary"
                       style="padding: 15px 15px;">
                    <span class="material-icons">
                        add
                    </span>
                        <p style="margin-bottom: 0px; float: right;font-weight: 900;">Thêm mới nhà cung cấp</p>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Supplier ID
                            </th>
                            <th>
                                Tên nhà cung cấp
                            </th>
                            <th>
                                Địa chỉ nhà cung cấp
                            </th>
                            <th>
                                Số điện thoại
                            </th>
                            <th>
                                Địa chỉ Email
                            </th>
                            <th>
                                Logo Nhà cung cấp
                            </th>
                            <th>
                                Trạng thái hoạt động
                            </th>
                            <th>
                                Ngày thêm
                            </th>
                            <th>
                                Ngày sửa
                            </th>
                            <th class="text-center">
                                Chức năng
                            </th>
                            </thead>
                            <tbody>
                            @foreach($supplier as $item)
                                <tr>
                                    <td>
                                        {{$item->supplier_id}}
                                    </td>
                                    <td>
                                        {{$item->supplier_name}}
                                    </td>
                                    <td>
                                        {{$item->supplier_address}}
                                    </td>
                                    <td>
                                        {{$item->supplier_phone}}
                                    </td>
                                    <td>
                                        {{$item->supplier_email}}
                                    </td>

                                    <td>
                                        <img src="{{asset('image/'.$item->supplier_logo)}}" height="50px"
                                             width="50px">
                                    </td>
                                    @if($item->is_active == 1)
                                    <td>
                                        Đang hoạt động
                                    </td>
                                    @endif
                                    @if($item->is_active == 2)
                                        <td>
                                            Dừng hoạt dộng
                                        </td>
                                    @endif
                                    <td>
                                        {{$item->created_at}}
                                    </td>
                                    <td>
                                        {{$item->updated_at}}
                                    </td>
                                    <td style="width: 2%">
                                        <a href="{{route('supplier.update', $item->supplier_id)}}">
                                            <button class="btn btn-info">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" class="delete_form"
                                              action="{{route('supplier.delete',$item->supplier_id)}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" data-id="{{$item->supplier_id }}"
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
        {!! $supplier->links() !!}
    </div>
    <script src="{{asset('backend/js/supplier/postSupplier.js')}}"></script>

@endsection
