@extends('layouts.main')
@section('title', 'Thêm danh mục')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Thêm Danh mục</h4>
                            <p class="card-category">Danh mục</p>
                        </div>
                        <form action="{{route('category.post-update'), $category->cate_id}}" method='POST' class=""
                              id="form-update-category" enctype="multipart/form-data">
{{--<!--                            --><?php //dd($category->cate_id);?>--}}
                            <input type="hidden" name="cate_id" value=" {{!empty($category)? $category->cate_id:null}}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="col-md-6 m-auto" style="flex:1;">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" class="form-control" name="cate_name" id="name" value="{{!empty($category)? $category->category_name:null}}">
                                        <p id="errors_cate_name" style="color: red;"></p>
                                    </div>
                                </div>
                                <div class="col-md-6 m-auto">
                                    <label for="exampleFormControlTextarea1">Mô tả</label>
                                    <input class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" value="{{!empty($category)? $category->description:null}}">
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

