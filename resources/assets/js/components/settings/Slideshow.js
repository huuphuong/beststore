import Common from '../../Common';
import SlideshowList from './SlideshowList.vue';

export default {
	name: 'Slideshow',

	components: { SlideshowList },

	data () {
		return {
			text_link: '',
			url: '',
			display: 1,
			position: '',
			image: '',

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
				vm.image = e.target.result;
			};
			reader.readAsDataURL(file);
		},


		removeImage: function (e) {
			this.image = '';
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
			var endpoint = baseUrl + 'slideshows';
			axios.post(endpoint, {
				url: vm.url,
				text_link: vm.text_link,
				display: vm.display,
				position: vm.position,
				image: vm.image
			}).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._CREATED)
				{
					Common.setToast(result.message, result.status);
					$('#myModal').modal('hide');
				}
			}).catch(function (errors) {
				console.log(errors);
			});

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
		}
	} // End class
} // End class