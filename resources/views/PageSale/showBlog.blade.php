@extends('PageSale.main')
@section('content')
    <style>
        .content-blog img{
            width: 100%;
        }
    </style>
    <section class="detail-product" style="margin-top: 80px">
        <div class="container">
            <div class="breadcrumb-wp">
                <ol class="breadcrumb">
                    <li><a class="pink" href="#"><i class="glyphicon glyphicon-home"></i> Blog/</a></li>
                    <li><a href="https://studionoithat.com/ghe"></a>Tin tức</li>
                    <li class="active"></li>
                </ol>
            </div>
            <div class="row">
                <div class="category-list col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="left-column-block">
                        <div class="title-left-menu">
                            <h3>Danh mục sản phẩm</h3>
                        </div>
                        <div class="menu-left">
                            <div class="menu-category nav navbar">
                                <ul class="navbar-nav">
                                    @foreach($dataProduct as $item)
                                        <li class="nav-item">
                                            <a id="parent-id-7" data-cat-id="7" data-option="off"
                                                                href="{{route('JapanCosmetic.product.category', $item->cate_id)}}">{{$item->category_name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    @foreach($dataBlog as $blog)
                        <div class="title-blog">
                            <h2>
                                {{!empty($blog)? $blog->blog_title:null}}
                            </h2>
                        </div>
                        <div class="content-blog">
                            {!!$blog->html_content!!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
