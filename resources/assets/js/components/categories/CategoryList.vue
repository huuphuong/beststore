<template>
	<div id="root">
		<div class="row">
			<div class="btn-group m-b-10 pull-right m-r-10">
				<router-link class="btn btn-default" :to="{name: 'Category'}">
					<span class="glyphicon glyphicon-plus"></span> Tạo danh mục
				</router-link>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Danh sách danh mục</h3>
			</div>
			<div class="panel-body">
				<div class="row m-b-20">
					<div class="form-group">
						<form class="form-horizontal">
							<label for="input" class="col-sm-8 control-label">Từ khóa:</label>
							<div class="col-sm-4 pull-right">
								<input type="text" class="form-control" v-model="searchText" @keyup="filterCategory">
							</div>
						</form>
					</div>
				</div>

				<table class="table table-hover" id="myTable">
					<thead>
						<tr>
							<th>#ID</th>
							<th>Tên danh mục</th>
							<th>Danh mục cha</th>
							<th>Nội dung</th>
							<th>Vị trí</th>
							<th>Hiển thị?</th>
							<th>Cập nhật lúc</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody v-html="categories">

					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script src="./CategoryList.js"></script>