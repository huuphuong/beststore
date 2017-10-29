<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Vendor</h3>
		</div>
		<div class="panel-body">
			<form action="" method="POST" role="form">

				<div class="form-group">
					<label for="">Vendor name:</label>
					<input type="text" class="form-control" id="" placeholder="Input field">
				</div>

				<div class="form-group">
					<label for="">Vendor shortname:</label>
					<input type="text" class="form-control" id="" placeholder="Input field">
				</div>

				<div class="form-group">
					<label for="">E-mail:</label>
					<input type="text" class="form-control" id="" placeholder="Input field">
				</div>

				<div class="form-group">
					<label for="">Skype:</label>
					<input type="text" class="form-control" id="" placeholder="Input field">
				</div>

				<div class="form-group">
					<label for="">Phone:</label>
					<input type="text" class="form-control" id="" placeholder="Input field">
				</div>

				<div class="form-group">
					<label for="">Address:</label>
					<textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
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