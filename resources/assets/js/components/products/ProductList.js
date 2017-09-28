import Common from '../../Common.js';
import Recusive from '../shared/Recusive.vue';
import SelectOption from '../shared/SelectOption.vue';

export default {
	name: 'ProductList',

	components: { Recusive, SelectOption },

	data () {
		return {
			products: [],
			category: '',
			vendors: [],
		}
	},

	created () {
		document.title = 'Product List';
	},

	mounted: function () {
		var vm = this;
		vm.getProducts();
	},


	methods: {

		constructor () {
			alert(1);
		},


		getProducts() {
			var vm = this;
			var url = '/api/v1/products';
			axios.get(url).then(function (response) {
				vm.products = response.data;
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
		},


		fetchData () {
			var vm = this;
			console.log(vm.category.target.value);
		},

	}
} // End class