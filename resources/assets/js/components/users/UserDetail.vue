<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Thông tin user</h3>
		</div>
		<div class="panel-body">
			{{ user.length }}
			<div class="row" v-if="!message">
				<div class="col-sm-3">
					<div v-if="user.avatar">
						<img v-bind:src="user.avatar" class="img-responsive img-thumbnail" title="Ảnh đại diện" />
					</div>
					<div v-else>
						<img src="http://via.placeholder.com/140x140" class="img-responsive img-thumbnail" title="Ảnh đại diện" />
					</div>
				</div>
				<div class="col-sm-9">
					<table class="table table-hover">
						<tr>
							<th>Username:</th>
							<th class="text-success">{{ user.name }}</th>
						</tr>

						<tr>
							<th>Gender:</th>
							<th class="text-success">{{ user.gender }}</th>
						</tr>

						<tr>
							<th>Phone number:</th>
							<th class="text-success">{{ user.phone }}</th>
						</tr>

						<tr>
							<th>Role:</th>
							<th class="text-success">{{ user.role_name }}</th>
						</tr>

						<tr>
							<th>Email:</th>
							<th class="text-success">{{ user.email }}</th>
						</tr>
					</table>
				</div>
			</div>

			<div class="row" v-else>
				{{ message }}
			</div>
		</div>
	</div>
</template>

<script src="./UserDetail.js"></script>