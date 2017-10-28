import Common from '../../Common';
import PictureInput from 'vue-picture-input';

export default {
	name: 'CollectionAdd',

	components: { PictureInput },

	data () {
		return {
			collection: {
				pg_name: '',
				pg_discount: 1,
				pg_shopname: '',
				display: 1,
				pg_desc: '',
				pg_background: ''
			},

			avatar: ''
		}
	},


	mounted () {
		document.title = 'Add Collection';
	},


	methods: {
		onChangeImage () {
			var vm = this;
			if (vm.$refs.pictureInput.image) {
				vm.avatar = vm.$refs.pictureInput.image;
			}
		},

		validateBeforeSubmit() {
          var vm = this;
          vm.$validator.validateAll().then((result) => {
            if (result) {
              return vm.save()
            }
          });
        },
        
		save () {
			var vm = this;
			var url = baseUrl + 'product-groups';
			vm.collection.pg_background = vm.avatar;
			axios.post(url, vm.collection).then(function (response) {
				var result = response.data;
				Common.setToast(result.message, result.status);
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	}
} // End class