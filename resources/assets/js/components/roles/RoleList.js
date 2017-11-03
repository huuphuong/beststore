import Common from '../../Common';

export default {
	name: 'listRole',

	data: function () {
		return {
			listRole: []
		}
	},

	mounted: function () {
		document.title = 'Danh sách quyền';
		this.getListRole();
	},

	methods: {
		getListRole: function () {
			var vm = this;

			var url = 'api/v1/roles';
			axios.get(url)
					.then(function (response) {
						vm.listRole = response.data.data;
					})
					.catch(function (errors) {

					})
		},

		removeRole: function (id) {
			var confirmed = confirm('Bạn muốn xóa nhóm người dùng này?');
			if (confirmed) {
				var vm = this;
				var url = '/api/v1/roles/' + id;
				axios.delete(url)
						 .then(function (response) {
						 		var result = response.data;
						 		Common.setToast(result.message, result.status);
						 		vm.listRole = vm.getListRole();
						 })
						 .catch(function (errors) {
						 		console.log(errors);
						 })
				}
		}
	} // End method
} // End class