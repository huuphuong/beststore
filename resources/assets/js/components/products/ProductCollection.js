import Common from '../../Common';

export default {
	name: 'ProductCollection',

	data () {
		return {
			collections: []
		}
	},


	mounted () {
		var vm = this;
		vm.getProductGroup();
	},


	methods: {
		getProductGroup () {
			var url = baseUrl + 'product-groups';
			var vm = this;
			axios.get(url).then(function (response) {
				vm.collections = response.data.data;
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		deleteProductGroup (pg_id, key) {
			var confirmDetele = confirm('Do you want delete this collection?');
			if (confirmDetele) {
				var vm = this;
				var url = baseUrl + 'product-groups/' + pg_id;
				axios.delete(url).then(function (response) {
					var result = response.data;
					if (result.status == Common.statusCode._CREATED)
					{
						Common.setToast(result.message, result.status);
						vm.collections.splice(key, 1);
					}
				}).catch(function (errors) {
					console.log(errors);
				});
			}
		}
	}
} // End class