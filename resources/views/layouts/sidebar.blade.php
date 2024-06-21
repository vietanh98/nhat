<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a></div>
    <div class="sidebar-wrapper" style="background: #0c0e13;">
        <ul class="nav" style="position: relative; z-index: 5;">
            <li class="nav-item  active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            @cannot('free_user')
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('user.list')}}">
                        <i class="material-icons">person</i>
                        <p>Quản lý User</p>
                    </a>
                </li>
                <li class="nav-item btn-active">
                    <a class="nav-link" href="{{route('supplier.list')}}">
                        <i class="material-icons">supervised_user_circle</i>
                        <p>Quản lý nhà cung cấp</p>
                    </a>
                </li>
                <li class="nav-item btn-active">
                    <a class="nav-link" href="{{route('order.list')}}">
                        <i class="material-icons">location_ons</i>
                        <p>Quản lý Đơn đặt hàng</p>
                    </a>
                </li>
            @endcannot
            <li class="nav-item btn-active">
                <a class="nav-link" href="{{route('category.list')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Quản lý Danh mục</p>
                </a>
            </li>
            <li class="nav-item btn-active">
                <a class="nav-link" href="{{route('product.list')}}">
                    <i class="material-icons">shop</i>
                    <p>Quản lý sản phẩm</p>
                </a>
            </li>
            <li class="nav-item btn-active">
                <a class="nav-link" href="{{route('blog.list')}}">
                    <i class="material-icons">import_contacts</i>
                    <p>Quản lý bài viết</p>
                </a>
            </li>
            <li class="nav-item btn-active">
                <a href="{{route('admin.logout')}}" class="nav-link">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
        <div class="sidebar-background"
             style="background-image: url(&quot;http://127.0.0.1:8000/backend/assets/img/sidebar-1.jpg&quot;);"></div>
    </div>
</div>
<script>
    $('.sidebar-wrapper li').click(function () {
        $('.sidebar-wrapper li').removeClass('active');
        $('.sidebar-wrapper li').removeClass('active');
        $(this).addClass('active');
        $(this).addClass('active');
    });
</script>
