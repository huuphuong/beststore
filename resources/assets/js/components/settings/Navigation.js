export default {
	name: 'navigation',

	data () {
		return {
			nav: {
				image: '',
				display: 1
			}
		}
	},


	mounted () {
		document.title = 'Navigation';
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
				vm.nav.image = e.target.result;
			};
			reader.readAsDataURL(file);
		},


		removeImage: function (e) {
			this.nav.image = '';
		},


		onSubmit () {
			var vm = this;
			var url = baseUrl + 'navigations';
			axios.post(url, vm.nav).then(function (response) {
				console.log(response);
			}).catch(function (response) {
				console.log(response);
			});
		}
	}
} // End class