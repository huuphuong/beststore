export default {
	name: 'Slideshow',

	data () {
		return {
			text_link: '',
			url: '',
			image: ''
		}
	},

	mounted () {
		document.title = 'Slide Show';
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


		onSubmit: function () {
			var vm = this;
			var endpoint = baseUrl + 'slideshows';
			axios.post(endpoint, {
				url: vm.url,
				text_link: vm.text_link,
				image: vm.image
			}).then(function (response) {

			}).catch(function (errors) {
				console.log(errors);
			});

		}
	}
} // End class