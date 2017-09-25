export default {
	name: 'ProductDetail',

	data () {
		return {
			product: { }
		}
	},

	mounted () {
		var vm = this;
		vm.getProduct();
	},

	methods: {
		getProduct () {
			var vm = this;
			var product_id = this.$route.params.id;
			var url = '/api/v1/products/' + product_id;
			axios.get(url).then(function (response) {
				vm.product = response.data.data;
			}).catch(function (error) {
				console.log(error);
			});
		}
	}
} // End class