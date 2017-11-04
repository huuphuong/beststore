<template>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Tạo sản phẩm</h3>
	</div>
	<form method="POST" enctype="multipart/form-data" @submit.prevent="validateBeforeSubmit">
		<div class="panel-body">
			<div class="form-group">
				<label for="cat_id">Danh mục:</label>
				<select class="form-control" v-html="cat_id" v-model="product.cat_id" name="cat_id" v-validate="'required'" data-vv-as="Loại sản phẩm">
				</select>
				<span class="label label-danger" v-show="errors.has('cat_id')">{{ errors.first('cat_id') }}</span>
			</div>

			<div class="form-group">
				<label for="vendor">Nhà cung cấp:</label>
				<select class="form-control" v-model="product.vendor_id" name="vendor_id" v-validate="'required'" data-vv-as="Nhà cung cấp">
					<option value=""> -- Chọn nhà cung cấp -- </option>
					<option v-for="vendor in vendors" v-bind:value="vendor.vendor_id">{{ vendor.vendor_name }}</option>
				</select>
				<span class="label label-danger" v-show="errors.has('vendor_id')">{{ errors.first('vendor_id') }}</span>
			</div>

			<div class="form-group">
				<label for="product_name">Tên sản phẩm:</label>
				<input type="text" class="form-control" v-model="product.product_name" name="product_name" v-validate="'required'" data-vv-as="Tên sản phẩm">
				<span class="label label-danger" v-show="errors.has('product_name')">{{ errors.first('product_name') }}</span>
			</div>

			<div class="form-group">
				<label for="price">Giá:</label>
				<money v-model="product.product_price" v-bind="money" :class="{'form-control': true}" name="price" v-validate="'required'" data-vv-as="Giá tiền"></money>
				<span class="label label-danger" v-show="errors.has('price')">{{ errors.first('price') }}</span>
			</div>

			<div class="form-group">
				<label for="price_sale">Giá đã sale:</label>
				<money v-model="product.product_pricesale" v-bind="money" :class="{'form-control': true}"></money>
			</div>

			<div class="form-group">
				<label for="price_sale">Số lượng:</label>
				<input type="number" min="1" class="form-control" v-model="product.product_qty" name="product_qty" v-validate="'required|min_value:1'" data-vv-as="Số lượng">
				<span class="label label-danger" v-show="errors.has('product_qty')">{{ errors.first('product_qty') }}</span>
			</div>

			<div class="form-group">
				<label for="price_sale">Kích thước(size, loại, v.v...):</label>
				<div class="sizes">
					<div class="checkbox">
						<label>
							<input type="checkbox" v-model="selectAll">
							<b>Tất cả</b>
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
					Màu sắc <span v-if="product.color">({{ product.color.length }})</span>:
				</label>
				<div class="pre-scroll">
					<ul class="list-unstyled">
						<li v-for="color in colors">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="color" v-model="product.color" v-bind:value="color.color_code" />
									<span class="my-square" v-bind:style="{'background-color': '#'+color.color_code}"></span>
								</label>
							</div>
						</li>
					</ul>
				</div>
			</div>


			<div class="form-group">
				<label for="intro">Giới thiệu nhanh:</label>
				<textarea v-model="product.product_intro" class="form-control" name="intro" v-validate="'required'" data-vv-as="Giới thiệu"></textarea>
				<span class="label label-danger" v-show="errors.has('intro')">{{ errors.first('intro') }}</span>
			</div>



			<div class="from-group">
				<label for="content">Nội dung chi tiết:</label>
				<vue-editor v-model="product.product_content" name="content" v-validate="'required'" data-vv-as="Nội dung sản phẩm"></vue-editor>
				<span class="label label-danger" v-show="errors.has('content')">{{ errors.first('content') }}</span>
			</div>


			<div class="from-group m-t-20">
				<label for="content">Là sản phẩm mới?:</label>
				<div class="radio1">
					<label class="radio-inline">
						<input type="radio" name="is_new" value="0" v-model="product.is_new">
						Có
					</label>
					<label class="radio-inline">
						<input type="radio" name="is_new" value="1" v-model="product.is_new">
						Không
					</label>
				</div>
			</div> <hr>


			<div class="from-group">
				<label for="content">Là sản phẩm hot?:</label>
				<div class="radio1">
					<label class="radio-inline">
						<input type="radio" name="is_hot" value="0" v-model="product.is_hot">
						Có
					</label>
					<label class="radio-inline">
						<input type="radio" name="is_hot" value="1" v-model="product.is_hot">
						Không
					</label>
				</div>
			</div> <hr>


			<div class="from-group">
				<label for="content">Là sản phẩm đang được sale?:</label>
				<div class="radio1">
					<label class="radio-inline">
						<input type="radio" name="is_sale" value="0" v-model="product.is_sale">
						Có
					</label>
					<label class="radio-inline">
						<input type="radio" name="is_sale" value="1" v-model="product.is_sale">
						Không
					</label>
				</div>
			</div>

			<div class="from-group m-t-20">
				<label for="">Ảnh đại diện cho sản phẩm:</label>
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
					drag: 'Chọn ảnh đại diện (200x200)'
					}"
					v-validate="'image'"
					data-vv-value-path="innerValue"
					data-vv-name="customImage"
					data-vv-as="Ảnh đại diện"
					>
				</picture-input>
			</div>
			<div class="from-group">
				<label for="">Ảnh chi tiết sản phẩm (Tối đa 10 ảnh, mỗi ảnh không quá 1MB):</label>
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
			<button type="reset" class="btn btn-default">Hủy bỏ</button>
			<button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
		</div>
	</form>
</div>
</template>
<script src="./ProductCreate.js"></script>