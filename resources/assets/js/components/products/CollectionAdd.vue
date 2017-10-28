<template>
	<div id="root">
		<div class="btn-group">
			<router-link :to="{name: 'ProductCollection'}" class="btn btn-default">
				<span class="glyphicon glyphicon-th-list"></span>
				List Collection
			</router-link>
		</div>

		<div class="panel panel-default m-t-20">
			<div class="panel-heading">
				<h3 class="panel-title">Add Collection</h3>
			</div>
			<div class="panel-body">
				<form action="" method="POST" enctype="multipart/form-data" @submit.prevent="validateBeforeSubmit">
					<div class="form-group">
						<label for="">Collectio name:</label>
						<input type="text" class="form-control" name="name" v-model="collection.pg_name" v-validate="'required'">
						<span class="label label-danger" v-show="errors.has('name')">{{ errors.first('name') }}</span>
					</div>

					<div class="form-group">
						<label for="">Discount:</label>
						<div class="input-group">
							<div class="input-group-addon">-</div>
							<input type="number" class="form-control" name="discount" maxlength="2" v-model="collection.pg_discount" v-validate="'required'">
							<div class="input-group-addon">%</div>
						</div>
						<span class="label label-danger" v-show="errors.has('discount')">{{ errors.first('discount') }}</span>
					</div>

					<div class="form-group">
						<label for="">Shop name:</label>
						<input type="text" class="form-control" name="shop_name" v-model="collection.pg_shopname">
					</div>


					<div class="form-group">
						<label for="display">Display:</label>
						<br>

						<input type="radio" name="display" value="1" v-model="collection.display">
						Display

						<br>
						<input type="radio" name="display" value="0" v-model="collection.display">
						None

					</div>

					<div class="form-group">
						<label for="">Description:</label>
						<input type="text" class="form-control" name="description" v-model="collection.pg_desc">
					</div>

					<div class="form-group">
						<label for="">Background:</label>
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

				<button type="reset" class="btn btn-lg btn-default">Cancel</button>
				<button type="submit" class="btn btn-lg btn-primary">Add Collection</button>
			</form>
		</div>
	</div>
</div>
</template>

<script src="./CollectionAdd.js"></script>

