<template>
	<div id="root">
		<div class="row">
			<div class="col-sm-1">
				<navigation-add @reloadPage="reload" :selectedId="currentId"></navigation-add>	
			</div>
			<div class="col-sm-1" style="margin-left: 30px;">
				<router-link :to="{name: 'Navigation'}" class="btn btn-default">List Navigation</router-link>
			</div>
		</div>
		
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

		<!-- /.Modal -->
		<div class="modal fade" id="myEditModal">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Create navigation</h4>
					</div>
					<form method="POST" enctype="multipart/form-data" @submit.prevent="validateBeforeSubmit" autocomplete="off">
						<div class="modal-body">
							<div class="form-group">
								<label for="text_link">Parent navigation(optional):</label>
								<select name="parent_id" class="form-control" v-model="nav.parent_id">
									<option value="">Chọn</option>
									<option v-for="parent in parents" v-bind:value="parent.id">
										{{ parent.text_link }}
									</option>
								</select>
							</div>
							<div class="form-group">
								<label for="text_link">Text link:</label>
								<input type="text" class="form-control" name="text_link" v-model="nav.text_link" v-validate="'required'" data-vv-as="Tên trang">
								<span class="label label-danger" v-show="errors.has('text_link')">{{ errors.first('text_link') }}</span>
							</div>
							<div class="form-group">
								<label for="url">URL</label>
								<input type="text" class="form-control" name="url" v-model="nav.url" v-bind:value="slugTitle" v-validate="'required'">
								<span class="label label-danger" v-show="errors.has('url')">{{ errors.first('url') }}</span>
							</div>
							<div class="form-group">
								<label for="position">Position</label>
								<input type="number" class="form-control" name="position" v-model="nav.position" min="1" maxlength="4" v-validate="'required'" data-vv-as="Vị trí hiển thị">
								<span class="label label-danger" v-show="errors.has('position')">{{ errors.first('position') }}</span>
							</div>
							<div class="form-group">
								<label for="display">Display</label>
								<div class="form-group">
									<input type="radio" name="display" value="1" v-model="nav.display">
									Yes
									<input type="radio" name="display" value="0" v-model="nav.display">
									No
								</div>
							</div>
							<div v-if="!nav.image" class="form-group">
								<label for="">Image(304x238)</label>
								<input type="file" @change="onFileChange" name="image">
								<span class="label label-danger" v-show="errors.has('image')">{{ errors.first('image') }}</span>
							</div>
							<div v-else class="form-group">
								<label for="">Image(304x238)</label>
								<img :src="nav.image" class="img-responsive" /> <br>
								<button @click="removeImage" class="btn btn-default">Remove image</button>
							</div>

							<input type="hidden" v-model="hiddenId">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update navigation</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</template>

<script src="./NavigationEdit.js"></script>