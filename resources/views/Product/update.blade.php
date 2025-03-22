@extends('layouts.main')
@section('title', 'Thêm Sản phầm')
@section('content')
    <div class="content">
        <p id="message_success"></p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">CreateUser</h4>
                            <p class="card-category">User Profile</p>
                        </div>
                        <form action="{{route('product.post-create-product'),$data->product_id}}" method='POST'
                              class="w-70 m-auto form-user"
                              id="form-update-product" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="product-id" value=" {{!empty($data) ? $data->product_id:null}}">
                            <div class="card-body">
                                <div class="row col-md-12">
                                    <div class="col-md-6 m-auto">
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input type="text" class="form-control" name="product_code" id="product_code" value="{{!empty ($data)? $data->product_code:null}}">
                                            <p id="errors_product_code" style="color: red;"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{!empty ($data)? $data->product_name:null}}">
                                            <p id="errors_name" style="color: red;"></p>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <span>ID danh mục</span>
                                            <select  class="form-control" id="id-category" name="id-category" value="{{!empty ($data)? $data->category_id:null}}" selected>
                                                @foreach($cate as $dataCategory)
                                                    <option value="{{$dataCategory->cate_id}}"  @if($data->category_id == $dataCategory->cate_id) {{'selected'}} @endif>{{$dataCategory->cate_id}}</option>
                                                @endforeach
                                            </select>
                                            <p id="errors_id-category" style="color: red;"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Giá sản phẩm</label>
                                                <input type="text" class="form-control" name="price" id="price" value="{{!empty ($data)? $data->product_price:null}}">
                                                <p id="errors_price" style="color: red;"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sản phẩm giảm giá</label>
                                                <select class="form-control" id="exampleFormControlSelect2" name="discount" >
                                                    <option <?php if(isset($data) && $data->product_discount == '0%') echo "selected"?>>0%</option>
                                                    <option  <?php if(isset($data) && $data->product_discount == '10%') echo "selected"?>>10%</option>
                                                    <option  <?php if(isset($data) && $data->product_discount == '20%') echo "selected"?>>20%</option>
                                                    <option  <?php if(isset($data) && $data->product_discount == '30%') echo "selected"?>>30%</option>
                                                    <option  <?php if(isset($data) && $data->product_discount == '40%') echo "selected"?>>40%</option>
                                                    <option  <?php if(isset($data) && $data->product_discount =='50%') echo "selected"?>>50%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Số lượng sản phẩm</label>
                                                <input type="tel" class="form-control" name="quantity" id="quantity" value="{{!empty ($data)? $data->product_quantity:null}}">
                                                <p id="errors_quantity" style="color: red;"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <span>ID Nhà cung cấp</span>
                                            <select class="form-control" id="supplier" name="supplier">
                                                @foreach($supplier as $dataSupplier)
                                                    <option value="{{$dataSupplier->supplier_id}}" @if($data->supplier_id == $dataSupplier->supplier_id) {{'selected'}} @endif>{{$dataSupplier->supplier_id}}</option>
                                                @endforeach
                                            </select>
                                            <p id="errors_supplier" style="color: red;"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Trạng thái sản phẩm</label>
                                                <select class="form-control" id="status" name="status" >
                                                    <option value="1"<?php if(isset($data) && $data->product_status == 1) echo 'selected';?>>1</option>
                                                    <option value="2"<?php if(isset($data) && $data->product_status == 2) echo 'selected';?>>2</option>
                                                </select>
                                                <p id="errors_status" style="color: red;"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hình ảnh sản phẩm</label>
                                                <div class="clearfix"></div>
                                                <input type="hidden" id="img" name="display_img" value="{{!empty($data) ? $data->product_image:null}}">
                                                <img id="image" src="{{secure_asset('image/'.$data->product_image)}}" alt="your image"
                                                     width="100px" class="mb-2"/>
                                                <input type="file" class="file-update" name="avatar" id="avatar">
                                                <input type="hidden" id="img" name="img">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Thương hiệu</label>
                                                <input type="text" class="form-control" name="brand" id="brand" value="{{!empty($data) ? $data->product_brand:null}}">
                                                <p id="errors_brand" style="color: red;"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 m-auto description">
                                    <label for="exampleFormControlTextarea1">Mô tả sản phẩm</label>
                                    <textarea class="form-control" id="description" rows="3" name="description">{{!empty($data) ? $data->product_description:null}}</textarea>
                                    <p id="errors_description" style="color: red;"></p>
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
        <script src="{{secure_asset('backend/js/product/postProduct.js')}}"></script>
@endsection

