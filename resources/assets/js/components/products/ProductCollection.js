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
	}
} // End class