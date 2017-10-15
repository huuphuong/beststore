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
    <!-- banner -->
    <div class="ban-top">
      <div class="container">
        <div class="top_nav_left">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav menu__list">
                  <li class="active menu__item menu__item--current"><a class="menu__link" href="index.html"><span class="glyphicon glyphicon-home"></span> Trang chủ</a></li>
                  <li class="dropdown menu__item">
                    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Đồ nam <span class="caret"></span></a>
                    <ul class="dropdown-menu multi-column columns-3">
                      <div class="row">
                        <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                          <a href="mens.html"><img src="{{asset('frontend/images/woo1.jpg')}}" alt=" "/></a>
                        </div>
                        <div class="col-sm-3 multi-gd-img">
                          <ul class="multi-column-dropdown">
                            <li><a href="mens.html">Clothing</a></li>
                            <li><a href="mens.html">Wallets</a></li>
                            <li><a href="mens.html">Footwear</a></li>
                            <li><a href="mens.html">Watches</a></li>
                            <li><a href="mens.html">Accessories</a></li>
                            <li><a href="mens.html">Bags</a></li>
                            <li><a href="mens.html">Caps & Hats</a></li>
                          </ul>
                        </div>
                        <div class="col-sm-3 multi-gd-img">
                          <ul class="multi-column-dropdown">
                            <li><a href="mens.html">Jewellery</a></li>
                            <li><a href="mens.html">Sunglasses</a></li>
                            <li><a href="mens.html">Perfumes</a></li>
                            <li><a href="mens.html">Beauty</a></li>
                            <li><a href="mens.html">Shirts</a></li>
                            <li><a href="mens.html">Sunglasses</a></li>
                            <li><a href="mens.html">Swimwear</a></li>
                          </ul>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </ul>
                  </li>
                  <li class="dropdown menu__item">
                    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Đồ nữ <span class="caret"></span></a>
                    <ul class="dropdown-menu multi-column columns-3">
                      <div class="row">
                        <div class="col-sm-3 multi-gd-img">
                          <ul class="multi-column-dropdown">
                            <li><a href="womens.html">Clothing</a></li>
                            <li><a href="womens.html">Wallets</a></li>
                            <li><a href="womens.html">Footwear</a></li>
                            <li><a href="womens.html">Watches</a></li>
                            <li><a href="womens.html">Accessories</a></li>
                            <li><a href="womens.html">Bags</a></li>
                            <li><a href="womens.html">Caps & Hats</a></li>
                          </ul>
                        </div>
                        <div class="col-sm-3 multi-gd-img">
                          <ul class="multi-column-dropdown">
                            <li><a href="womens.html">Jewellery</a></li>
                            <li><a href="womens.html">Sunglasses</a></li>
                            <li><a href="womens.html">Perfumes</a></li>
                            <li><a href="womens.html">Beauty</a></li>
                            <li><a href="womens.html">Shirts</a></li>
                            <li><a href="womens.html">Sunglasses</a></li>
                            <li><a href="womens.html">Swimwear</a></li>
                          </ul>
                        </div>
                        <div class="col-sm-6 multi-gd-img multi-gd-text ">
                          <a href="womens.html"><img src="{{asset('frontend/images/woo.jpg')}}" alt=" "/></a>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </ul>
                  </li>
                  <li class=" menu__item"><a class="menu__link" href="electronics.html">Công nghệ</a></li>
                  <li class=" menu__item"><a class="menu__link" href="electronics.html">Bộ sưu tập</a></li>
                  <li class="dropdown menu__item">
                    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chính sách <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Chính sách vận chuyển</a></li>
                        <li><a href="#">Chính sách bán hàng</a></li>
                        <li><a href="#">Cam kết chất lượng</a></li>
                        <li><a href="#">Bảo hành sản phẩm</a></li>
                      </ul>
                  </li>
                  <li class=" menu__item"><a class="menu__link" href="contact.html">Liên hệ</a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
        <div class="top_nav_right">
          <div class="cart box_1">
            <a href="checkout.html">
              <h3>
                <div class="total">
                  <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                  <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)
                </div>
              </h3>
            </a>
            <p><a href="javascript:;" class="simpleCart_empty">Hủy giỏ hàng</a></p>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div id="stickyalias"></div>
    <!-- //banner-top -->