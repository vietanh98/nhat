@extends('layouts.main')
@section('title', 'Quản lý Danh mục')
@section('content')
    <div class="row" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title float-left">Bảng Quản lý Danh mục</h4>
                    <a  href="{{route('category.create')}}" class="float-right btn btn-outline-secondary" style="padding: 15px 15px;" >
                    <span class="material-icons">
                        add
                    </span>
                        <p style="margin-bottom: 0px; float: right;font-weight: 900;">Thêm Danh mục</p>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" >
                            <thead class=" text-primary">
                            <th>
                                Category ID
                            </th>
                            <th>
                                Tên Danh mục
                            </th>
                            <th>
                                description
                            </th>
                            <th>
                                Created_at
                            </th>
                            <th>
                                Updated_at
                            </th>
                            <th class="text-center">
                                Chức năng
                            </th>
                            </thead>
                            <tbody>
                            @foreach($data_category as $item)
                                <tr>
                                    <td>
                                        {{$item->cate_id}}
                                    </td>
                                    <td>
                                        {{$item->category_name}}
                                    </td>
                                    <td>
                                        {{$item->description}}
                                    </td>
                                    <td>
                                        {{$item->created_at}}
                                    </td>
                                    <td>
                                        {{$item->updated_at}}
                                    </td>
                                    <td style="width: 2%">
                                        <a href="{{route('category.update', $item->cate_id)}}">
                                            <button class="btn btn-info">update</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" class="form-delete-category" action="{{route('category.delete',$item->cate_id)}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" id = 'get-id' data-id = {{!empty($item) ? $item->cate_id:null}} value="DELETE" />
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
        {!! $data_category->links() !!}
    </div>
    <script src="{{secure_asset('backend/js/category/postCategory.js')}}"></script>

@endsection
