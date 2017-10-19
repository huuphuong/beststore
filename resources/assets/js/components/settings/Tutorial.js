import Common from '../../Common';

export default {
	name: 'tutorial',

	data () {
		return {
			preview_image: 'frontend/images/tutorial_preview.jpg',
			tutorial: {
				background: ''
			}
		}
	},

	mounted () {
		document.title = 'Tutorial'
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
				vm.tutorial.background = e.target.result;
			};
			reader.readAsDataURL(file);
		},


		removeImage: function (e) {
			this.tutorial.background = '';
		},

		validateBeforeSubmit() {
          var vm = this;
          vm.$validator.validateAll().then((result) => {
            if (result) {
              return vm.onSubmit()
            }
          });
        },

		showPreview: function () {
			$('#modalPreview').modal('show');
		},


		setTutorial: function () {

		},


		onSubmit () {
			var vm = this;
			var url = baseUrl + 'tutorials';
			axios.post(url, vm.tutorial).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._CREATED)
				{
					Common.setToast(result.message, result.status);
				}
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	}
} // End class