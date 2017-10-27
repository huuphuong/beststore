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

			// Edit
			nav: {
				image: '',
				display: 1,
				parent_id: '',
				text_link: '',
				url: '',
				position: 1
			},

			parents: [],
			hiddenId: null,
		}
	},

	mounted () {
		document.title = 'Navigation Management';
		this.getDetailNav();
		this.getParents();
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

		// Bắt sự kiện khi thay đổi file image
		onFileChange(e) {
			var files = e.target.files || e.dataTransfer.files;
			if (!files.length)
				return;
			this.createImage(files[0]);
		},

		// Hàm tạo và đọc hình ảnh
		createImage(file) {
			var image = new Image();
			var reader = new FileReader();
			var vm = this;

			reader.onload = (e) => {
				vm.nav.image = e.target.result;
			};
			reader.readAsDataURL(file);
		},

		// Hàm hủy hình ảnh
		removeImage: function (e) {
			this.nav.image = '';
		},


		validateBeforeSubmit() {
			var vm = this;
			vm.$validator.validateAll().then((result) => {
				if (result) {
					return vm.onUpdate()
				}
			});
		},

		onUpdate () {
			var vm = this;
			var id = vm.hiddenId;
			var url = baseUrl + 'navigations/' + id;
			axios.put(url, vm.nav).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._CREATED)
				{
					Common.setToast(result.message, result.status);
				}

				$('#myEditModal').modal('hide');
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		showModal (id) {
			$('#myEditModal').modal('show');
			var vm = this;
			var url = baseUrl + 'navigations/' + id + '/edit';
			axios.get(url).then(function (response) {
				vm.nav = response.data.data;
				vm.hiddenId = id;
			}).catch(function (errors) {
				console.log(errors);
			});
		},

		/**
		 * Lấy danh sách parent rồi đưa vào select option
		 * @return {[type]} [description]
		 */
		getParents () {
			var vm = this;
			var url = baseUrl + 'navigations/parents';
			axios.get(url).then(function (response) {
				vm.parents = response.data.data;
			}).catch(function (errors) {
				console.log(errors);
			});
		},
	}, // End methods

	computed: {
		// Chuyển hóa text về dạng slug
		slugTitle () {
			var title = this.nav.text_link;
			var stringArrayUrl = Common.changeToSlug(title).split(" ");;
			this.nav.url = stringArrayUrl.join('-');
		}
	}
} // End class