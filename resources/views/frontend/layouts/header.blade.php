<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <title>@yield('title', 'Smart Shop - Cửa hàng phân phối các sản phẩm thời trang chính hãng')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">
  <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="{{ asset('bower_components/jquerytoast/jquery.toast.css') }}" />
  <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{asset('frontend/css/customize.css')}}" rel="stylesheet" type="text/css" media="all" />
  <base href="{{ URL::to('/') }}" />
</head>
<body>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=1334434319999234";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

  @include('frontend.components.bot')

  @include('frontend.components.navigation')