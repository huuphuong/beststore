<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Slideshow</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Name(Collection, event, image v.v..)</th>
						<th>Text link</th>
						<th>URL</th>
						<th>Display</th>
						<th>Position</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(slideshow, key) in data">
						<td>{{ key + 1 }}</td>
						<td>{{ slideshow.name }}</td>
						<td>{{ slideshow.text_link }}</td>
						<td>{{ slideshow.url }}</td>
						<td>{{ slideshow.display == 1 ? 'Yes' : 'No' }}</td>
						<td>{{ slideshow.position }}</td>
						<td>
							<img v-bind:src="slideshow.image" class="img-responsive" width="80px" height="80px">
						</td>
						<td>
							<button type="button" class="btn btn-default" @click="getSlide(slideshow.id)">Edit</button>
							<button type="button" class="btn btn-danger" @click="deleteSlide(slideshow.id, key)">Delete</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
import Common from '../../Common';
export default {
	name: 'SlideshowList',
	props: ['data'],

	data: function () {
		return {
			slideshow: { },
		}
	},

	methods: {
		deleteSlide: function (id, key) {
			var confirmDelete = confirm('Do you want delete this slideshow');
			if (confirmDelete) {
				var vm = this;
				var url = baseUrl + 'slideshows/' + id;
				axios.delete(url).then(function (response) {
					var result = response.data;
					if (result.status = Common.statusCode._CREATED)
					{
						Common.setToast(result.message, result.status);
						vm.data.splice(key, 1);
					}
					
				}).catch(function (errors) {
					console.log(errors);
				});
			}
			
		},


		getSlide: function (id) {
			$('#myModal').modal('show');
			var vm = this;
			var url = baseUrl + 'slideshows/' + id + '/edit/';
			axios.get(url).then(function (response) {
				var result = response.data;
				vm.slideshow = result.data;
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	}
} // End class
</script>