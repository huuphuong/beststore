@inject('setting', 'App\Models\Setting')
@php
	$settings = $setting->getSetting();
@endphp

<div class="content-bottom">
	<div class="col-md-7 content-lgrid">
		<div class="col-sm-6 content-img-left text-center">
			<div class="content-grid-effect slow-zoom vertical">
				<div class="img-box"><img src="{{asset('frontend/images/p1.jpg')}}" alt="image" class="img-responsive zoom-img"></div>
				<div class="info-box">
					<div class="info-content simpleCart_shelfItem">
						<h4>Mobiles</h4>
						<span class="separator"></span>
						<p><span class="item_price">$500</span></p>
						<span class="separator"></span>
						<a class="item_add hvr-outline-out button2" href="#">add to cart </a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 content-img-right">
			<h3>{{ $settings['top_offer_content_1'] }}
				<span>{{ $settings['top_offer_content_2'] }}</span>
				{{ $settings['top_offer_content_3'] }}
			</h3>
		</div>

		<div class="col-sm-6 content-img-right">
			<h3>{{ $settings['bottom_offer_content_1'] }}
				<span>{{ $settings['bottom_offer_content_2'] }}</span>
				{{ $settings['bottom_offer_content_3'] }}
			</h3>
		</div>
		<div class="col-sm-6 content-img-left text-center">
			<div class="content-grid-effect slow-zoom vertical">
				<div class="img-box"><img src="{{asset('frontend/images/p2.jpg')}}" alt="image" class="img-responsive zoom-img"></div>
				<div class="info-box">
					<div class="info-content simpleCart_shelfItem">
						<h4>Watches</h4>
						<span class="separator"></span>
						<p><span class="item_price">$250</span></p>
						<span class="separator"></span>
						<a class="item_add hvr-outline-out button2" href="#">add to cart </a>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="col-md-5 content-rgrid text-center">
		<div class="content-grid-effect slow-zoom vertical">
			<div class="img-box"><img src="{{asset('frontend/images/p4.jpg')}}" alt="image" class="img-responsive zoom-img"></div>
			<div class="info-box">
				<div class="info-content simpleCart_shelfItem">
					<h4>Shoes</h4>
					<span class="separator"></span>
					<p><span class="item_price">$150</span></p>
					<span class="separator"></span>
					<a class="item_add hvr-outline-out button2" href="#">add to cart </a>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<!-- //content-bottom -->