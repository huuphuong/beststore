<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Danh sách user</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Index</th>
						<th>UserID</th>
						<th>Username</th>
						<th>E-mail</th>
						<th>Phone</th>
						<th>Gender</th>
						<th>Updated At</th>
						<th>Role</th>
						<th width="15%">Action</th>
					</tr>

					<tr>
						<th>#</th>
						<th>
							<input type="text" v-model="query.id" class="form-control">
						</th>

						<th>
							<input type="text" v-model="query.name" class="form-control">
						</th>

						<th>
							<input type="text" v-model="query.email" class="form-control">
						</th>

						<th>
							<input type="text" v-model="query.phone" class="form-control">
						</th>

						<th>
							<input type="text" v-model="query.gender" class="form-control">
						</th>

						<th>
							<input type="text" v-model="query.created_at" class="form-control">
						</th>

						<th>
							<input type="text" v-model="query.role" class="form-control">
						</th>

						<th>
							<div class="btn-group">
								<button type="button" class="btn btn-primary" @click="getListUser(1, query)">Filter</button>
								<button type="button" class="btn btn-default" @click="clearPage">Cancel</button>
							</div>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="user, key in users">
						<td>{{ indexNumber(++key) }}</td>
						<td>U{{ user.id }}</td>
						<td>{{ user.name }}</td>
						<td>{{ user.email }}</td>
						<td>{{ user.phone }}</td>
						<td>{{ user.gender }}</td>
						<td>{{ user.created_at }}</td>
						<td>{{ user.role_id }}</td>
						<td>

						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-3">
					<ul class="pagination">
						<li>
							<strong>Total: {{ total }}</strong>
						</li>
					</ul><!-- /.pagination -->

					</div><!-- /.col-sm-3 -->
					<div class="col-sm-6">
						<paginate
						:page-count="last_page"
						:click-handler="getListUser"
						:page-range="3"
						:margin-pages="2"
						:prev-text="'Trước'"
						:next-text="'Sau'"
						:container-class="'pagination'"
						:page-class="'page-item'">
					</paginate>
				</div>
			</div><!-- /.col-sm-12 -->
		</div>
	</div>
</div>
</template>

<script src="./UserList.js"></script>