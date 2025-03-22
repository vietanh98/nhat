@extends('layouts.main')
@section('title', 'Quản lý Blog')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title float-left">Bảng Quản lý Blog </h4>
                    <a href="{{route('blog.create')}}" class="float-right btn btn-outline-secondary"
                       style="padding: 15px 15px;">
                    <span class="material-icons">
                        add
                    </span>
                        <p style="margin-bottom: 0px; float: right;font-weight: 900;">Thêm mới Blog</p>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Blog ID
                            </th>
                            <th>
                                Blog title
                            </th>
                            <th>
                                Nội dung văn bản
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
                            @foreach($blog as $item)
                                <tr>
                                    <td >
                                        {{$item->blog_id}}
                                    </td>
                                    <td style="width: 30%">
                                        {{$item->blog_title}}
                                    </td>
                                    <td class="txt-content">
                                        {{$item->plain_text_content}}
                                    </td>
                                    <td style="width: 10%;">
                                        {{$item->created_at}}
                                    </td>
                                    <td style="width: 10%;">
                                        {{$item->updated_at}}
                                    </td>
                                    <td style="width: 2%" >
                                        <a href="{{route('blog.update', $item->blog_id)}}">
                                            <button class="btn btn-info">Edit</button>
                                        </a>
                                    </td>
                                    <td >
                                        <form method="post" class="form-delete-blog"
                                              action="{{route('blog.delete',$item->blog_id)}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" data-id="{{$item->blog_id }}"
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
        {!! $blog->links() !!}
    </div>
    <script src="{{asset('backend/js/blog/postBlog.js')}}"></script>

@endsection
