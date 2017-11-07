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
				parent_cat_id: '',
				display: 1,
				position: 1,
				cat_desc: '',
				seo_title: '',
				seo_keyword: '',
				seo_desc: '',
				seo_robot: '',
				seo_revisit: '',
				seo_copyright: '',
				title_slider: '',
				content_slider: '',
				images_slider: ''
			}
		}
	},

	mounted () {
		document.title = 'Tạo danh mục';
		var vm = this;
		vm.getPosition();
	},


	methods: {
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
			var url = baseUrl + 'categories';
			axios.post(url, {
				category: vm.cat
			}).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._CREATED) {
					Common.setToast('Category has been created', 'success');
					vm.$router.push('/categories/detail/' + result.data.cat_id);
				}else {
					Common.setToast(result.message, 'error');
				}
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	}, // End method
} // End class