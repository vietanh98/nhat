@extends('layouts.main')
@section('title', 'Thêm mới Blog')
@section('content')
    <div class="content">
        <p id="message_success"></p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Thêm mới Bài viết</h4>
                            <p class="card-category">Blog</p>
                        </div>
                        <form action="{{route('blog.post-create-blog')}}" method='POST'
                              class="w-75 m-auto form-user"
                              id="form-create-blog" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tiêu đề bài viết</label>
                                            <input type="text" class="form-control" name="title" id="title">
                                            <p id="errors_title" style="color: red;"></p>
                                        </div>
                                    </div>
                                <textarea name="editor" class="ckeditor" id="editor" cols="80" rows="10"></textarea>
                                <p id="errors_editor" style="color: red;"></p>
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
        <script src="{{asset('backend/js/blog/postBlog.js')}}"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
@endsection

