@extends('layouts.main')
@section('title', 'Thêm danh mục')
@section('content')
    <div class="content">
        <p id="message_success"></p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Thêm Danh mục</h4>
                            <p class="card-category">Danh mục</p>
                        </div>
                        <form action="{{route('category.post-create-category')}}" method='POST' class=""
                              id="form-create-category" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                    <div class="col-md-6 m-auto" style="flex:1;">
                                        <div class="form-group">
                                            <label>Tên danh mục</label>
                                            <input type="text" class="form-control" name="cate_name" id="name" >
                                            <p id="errors_cate_name" style="color: red;"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 m-auto">
                                        <label for="exampleFormControlTextarea1">Mô tả</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                                        <p id="errors_description" style="color: red;"></p>
                                    </div>
                                <div class="clearfix"></div>
                                <div class="m-auto button-cate">
                                    <button type="submit" class="btn btn-primary btn-create-category" id="btn-create">Submit
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{secure_asset('backend/js/category/postCategory.js')}}"></script>
@endsection

