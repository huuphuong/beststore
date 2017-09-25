<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">ProductDetail</h3>
		</div>
		<div class="panel-body">
			<div class="col-sm-4">
				<img v-bind:src="product.product_image" class="img-responsive">
			</div><!-- /.col-sm-4 -->
			<div class="col-sm-8">
				<table class="table table-hover">
					<tr>
						<th class="text-success">Product ID:</th>
						<th>{{ product.product_id }}</th>
					</tr>
					<tr>
						<th class="text-success">Category:</th>
						<th>{{ product.cat_id }}</th>
					</tr>
					<tr>
						<th class="text-success">Product name:</th>
						<th>{{ product.product_name }}</th>
					</tr>
					<tr>
						<th class="text-success">Price:</th>
						<th>{{ product.product_price }}</th>
					</tr>
					<tr>
						<th class="text-success">Price Sale:</th>
						<th>{{ product.product_pricesale }}</th>
					</tr>
					<tr>
						<th class="text-success">Intro:</th>
						<th v-html="product.product_intro"></th>
						
					</tr>
					<tr>
						<th class="text-success">Content:</th>
						<th v-html="product.product_content"></th>
					</tr>
					<tr>
						<th class="text-success">View: </th>
						<th>{{ product.product_view }}</th>
					</tr>
					<tr>
						<th class="text-success">Quantity: </th>
						<th>{{ product.product_qty }}</th>
					</tr>
					<tr>
						<th class="text-success">Size: </th>
						<th>{{ JSON.parse(product.size).join(', ') }}</th>
					</tr>
					<tr>
						<th class="text-success">Color: </th>
						<th>
							<ul class="list-unstyled">
								<li v-for="(color, index) in JSON.parse(product.color)">
									<span class="my-square" v-bind:style="{'background-color': '#'+index}"></span>
									&nbsp; {{ color }}
								</li>
							</ul>
						</th>
					</tr>
					<tr>
						<th class="text-success">Is new:</th>
						<th>{{ product.is_new == 1 ? 'Yes' : 'No' }}</th>
					</tr>

					<tr>
						<th class="text-success">Is hot:</th>
						<th>{{ product.is_hot == 1 ? 'Yes' : 'No' }}</th>
					</tr>

					<tr>
						<th class="text-success">Is sale:</th>
						<th>{{ product.is_sale == 1 ? 'Yes' : 'No' }}</th>
					</tr>

					<tr>
						<th class="text-success">Vendor:</th>
						<th></th>
					</tr>

					<tr>
						<th class="text-success">Created at: </th>
						<th></th>
					</tr>

					<tr>
						<th class="text-success">Updated at: </th>
						<th></th>
					</tr>

					<tr>
						<th class="text-success">Deleted at: </th>
						<th></th>
					</tr>
				</table>
			</div><!-- /.col-sm-8 -->

		</div>
	</div>
</template>
<script src="./ProductDetail.js"></script>