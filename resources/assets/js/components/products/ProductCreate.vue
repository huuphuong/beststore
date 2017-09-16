<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Product</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="cat_id">Category:</label>
				<recusive v-bind:options="option" v-model="product.cat_id"></recusive>
			</div>

			<div class="form-group">
				<label for="vendor">Vendor:</label>
				<select name="" id="input" class="form-control" required="required">
					<option value="">Choose vendor</option>
				</select>
			</div>

			<div class="form-group">
				<label for="product_name">Product name:</label>
				<input type="text" class="form-control" v-model="product.product_name">
			</div>

			<div class="form-group">
				<label for="price">Price:</label>
				<input type="text" class="form-control" v-model="product.product_price">
			</div>

			<div class="form-group">
				<label for="price_sale">Price sale:</label>
				<input type="text" class="form-control" v-model="product.price_sale">
			</div>

			<div class="form-group">
				<label for="price_sale">Quantity:</label>
				<input type="text" class="form-control" v-model="product.product_qty">
			</div>

			<div class="form-group">
				<label for="price_sale">Size:</label>
				<input type="text" class="form-control" v-model="product.product_qty">
			</div>

			<div class="form-group">
				<label for="price_sale">Color:</label>
				<input type="text" class="form-control" v-model="product.product_qty">
			</div>

			<div class="form-group">
				<label for="intro">Intro:</label>
				<textarea class="form-control" name="" v-model="product.product_intro"></textarea>
			</div>

			<div class="from-group">
				<label for="content">Content:</label>
				<textarea class="form-control" name="" v-model="product.product_content"></textarea>
			</div>

			<div class="from-group">
				<label for="content">Is new:</label>
				<div class="radio">
					<label class="radio-inline">
						<input type="radio" name="is_new" id="input" value="" checked="checked">
						No
					</label>

					<label class="radio-inline">
						<input type="radio" name="is_new" id="input" value="">
						Yes
					</label>
				</div>
			</div>

			<div class="from-group">
				<label for="content">Is hot:</label>
				<div class="radio">
					<label class="radio-inline">
						<input type="radio" name="is_hot" id="input" value="">
						No
					</label>

					<label class="radio-inline">
						<input type="radio" name="is_hot" id="input" value="" checked="checked">
						Yes
					</label>
				</div>
			</div>

			<div class="from-group">
				<label for="content">Is sale:</label>
				<div class="radio">
					<label>
						<input type="radio" name="is_sale" id="input" value="" checked="checked">
						No
					</label>

					<label class="radio-inline">
						<input type="radio" name="is_sale" id="input" value="">
						Yes
					</label>
				</div>
			</div>

			<div class="from-group">
				<label for="">Image avatar:</label>
				<img src="" alt="">
			</div>

			<div class="from-group">
				<label for="">Image Detail:</label>
				<dropzone id="myVueDropzone" url="" v-on:vdropzone-success="showSuccess">
			        <input type="hidden" name="token" value="xxx">
			    </dropzone>
			</div>
		</div>
		<div class="panel-footer">
			<button type="reset" class="btn btn-default">Cancel</button>
			<button type="submit" class="btn btn-primary">Add Product</button>
		</div>
	</div>
</template>

<script src="./ProductCreate.js"></script>