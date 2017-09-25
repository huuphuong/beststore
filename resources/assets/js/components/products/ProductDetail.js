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
			var type = typeof Storage;
			var item = localStorage.getItem('product');
				item = JSON.parse(item);

			var product_id = item.product_id;
			var route_id = vm.$route.params.id;
			// Tồn tại localStorage và bằng với router id params
			if (type !== 'undefined' && product_id == route_id)
			{
				vm.product = item;
			}
			else
			{
				// Không tồn tại, send request lên server
				console.log("Must send request"); 
			}
		}
	}
} // End class