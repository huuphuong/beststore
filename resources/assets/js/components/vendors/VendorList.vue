<template>
	<div id="root">
		<div class="row">
			<div class="btn-group pull-right m-r-10">
				<router-link class="btn btn-default" :to="{name: 'VendorCreate'}">
					<span class="glyphicon glyphicon-plus"></span> Tạo nhà cung cấp
				</router-link>
			</div>
		</div><!-- /.row -->

		<div class="panel panel-default m-t-20">
			<div class="panel-heading">
				<h3 class="panel-title">Danh sách nhà cung cấp</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#ID</th>
							<th>Logo</th>
							<th>Nhà cung cấp</th>
							<th>Email</th>
							<th>Skype</th>
							<th>Điện thoại</th>
							<th>Địa chỉ</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(vendor, key) in vendors">
							<td>{{ vendor.vendor_id }}</td>
							<td>
								<img v-bind:src="vendor.vendor_images" class="img-responsive">
							</td>
							<td>
								{{ vendor.vendor_name }}
								<p><strong>({{ vendor.vendor_shortname }})</strong></p>
							</td>
							<td>{{ vendor.vendor_email }}</td>
							<td>{{ vendor.vendor_skype }}</td>
							<td>{{ vendor.vendor_phone }}</td>
							<td>{{ vendor.vendor_address}}</td>
							<td>
								<router-link :to="{name: 'EditVendor', params: {id: vendor.vendor_id} }" class="btn btn-default">Sửa</router-link>
								<button type="button" class="btn btn-danger" @click="removeVendor(vendor.vendor_id, key)">Xóa</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script src="./VendorList.js"></script>