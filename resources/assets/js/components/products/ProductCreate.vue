<template>
<div class="panel panel-default" v-theme="'wide'">
	<div class="panel-heading">
		<h3 class="panel-title" v-rainbow>Create Product</h3>
	</div>
	<form method="POST" enctype="multipart/form-data" @submit.prevent="onSubmit">
		<div class="panel-body">
			<div class="form-group">
				<label for="cat_id">Category:</label>
				<select class="form-control" v-html="cat_id" v-model="product.cat_id">
				</select>
			</div>
			<div class="form-group">
				<label for="vendor">Vendor:</label>
				<select name="" id="input" class="form-control" v-model="product.vendor_id"> 
					<option value="">Choose vendor</option>
					<option value="1">XNK</option>
				</select>
			</div>
			<div class="form-group">
				<label for="product_name">Product name:</label>
				<input type="text" class="form-control" v-model="product.product_name">
			</div>
			<div class="form-group">
				<label for="price">Price:</label>
				<money v-model="product.product_price" v-bind="money" :class="{'form-control': true}"></money>
			</div>
			<div class="form-group">
				<label for="price_sale">Price sale:</label>
				<money v-model="product.product_pricesale" v-bind="money" :class="{'form-control': true}"></money>
			</div>
			<div class="form-group">
				<label for="price_sale">Quantity:</label>
				<input type="number" min="1" class="form-control" v-model="product.product_qty">
			</div>
			<div class="form-group">
				<label for="price_sale">Size:</label>
				<div class="sizes">
					<div class="checkbox">
						<label>
							<input type="checkbox" v-model="selectAll">
							<b>All</b>
						</label>
					</div>
					<div class="checkbox" v-for="size in sizes">
						<label>
							<input type="checkbox" v-bind:value="size.size_name" v-model="product.size">
							{{ size.size_name }} ({{ size.size_desc }})
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="price_sale">
					Color:
				</label>
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
					Choose Color </button>
					<ul class="dropdown-menu scrollable-menu">
						<li v-for="color in colors">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="color" v-model="product.color" v-bind:value="color" />
									<span class="my-square" v-bind:style="{'background-color': '#'+color.color_code}"></span>
								</label>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="form-group">
				<label for="intro">Intro:</label>
				<vue-editor v-model="product.product_intro"></vue-editor>
			</div>
			<div class="from-group">
			</div>
			<label for="content">Content:</label>
			<vue-editor v-model="product.product_content"></vue-editor>
			<div class="from-group">
				<label for="content">Is new:</label>
				<div class="radio">
					<label class="radio-inline">
						<input type="radio" name="is_new" value="0" v-model="product.is_new">
						No
					</label>
					<label class="radio-inline">
						<input type="radio" name="is_new" value="1" v-model="product.is_new">
						Yes
					</label>
				</div>
			</div>
			<div class="from-group">
				<label for="content">Is hot:</label>
				<div class="radio">
					<label class="radio-inline">
						<input type="radio" name="is_hot" value="0" v-model="product.is_hot">
						No
					</label>
					<label class="radio-inline">
						<input type="radio" name="is_hot" value="1" v-model="product.is_hot">
						Yes
					</label>
				</div>
			</div>
			<div class="from-group">
				<label for="content">Is sale:</label>
				<div class="radio">
					<label class="radio-inline">
						<input type="radio" name="is_sale" value="0" v-model="product.is_sale">
						No
					</label>
					<label class="radio-inline">
						<input type="radio" name="is_sale" value="1" v-model="product.is_sale">
						Yes
					</label>
				</div>
			</div>
			<div class="from-group">
				<label for="">Image avatar:</label>
				<picture-input
					ref="pictureInput"
					@change="onChangeImage"
					width="350"
					height="350"
					accept="image/jpeg,image/png"
					size="10"
					:crop="true"
					:removable="true"
					:buttonClass="'btn btn-default'"
					:removeButtonClass="'btn btn-warning'"
					:customStrings="{
					upload: '<h1>Bummer!</h1>',
					drag: 'Please choose your image.'
					}"
					v-validate="'image'"
					data-vv-value-path="innerValue"
					data-vv-name="customImage"
					data-vv-as="Ảnh đại diện"
					>
				</picture-input>
			</div>
			<div class="from-group">
				<label for="">Image Detail (Up to 10 image, each image no more than 1MB):</label>
				<dropzone id="myVueDropzone"
				v-bind:url="uploadUrl"
				:maxFileSizeInMB="1"
				:showRemoveLink="true"
				:duplicateCheck="true"
				:acceptedFileTypes="'image/*'"
				:maxNumberOfFiles="10"
				ref="myDropzone"
				v-model="product.image_detail"
				>
				</dropzone>
			</div>
		</div>
		<div class="panel-footer">
			<button type="reset" class="btn btn-default">Cancel</button>
			<button type="submit" class="btn btn-primary">Add Product</button>
		</div>
	</form>
</div>
</template>
<script src="./ProductCreate.js"></script>