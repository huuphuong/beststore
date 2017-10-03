import VModal from 'vue-js-modal'
import Recusive from '../shared/Recusive.vue'
import Common from '../../Common'

export default {
	name: 'category',

	components: { VModal, Recusive },

	data () {
		return {
			
			position: [],
			cat: {
				
			}
		}
	},

	mounted () {
		document.title = 'Edit category';
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