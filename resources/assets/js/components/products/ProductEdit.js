import Common from '../../Common';
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
			product: { },
			uploadUrl: '/api/v1/products/upload',
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
	        listCurrentImage: []
		}
	},

	mounted () {
		var vm = this;
		vm.getSizes();
		vm.getColors();
		vm.getCategories();
		vm.getVendors();
		vm.getProduct();
	},

	methods: {

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
			var id = vm.$route.params.id;
			var url = '/api/v1/products/' + id;
			axios.put(url, {
				product: vm.product,
				product_detail_image: dropzoneFile
			}).then(function (response) {
				var product_id = response.data.data.product_id;
				vm.$router.push('/products/detail/' + product_id);
			}).catch(function (error) {
				console.log(error);
			});
		},


		getProduct () {
			var vm = this;
			var id = vm.$route.params.id;
			var url = '/api/v1/products/' + id + '/edit';
			axios.get(url).then(function (response) {
				var result = response.data;
				vm.product = result.product.data;
				vm.listCurrentImage = result.images;
				console.log(vm.listCurrentImage);
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		removeImgDetail (event, index) {
			var vm = this;
			var element = event.currentTarget;
			var image_id = element.getAttribute('imageid');
			var url = '/api/v1/product-image/' + image_id;
			axios.delete(url).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._NOCONTENT)
				{
					vm.listCurrentImage.splice(index, 1);
				}
				Common.setToast(result.message, result.status);
			}).catch(function (errors) {
				console.log(errors);
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
