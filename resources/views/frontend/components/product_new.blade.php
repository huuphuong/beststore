<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
	@php
		$products = \App\Models\Product::take(15)->get();
	@endphp

	@foreach ($products AS $k => $product)
	<div class="col-md-3 product-men {{ $k>=4 ? 'yes-marg' : null }}">
		<div class="men-pro-item simpleCart_shelfItem">
			<div class="men-thumb-item">
				<img src="{{ $product->product_image }}" alt="" class="pro-image-front">
				<img src="{{ $product->product_image }}" alt="" class="pro-image-back">
				<div class="men-cart-pro">
					<div class="inner-men-cart-pro">
						<a href="single.html" class="link-product-add-cart">Chi tiết</a>
					</div>
				</div>
				<span class="product-new-top">New</span>

			</div>
			<div class="item-info-product ">
				<h4><a href="single.html">{{$product->product_name}}</a></h4>
				<div class="info-product-price">
					<span class="item_price">{{$product->product_pricesale}}</span>
					<del>{{$product->product_price}}</del>
				</div>
				<a href="#" class="item_add single-item hvr-outline-out button2">Thêm vào giỏ</a>
			</div>
		</div>
	</div>
	@endforeach
	<div class="clearfix"></div>
</div>
<!-- /.End tab 0 -->