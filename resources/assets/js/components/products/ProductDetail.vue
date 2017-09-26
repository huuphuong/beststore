<template>
	<div class="container">
		<div class="row">
			<div class="btn-group pull-right m-r-10 m-b-10">
				<router-link :to="{name: 'ProductCreate'}">
					<a class="btn btn-default">
					 <span class="glyphicon glyphicon-plus"></span> Thêm 

					</a>
				</router-link>
				<router-link :to="{name: 'ProductList'}">
					<a class="btn btn-default">
						<span class="glyphicon glyphicon-th-list"></span> Danh sách</a>
				</router-link>
				<router-link :to="{name: 'ProductEdit'}">
					<a class="btn btn-default">
						<span class="glyphicon glyphicon-pencil"></span> Sửa</a>
				</router-link>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">ProductDetail</h3>
			</div>
			<div class="panel-body">
				<div class="col-sm-3">
					<img v-bind:src="product.product_image" class="img-responsive">
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
								<ul class="list-unstyled">
									<li v-for="(color, index) in product.color">
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
		</div>
	</div>
</template>
<script src="./ProductDetail.js"></script>