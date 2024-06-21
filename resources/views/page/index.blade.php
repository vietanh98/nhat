@extends('layouts.main')
@section('title', ' Day la trang chu')
@section('content')
    <?php $total = 0;?>
    @if(session('cart'))
        @foreach((array) session('cart') as $id => $details)
            <?php
            $total += $details['product_price'] * $details['product_quantity']
            ?>
        @endforeach
        @endif
<div class="row">
    <div class="col-xl-4 col-lg-12">
        <div class="card card-chart">
            <div class="card-header card-header-success">
                <div class="ct-chart" id="dailySalesChart"><p style="font-size: 20px;">Số lượng khách hàng đã đăng ký: {{$countUser}}</p></div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Daily Sales</h4>
                <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card card-chart">
            <div class="card-header card-header-warning">
                <div class="ct-chart" id="websiteViewsChart"><p style="font-size: 20px;">Số lượng sản phẩm: {{$countProduct}}</p></div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Email Subscriptions</h4>
                <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card card-chart">
            <div class="card-header card-header-danger">
                <div class="ct-chart" id="completedTasksChart" style="font-size: 20px;">Doanh thu theo tháng: 35,000,000VNĐ</div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Completed Tasks</h4>
                <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
