import Common from '../../Common';
import draggable from 'vuedraggable';
import NavigationAdd from './NavigationAdd.vue';

export default {
	name: 'NavigationEdit',

	components: { draggable, NavigationAdd },

	data () {
		return {
			navigation: { },
			navigation_number: [],
			currentId: this.$route.params.id,
		}
	},

	mounted () {
		document.title = 'Navigation Management';
		this.getDetailNav();
	},


	methods: {
		getDetailNav () {
			var vm = this;
			var id = vm.$route.params.id;
			var url = baseUrl + 'navigations/' + id;
			axios.get(url).then(function (response) {
				var result = response.data;
				vm.navigation = result.data;
				vm.navigation_number = result.data.childs;
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		reload () {
			location.reload();
		},

		removeNav (navId, index) {
			var checkDelete = confirm('Do you want delete this navigation and all children of it?');
			if (checkDelete) {
				var vm = this;
				var url = baseUrl + 'navigations/' + navId;
				axios.delete(url).then(function (response) {
					var result = response.data;
					if (result.status == Common.statusCode._CREATED)
					{
						Common.setToast(result.message, result.status);
						vm.navigation_number.splice(index, 1);
					}
				}).catch(function (errors) {
					console.log(errors);
				});
			}
		},


		updatePosition () {
			var vm = this;
			var url = baseUrl + 'navigations/position';
			axios.post(url, vm.navigation_number).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._CREATED)
				{
					Common.setToast(result.message, result.status);
				}
			}).catch(function (errors) {
				console.log(errors);
			});
		},

		showModal (id) {
			$('#myModal').modal('show');
			this.$emit('getEditNav', id);
		}
	} // End methods
} // End class