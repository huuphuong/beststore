<template>
	<div id="root">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Collection Detail</h3>
			</div>
			<div class="panel-body" v-if="group">
				<div class="col-sm-6">
					<legend>Collection information</legend>
					<table class="table table-hover">
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

					<hr class="row">

					<button type="button" class="btn btn-primary" @click="updatePosition">Update position</button>
				</div><!-- /.col-sm-6 -->

				<div class="col-sm-6">
					<legend>Number of product</legend>
					
					<!-- /.Model chính bằng product_number vì 2 way binding -->
					<draggable v-model="product_number">
						<transition-group>
							<div v-for="(product, index) in product_number" :key="product.product_id">
								<li class="list-group-item r-0 m-b-10">
									<img v-bind:src="product.product_image" class="image-responsive img-circle" width="35px" height="35px">
									<span class="m-l-15">{{product.product_name}}</span>
									<span class="glyphicon glyphicon-remove pull-right remove-product" @click="removeProduct(product.product_id, index)"></span>
								</li>
							</div>
						</transition-group>
					</draggable>
					
				</div>
			</div>
			
			<!-- /.No data -->
			<div class="panel-body" v-else>
				No data
			</div>
			<!-- /.End no data -->
		</div>
		
	</div>
</template>


<script src="./ProductCollectionDetail.js"></script>