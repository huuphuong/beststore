<template>
	<div class="panel panel-default" v-theme="'wide'">
		<div class="panel-heading">
			<h3 class="panel-title" v-rainbow>Create Product</h3>
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
				<div class="sizes">
					<div class="checkbox">
						<label>
							<input type="checkbox" v-model="selectAll">
							<b>All</b>
						</label>
					</div>
					<div class="checkbox" v-for="size in sizes">
						<label>
							<input type="checkbox" v-bind:value="size.size_id" v-model="selected">
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
									<input type="checkbox" /> 
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
				<label for="">Image Detail (Each file is up to 1MB):</label>
				<dropzone id="myVueDropzone"
				v-bind:url="uploadUrl"
				:maxFileSizeInMB="1"
				:showRemoveLink="true"
				:duplicateCheck="true"
				v-on:vdropzone-success="showSuccess"
				ref="myUniqueID">
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