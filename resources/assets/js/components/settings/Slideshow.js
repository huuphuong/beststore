import Common from '../../Common';
import SlideshowList from './SlideshowList.vue';

export default {
	name: 'Slideshow',

	components: { SlideshowList },

	data () {
		return {
			slideshow: {
				name: '',
				text_link: '',
				url: '',
				display: 1,
				image: '',
				position: 1,
			},

			slideshows: [], // List slideshow
		}
	},

	mounted () {
		document.title = 'Slide Show';
		this.getSlideshow();
	},

	methods: {
		onFileChange(e) {
			var files = e.target.files || e.dataTransfer.files;
			if (!files.length)
				return;
			this.createImage(files[0]);
		},


		createImage(file) {
			var image = new Image();
			var reader = new FileReader();
			var vm = this;

			reader.onload = (e) => {
				vm.slideshow.image = e.target.result;
			};
			reader.readAsDataURL(file);
		},


		removeImage: function (e) {
			this.slideshow.image = '';
		},


		validateBeforeSubmit() {
			var vm = this;
			vm.$validator.validateAll().then((result) => {
				if (result) {
					return vm.onSubmit()
				}
			});
		},

		onSubmit: function () {
			var vm = this;

			if (typeof(Storage) !== "undefined") {
				var isSave = localStorage.getItem('isSave');
				if (typeof isSave != 'undefined' && isSave != null) {
					var id = localStorage.getItem('isSave');
					vm.update(id);
				}else {
					vm.save();
				}
			} 
		},


		save: function () {
			// Không có trong localStorage => Thêm
			var vm = this;
			var endpoint = baseUrl + 'slideshows';
			axios.post(endpoint, vm.slideshow).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._CREATED)
				{
					Common.setToast(result.message, result.status);
					$('#myModal').modal('hide');
					localStorage.removeItem('isSave');
				}

				vm.getSlideshow();
				vm.emptyObject();
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		update: function (id) {
			var vm = this;
			var endpoint = baseUrl + 'slideshows/' + id;
			axios.put(endpoint, vm.slideshow).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._CREATED)
				{
					Common.setToast(result.message, result.status);
					localStorage.removeItem('isSave');
					$('#myModal').modal('hide');
				}

				vm.getSlideshow();
				vm.emptyObject();
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		emptyObject: function () {
			var vm = this;

			vm.slideshow = {
				position: 1, display: 1
			};
		},


		showModal: function () {
			$('#myModal').modal('show');
		},

		getSlideshow: function () {
			var vm = this;
			var url = baseUrl + 'slideshows';
			axios.get(url).then(function (response) {
				var result = response.data;
				vm.slideshows = result.data;
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		getEditSlideshow: function (id) {
			var vm = this;
			var url = baseUrl + 'slideshows/' + id + '/edit';
			axios.get(url).then(function (response) {
				var result = response.data;
				vm.slideshow = result.data;
				$('#myModal').modal('show');

				// Lưu thông tin vào localStore để check là đang Update hay Thêm mới
				if (typeof(Storage) !== "undefined") {
				    var isSave = id;
				    localStorage.setItem('isSave', isSave);
				} 
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	} // End class
} // End class