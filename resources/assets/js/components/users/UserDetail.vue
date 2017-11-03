<template>
	<div class="root">
		<div class="row">
			<div class="btn-group pull-right m-r-10">
				<router-link :to="{name: 'UserList'}" class="btn btn-default">
					<span class="glyphicon glyphicon-th-list"></span> Danh sách người dùng
				</router-link>

				<router-link :to="{name: 'UserCreate'}" class="btn btn-default">
					<span class="glyphicon glyphicon-plus"></span> Tạo người dùng
				</router-link>

				<router-link :to="{name: 'UserEdit', params: {id: this.$route.params.id}}" class="btn btn-default">
					<span class="glyphicon glyphicon-eye-open"></span> Sửa người dùng
				</router-link>
			</div>
		</div>


		<div class="card-box m-t-10">
			<ul class="nav nav-tabs tabs-bordered">
				<li class="">
					<a href="#tab1" data-toggle="tab" aria-expanded="false">
						<span class="visible-xs"><i class="fa fa-home"></i></span>
						<span class="hidden-xs">Thông tin cơ bản</span>
					</a>
				</li>
				<li class="active">
					<a href="#tab2" data-toggle="tab" aria-expanded="true">
						<span class="visible-xs"><i class="fa fa-user"></i></span>
						<span class="hidden-xs">Lịch sử mua hàng</span>
					</a>
				</li>
				<li class="">
					<a href="#tab3" data-toggle="tab" aria-expanded="false">
						<span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
						<span class="hidden-xs">Mặt hàng đã bán</span>
					</a>
				</li>
				<li class="">
					<a href="#tab4" data-toggle="tab" aria-expanded="false">
						<span class="visible-xs"><i class="fa fa-cog"></i></span>
						<span class="hidden-xs">Doanh thu</span>
					</a>
				</li>

				<li class="">
					<a href="#tab5" data-toggle="tab" aria-expanded="false">
						<span class="visible-xs"><i class="fa fa-cog"></i></span>
						<span class="hidden-xs">Thống kê</span>
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane" id="tab1">
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
									<th>Họ tên:</th>
									<th class="text-success">{{ user.name }}</th>
								</tr>

								<tr>
									<th>Giới tính:</th>
									<th class="text-success">{{ user.gender }}</th>
								</tr>

								<tr>
									<th>Số điện thoại:</th>
									<th class="text-success">{{ user.phone }}</th>
								</tr>

								<tr>
									<th>Quyền hạn:</th>
									<th class="text-success">{{ user.role_name }}</th>
								</tr>

								<tr>
									<th>E-mail:</th>
									<th class="text-success">{{ user.email }}</th>
								</tr>
							</table>
						</div>
					</div>

					<div class="row" v-else>
						{{ message }}
					</div>
				</div><!-- /.Tab1 -->

				<div class="tab-pane active" id="tab2">
					<p>Tab 2.</p>
				</div>

				<div class="tab-pane" id="tab3">
					<p>Tab 3.</p>
				</div>

				<div class="tab-pane" id="tab4">
					<p>Tab 4.</p>
				</div>

				<div class="tab-pane" id="tab5">
					<p>Tab 5.</p>
				</div>
			</div>
		</div>
	</div><!-- /#root -->
</template>

<script src="./UserDetail.js"></script>