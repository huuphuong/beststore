@inject('setting', 'App\Models\Setting')
@inject('productGroup', 'App\Models\ProductGroup')
@inject('vendor', 'App\Models\Vendor')

@php
	$settings = $setting->getSetting();
@endphp
<div class="new_arrivals">
	<div class="container">
		<h3>{!! $settings['arr_title'] !!}</h3>
		<p>{{ $settings['arr_desc'] }}</p>
		<div class="new_grids">

			@php
				$collection_1 = $productGroup::where('pg_id', $settings['arr_collection_1'])
											 ->first()
											 ->toArray();
			@endphp

			<div class="col-md-4 new-gd-left">
				<img src="{{ $collection_1['pg_background'] }}" alt="{{ $collection_1['pg_name'] }}" />
				<div class="wed-brand simpleCart_shelfItem">
					<h4>{{ $collection_1['pg_name'] }}</h4>
					<h5>{{ $settings['text_1'] }}</h5>
					<p>
						<!-- <i>$250</i>  -->
						<!-- <span class="item_price">$500</span> -->
						<a class="item_add hvr-outline-out button2" href="#">
							Mua hàng
						</a>
					</p>
				</div>
			</div>
			<div class="col-md-4 new-gd-middle">
				<div class="new-levis">
					<div class="mid-img">
						@php
							$vendor_1 = $vendor::where('vendor_id', $settings['vendor_1'])
											   ->first()
											   ->toArray();
						@endphp
						<img src="{{ $vendor_1['vendor_images'] }}" alt="{{ $vendor_1['vendor_name'] }}" />
					</div>
					<div class="mid-text">
						<h4>{{ $settings['text_1'] }}</h4>
						<a class="hvr-outline-out button2" href="product.html">Xem ngay</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="new-levis">
					<div class="mid-text">
						<h4>{{ $settings['text_2'] }}</h4>
						<a class="hvr-outline-out button2" href="product.html">Xem ngay </a>
					</div>
					<div class="mid-img">
						@php
							$vendor_2 = $vendor::where('vendor_id', $settings['vendor_2'])
											   ->first()
											   ->toArray();
						@endphp
						<img src="{{ $vendor_2['vendor_images'] }}" alt="{{ $vendor_2['vendor_name'] }}" />
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>

			@php
				$collection_2 = $productGroup::where('pg_id', $settings['arr_collection_2'])
											 ->first()
											 ->toArray();
			@endphp
			<div class="col-md-4 new-gd-left">
				<img src="{{ $collection_2['pg_background'] }}" alt=" " />
				<div class="wed-brandtwo simpleCart_shelfItem">
					<h4>{{ $collection_2['pg_shopname'] }}</h4>
					<p>{{ $collection_2['pg_name'] }}</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //content -->