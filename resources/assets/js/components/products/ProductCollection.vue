<template>
	<div id="root">
		<div class="btn-group">
			<router-link :to="{name: 'CollectionAdd'}" class="btn btn-default">
				<span class="glyphicon glyphicon-plus"></span>
				Add Collection
			</router-link>
		</div>

		<div class="panel panel-default m-t-20">
			<div class="panel-heading">
				<h3 class="panel-title">Product Collection</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Collection name</th>
							<th>Discount</th>
							<th>Shop name</th>
							<th>Background</th>
							<th>Product's number</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(collection, key) in collections">
							<td>#CL{{ collection.pg_id }}</td>
							<td>{{ collection.pg_name }}</td>
							<td>-{{ collection.pg_discount }}</td>
							<td>{{ collection.pg_shopname }}</td>
							<td>
								<img v-bind:src="collection.pg_background" class="img-responsive" width="144" height="144">
							</td>
							<td>{{ collection.count }}</td>
							<td>
								<router-link :to="{name: 'CollectionEdit', params: {id: collection.pg_id}}">Edit</router-link> | 
								<router-link :to="{name: 'ProductCollectionDetail', params: {id: collection.pg_id} }">Detail</router-link> | 
								<button type="button" class="btn btn-link p-0" @click="deleteProductGroup(collection.pg_id, key)">Delete</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script src="./ProductCollection.js"></script>