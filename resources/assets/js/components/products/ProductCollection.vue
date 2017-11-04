<template>
	<div id="root">
		<div class="row">
			<div class="btn-group pull-right m-r-10">
				<action :actionText="'Tạo bộ sưu tập'" :actionIcon="'glyphicon glyphicon-plus'" :actionRoute="'CollectionAdd'"></action>
			</div>
		</div><!-- /.row -->

		<div class="panel panel-default m-t-20">
			<div class="panel-heading">
				<h3 class="panel-title">Danh sách bộ sưu tập</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover table-colored table-success">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên bộ sưu tập</th>
							<th>Giảm giá(%)</th>
							<th>Tên shop</th>
							<th>Hình nền</th>
							<th>Hiển thị</th>
							<th>Ghi chú</th>
							<th>Số lượng SP</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(collection, key) in collections">
							<td>#CL{{ collection.pg_id }}</td>
							<td>{{ collection.pg_name }}</td>
							<td>-{{ collection.pg_discount }}%</td>
							<td>{{ collection.pg_shopname }}</td>
							<td>
								<img v-bind:src="collection.pg_background" class="img-responsive" width="144" height="144">
							</td>
							<td>
								<span v-if="collection.display" class="label label-success">Hiển hị</span>
								<span class="label label-warning" v-else>Không hiển hị</span>
							</td>
							<td>{{ collection.description }}</td>
							<td>{{ collection.count }}</td>
							<td>
								<router-link :to="{name: 'CollectionEdit', params: {id: collection.pg_id}}">Sửa</router-link> |
								<router-link :to="{name: 'ProductCollectionDetail', params: {id: collection.pg_id} }">Chi tiết</router-link> |
								<button type="button" class="btn btn-link p-0" @click="deleteProductGroup(collection.pg_id, key)">Xóa</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script src="./ProductCollection.js"></script>