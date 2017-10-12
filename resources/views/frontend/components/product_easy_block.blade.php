@inject('AppHelper', 'App\Helpers\AppHelper')

<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
	@foreach ($products AS $k => $product)
	<div class="col-md-3 product-men {{ $k>=4 ? 'yes-marg' : null }}">
		<div class="men-pro-item simpleCart_shelfItem">
			<div class="men-thumb-item">
				<img src="{{ $product->product_image }}" alt="" class="pro-image-front">
				<img src="{{ $product->product_image }}" alt="" class="pro-image-back">
				<div class="men-cart-pro">
					<div class="inner-men-cart-pro">
						<a href="{{ route('site.product.detail', [$product->product_slug, $product->product_id]) }}" class="link-product-add-cart">Chi tiết</a>
					</div>
				</div>
				
				@if (!empty ($product->product_pricesale))
					<span class="product-new-top is-sale">
						@php
							$sale = $AppHelper::number($product->product_pricesale) / $AppHelper::number($product->product_price);
							$sale = 100 - ($sale*100);
							$sale = '-' . floor($sale) . '%';
						@endphp

						{{ $sale }}
					</span>
				@elseif (empty ($product->is_new) && !empty ($product->is_hot))
					<span class="product-new-top is-hot">Hot</span>
				@elseif ($product->is_new && empty($product->product_pricesale))
					<span class="product-new-top is-new">Mới</span>
				@endif
			</div>


			<div class="item-info-product ">
				<h4><a href="single.html">{{$product->product_name}}</a></h4>
				<div class="info-product-price">
					@if (!empty ($product->product_pricesale))
						<span class="item_price">{{$product->product_pricesale}}</span>
						<del>{{$product->product_price}}</del>
					@else
						<span class="item_price">{{$product->product_price}}</span>
					@endif
				</div>
				<a href="#" class="btn btn-success btn-radius"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua hàng</a>
				<a href="#" class="btn btn-default btn-radius"><i class="fa fa-share-alt" aria-hidden="true"></i> Chia sẻ</a>
			</div>
		</div>
	</div>
	@endforeach
	<div class="clearfix"></div>
</div>
<!-- /.End tab 0 -->