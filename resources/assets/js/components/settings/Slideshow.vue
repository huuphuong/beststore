<template>
	<div id="root">
		<div class="btn-group-vertical m-b-15">
			<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-default" data-toggle="modal" @click="showModal">Add Slideshow</button>
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add Product</h4>
						</div>
						<form action="" method="POST" role="form" @submit.prevent="validateBeforeSubmit">
							<div class="modal-body">
								<div class="form-group">
									<label for="">Text link:</label>
									<input type="text" class="form-control" name="text_link" v-model="text_link" v-validate="'required'" data-vv-as="Tên action">
									<span class="label label-danger" v-show="errors.has('text_link')">{{ errors.first('text_link') }}</span>
								</div>

								<div class="form-group">
									<label for="">URL:</label>
									<input type="text" class="form-control" name="url" v-model="url" v-validate="'required'" data-vv-as="Địa chỉ đường dẫn">
									<span class="label label-danger" v-show="errors.has('url')">{{ errors.first('url') }}</span>
								</div>

								<div class="form-group">
									<label for="">Display:</label>
									<input type="radio" name="display" id="input" value="1" v-model="display"> Yes
									<input type="radio" name="display" id="input" value="0" v-model="display"> No
								</div>

								<div class="form-group">
									<label for="">Position:</label>
									<input type="text" class="form-control" v-model="position" name="position" v-validate="'required'" data-vv-as="Thứ tự sắp xếp">
									<span class="label label-danger" v-show="errors.has('position')">{{ errors.first('position') }}</span>
								</div>

								<div v-if="!image" class="form-group">
									<label for="">Image(1024x480)</label>
									<input type="file" @change="onFileChange">
								</div>

								<div v-else class="form-group">
									<label for="">Image(1024x480)</label>
									<img :src="image" class="img-responsive" /> <br>
									<button @click="removeImage" class="btn btn-default">Remove image</button>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /.End Add -->

		<slideshow-list :data="slideshows"></slideshow-list>
	</div>
</template>
<script src="./Slideshow.js"></script>