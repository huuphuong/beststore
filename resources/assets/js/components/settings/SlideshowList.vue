<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Slideshow</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Text link</th>
						<th>URL</th>
						<th>Display</th>
						<th>Position</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="slideshow in data">
						<td></td>
						<td>{{ slideshow.text_link }}</td>
						<td>{{ slideshow.url }}</td>
						<td>{{ slideshow.display == 1 ? 'Yes' : 'No' }}</td>
						<td>{{ slideshow.position }}</td>
						<td>
							<img v-bind:src="slideshow.image" class="img-responsive" with="80px" height="80px">
						</td>
						<td>
							<a href="">Edit</a> |
							<a href="">Delete</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'SlideshowList',
		props: ['data']
	}
</script>