@include('frontend.layouts.header')
	@include('frontend.components.banner')
	@include('frontend.components.new_arrival')
	@include('frontend.components.content_bottom')
	
	<!-- product-easy -->
	<div class="product-easy">
		<div class="container">
			<div class="sap_tabs">
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<ul class="resp-tabs-list">
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Sản phẩm mới</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Ưu đãi đặc biệt</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Bộ sưu tập</span></li>
					</ul>
					<div class="resp-tabs-container">
						@include('frontend.components.product_new')
						@include('frontend.components.special_offer')
						@include('frontend.components.collection')
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.End product-easy -->


	<!-- Counpon -->
	@include('frontend.components.coupon')

@include('frontend.layouts.footer')