<template>
	<div class="panel panel-default m-t-10">
		<div class="panel-heading">
			<h3 class="panel-title">Navigation Setting</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Text link</th>
						<th>URL</th>
						<th>Position</th>
						<th>Display</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(nav, index) in navigations">
						<td>{{ index+1 }}</td>
						<td>{{ nav.text_link }}</td>
						<td>{{ nav.url }}</td>
						<td>{{ nav.position }}</td>
						<td>{{ nav.display == '1' ? 'Yes' : 'No'}}</td>
						<td>
							<div v-show="nav.deleted_at">
								<span class="label label-danger">Deleted</span>
							</div>
						</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-default" @click="getEditModal(nav.id)">Edit</button>
								<button type="button" class="btn btn-danger" @click="removeNav(nav.id, index)" v-show="!nav.deleted_at">Delete</button>
								<button type="button" class="btn btn-info" @click="restoreNav(nav.id, index)" v-show="nav.deleted_at">Restore</button>
							</div>
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
	name: 'NavigationList',
	props: ['nav'],

	data () {
		return {
			navigations: [],
			childs: []
		}
	},

	mounted () {
		this.getNavgination();
	},

	methods: {
		getNavgination () {
			var vm = this;
			var url = baseUrl + 'navigations';
			axios.get(url).then(function (response) {
				vm.navigations = response.data.data;
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		getChild (parent) {
			var vm = this;
			var url = baseUrl + 'navigations?parent='+parent;
			axios.get(url).then(function (response) {
				vm.childs = response.data.data;
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		removeNav (navId, index) {
			var checkDelete = confirm('Do you want delete this navigation and all children of it?');
			if (checkDelete) {
				var vm = this;
				var url = baseUrl + 'navigations/' + navId;
				axios.delete(url).then(function (response) {
					var result = response.data;
					if (result.status == Common.statusCode._CREATED)
					{
						Common.setToast(result.message, result.status);
						vm.navigations[index].deleted_at = true;
					}
				}).catch(function (errors) {
					console.log(errors);
				});
			}
		},


		restoreNav (navId, index) {
			var vm = this;
			var url = baseUrl + 'navigations/restore';
			axios.put(url, {
				navigation: navId
			}).then(function (response) {
				vm.navigations[index].deleted_at = null;
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		getEditModal (id) {
			$('#myModal').modal('show');
			this.$emit('getNav', id);
		}


	} // End method
}
</script>