<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Panel title</h3>
		</div>
		<div class="panel-body">
			<form action="" method="POST" role="form" @submit.prevent="onSubmit">

				<div class="form-group">
					<label for="">Text link:</label>
					<input type="text" class="form-control" v-model="text_link">
				</div>

				<div class="form-group">
					<label for="">URL:</label>
					<input type="text" class="form-control" v-model="url">
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

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div>
	</div>
</template>

<script src="./Slideshow.js"></script>