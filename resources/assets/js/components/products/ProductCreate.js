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
				product_image: '',
				size: [],
				color: [],
				vendor_id: ''
			},
			uploadUrl: '/products/upload',
			sizes: [], // Cho danh sách size vào đây
			colors: [],
			color_id: '',
			vendors: [], // Danh sách NCC
			// Price & Price sales
	        money: {
	          decimal: ',',
	          thousands: ',',
	          precision: 3,
	          masked: true
	        },
	        avatar: '',
		}
	},

	created () {
		document.title = 'Tạo sản phẩm';
	},


	mounted () {
		var vm = this;
		vm.getSizes();
		vm.getColors();
		vm.getCategories();
		vm.getVendors();
	},

	methods: {
		validateBeforeSubmit() {
	      var vm = this;
	      vm.$validator.validateAll().then((result) => {
	        if (result) {
	          return vm.onSubmit()
	        }
	      });
	    },

		onChangeImage () {
	      var vm = this;
	      if (vm.$refs.pictureInput.image) {
	        vm.avatar = vm.$refs.pictureInput.image;
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



		getVendors () {
			var vm = this;
			var url = '/api/v1/vendors';
			axios.get(url).then(function (response) {
				vm.vendors = response.data.data;
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		onSubmit () {
			var vm = this;
			var dropzoneFile = vm.$refs.myDropzone.dropzone.files;
			vm.product.product_image = vm.avatar; // Thêm phần tử ảnh đại diện
			var url = '/api/v1/products';
			axios.post(url, {
				product: vm.product,
				product_detail_image: dropzoneFile
			}).then(function (response) {
				var product_id = response.data.data.product_id;
				vm.$router.push('/products/detail/' + product_id);
			}).catch(function (error) {
				console.log(error);
			});
		}

	}, // Method

	computed: {
		selectAll: {
			get () {
				var vm = this;
				return vm.product.size ? vm.product.size.length == vm.sizes.length : false;
			},

			set (value) {
				var vm = this;
				var selected = [];

                if (value) {
                    vm.sizes.forEach(function (size) {
                        selected.push(size.size_name);
                    });
                }

                vm.product.size = selected;
			}
		}
	}, // Computed

	directives: {
		// Add more directive here
	}
} // End class
