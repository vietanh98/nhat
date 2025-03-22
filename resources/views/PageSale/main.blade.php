<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
    <title>Mỹ phẩm Nhật Bản</title>
</head>
<link rel="stylesheet" type="text/css" href="{{asset('pageSale/boostrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('pageSale/boostrap/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('pageSale/css/style.css')}}">
<link rel="stylesheet" href="{{asset('pageSale/css/effect.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('pageSale/slider/dist/secure_assets/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('pageSale/slider/dist/secure_assets/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

{{--form login--}}


<body>
<!-- Heder -->
@include('PageSale.header')
@yield('content')
@include('PageSale.footer')
</body>

</html>
