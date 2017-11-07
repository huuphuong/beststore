<template>
	<div id="root">
		<div class="row">
			<div class="form-group pull-right m-r-10">
				<router-link :to="{name: 'Category'}" class="btn btn-default">
					<span class="glyphicon glyphicon-plus"></span> Tạo danh mục
				</router-link>

				<router-link :to="{name: 'CategoryList'}" class="btn btn-default">
					<span class="glyphicon glyphicon-th-list"></span> Danh sách danh mục
				</router-link>

				<router-link :to="{name: 'CategoryEdit', param: {id: this.$route.params.id}}" class="btn btn-default">
					<span class="glyphicon glyphicon-pencil"></span> Sửa danh mục
				</router-link>
			</div>	
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Chi tiết danh mục</h3>
			</div>
			<div class="panel-body" v-if="category">
				<table class="table table-hover">
					<tbody>
						<tr>
							<th v-bind:class="{'border-top-none': true}">Tên danh mục:</th>
							<th  v-bind:class="{'border-top-none text-success': true}">{{ category.cat_name }}</th>
						</tr>

						<tr>
							<th>Danh mục cha(chi tiết):</th>
							<th class="text-success">{{ category.parent_cat_id }}</th>
						</tr>

						<tr>
							<th>Vị trí:</th>
							<td>{{ category.position }}</td>
						</tr>

						<tr>
							<th>Hiển thị:</th>
							<td v-if="category.display"><span class="label label-success">Hiển thị</span></td>
							<td v-else><span class="label label-warning">Không hiển thị</span></td>
						</tr>

						<tr>
							<th>Nội dung:</th>
							<td>{{ category.cat_desc }}</td>
						</tr>

						<tr>
							<th>Seo title:</th>
							<td>{{ category.seo_title }}</td>
						</tr>

						<tr>
							<th>Seo keyword:</th>
							<td>{{ category.seo_keyword }}</td>
						</tr>

						<tr>
							<th>Seo description:</th>
							<td>{{ category.seo_desc }}</td>
						</tr>

						<tr>
							<th>Seo robot:</th>
							<td>{{ category.seo_robot }}</td>
						</tr>

						<tr>
							<th>Seo revisit:</th>
							<td>{{ category.seo_revisit }}</td>
						</tr>

						<tr>
							<th>Seo copyright:</th>
							<td>{{ category.seo_copyright }}</td>
						</tr>

						<tr>
							<th>Tạo lúc:</th>
							<td>{{ category.created_at }}</td>
						</tr>

						<tr>
							<th>Cập nhật lúc:</th>
							<td>{{ category.updated_at }}</td>
						</tr>

						<tr>
							<th>Xóa lúc:</th>
							<td v-if="category.deleted_at">{{ category.deleted_at }}</td>
							<td v-else>Danh mục này chưa bị xóa.</td>
						</tr>
					</tbody>

					<h3 class="m-t-20">Slider</h3>
					<tbody>
						<tr>
							<th>Tiêu đề slide:</th>
							<td>{{ category.title_slider }}</td>
						</tr>

						<tr>
							<th>Nội dung slide:</th>
							<td>{{ category.content_slider }}</td>
						</tr>

						<tr>
							<th>Hình ảnh slide:</th>
							<td></td>
						</tr>
						
						<div v-for="image in category.images" class="col-sm-4 m-t-20">
							<img v-bind:src="image.storage" class="img-responsive" width="50%" height="50%">
						</div>
					</tbody>
				</table>
			</div>

			<div class="panel-body" v-else>
				{{ message }}
			</div><!-- /.panel-body -->
		</div>
	</div><!--/#root  -->
</template>

<script src="./CategoryDetail.js"></script>