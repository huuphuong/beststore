<template>
	<div id="root">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Product Collection</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Collection name</th>
							<th>Product's number</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="collection in collections">
							<td>#CL{{ collection.pg_id }}</td>
							<td>{{ collection.pg_name }}</td>
							<td>{{ collection.count }}</td>
							<td>
								<router-link :to="{name: 'ProductCollectionDetail', params: {id: collection.pg_id} }">Detail</router-link>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script src="./ProductCollection.js"></script>