<template>
	<div id="root">
		<div class="row">
			<div class="btn-group m-b-10 pull-right m-r-10">
				<router-link class="btn btn-default" :to="{name: 'CategoryList'}">
					<span class="glyphicon glyphicon-th-list"></span> Danh sách danh mục
				</router-link>
			</div>
		</div>

		<form method="POST" @submit.prevent="validateBeforeSubmit">
			<div class="row">
				<div class="col-sm-7">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Thông tin danh mục</h3>
						</div>

						<div class="panel-body">

							<div class="form-group">
								<label for="">Danh mục cha</label>
								<recusive v-model="cat.parent_cat_id" @input="getPosition" name="parent_cat_id"></recusive>
							</div>


							<div class="form-group">
								<label for="">Tên danh mục:</label>
								<input type="text" class="form-control" v-model="cat.cat_name" name="cat_name" v-validate="'required'" data-vv-as="Tên danh mục" />
								<span class="label label-danger" v-show="errors.has('cat_name')">{{ errors.first('cat_name') }}</span>
							</div>

							<div class="form-group">
								<label for="">Vị trí:</label> <span>(Hiển thị vị trí của danh mục)</span>
								<select class="form-control" v-model="cat.position" name="position" v-validate="'required'" data-vv-as="Vị trí hiển thị">
									<option v-for="p in position" v-bind:value="p">{{ p }}</option>
								</select>

								<span class="label label-danger" v-show="errors.has('position')">{{ errors.first('position') }}</span>
							</div>

							<div class="form-group">
								<label for="">Hiển thị:</label> <br />
								<input type="radio" value="1" v-model="cat.display">
								Hiển thị <br />

								<input type="radio" value="0" v-model="cat.display">
								Không hiển thị (các sản phẩm thuộc danh mục cũng không được hiển thị)
							</div>

							<div class="form-group">
								<label for="">Ghi chú (không bắt buộc):</label>
								<textarea class="form-control" v-model="cat.cat_desc"></textarea>
							</div>

						</div><!-- /.panel-body -->

						<div class="panel-footer">
							<button type="button" class="btn btn-default">Hủy bỏ</button>
							<button type="submit" class="btn btn-primary">Tạo danh mục</button>
						</div>
					</div>
				</div><!-- /.col-sm-7 -->

				<div class="col-sm-5">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Category SEO</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="form-group">
									<label for="">Seo Title (không bắt buộc):</label>
									<input type="text" class="form-control" v-model="cat.seo_title">
								</div>

								<div class="form-group">
									<label for="">Seo keyword (không bắt buộc):</label>
									<input type="text" class="form-control" v-model="cat.seo_keyword">
								</div>

								<div class="form-group">
									<label for="">Seo description (không bắt buộc):</label>
									<textarea name="" class="form-control" v-model="cat.seo_desc"></textarea>
								</div>

								<div class="form-group">
									<label for="">Seo Robot (không bắt buộc):</label>
									<input type="text" class="form-control" v-model="cat.seo_robot">
								</div>

								<div class="form-group">
									<label for="">Revisit (không bắt buộc):</label>
									<input type="text" class="form-control" v-model="cat.seo_revisit">
								</div>

								<div class="form-group">
									<label for="">Copyright (không bắt buộc):</label>
									<input type="text" class="form-control" v-model="cat.seo_copyright">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.row -->
		</form>

	</div>
</template>

<script src="./Category.js"></script>