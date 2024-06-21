<div class="container">
    @foreach($getData as $data)
        <div class="breadcrumb-wp">
            <ol class="breadcrumb">
                <li><a class="pink" href="#"><i class="glyphicon glyphicon-home"></i>{{!empty($data) ? $data->product_name:null}} /</a></li>
                <li><a href="https://studionoithat.com/ghe"></a>{{!empty($data) ? $data->product_description:null}}</li>
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
                                    <li>
                                        <a href="{{route('JapanCosmetic.product.category', $item->cate_id)}}"
                                           style="font-size: 14px; color: white;font-weight: 100;text-transform: none;">
                                            {{$item->category_name}}
                                        </a><span>+</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
@endforeach
