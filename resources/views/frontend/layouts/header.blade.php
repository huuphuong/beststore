<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <title>@yield('title', 'Smart Shop | Home Page')</title>
  <!-- for-mobile-apps -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- //for-mobile-apps -->
  <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">
  <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
  <!-- /.Font awsome -->
  <!-- style -->
  <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{asset('frontend/css/customize.css')}}" rel="stylesheet" type="text/css" media="all" />
  <link rel="shortcut icon" href="http://example.com/myicon.ico" />
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