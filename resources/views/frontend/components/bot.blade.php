@inject('setting', 'App\Models\Setting')
@inject('category', 'App\Models\Category')

@php
    $data = $setting->getSetting();
    $categories = $category->getParentCate();
@endphp

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
            @foreach ($categories AS $category)
            <option value="#">{{ $category->cat_name }}</option>
            @endforeach
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