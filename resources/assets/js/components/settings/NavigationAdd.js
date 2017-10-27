import Common from '../../Common';
import NavigationList from './NavigationList.vue';

export default {
	name: 'navigation',
	props: ['selectedId'],
	components: { NavigationList },

	data () {
		return {
			nav: {
				image: '',
				display: 1,
				parent_id: '',
				text_link: '',
				url: '',
				position: 1
			},

			parents: [],
			navigations: []
		}
	},

	created () {
		
	},

	mounted () {
		document.title = 'Navigation';
		this.getParents();
		this.getNavgination();
	},


	methods: {
		// Bấm nút thì showmodal
		showModal () {
			$('#myModal').modal('show');
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
					return vm.onSubmit()
				}
			});
		},
    
		// Thêm data
		save () {
			var vm = this;
			var url = baseUrl + 'navigations';
			axios.post(url, vm.nav).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._CREATED)
				{
					Common.setToast(result.message, result.status);
					$('#myModal').modal('hide');
				}
			}).catch(function (errors) {
				console.log(errors);
			});

			vm.$emit('reloadPage');
		},


		/**
		 * Update dât
		 * @param  {[type]} id : Mã id được lưu trong storegae
		 * @return {[type]} Update xong thì phải clear Storage vì có thể thêm mới hoặc sửa bản ghi khác
		 */
		update (id) {
			var vm = this;
			var url = baseUrl + 'navigations/' + id;
			axios.put(url, vm.nav).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._CREATED)
				{
					Common.setToast(result.message, result.status);
					$('#myModal').modal('hide');
					localStorage.removeItem('isSaveNav');
				}
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		/**
		 * Khi submit, kiểm tra Storage nếu có isSaveNav => Update() và ngược lại là Save()
		 * @return {[type]} [description]
		 */
		onSubmit: function () {
			var vm = this;

			if (typeof(Storage) !== "undefined") {
				var isSaveNav = localStorage.getItem('isSaveNav');
				if (typeof isSaveNav != 'undefined' && isSaveNav != null) {
					var id = localStorage.getItem('isSaveNav');
					vm.update(id);
				}else {
					vm.save();
				}

				vm.getNavgination();
			}
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

		
		/**
		 * Lấy dữ liệu để sửa, id được lưu vào Storage
		 * @param  {[type]} id [description]
		 * @return {[type]}    [description]
		 */
		getEditNav (id) {
			var vm = this;
			var url = baseUrl + 'navigations/' + id + '/edit';
			axios.get(url).then(function (response) {
				vm.nav = response.data.data;
				if (typeof(Storage) !== "undefined") {
				    var isSaveNav = id;
				    localStorage.setItem('isSaveNav', isSaveNav);
				} 
			}).catch(function (errors) {
				console.log(errors);
			});
		},

		/**
		 * Lấy danh sách nagation rồi bắn vào component con (NavgiationList)
		 * @return {[type]} [description]
		 */
		getNavgination () {
			var vm = this;
			var url = baseUrl + 'navigations';
			axios.get(url).then(function (response) {
				vm.navigations = response.data.data;
				console.log(vm.navigations);
			}).catch(function (errors) {
				console.log(errors);
			});
		},
	},

	computed: {
		// Chuyển hóa text về dạng slug
		slugTitle () {
			var title = this.nav.text_link;
			var stringArrayUrl = Common.changeToSlug(title).split(" ");;
			this.nav.url = stringArrayUrl.join('-');
		}
	}
} // End class