@include('frontend.layouts.header')
	@include('frontend.components.banner')
	@include('frontend.components.new_arrival')
	@include('frontend.components.content_bottom')
	
	<!-- product-easy -->
	<div class="product-easy">
		<div class="container">
			<div class="sap_tabs">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						@forelse ($productGroup AS $k => $pg)
						<li class="resp-tab-item" aria-controls="tab_item-{{$k}}" role="tab"><span>{{$pg->pg_name}}</span></li>
						@endforeach
					</ul>
					<div class="resp-tabs-container" id="wrapper">
						@include('frontend.components.product_easy_block', ['products' => $data[1]])
						@include('frontend.components.product_easy_block', ['products' => $data[2]])
						@include('frontend.components.product_easy_block', ['products' => $data[3]])
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.End product-easy -->


	<!-- Counpon -->
	@include('frontend.components.coupon')

@include('frontend.layouts.footer')