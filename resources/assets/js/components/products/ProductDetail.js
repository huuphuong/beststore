import VModal from 'vue-js-modal';

export default {
	name: 'ProductDetail',

	components: { VModal },

	data () {
		return {
			product: { }
		}
	},

	created () {
		document.title = 'Product Detail';
	},


	mounted () {
		var vm = this;
		vm.getProduct();
		document.title = 'Chi tiết sản phẩm';
	},

	methods: {
		getProduct () {
			var vm = this;
			var product_id = this.$route.params.id;
			var url = '/api/v1/products/' + product_id;
			axios.get(url).then(function (response) {
				vm.product = response.data.data;
				vm.$modal.show('content-modal');
			}).catch(function (error) {
				console.log(error);
			});
		},


		show () {
			this.$modal.show('hello-world');
		},


		hide () {
			this.$modal.hide('hello-world');
		},

		getData() {
			axios.get(url).then(function (response) {

			})
		}
	}
} // End class