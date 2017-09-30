<template>
	<div class="container">
		<div class="row">
			<div class="btn-group pull-right m-r-10 m-b-10">

				<router-link :to="{name: 'ProductCreate'}">
					<a class="btn btn-default">
					 <span class="glyphicon glyphicon-plus"></span> Add Product 

					</a>
				</router-link>
				<router-link :to="{name: 'ProductList'}">
					<a class="btn btn-default">
						<span class="glyphicon glyphicon-th-list"></span> List Product</a>
				</router-link>
				<router-link :to="{name: 'ProductEdit'}">
					<a class="btn btn-default">
						<span class="glyphicon glyphicon-pencil"></span> Edit Product</a>
				</router-link>
			</div>
		</div>

		<div class="panel panel-default" v-if="product">
			<div class="panel-heading">
				<h3 class="panel-title">{{ product.product_name }}</h3>
			</div>
			<div class="panel-body">
				<div class="col-sm-3">
					<img v-bind:src="product.product_image" class="img-responsive img-circle">
				</div><!-- /.col-sm-4 -->
				<div class="col-sm-9">
					<table class="table table-hover">
						<tr>
							<th class="text-success">Product ID: </th>
							<th>{{ product.product_id }}</th>
						</tr>
						<tr>
							<th class="text-success">Category: </th>
							<th>{{ product.cat_name }}</th>
						</tr>
						<tr>
							<th class="text-success">Product name: </th>
							<th>{{ product.product_name }}</th>
						</tr>
						<tr>
							<th class="text-success">Price: </th>
							<th>{{ product.product_price }}</th>
						</tr>
						<tr>
							<th class="text-success">Price Sale: </th>
							<th>{{ product.product_pricesale }}</th>
						</tr>
						<!-- <tr>
							<th class="text-success">Intro: </th>
							<td v-html="product.product_intro"></td>
						</tr>
						<tr>
							<th class="text-success">Content: </th>
							<td>
								<modal name="content-modal" :resizable="true" :scrollable="true" :height="'auto'" :width="1024">
									<div class="container" v-html="product.product_content"></div>
								</modal>
							</td>
						</tr> -->
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
							<th>{{ product.size }}</th>
						</tr>
						<tr>
							<th class="text-success">Color: </th>
							<th>
								<ul class="list-unstyled list-inline">
									<li v-for="(color, index) in product.color">
										<span class="my-square" v-bind:style="{'background-color': '#'+color}"></span>
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
							<th class="text-success">Display:</th>
							<th>
								<span class="label label-success" v-if="product.display == 1">Display</span>
								<span class="label label-warning" v-else>None</span>
							</th>
						</tr>
						<tr>
							<th class="text-success">Vendor:</th>
							<th>{{ product.vendor_name }}</th>
						</tr>
						<tr>
							<th class="text-success">Created at: </th>
							<th>{{ product.created_at }}</th>
						</tr>
						<tr>
							<th class="text-success">Updated at: </th>
							<th>{{ product.updated_at }}</th>
						</tr>
						<tr>
							<th class="text-success">Deleted at: </th>
							<th>{{ product.deleted_at != null ? product.deleted_at : 'Sản phẩm này chưa bị xóa.' }}</th>
						</tr>
					</table>
				</div><!-- /.col-sm-8 -->
			</div>
			

			<div class="panel-body" v-if="product.image_list">
				<legend>Image detail (for zoom product)</legend>
				<div class="col-sm-2" v-for="image in product.image_list">
					<img v-bind:src="image.storage" class="img-responsive img-circle">
				</div>
			</div>
		</div>

		<div class="panel panel-default" v-else>
			<div class="panel-heading">
				<h3 class="panel-title">Product Detail</h3>
			</div>
			<div class="panel-body">
				No data
			</div>
		</div>
	</div>
</template>
<script src="./ProductDetail.js"></script>