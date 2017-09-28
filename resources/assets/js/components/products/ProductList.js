import Common from '../../Common.js';

export default {
	name: 'ProductList',

	data () {
		return {
			products: [],
		}
	},

	created () {
		document.title = 'Product List'
	},

	mounted () {
		var vm = this;
		vm.getProducts();
	},


	methods: {
		getProducts() {
			var vm = this;
			var url = '/api/v1/products';
			axios.get(url).then(function (response) {
				vm.products = response.data;
				console.log(vm.products);
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		deleteProduct (product_id, index) {
			var vm = this;
			var url = '/api/v1/products/' + product_id;
			var confirmDelete = confirm('Do you want delete this product?');

			if (confirmDelete) {
				axios.delete(url).then(function (response) {
					var result = response.data;
					if (result.status == Common.statusCode._OK)
					{
						vm.products.splice(index, 1);
					}
					Common.setToast(result.message, result.status);
				}).catch(function (errors) {
					console.log(errors);
				});
			}
		}
	}
} // End class