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
                        <form action="{{route('product.post-create-product')}}" method='POST'
                              class="w-70 m-auto form-user"
                              id="form-create-product" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row col-md-12">
                                    <div class="col-md-6 m-auto">
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input type="text" class="form-control" name="product_code" id="product_code">
                                            <p id="errors_product_code" style="color: red;"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                            <p id="errors_name" style="color: red;"></p>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <span>ID Nhà cung cấp</span>
                                            <select  class="form-control" id="supplier" name="supplier">
                                                @foreach($supplier as $dataSupplier)
                                                    <option value="{{$dataSupplier->supplier_id}}">{{$dataSupplier->supplier_name}}</option>
                                                @endforeach

                                            </select>
                                            <p id="errors_supplier" style="color: red;"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Giá sản phẩm</label>
                                                <input type="text" class="form-control" name="price" id="price">
                                                <p id="errors_price" style="color: red;"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sản phẩm giảm giá</label>
                                                <select class="form-control" id="exampleFormControlSelect2" name="discount">
                                                    <option value="0">0%</option>
                                                    <option value="10">10%</option>
                                                    <option value="20">20%</option>
                                                    <option value="30">30%</option>
                                                    <option value="40">40%</option>
                                                    <option value="50">50%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Số lượng sản phẩm</label>
                                                <input type="tel" class="form-control" name="quantity" id="quantity">
                                                <p id="errors_quantity" style="color: red;"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <span>ID danh mục</span>
                                            <select class="form-control" id="id-category" name="id-category">
                                                @foreach($cate as $dataCategory)
                                                    <option value="{{$dataCategory->cate_id}}">{{$dataCategory->category_name}}</option>
                                                @endforeach
                                            </select>
                                            <p id="errors_id-category" style="color: red;"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Trạng thái sản phẩm</label>
                                                <select class="form-control" id="status" name="status">
                                                        <option>1</option>
                                                        <option>2</option>
                                                </select>
                                                <p id="errors_status" style="color: red;"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <img id="image" src=" " alt="your image" width="150px" class="mb-2"
                                                     style="display: none;"/>
                                                <input type="file" name="avatar" id="avatar" class="inputfile inputfile-1"
                                                       data-multiple-caption="{count} files selected" multiple/>
                                                <label for="avatar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                         viewBox="0 0 20 17">
                                                        <path
                                                            d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                                    </svg>
                                                    <span>Choose a file&hellip;</span></label>
                                                <input type="hidden" id="img" name="img">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Thương hiệu</label>
                                                <input type="text" class="form-control" name="brand" id="brand" >
                                                <p id="errors_brand" style="color: red;"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 m-auto description">
                                    <label for="exampleFormControlTextarea1">Mô tả sản phẩm</label>
                                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
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
{{--        <script src="{{asset('backend/js/validate.js')}}"></script>--}}
        <script src="{{asset('backend/js/product/postProduct.js')}}"></script>
@endsection

