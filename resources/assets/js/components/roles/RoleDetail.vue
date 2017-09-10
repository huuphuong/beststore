<template>
	<div id="root">
		<!-- <div class="row m-b-15">
			<router-link :to="{name: 'RoleEdit'}" class="pull-right">
				<a class="btn btn-default"><i class="mdi mdi-pencil"></i> Edit Role</a>
			</router-link>
		</div> --><!-- /.row -->

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Role Detail</h3>
				</div>
				<div class="panel-body">
					<div v-if="role">
						<table class="table table-hover">
							<tr>
								<th>RoleID</th>
								<th class="text-success">{{ role.id }}</th>
							</tr>

							<tr>
								<th>Role name</th>
								<th class="text-success">{{ role.role_name }}</th>
							</tr>

							<tr>
								<th>Role description</th>
								<th class="text-success">{{ role.role_desc }}</th>
							</tr>

							<tr>
								<th>Updated_at</th>
								<th class="text-success">{{ role.updated_at }}</th>
							</tr>
						</table>
					</div>

					<div v-else>
						Không có dữ liệu
					</div>
				</div>
			</div>
		</div><!-- /.row -->
	</div>
</template>

<script>

	export default {
		name: 'roleDetail',

		data: function () {
			return {
				role: { },
				id: this.$route.params.id
			}
		},


		mounted: function () {
			this.getRoleDetail()
		},

		methods: {
			getRoleDetail: function () {
				var vm = this;
				var id = vm.id
				var url = `/api/v1/roles/${id}/`

				axios.get(url)
					.then(function (response) {
						vm.role = response.data.data;
					})
					.catch(function (errors) {
						console.log(errors)
					})
			}
		}
	}
</script>