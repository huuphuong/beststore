<template>
	<div id="root">
		<div class="row">
			<div class="form-group pull-right m-r-10">
				<router-link :to="{name: 'Category'}" class="btn btn-default">
					<span class="glyphicon glyphicon-plus"></span> Add Category
				</router-link>

				<router-link :to="{name: 'CategoryList'}" class="btn btn-default">
					<span class="glyphicon glyphicon-th-list"></span> List Category
				</router-link>

				<router-link :to="{name: 'CategoryEdit', param: {id: this.$route.params.id}}" class="btn btn-default">
					<span class="glyphicon glyphicon-pencil"></span> Edit Category
				</router-link>

				<!-- <router-link :to="{name: 'Category'}">
					Delete Category
				</router-link> -->
			</div>	
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Category Detail</h3>
			</div>
			<div class="panel-body" v-if="category">
				<table class="table table-hover">
					<tbody>
						<tr>
							<th v-bind:class="{'border-top-none': true}">Category name:</th>
							<th  v-bind:class="{'border-top-none text-success': true}">{{ category.cat_name }}</th>
						</tr>

						<tr>
							<th>Parent category:</th>
							<th class="text-success">{{ category.parent_cat_id }}</th>
						</tr>

						<tr>
							<th>Position:</th>
							<td>{{ category.position }}</td>
						</tr>

						<tr>
							<th>Display:</th>
							<td>{{ category.display == 1 ? 'Yes' : 'No' }}</td>
						</tr>

						<tr>
							<th>Description:</th>
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
							<th>Created at:</th>
							<td>{{ category.created_at }}</td>
						</tr>

						<tr>
							<th>Updated at:</th>
							<td>{{ category.updated_at }}</td>
						</tr>

						<tr>
							<th>Deleted at:</th>
							<td v-if="category.deleted_at">{{ category.deleted_at }}</td>
							<td v-else>This category has not been deleted</td>
						</tr>
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