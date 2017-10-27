@inject('setting', 'App\Models\Setting')

@php
    $data = $setting->getSetting();
@endphp
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
            <li><span class="{{ $data['header_icon_info_1'] }}" aria-hidden="true"></span>{{ $data['header_text_info_1'] }}</li>
            <li><span class="{{ $data['header_icon_info_2'] }}" aria-hidden="true"></span>{{ $data['header_text_info_2'] }}</li>
            <li><span class="{{ $data['header_icon_info_3'] }}" aria-hidden="true"></span>{{ $data['header_text_info_3'] }}</li>
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
            <li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Đăng nhập</span></a></li>
            @php
              $socials     = json_decode($data['social_item'], true);
              $collections = collect($socials);
              $orders      = $collections->sortBy('social_order');
            @endphp

            @foreach ($orders AS $key => $item)
              <li>
                <a title="{{ $item['social_name'] }}" class="{{ $item['social_icon'] }}" href="{{ $item['social_url'] }}"></a>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- //header-bot -->
    @include('frontend.components.navigation')