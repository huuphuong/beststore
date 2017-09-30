const queryString = require('query-string');
import Common from '../../Common.js';
import Recusive from '../shared/Recusive.vue';
import SelectOption from '../shared/SelectOption.vue';
import VConditional from '../shared/VConditional.vue';
import Paginate from 'vuejs-paginate'

export default {
	name: 'ProductList',

	components: { Recusive, SelectOption, VConditional, Paginate },

	data () {
		return {
			products: [],
			vendors: [],

			query: {
				is_new: '',
				is_hot: '',
				is_sale: '',
				product_name: '',
				vendor_id: '',
				cat_id: '',
			},

			last_page: 0,
			first_page: 1,
			current_page: 1,

			total: 0,
		}
	},

	created () {
		document.title = 'Product List';
	},

	mounted: function () {
		var vm = this;
		vm.getProducts();
		var promise = new Promise(function (resolve, reject) {
			resolve (Common.getComponent());
			reject('Can\'t get component. Please try again later');
		});

		promise.then(function (response) {
			vm.vendors = response.data;
		}).catch(function (errors) {
			console.log(errors);
		})
	},


	methods: {

		getProducts(currentPage=1) {

			var vm = this;
			var query = vm.fetchData();

			if (typeof currentPage == 'object') {
				currentPage = 1;
			}

			var url = `/api/v1/products?page=${currentPage}&${query}`;
			axios.get(url).then(function (response) {
				var result = response.data.data;
				vm.products = result.products.data;

				vm.last_page    = result.products.last_page;
				vm.total        = result.products.total;
				vm.current_page = currentPage;
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


		clearPage () {
			var vm = this;
			vm.query = { };
			vm.getProducts(vm.first_page);
		},


		fetchData () {
			var vm = this;
			var q = {
				product_name: vm.query.product_name,
				cat_id: typeof vm.query.cat_id == 'object' ? vm.query.cat_id.target.value : null,
				vendor_id: typeof vm.query.vendor_id == 'object' ? vm.query.vendor_id.target.value : null,
				is_hot: typeof vm.query.is_hot == 'object' ? vm.query.is_hot.target.value : null,
				is_new: typeof vm.query.is_new == 'object' ? vm.query.is_new.target.value : null,
				is_sale: typeof vm.query.is_sale == 'object' ? vm.query.is_sale.target.value : null
			}

			return queryString.stringify(q);
		},

		parseMoney (price) {
			price = price.replace(/,/g , '');
			return parseInt(price);
		}

	},

	computed: {

	}
} // End class