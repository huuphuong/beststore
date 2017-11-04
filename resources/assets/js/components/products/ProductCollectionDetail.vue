<template>
	<div id="root">
		<div class="row">
			<div class="btn-group pull-right m-r-10">
				<action :actionText="'Danh sách'" :actionIcon="'glyphicon glyphicon-th-list'" :actionRoute="'ProductCollection'"></action>
				<action :actionText="'Tạo'" :actionIcon="'glyphicon glyphicon-plus'" :actionRoute="'CollectionAdd'"></action>
				<action :actionText="'Sửa'" :actionIcon="'glyphicon glyphicon-eye-open'" :actionRoute="'CollectionEdit'" :actionsParams="this.$route.params.id"></action>
			</div>
		</div><!-- /.row -->

		<div class="panel panel-default m-t-20">
			<div class="panel-heading">
				<h3 class="panel-title">Chi tiết bộ sưu tập</h3>
			</div>
			<div class="panel-body" v-if="group">
				<div class="col-sm-6">
					<legend>Thông tin bộ sưu tập</legend>
					<table class="table table-hover">
						<tr>
							<th class="text-success">Mã bộ sưu tập: </th>
							<th>{{ group.pg_id }}</th>
						</tr>

						<tr>
							<th class="text-success">Tên bộ sưu tập: </th>
							<th>{{ group.pg_name }}</th>
						</tr>

						<tr>
							<th class="text-success">Ghi chú: </th>
							<th>{{ group.pg_desc }}</th>
						</tr>

						<tr>
							<th class="text-success">Tạo lúc: </th>
							<th>{{ group.created_at }}</th>
						</tr>

						<tr>
							<th class="text-success">Cập nhật lúc: </th>
							<th>{{ group.updated_at }}</th>
						</tr>

						<tr>
							<th class="text-success">Xóa lúc: </th>
							<th>{{ group.deleted_at }}</th>
						</tr>
					</table>

					<hr class="row">

					<button type="button" class="btn btn-primary" @click="updatePosition">Cập nhật vị trí</button>
				</div><!-- /.col-sm-6 -->

				<div class="col-sm-6">
					<legend>Kéo thả để thay đổi vị trí sắp xếp</legend>

					<!-- /.Model chính bằng product_number vì 2 way binding -->
					<draggable v-model="product_number">
						<transition-group>
							<div v-for="(product, index) in product_number" :key="product.product_id">
								<li class="list-group-item r-0 m-b-10">
									<img v-bind:src="product.product_image" class="image-responsive img-circle" width="35px" height="35px">
									<span class="m-l-15">{{product.product_name}}</span>
									<span class="glyphicon glyphicon-remove pull-right remove-product" @click="removeProduct(product.product_id, index)"></span>
								</li>
							</div>
						</transition-group>
					</draggable>

				</div>
			</div>

			<!-- /.No data -->
			<div class="panel-body" v-else>
				Không có dữ liệu
			</div>
			<!-- /.End no data -->
		</div>

	</div>
</template>


<script src="./ProductCollectionDetail.js"></script>