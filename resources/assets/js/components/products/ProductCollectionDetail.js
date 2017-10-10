export default {
	name: 'ProductCollectionDetail',

	data () {
		return {
			group: '',
			product_number: []
		}
	},


	mounted () {
		document.title = 'Product Collection Detail';
		var vm = this;
		vm.getGroup();
		vm.getProductNumber();
	},


	methods: {
		getGroup () {
			var vm = this;
			let id = vm.$route.params.id;
			let url = baseUrl + 'product-groups/' + id;
			axios.get(url).then(function (response) {
				vm.group = response.data.data;
				// console.log(vm.group)
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		getProductNumber () {
			var vm = this;
			let id = vm.$route.params.id;
			let url = baseUrl + 'contains_product?pg_id=' + id;
			axios.get(url).then(function (response) {
				vm.product_number = response.data.data;
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	}
} // End class