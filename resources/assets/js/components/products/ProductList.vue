<template>
	<div id="root">
		<div class="row">
			<div class="btn-group pull-right m-r-10 m-b-10">
				<router-link :to="{name: 'ProductCreate'}">
					<a class="btn btn-default">
						<span class="glyphicon glyphicon-plus"></span> Add Product
					</a>
				</router-link>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Product List</h3>
			</div>
			<div class="panel-body">
				<div class="row m-b-20">
					<div class="form-group">
						<form action="" method="POST" autocomplete="off">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="name">Product name:</label>
									<input type="text" class="form-control">
								</div>

								<div class="form-group">
									<label for="name">Is hot:</label>
									<select name="" id="input" class="form-control" required="required">
										<option value="">All</option>
									</select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label for="name">Category:</label>
									<recusive v-model="category"></recusive>
								</div>
								

								<div class="form-group">
									<label for="name">Is new:</label>
									<select name="" id="input" class="form-control" required="required">
										<option value="">All</option>
									</select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label for="name">Vendor:</label>
									<select-option :first="'All vendor'" :listData="vendors"></select-option>
									{{ vendors }}
								</div>

								<div class="form-group">
									<label for="name">Is sale:</label>
									<select name="" id="input" class="form-control" required="required">
										<option value="">All</option>
									</select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<h2 class="m-t-15 text-center">Quantity: 999</h2>
								</div>

								<div class="form-group ">
									<button type="button" class="btn btn-default btn-block">Cancel</button>
									<button type="button" class="btn btn-primary btn-block" @click="fetchData">Filter</button>
								</div>
							</div>
							
						</form>
					</div>	
				</div>

				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Category</th>
								<th>Image</th>
								<th>Product name</th>
								<th>Price</th>
								<th>Is sale</th>
								<th>Is new</th>
								<th>Is hot</th>
								<th>Vendor</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(product, index) in products">
								<td>#{{ product.product_id }}</td>
								<td>{{ product.cat_name }}</td>
								<td>
									<img v-bind:src="product.product_image" v-bind:alt="product.product_name" class="img-resposive img-circle" width="45px" height="45px">
								</td>
								<td>{{ product.product_name }}</td>
								<td>{{ product.product_price}}</td>
								<td>{{ product.is_sale ? 'Yes' : 'No' }}</td>
								<td>{{ product.is_new ? 'Yes' : 'No' }}</td>
								<td>{{ product.is_hot ? 'Yes' : 'No' }}</td>
								<td>{{ product.vendor_name }}</td>
								<td>
									<router-link :to="{ name: 'ProductEdit', params:{id: product.product_id} }"><span class="glyphicon glyphicon-pencil"></span> <a>Edit</a></router-link> | 
									<button class="btn btn-link" @click="deleteProduct(product.product_id, index)"><span class="glyphicon glyphicon-trash"></span> Delete</button> |
									<router-link :to="{name: 'ProductDetail', params: {id: product.product_id} }"><span class="glyphicon glyphicon-eye-open"></span> Detail</router-link>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>

<script src="./ProductList.js"></script>