import Common from '../../Common';
import draggable from 'vuedraggable'
import Action from '../shared/Action.vue';

export default {
	name: 'ProductCollectionDetail',

	components: { draggable, Action },

	data () {
		return {
			group: '',
			product_number: [],
			product_order: ''
		}
	},


	mounted () {
		document.title = 'Thông tin chi tiết bộ sưu tập';
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
		},


		// Cập nhật lại vị trí sắp xếp của từng sản phẩm trong collection
		updatePosition () {
			var vm = this;
			var products = vm.product_number;
			var data = []; var count = products.length;
			for (var i=0; i<count; i++)
			{
				data.push({
					position: i,
					product_id: products[i].product_id,
					pg_id: vm.$route.params.id
				});
			}

			let url = baseUrl + 'collection/position';
			axios.post(url, data).then(function (response) {
				var result = response.data;
				Common.setToast(result.message, result.status);
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		// Loại bỏ sản phẩm trong collection
		removeProduct(product_id, index) {
			var vm = this;
			var url = baseUrl + 'collection/remove/' + product_id;
			axios.delete(url).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._CREATED)
				{
					vm.product_number.splice(index, 1);
				}

				Common.setToast(result.message, result.status);
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	}
} // End class