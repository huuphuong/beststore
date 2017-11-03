<template>
	<div id="root">
		<div class="row">
			<div class="btn-group pull-right m-r-10">
				<router-link :to="{name: 'RoleList'}" class="btn btn-default">
					<span class="glyphicon glyphicon-th-list"></span> Danh sách quyền
				</router-link>

				<router-link :to="{name: 'RoleCreate'}" class="btn btn-default">
					<span class="glyphicon glyphicon-plus"></span> Tạo quyền
				</router-link>

				<router-link :to="{name: 'RoleEdit', params: {id: this.$route.params.id} }" class="btn btn-default">
					<span class="glyphicon glyphicon-eye-open"></span> Sửa quyền
				</router-link>
			</div>
		</div>

		<div class="row m-t-20">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Chi tiết quyền: {{ role.role_name }}</h3>
				</div>
				<div class="panel-body">
					<div v-if="role">
						<table class="table table-hover">
							<tr>
								<th>#ID</th>
								<th class="text-success">{{ role.id }}</th>
							</tr>

							<tr>
								<th>Tên quyền:</th>
								<th class="text-success">{{ role.role_name }}</th>
							</tr>

							<tr>
								<th>Nội dung:</th>
								<th class="text-success">{{ role.role_desc }}</th>
							</tr>

							<tr>
								<th>Cập nhật lúc:</th>
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
		this.getRoleDetail();
		document.title = 'Chi tiết quyền';
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