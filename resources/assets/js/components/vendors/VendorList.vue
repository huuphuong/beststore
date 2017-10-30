<template>
	<div id="root">
		<div class="btn-group">
			<router-link class="btn btn-default" :to="{name: 'VendorCreate'}">
				<span class="glyphicon glyphicon-plus"></span> Create Vendor
			</router-link>
		</div>

		<div class="panel panel-default m-t-20">
			<div class="panel-heading">
				<h3 class="panel-title">List Vendor</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#VendorID</th>
							<th>Logo branch</th>
							<th>Vendor name</th>
							<th>Email</th>
							<th>Skype</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Action</th>
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
								<router-link :to="{name: 'EditVendor', params: {id: vendor.vendor_id} }" class="btn btn-default">Edit</router-link>
								<button type="button" class="btn btn-danger" @click="removeVendor(vendor.vendor_id, key)">Delete</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script src="./VendorList.js"></script>