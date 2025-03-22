@extends('layouts.main')
@section('title', 'Sửa nhà cung cấp')
@section('content')
    <div class="content">
        <p id="message_success"></p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Thêm mới nhà cung cấp</h4>
                            <p class="card-category">Supplier</p>
                        </div>
                        <form action="{{route('supplier.post-update'), $supplier->supplier_id}}" method='POST'
                              class="w-70 m-auto form-user"
                              id="form-update-supplier" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="supplier_id" value=" {{!empty($supplier) ? $supplier->supplier_id:null}}">
                            <div class="card-body">
                                <div class="row col-md-12">
                                    <div class="col-md-6 m-auto">
                                        <div class="form-group">
                                            <label>Tên nhà cung cấp</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{!empty($supplier) ? $supplier->supplier_name:null}}">
                                            <p id="errors_name" style="color: red;"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input type="text" class="form-control" name="address" id="address" value="{{!empty($supplier) ? $supplier->supplier_address:null}}">
                                            <p id="errors_address" style="color: red;"></p>
                                        </div>
                                    </div>

                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input type="text" class="form-control" name="phone" id="phone" value="{{!empty($supplier) ? $supplier->supplier_phone:null}}">
                                                <p id="errors_phone" style="color: red;"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="text" class="form-control" name="email" id="email" value="{{!empty($supplier) ? $supplier->supplier_email:null}}">
                                                <p id="errors_email" style="color: red;"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Logo nhà sản xuất</label>
                                                <div class="clearfix"></div>
                                                <input type="hidden" id="img" name="display_img" value="{{!empty($supplier) ? $supplier->supplier_logo:null}}">
                                                <img id="image" src="{{secure_asset('image/'.$supplier->supplier_logo)}}" alt="your image"
                                                     width="100px" class="mb-2"/>
                                                <input type="file" class="file-update" name="avatar" id="avatar">
                                                <input type="hidden" id="img" name="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 m-auto" style="margin-top: 30px!important;">
                                    <button type="submit" class="btn btn-primary btn-create-user" id="btn-create">Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--        <script src="{{secure_asset('backend/js/validate.js')}}"></script>--}}
        <script src="{{secure_asset('backend/js/supplier/postSupplier.js')}}"></script>
@endsection

