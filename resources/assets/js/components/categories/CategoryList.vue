<template>
	<div id="root">
		<div class="row">
			<div class="btn-group m-b-10 pull-right m-r-10">
				<router-link class="btn btn-default" :to="{name: 'Category'}">
					<span class="glyphicon glyphicon-plus"></span> Add Category
				</router-link>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">List Category</h3>
			</div>
			<div class="panel-body">
				<div class="row m-b-20">
					<div class="form-group">
						<form class="form-horizontal">
							<label for="input" class="col-sm-8 control-label">Keyword:</label>
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
							<th>Category name</th>
							<th>Parent category</th>
							<th>Description</th>
							<th>Position</th>
							<th>Display</th>
							<th>Updated at</th>
							<th>Action</th>
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