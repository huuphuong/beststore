<template>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Create Product</h3>
	</div>
	<form method="POST" enctype="multipart/form-data" @submit.prevent="onSubmit">
		<div class="panel-body">
			<div class="form-group">
				<label for="cat_id">Category:</label>
				<select class="form-control" v-html="cat_id" v-model="product.cat_id" name="cat_id" v-validate="'required'" data-vv-as="Loại sản phẩm">
				</select>
				<span class="label label-danger" v-show="errors.has('cat_id')">{{ errors.first('cat_id') }}</span>
			</div>

			<div class="form-group">
				<label for="vendor">Vendor:</label>
				<select class="form-control" v-model="product.vendor_id" name="vendor_id" v-validate="'required'" data-vv-as="Nhà cung cấp">
					<option value="">Choose vendor</option>
					<option v-for="vendor in vendors" v-bind:value="vendor.vendor_id">{{ vendor.vendor_name }}</option>
				</select>
				<span class="label label-danger" v-show="errors.has('vendor_id')">{{ errors.first('vendor_id') }}</span>
			</div>

			<div class="form-group">
				<label for="product_name">Product name:</label>
				<input type="text" class="form-control" v-model="product.product_name" name="product_name" v-validate="'required'" data-vv-as="Tên sản phẩm">
				<span class="label label-danger" v-show="errors.has('product_name')">{{ errors.first('product_name') }}</span>
			</div>

			<div class="form-group">
				<label for="price">Price:</label>
				<money v-model="product.product_price" v-bind="money" :class="{'form-control': true}" name="price" v-validate="'required'" data-vv-as="Giá tiền"></money>
				<span class="label label-danger" v-show="errors.has('price')">{{ errors.first('price') }}</span>
			</div>

			<div class="form-group">
				<label for="price_sale">Price sale:</label>
				<money v-model="product.product_pricesale" v-bind="money" :class="{'form-control': true}"></money>
			</div>

			<div class="form-group">
				<label for="price_sale">Quantity:</label>
				<input type="number" min="1" class="form-control" v-model="product.product_qty" name="product_qty" v-validate="'required|min_value:1'" data-vv-as="Số lượng">
				<span class="label label-danger" v-show="errors.has('product_qty')">{{ errors.first('product_qty') }}</span>
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
							<input type="checkbox" v-bind:value="size.size_name" v-model="product.size" v-bind:checked="selectAll">
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
				<textarea v-model="product.product_intro" class="form-control" name="intro" v-validate="'required'" data-vv-as="Giới thiệu"></textarea>
				<span class="label label-danger" v-show="errors.has('intro')">{{ errors.first('intro') }}</span>
			</div>



			<div class="from-group">
				<label for="content">Content:</label>
				<vue-editor v-model="product.product_content" name="content" v-validate="'required'" data-vv-as="Nội dung sản phẩm"></vue-editor>
				<span class="label label-danger" v-show="errors.has('content')">{{ errors.first('content') }}</span>
			</div>



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
				<!-- Current detail image -->
				<div class="row">
					<label for="current_detail_img">Current_image:</label>

					<ul class="list-inline">
						<div class="col-sm-3" v-for="(image, index) in listCurrentImage">
							<li>
								<div class="item">
									<span class="notify-badge" v-bind:imageId="image.image_id" @click="removeImgDetail($event, index)">X</span>
									<img v-bind:src="image.storage" class="img-responsive img-thumbnail" />
								</div>
							</li>
						</div>
					</ul>
				</div>

				<div class="row">
					<label for="">Image Detail (Up to 10 image, each image no more than 1MB):</label>
					<dropzone id="myVueDropzone"
					v-bind:url="uploadUrl"
					:maxFileSizeInMB="1"
					:showRemoveLink="true"
					:duplicateCheck="true"
					:acceptedFileTypes="'image/*'"
					:maxNumberOfFiles="10"
					ref="myDropzone"
					v-model="product.image_detail">
					</dropzone>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<button type="reset" class="btn btn-default">Cancel</button>
			<button type="submit" class="btn btn-primary">Update Product</button>
		</div>
	</form>
</div>
</template>
<script src="./ProductEdit.js"></script>