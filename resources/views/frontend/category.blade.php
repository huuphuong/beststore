@inject('AppHelper', 'App\Helpers\AppHelper')

@extends('frontend.master')
@section('title', $categories[0]->cat_name)

@section('contents')
<div class="page-head">
	<div class="container">
		<h3>{{ $categories[0]->cat_name }}</h3>
	</div>
</div>

<div class="men-wear" id="category-wrapper">
	<div class="container">
		<div class="col-md-4 products-left">
			<div class="filter-price">
				<h3>Lọc theo giá</h3>
				<ul class="dropdown-menu6">
					<li>
						<div id="slider-range"></div>
						<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
					</li>
				</ul>
			</div>

			@include('frontend.components.catetree')

			@include('frontend.components.comunity')
		</div>

		@include('frontend.components.compare', ['productThree' => $categories])
		<div class="single-pro"> 
			@foreach ($categories AS $k => $category)
				@if ($k >= 3)
						<div class="col-md-3 product-men @if($k == 3 || $k >= 4) yes-marg @endif">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{ !empty($category->product_image) ? $category->product_image : 'http://via.placeholder.com/255x291' }}" alt="{{ $category['product_name'] }}" class="pro-image-front" width="255px" height="291px">
									<img src="{{ !empty($category->product_image) ? $category->product_image : 'http://via.placeholder.com/255x291' }}" class="pro-image-back" width="255px" height="291px">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="single.html" class="link-product-add-cart">Chi tiết</a>
										</div>
									</div>
									<span class="product-new-top">New</span>				
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">{{ $category->product_name }}</a></h4>
									<div class="info-product-price">
										@if (!empty($AppHelper::number($category->product_pricesale)))
										<span class="item_price">{{ $category->product_pricesale }}</span>
										<del>{{ $category->product_price }}</del>
										@else
										<span class="item_price">{{ $category->product_price }}</span>
										@endif
									</div>
									<a href="javascript:void(0);" class="btn btn-warning btn-radius" @click="addToCart({{ json_encode($category) }})">Thêm vào giỏ</a>									
								</div>
							</div>
						</div>
				@else
						@continue
				@endif
			@endforeach
		</div>

		<div class="clearfix"></div>
		<!-- /.Pagination -->
		<div class="pagination-grid text-center">
			{{ $categories->links() }}
		</div>
	</div>
</div>
@endsection