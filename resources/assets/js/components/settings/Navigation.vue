<template>
	<div id="root">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Navigation Setting</h3>
			</div>

			<div class="panel-body">
				<form method="POST" enctype="multipart/form-data" @submit.prevent="onSubmit">

					<div class="form-group">
						<label for="text_link">Parent navigation:</label>
						<select name="parent_id" class="form-control" v-model="nav.parent_id">
							<option value="">Chọn</option>
							<option v-for="parent in parents" v-bind:value="parent.id">{{ parent.text_link }}</option>
						</select>
					</div>

					<div class="form-group">
						<label for="text_link">Text link:</label>
						<input type="text" class="form-control" name="text_link" v-model="nav.text_link">
					</div>

					<div class="form-group">
						<label for="url">URL</label>
						<input type="text" class="form-control" name="url" v-model="nav.url">
					</div>

					<div class="form-group">
						<label for="position">Position</label>
						<input type="number" class="form-control" name="display" v-model="nav.position" min="1" maxlength="4">
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


					<button type="reset" class="btn btn-default">Cancel</button>
					<button type="submit" class="btn btn-primary">Add navigiation</button>
				</form>
			</div>
		</div>
	</div>
</template>

<script src="./Navigation.js"></script>