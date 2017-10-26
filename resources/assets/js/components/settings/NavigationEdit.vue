<template>
	<div id="root">
		<navigation-add @reloadPage="reload" :selectedId="currentId"></navigation-add>

		<div class="panel panel-default m-t-15">
			<div class="panel-heading">
				<h3 class="panel-title">{{ navigation.text_link }}</h3>
			</div>
			<div class="panel-body">
				<div class="col-sm-6">
					<table class="table table-hover">
						<tr>
							<th>Text link:</th>
							<th class="text-success">{{ navigation.text_link }}</th>
						</tr>

						<tr>
							<th>URL:</th>
							<th class="text-success">{{ navigation.url }}</th>
						</tr>

						<tr>
							<th>Position:</th>
							<th class="text-success">{{ navigation.position }}</th>
						</tr>

						<tr>
							<th>Display:</th>
							<th class="text-success">{{ navigation.dispaly == '1' ? 'Display' : 'None' }}</th>
						</tr>

						<tr>
							<th>Parent Navigation</th>
							<th class="text-success">{{ navigation.parent_id }}</th>
						</tr>

						<tr>
							<th>Image (if available):</th>
							<th class="text-success">
								<img v-bind:src="navigation.image" class="img-responsive">
							</th>
						</tr>
					</table>

					<hr>
					<button type="button" class="btn btn-primary" @click="updatePosition">Update Position</button>
				</div>

				<div class="col-sm-6">
					<legend>Child navigation of this navigation</legend>
					
					<!-- /.Model chính bằng product_number vì 2 way binding -->
					<draggable v-model="navigation_number">
						<transition-group>
							<div v-for="(nav, index) in navigation_number" :key="nav.id">
								<li class="list-group-item r-0 m-b-10">
									<span class="m-l-15">{{nav.text_link}}</span>
									<span class="glyphicon glyphicon-remove pull-right remove-product" @click="removeNav(nav.id, index)"></span>
									<span class="glyphicon glyphicon-pencil pull-right remove-product m-r-10" @click="showModal(nav.id)"></span>
								</li>
							</div>
						</transition-group>
					</draggable>
				</div>
			</div>
		</div>
	</div>
</template>

<script src="./NavigationEdit.js"></script>