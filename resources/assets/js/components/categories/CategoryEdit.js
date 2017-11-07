import VModal from 'vue-js-modal'
import Recusive from '../shared/Recusive.vue'
import Common from '../../Common'
import Dropzone from 'vue2-dropzone';

export default {
	name: 'category',

	components: { VModal, Recusive, Dropzone },

	data () {
		return {
			uploadUrl: '/products/upload',
			position: [],
			cat: {
				parent_cat_id: ''
			},

			close: {
				right: '-3px',
				top: '-20px'
			}
		}
	},

	mounted () {
		document.title = 'Sửa danh mục';
		var vm = this;
		vm.getPosition();
		vm.getCategory();
	},


	methods: {

		getCategory () {
			var vm = this;
			var id = vm.$route.params.id;
			var url = baseUrl + 'categories/' + id + '/edit';

			axios.get(url).then(function (response) {
				var result = response.data;
				vm.cat = result.data;
				vm.cat.parent_cat_id = result.data.parent_cat_id;
			}).catch(function (errors) {
				console.log(errors);
			});
		},

		getPosition () {
			var vm = this;
			var url = baseUrl + 'categories/positions?category=' + vm.cat.parent_cat_id;
			axios.get(url).then(function (response) {
				vm.position = response.data.data;
				
			}).catch(function (errors) {
				console.log(errors);
			})
		},

		validateBeforeSubmit() {
			var vm = this;
			vm.$validator.validateAll().then((result) => {
				if (result) {
					return vm.onSubmit()
				}
			});
		},


		onSubmit () {
			var vm = this;
			let id = vm.$route.params.id;
			var url = baseUrl + 'categories/' + id;
			var dropzone = vm.$refs.myDropzone.dropzone.files;
			axios.put(url, {
				category: vm.cat,
				files: dropzone,
			}).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._CREATED) {
					Common.setToast('Category has been updated', 'success');
					vm.$router.push('/categories/detail/' + id);
				}else {
					Common.setToast(result.message, 'error');
				}
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		removeImage (imageId, key) {
			var confirmDelete = confirm('Bạn muốn xóa slider này?');

			if (confirmDelete) {
				var vm = this;
				var url = baseUrl + 'categories_images/' + imageId;
				axios.delete(url).then(function (response) {
					var result = response.data;
					if (result.status == Common.statusCode._CREATED)
					{
						vm.cat.images.splice(key, 1);
					}
				}).catch (function (errors) {
					console.log(errors);
				});
			}
		}
	}, // End method
} // End class