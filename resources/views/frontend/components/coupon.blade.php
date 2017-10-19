@inject('tutorial', 'App\Models\Tutorial')
@php
	$tutorial_data = $tutorial->getTutorial();
@endphp

<div class="coupons" style="background:url({{ $tutorial_data->background }}) no-repeat center;background-size:cover; -webkit-background-size: cover; -o-background-size: cover; -ms-background-size: cover; -moz-background-size: cover;">
	<div class="container">
		<div class="coupons-grids text-center">
			<div class="col-md-3 coupons-gd">
				<h3>{{ $tutorial_data->title }}</h3>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="{{ $tutorial_data->icon1 }}" aria-hidden="true"></span>
				<h4>{{ $tutorial_data->action1 }}</h4>
				<p>{{ $tutorial_data->desc1 }}</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="{{ $tutorial_data->icon2 }}" aria-hidden="true"></span>
				<h4>{{ $tutorial_data->action2 }}</h4>
				<p>{{ $tutorial_data->desc2 }}</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="{{ $tutorial_data->icon3 }}" aria-hidden="true"></span>
				<h4>{{ $tutorial_data->action3 }}</h4>
				<p>{{ $tutorial_data->desc3 }}</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>