<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Tutorial</h3>
		</div>

		<button type="button" class="btn btn-success pull-right m-t-15 m-b-15 m-r-15" data-toggle="modal" @click="showPreview">
			<span class="glyphicon glyphicon-eye-open"></span> Preview
		</button>
		<!-- Modal -->
		<div id="modalPreview" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Tutorial</h4>
					</div>
					<div class="modal-body">
						<img v-bind:src="preview_image" class="img-responsive" height="auto"> <br>
						<p>You can choose icon if you want at <a href="https://getbootstrap.com/docs/3.3/components/" target="_blank">here</a></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>

		<div class="panel-body">
			<form method="POST" enctype="multipart/form-data" @submit.prevent="validateBeforeSubmit"> 

				<div class="form-group">
					<label for="">Title:</label>
					<input type="text" class="form-control" v-model="tutorial.title" name="title" v-validate="'required'">
					<span class="label label-danger" v-show="errors.has('title')">{{ errors.first('title') }}</span>
				</div> <hr>

				<div class="form-group">
					<label for="">Icon 1:</label>
					<input type="text" class="form-control" v-model="tutorial.icon1" name="icon1" v-validate="'required'">
					<span class="label label-danger" v-show="errors.has('icon1')">{{ errors.first('icon1') }}</span>
				</div>

				<div class="form-group">
					<label for="">Action 1:</label>
					<input type="text" class="form-control" v-model="tutorial.action1" name="action1" v-validate="'required'">
					<span class="label label-danger" v-show="errors.has('action1')">{{ errors.first('action1') }}</span>
				</div>

				<div class="form-group">
					<label for="">Description 1:</label>
					<textarea class="form-control" v-model="tutorial.desc1" name="desc1" v-validate="'required'"></textarea>
					<span class="label label-danger" v-show="errors.has('desc1')">{{ errors.first('desc1') }}</span>
				</div> <hr>

				<!-- 2 -->
				<div class="form-group">
					<label for="">Icon 2:</label>
					<input type="text" class="form-control" v-model="tutorial.icon2" name="icon2" v-validate="'required'">
					<span class="label label-danger" v-show="errors.has('icon2')">{{ errors.first('icon2') }}</span>
				</div>

				<div class="form-group">
					<label for="">Action 2:</label>
					<input type="text" class="form-control" v-model="tutorial.action2" name="action2" v-validate="'required'">
					<span class="label label-danger" v-show="errors.has('action2')">{{ errors.first('action2') }}</span>
				</div>

				<div class="form-group">
					<label for="">Description 2:</label>
					<textarea class="form-control" v-model="tutorial.desc2" name="desc2" v-validate="'required'"></textarea>
					<span class="label label-danger" v-show="errors.has('desc2')">{{ errors.first('desc2') }}</span>
				</div> <hr>

				<!-- 3 -->
				<div class="form-group">
					<label for="">Icon 3:</label>
					<input type="text" class="form-control" v-model="tutorial.icon3" name="icon3" v-validate="'required'">
					<span class="label label-danger" v-show="errors.has('icon3')">{{ errors.first('icon3') }}</span>
				</div>

				<div class="form-group">
					<label for="">Action 3:</label>
					<input type="text" class="form-control" v-model="tutorial.action3" name="action3" v-validate="'required'">
					<span class="label label-danger" v-show="errors.has('action3')">{{ errors.first('action3') }}</span>
				</div>

				<div class="form-group">
					<label for="">Description 3:</label>
					<textarea class="form-control" v-model="tutorial.desc3" name="desc3" v-validate="'required'"></textarea>
					<span class="label label-danger" v-show="errors.has('desc3')">{{ errors.first('desc3') }}</span>
				</div> <hr>

				<div v-if="!tutorial.background" class="form-group">
					<label for="">Image(1600x708)</label>
					<input type="file" @change="onFileChange" name="background" v-validate="'required'">
					<span class="label label-danger" v-show="errors.has('background')">{{ errors.first('background') }}</span>
				</div>

				<div v-else class="form-group">
					<label for="">Image(1024x480)</label>
					<img :src="tutorial.background" class="img-responsive" /> <br>
					<button @click="removeImage" class="btn btn-default">Remove image</button>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</template>

<script src="./Tutorial.js"></script>