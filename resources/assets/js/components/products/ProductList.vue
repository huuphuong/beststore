<template>
	<div id="root">
		<div class="row">
			<div class="btn-group pull-right m-r-10 m-b-10">
				<router-link :to="{name: 'ProductCreate'}">
					<a class="btn btn-default">
						<span class="glyphicon glyphicon-plus"></span> Tạo sản phẩm
					</a>
				</router-link>

				<button type="button" class="btn btn-default m-l-10 m-r-10" @click="modalOpen = true">
					<span class="glyphicon glyphicon-plus"></span>
					Thêm sản phẩm vào Bộ sưu tập
				</button>

				<modal :show.sync="modalOpen" effect="fade" width="400" :backdrop="false">
					<div slot="modal-header" class="modal-header">
						<h4 class="modal-title">
							Thêm sản phẩm vào bộ sưu tập
						</h4>
					</div>

					<div slot="modal-body" class="modal-body">
						<ul class="list-unstyled" v-if="group_data" style="padding-left: 50px;">
							<li>
								<div class="radio">
									<input type="radio" name="product_group_id" v-model="choose_group" value="" />
									Chọn bộ sưu tập
								</div>
							</li>

							<li v-for="group in group_data">
								<div class="radio">
									<input type="radio" name="product_group_id" v-model="choose_group" v-bind:value="group.pg_id" />
									{{ group.pg_name }} ({{group.count}} sản phẩm)
								</div>
							</li>
						</ul>
					</div>

					<div slot="modal-footer" class="modal-footer">
						<button type="button" class="btn btn-default" @click="modalOpen = false">Thoát</button>
						<button type="button" class="btn btn-success" @click="addProductToGroup">Thêm</button>
					</div>
				</modal>

			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Danh sách sản phẩm</h3>
			</div>
			<div class="panel-body">
				<div class="row m-b-20">
					<div class="form-group">
						<form action="" method="POST" autocomplete="off">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="name">Tên sản phẩm:</label>
									<input type="text" class="form-control" v-model="query.product_name">
									<!-- {{ query.product_name }} -->
								</div>

								<div class="form-group">
									<label for="name">Sản phẩm sale:</label>
									<v-conditional v-model="query.is_sale"></v-conditional>
									<!-- {{ query.is_sale }} -->
								</div>

							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label for="name">Danh mục:</label>
									<recusive v-model="query.cat_id"></recusive>
									<!-- {{ query.cat_id }} -->
								</div>


								<div class="form-group">
									<label for="name">Sản phẩm mới:</label>
									<v-conditional v-model="query.is_new"></v-conditional>
									<!-- {{ query.is_new }} -->
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label for="name">Nhà cung cấp:</label>
									<select-option :first="'All vendor'" :listData="vendors" v-model="query.vendor_id"></select-option>
									<!-- {{ query.vendor_id }} -->
								</div>

								<div class="form-group">
									<label for="name">Sản phẩm hot:</label>
									<v-conditional v-model="query.is_hot"></v-conditional>
									<!-- {{ query.is_hot }} -->
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<h2 class="text-center">Tổng số: {{ total }}</h2>
								</div>

								<div class="form-group ">
									<button type="button" class="btn btn-default btn-block" @click="clearPage">Hủy bỏ</button>
									<button type="button" class="btn btn-primary btn-block" @click="getProducts">Tìm kiếm</button>
								</div>
							</div>

						</form>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>
									<input type="checkbox">
								</th>
								<th>ID</th>
								<th>Danh mục</th>
								<th>Ảnh đại diện</th>
								<th>Tên sản phẩm</th>
								<th>Giá</th>
								<th>SP sale?</th>
								<th>SP mới?</th>
								<th>SP hot?</th>
								<th>Hiển thị?</th>
								<th>Nhà cung cấp</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(product, index) in products">
								<td>
									<input type="checkbox" v-model="checkproduct" v-bind:value="product.product_id">
								</td>
								<td>#{{ product.product_id }}</td>
								<td>{{ product.cat_name }}</td>
								<td>
									<img v-bind:src="product.product_image" v-bind:alt="product.product_name" class="img-resposive img-circle" width="45px" height="45px">
								</td>
								<td>{{ product.product_name }}</td>
								<td>
									<div v-if="parseMoney(product.product_pricesale) > 0">
										<s>{{ product.product_price }}</s>
										<p class="text-danger">{{ product.product_pricesale }}</p>
									</div>

									<div v-else>
										{{ product.product_price }}
									</div>
								</td>
								<td>
									<span class="label label-success" v-if="product.is_sale == 1">Có</span>
									<span class="label label-warning" v-else>Không</span>
								</td>
								<td>
									<span class="label label-success" v-if="product.is_new == 1">Có</span>
									<span class="label label-warning" v-else>Không</span>
								</td>
								<td>
									<span class="label label-success" v-if="product.is_hot == 1">Có</span>
									<span class="label label-warning" v-else>Không</span>
								</td>
								<td>
									<span class="label label-success" v-if="product.display == 1">Hiển thị</span>
									<span class="label label-warning" v-else>Không hiển thị</span>
								</td>
								<td>{{ product.vendor_name }}</td>
								<td>
									<router-link :to="{ name: 'ProductEdit', params:{id: product.product_id} }"><span class="glyphicon glyphicon-pencil"></span> <a>Sửa</a></router-link> |
									<button class="btn btn-link m-0 p-0" @click="deleteProduct(product.product_id, index)"><span class="glyphicon glyphicon-trash"></span> Xóa</button> |
									<router-link :to="{name: 'ProductDetail', params: {id: product.product_id} }"><span class="glyphicon glyphicon-eye-open"></span> Chi tiết</router-link>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="panel-footer">
				<center>
					 <paginate
					  :page-count="last_page"
					  :click-handler="getProducts"
					  :page-range="3"
					  :margin-pages="2"
					  :prev-text="'Trước'"
					  :next-text="'Sau'"
					  :container-class="'pagination'"
					  :page-class="'page-item'">
					</paginate>
				</center>
			</div>
		</div>
	</div>
</template>

<script src="./ProductList.js"></script>