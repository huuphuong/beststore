<template>
	<div id="root">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Collection Detail</h3>
			</div>
			<div class="panel-body">
				<div class="col-sm-6">
					<legend>Collection information</legend>
					<table class="table table-hover" v-if="group">
						<tr>
							<th class="text-success">CollectionID: </th>
							<th>{{ group.pg_id }}</th>
						</tr>

						<tr>
							<th class="text-success">Collection name: </th>
							<th>{{ group.pg_name }}</th>
						</tr>

						<tr>
							<th class="text-success">Description: </th>
							<th>{{ group.pg_desc }}</th>
						</tr>

						<tr>
							<th class="text-success">Created at: </th>
							<th>{{ group.created_at }}</th>
						</tr>

						<tr>
							<th class="text-success">Updated at: </th>
							<th>{{ group.updated_at }}</th>
						</tr>

						<tr>
							<th class="text-success">Deleted at: </th>
							<th>{{ group.deleted_at }}</th>
						</tr>
					</table>
				</div><!-- /.col-sm-6 -->

				<div class="col-sm-6">
					<legend>Number of product</legend>
					
					<ul class="list-group">
						<li class="list-group-item" v-for="product in product_number">
							<div class="row">
								<div class="col-sm-4">
									<img v-bind:src="product.product_image" class="img-responsive img-circle" width="30px" height="30px">	
								</div>

								<div class="col-sm-2">
									{{ product.position }}
								</div>
								
								<div class="col-sm-6">
									{{ product.product_name }}	
								</div>
							</div>
						</li>
					</ul>
					
				</div>
			</div>
		</div>
	</div>
</template>

<script src="./ProductCollectionDetail.js"></script>