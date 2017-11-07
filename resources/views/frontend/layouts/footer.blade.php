@inject('setting', 'App\Models\Setting')

@php
$data = $setting->getSetting();
@endphp
<!-- footer -->
<div class="footer">
  <div class="container">
    <div class="col-md-3 footer-left">
      <h2><a href="index.html"><img src="{{ $data['logo'] }}" alt="Smart Shop" /></a></h2>
      <p>{{ $data['slogan'] }}</p>
    </div>
    <div class="col-md-9 footer-right">
      <div class="col-sm-4 newsleft">
        <h3>{{ $data['newletter'] }}</h3>
      </div>
      <div class="col-sm-8 newsright" id="subscribeForm">
        <form @submit.prevent="subscribe">
          <input type="text" placeholder="Nhập email của bạn" required="required" v-model="sub_email">
          <input type="submit" value="Đăng ký">
          <span class="label label-danger" v-show="message">@{{message}}</span>
        </form>
      </div>
      <div class="clearfix"></div>
      <div class="sign-grds">
        <div class="col-md-4 sign-gd">
          <h4>{{ $data['categories'] }}</h4>
          <ul>
            @forelse (json_decode($data['categories_item'], true) AS $slug => $page)
            <li><a href="{!! $slug !!}">{{ $page }}</a></li>
            @empty
            <!-- No page item -->
            @endforelse
          </ul>
        </div>
        <div class="col-md-4 sign-gd-two">
          <h4>Thông tin Shop</h4>
          <ul>
            <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Địa chỉ: {{ $data['address'] }}</li>
            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email: <a href="mailto:info@example.com">{{ $data['email'] }}</a></li>
            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Điện thoại: <a href="tel:{{$data['phone']}}">{{ $data['phone'] }}</a></li>
            <li><i class="glyphicon glyphicon-headphones" aria-hidden="true"></i>Skype: {{ $data['skype'] }}</li>
          </ul>
        </div>
        <div class="col-md-4 sign-gd flickr-post">
          <h4>Facebook Fanpage</h4>
          <div class="fb-page" data-href="https://www.facebook.com/Testing-Fanpage-1435158473270561/" data-width="450" data-height="450" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Testing-Fanpage-1435158473270561/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Testing-Fanpage-1435158473270561/">Testing Fanpage</a></blockquote></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
    <p class="copy-right">{!! $data['copyright'] !!}</p>
  </div>
</div>
<!-- //footer -->

@include('frontend.components.login_modal')

<!-- Javascript -->
<script type="application/x-javascript" src="{{asset('frontend/js/url-bar.js')}}"></script>
<script src="https://unpkg.com/vue"></script>
<script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script>
<script src="{{ asset('js/locale_vi.js') }}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery-2.1.4.min.js')}}"></script>
<!-- for bootstrap working -->
<script type="text/javascript" src="{{asset('frontend/js/bootstrap-3.1.1.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.easing.min.js')}}"></script>
<script src="{{ asset('bower_components/jquerytoast/jquery.toast.js') }}"></script>
<script src="{{asset('frontend/js/app.jquery.js')}}"></script>
<script src="{{asset('frontend/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.3.4"></script>
<script src="{{asset('frontend/js/HomeComponent.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/LoginComponent.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/CartComponent.js')}}?v={{time()}}" type="text/javascript"></script>
</body>
</html>