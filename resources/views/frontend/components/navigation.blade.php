@inject('nav', 'App\Models\Navigation');

@php
    $navigations = $nav->getNavigation();
@endphp

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
              @foreach ($navigations AS $item)
                @if ($item->parent_id == 0 && $nav->hasChildNavigation($item->id) == 0)
                  <li class="menu__item @if($item->url == '/') active menu__item--current @endif">
                      <a class="menu__link" href="{{ $item->url }}">{!! $item->text_link !!}</a>
                  </li>
                @elseif ($nav->hasChildNavigation($item->id) > 0)

                @php
                  $child_data = $nav->getChildNav($item->id);
                @endphp
                <li class="dropdown menu__item">
                  <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!! $item->text_link !!} <span class="caret"></span></a>
                  <!-- /.Check có phải chính sách hay ko -->
                  @if (strtolower(trim($item->text_link)) != 'chính sách')
                    <ul class="dropdown-menu multi-column columns-3">
                      <div class="row">
                        <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                          <a href="{{ $item->url }}">
                            <img src="{{ $item->image }}" alt="{{ $item->text_link }}"/>
                          </a>
                        </div>
                        <!-- Cho vào mảng sau đó foreach thành 2 lần chia cột mỗi bên 7 item -->
                        <div class="col-sm-3 multi-gd-img">
                          <ul class="multi-column-dropdown">
                            @for ($i=0, $count = count($child_data); $i<$count; $i++)
                                @if ($i <= 6)
                                <li><a href="{{ $child_data[$i]->url }}">{{ $child_data[$i]->text_link }}</a></li>
                                    @php
                                      unset($child_data[$i]);
                                    @endphp
                                @else
                                    @break
                                @endif
                            @endfor
                          </ul>
                        </div>
                        <div class="col-sm-3 multi-gd-img">
                          <ul class="multi-column-dropdown">
                            @foreach ($child_data AS $val)
                            <li><a href="{{ $val->url }}">{{ $val->text_link }}</a></li>
                            @endforeach
                          </ul>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </ul>

                  @else
                    <ul class="dropdown-menu">
                      @foreach ($child_data AS $val)
                      <li><a href="{{ $val->url }}">{{ $val->text_link }}</a></li>
                      @endforeach
                    </ul>
                  @endif
                </li>
                @endif
              @endforeach
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