@inject('setting', 'App\Models\Setting')
@inject('products', 'App\Models\Product')
@inject('helper', 'App\Helpers\AppHelper')
@php
	$settings = $setting->getSetting();
@endphp

<div class="content-bottom">
	<div class="col-md-7 content-lgrid">
		<div class="col-sm-6 content-img-left text-center">
			<div class="content-grid-effect slow-zoom vertical">
				@php
					$special_1 = $products::where('product_id', $settings['special_product_1'])
										  ->select('product_id', 'product_name', 'product_image', 'product_price', 'product_pricesale')
										  ->first()
										  ->toArray();
				@endphp
				<div class="img-box"><img src="{{ $special_1['product_image'] }}" alt="image" class="img-responsive zoom-img"></div>
				<div class="info-box">
					<div class="info-content simpleCart_shelfItem">
						<h4>{{ $special_1['product_name'] }}</h4>
						<span class="separator"></span>
						<p>
							<span class="item_price">
								{{ !empty($helper::number($special_1['product_pricesale'])) ? $special_1['product_pricesale'] : $special_1['product_price'] }}
								 VNĐ
							</span>
						</p>
						<span class="separator"></span>
						<a class="item_add hvr-outline-out button2" href="#">Thêm vào giỏ</a>
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
				@php
					$special_2 = $products::where('product_id', $settings['special_product_2'])
										  ->select('product_id', 'product_name', 'product_image', 'product_price', 'product_pricesale')
										  ->first()
										  ->toArray();
				@endphp
				<div class="img-box"><img src="{{ $special_2['product_image'] }}" alt="image" class="img-responsive zoom-img"></div>
				<div class="info-box">
					<div class="info-content simpleCart_shelfItem">
						<h4>{{ $special_2['product_name'] }}</h4>
						<span class="separator"></span>
						<p>
							<span class="item_price">
								{{ !empty($helper::number($special_2['product_pricesale'])) ? $special_2['product_pricesale'] : $special_2['product_price'] }}
								 VNĐ
							</span>
						</p>
						<span class="separator"></span>
						<a class="item_add hvr-outline-out button2" href="#">Thêm vào giỏ</a>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="col-md-5 content-rgrid text-center">
		<div class="content-grid-effect slow-zoom vertical">
				@php
					$special_3 = $products::where('product_id', $settings['special_product_3'])
										  ->select('product_id', 'product_name', 'product_image', 'product_price', 'product_pricesale')
										  ->first()
										  ->toArray();
				@endphp
				<div class="img-box"><img src="{{ $special_3['product_image'] }}" alt="image" class="img-responsive zoom-img"></div>
				<div class="info-box">
					<div class="info-content simpleCart_shelfItem">
						<h4>{{ $special_3['product_name'] }}</h4>
						<span class="separator"></span>
						<p>
							<span class="item_price">
								{{ !empty($helper::number($special_3['product_pricesale'])) ? $special_3['product_pricesale'] : $special_2['product_price'] }}
								 VNĐ
							</span>
						</p>
						<span class="separator"></span>
						<a class="item_add hvr-outline-out button2" href="#">Thêm vào giỏ</a>
					</div>
				</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<!-- //content-bottom -->