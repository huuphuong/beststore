import Dropzone from 'vue2-dropzone';
import { VueEditor } from 'vue2-editor';
import Multiselect from 'vue-multiselect';
import {Money} from 'v-money'
import PictureInput from 'vue-picture-input';

export default {
	name: 'productCreate',

	components: { Dropzone, VueEditor, Multiselect, Money, PictureInput },

	data () {
		return {
			cat_id: '',
			product: {
				cat_id: '',
				is_new: 0,
				is_hot: 0,
				is_sale: 0,
				product_price: 0,
				product_pricesale: 0,
			},
			uploadUrl: '/api/v1/products/upload',
			sizes: [],
			colors: [],
			selected: [],
			color_id: '',

			// Price & Price sales
	        money: {
	          decimal: ',',
	          thousands: ',',
	          precision: 3,
	          masked: true
	        },
	        avatar: ''
		}
	},

	mounted () {
		var vm = this;
		vm.getSizes();
		vm.getColors();
		vm.getCategories();
	},

	methods: {

		onChangeImage () {
	      var vm = this;
	      if (vm.$refs.pictureInput.image) {
	        vm.avatar = vm.$refs.pictureInput.image
	      }
	    },


		/**
		 * Lấy danh sách các size của sản phẩm
		 * @return {[type]} [description]
		 */
		getSizes () {
			var vm = this;
			var url = '/api/v1/sizes';
			axios.get(url).then(function (response) {
				vm.sizes = response.data.data;
			}).catch(function (errors) {
				console.log(errors);
			})
		},

		/**
		 * Lấy danh sách các màu sản phẩm
		 * @return {[type]} [description]
		 */
		getColors () {
			var vm = this;
			var url = '/api/v1/colors';
			axios.get(url).then(function (response) {
				vm.colors = response.data.data;
			}).catch(function (errors) {
				console.log(errors);
			})
		},


		/**
		 * Lấy danh sách categories
		 * @return {[type]} [description]
		 */
		getCategories () {
			var vm = this;
			var url = '/api/v1/categories';
			axios.get(url).then(function (response) {
				vm.cat_id = response.data.data;
			}).catch(function (errors) {
				console.log(errors)
			});
		},


		onSubmit () {
			var vm = this;
			console.log(vm.product);
		}

	}, // Method

	computed: {
		selectAll: {
			get () {
				var vm = this;
				return vm.sizes ? vm.selected.length == vm.sizes.length : false;
			},

			set (value) {
				var vm = this;
				var selected = [];

                if (value) {
                    vm.sizes.forEach(function (size) {
                        selected.push(size.size_id);
                    });
                }

                vm.selected = selected;
			}
		}
	}, // Computed

	directives: {
		rainbow: {
			bind (el, binding, vnode) {
				el.style.color = '#' + Math.random().toString().slice(2, 8);
			}
		},

		theme: {
			bind (el, binding, vnode) {

			}
		}
	}
} // End class
