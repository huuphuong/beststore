<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Vendor</h3>
		</div>
		<div class="panel-body">
			<form action="" method="POST" @submit.prevent="validateBeforeSubmit">

				<div class="form-group">
					<label for="">Vendor name:</label>
					<input type="text" class="form-control" name="name" v-model="vendor.vendor_name" v-validate="'required'">
					<span class="label label-danger" v-show="errors.has('name')">{{ errors.first('name') }}</span>
				</div>

				<div class="form-group">
					<label for="">Vendor shortname(optional):</label>
					<input type="text" class="form-control" name="shortname" v-model="vendor.vendor_shortname">
				</div>

				<div class="form-group">
					<label for="">E-mail:</label>
					<input type="text" class="form-control" name="email" v-model="vendor.vendor_email" v-validate="'required|email'">
					<span class="label label-danger" v-show="errors.has('email')">{{ errors.first('email') }}</span>
				</div>

				<div class="form-group">
					<label for="">Skype(optional):</label>
					<input type="text" class="form-control" name="skype" v-model="vendor.vendor_skype">
				</div>

				<div class="form-group">
					<label for="">Phone:</label>
					<input type="text" class="form-control" name="phone" v-model="vendor.vendor_phone" v-validate="'required'">
					<span class="label label-danger" v-show="errors.has('phone')">{{ errors.first('phone') }}</span>
				</div>

				<div class="form-group">
					<label for="">Address:</label>
					<textarea name="address" class="form-control" rows="3" v-model="vendor.vendor_address" v-validate="'required'"></textarea>
					<span class="label label-danger" v-show="errors.has('address')">{{ errors.first('address') }}</span>
				</div>

				<div class="form-group">
					<label for="">Logo branch:</label>
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


				<button type="reset" class="btn btn-default">Cancel</button>
				<button type="submit" class="btn btn-primary">Add Vendor</button>
			</form>
		</div>
	</div>
</template>

<script src="./VendorCreate.js"></script>