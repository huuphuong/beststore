<template>
	<div id="root">
		<div class="row">
			<div class="btn-group pull-right m-r-10">
				<router-link :to="{name: 'ProductCollection'}" class="btn btn-default">
					<span class="glyphicon glyphicon-th-list"></span>
					Danh sách
				</router-link>
			</div>
		</div><!-- /.row -->

		<div class="panel panel-default m-t-20">
			<div class="panel-heading">
				<h3 class="panel-title">Tạo bộ sưu tập</h3>
			</div>
			<div class="panel-body">
				<form action="" method="POST" enctype="multipart/form-data" @submit.prevent="validateBeforeSubmit">
					<div class="form-group">
						<label for="">Tên bộ sưu tập:</label>
						<input type="text" class="form-control" name="name" v-model="collection.pg_name" v-validate="'required'" data-vv-as="Tên bộ sưu tập">
						<span class="label label-danger" v-show="errors.has('name')">{{ errors.first('name') }}</span>
					</div>

					<div class="form-group">
						<label for="">Giảm giá(%):</label>
						<div class="input-group">
							<div class="input-group-addon">-</div>
							<input type="number" class="form-control" name="discount" maxlength="2" v-model="collection.pg_discount" v-validate="'required'" data-vv-as="Phần trăm giảm giá">
							<div class="input-group-addon">%</div>
						</div>
						<span class="label label-danger" v-show="errors.has('discount')">{{ errors.first('discount') }}</span>
					</div>

					<div class="form-group">
						<label for="">Tên shop(không bắt buộc):</label>
						<input type="text" class="form-control" name="shop_name" v-model="collection.pg_shopname">
					</div>


					<div class="form-group">
						<label for="display">Hiển thị?:</label>
						<br>

						<input type="radio" name="display" value="1" v-model="collection.display">
						Hiển thị

						<br>
						<input type="radio" name="display" value="0" v-model="collection.display">
						Không hiển thị

					</div>

					<div class="form-group">
						<label for="">Nội dung ghi chú(không bắt buộc):</label>
						<input type="text" class="form-control" name="description" v-model="collection.pg_desc">
					</div>

					<div class="form-group">
						<label for="">Hình nền:</label>
						<picture-input
						ref="pictureInput"
						@change="onChangeImage"
						width="250"
						height="250"
						accept="image/jpeg,image/png"
						size="10"
						:crop="true"
						:removable="true"
						:buttonClass="'btn btn-default'"
						:removeButtonClass="'btn btn-warning'"
						:customStrings="{
							upload: '<h1>Bummer!</h1>',
							drag: 'Size: 350x456.'
						}"
						>
					</picture-input>
				</div> <hr>

				<button type="reset" class="btn btn-lg btn-default">Hủy</button>
				<button type="submit" class="btn btn-lg btn-primary">Tạo</button>
			</form>
		</div>
	</div>
</div>
</template>

<script src="./CollectionAdd.js"></script>

