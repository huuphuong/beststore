<template>
	<div id="root">
		<div class="row">
			<div class="btn-group pull-right m-r-10">
				<action :actionText="'Danh sách'" :actionIcon="'glyphicon glyphicon-th-list'" :actionRoute="'VendorList'"></action>
				<action :actionText="'Thêm'" :actionIcon="'glyphicon glyphicon-plus'" :actionRoute="'VendorCreate'"></action>
			</div>
		</div><!-- /.row -->

		<div class="panel panel-default m-t-20">
			<div class="panel-heading">
				<h3 class="panel-title">Cập nhật thông tin nhà cung cấp</h3>
			</div>
			<div class="panel-body">
				<form action="" method="POST" @submit.prevent="validateBeforeSubmit">

					<div class="form-group">
						<label for="">Tên nhà cung cấp:</label>
						<input type="text" class="form-control" name="name" v-model="vendor.vendor_name" v-validate="'required'" data-vv-as="Tên nhà cung cấp">
						<span class="label label-danger" v-show="errors.has('name')">{{ errors.first('name') }}</span>
					</div>

					<div class="form-group">
						<label for="">Tên viết tắt(Không bắt buộc):</label>
						<input type="text" class="form-control" name="shortname" v-model="vendor.vendor_shortname">
					</div>

					<div class="form-group">
						<label for="">E-mail:</label>
						<input type="text" class="form-control" name="email" v-model="vendor.vendor_email" v-validate="'required|email'" data-vv-as="Email">
						<span class="label label-danger" v-show="errors.has('email')">{{ errors.first('email') }}</span>
					</div>

					<div class="form-group">
						<label for="">Skype(Không bắt buộc):</label>
						<input type="text" class="form-control" name="skype" v-model="vendor.vendor_skype">
					</div>

					<div class="form-group">
						<label for="">Số điện thoại:</label>
						<input type="text" class="form-control" name="phone" v-model="vendor.vendor_phone" v-validate="'required'" data-vv-as="Số điện thoại">
						<span class="label label-danger" v-show="errors.has('phone')">{{ errors.first('phone') }}</span>
					</div>

					<div class="form-group">
						<label for="">Địa chỉ cơ quan:</label>
						<textarea name="address" class="form-control" rows="3" v-model="vendor.vendor_address" v-validate="'required'" data-vv-as="Địa chỉ cơ quan"></textarea>
						<span class="label label-danger" v-show="errors.has('address')">{{ errors.first('address') }}</span>
					</div>

					<div class="form-group">
						<label for="">Logo công ty hiện tại:</label>
						<img v-bind:src="vendor.vendor_images" class="img-responsive" />
					</div><!-- /.form-group -->

					<div class="form-group">
						<label for="">Thay đổi logo:</label>
						<picture-input
							ref="pictureInput"
							@change="onChangeImage"
							width="200"
							height="200"
							accept="image/jpeg,image/png"
							size="10"
							:crop="true"
							:removable="true"
							:buttonClass="'btn btn-default'"
							:removeButtonClass="'btn btn-warning'"
							:customStrings="{
								upload: '<h1>Bummer!</h1>',
								drag: 'Chọn logo'
							}"
						>
					</picture-input>
					</div>


					<button type="reset" class="btn btn-default">Hủy</button>
					<button type="submit" class="btn btn-primary">Cập nhật</button>
				</form>
			</div>
		</div>
	</div>
</template>

<script src="./VendorEdit.js"></script>