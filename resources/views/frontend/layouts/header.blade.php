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
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- header -->
    <div class="header">
      <div class="container">
        <div class="center-block align">
          <ul class="list-inline">
            <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Ship COD toàn quốc</li>
            <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Đa dạng sản phẩm</li>
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">Chiết khấu cao</a></li>
          </ul>
        </div>
        <!-- /.center-block -->
      </div>
    </div>
    <!-- //header -->
    <!-- header-bot -->
    <div class="header-bot">
      <div class="container">
        <div class="col-md-3 header-left">
          <h1>
            <a href="index.html" title="Smart Shop"><img alt="Smart Shop" src="{{ Cache::has('settings') ? Cache::get('settings')->logo : asset('frontend/images/logo3.jpg') }}"></a>
          </h1>
        </div>
        <div class="col-md-6 header-middle">
          <form>
            <div class="search">
              <input type="search" value="Tìm kiếm..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
            </div>
            <div class="section_room">
              <select id="country" onchange="change_country(this.value)" class="frm-field required">
                <option value="null">Tất cả</option>
                <option value="null">Electronics</option>
                <option value="AX">kids Wear</option>
                <option value="AX">Men's Wear</option>
                <option value="AX">Women's Wear</option>
                <option value="AX">Watches</option>
              </select>
            </div>
            <div class="sear-sub">
              <input type="submit" value=" ">
            </div>
            <div class="clearfix"></div>
          </form>
        </div>
        <div class="col-md-3 header-right footer-bottom">
          <ul>
            <li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>
            </li>
            <li><a title="Facebook" class="fb" href="#"></a></li>
            <li><a title="Tweeter" class="twi" href="#"></a></li>
            <li><a title="Instagram" class="insta" href="#"></a></li>
            <li><a title="Youtube" class="you" href="#"></a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- //header-bot -->
    @include('frontend.components.navigation')