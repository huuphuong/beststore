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
		this.getProductGroup();
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
              return vm.update()
            }
          });
        },


        getProductGroup () {
        	var vm = this;
        	var id = vm.$route.params.id;
        	var url = baseUrl + 'product-groups/' + id + '/edit';
        	axios.get(url).then(function (response) {
        		vm.collection = response.data.data;
        	}).then(function (errors) {
        		console.log(errors);
        	});
        },


		update () {
			var vm = this;
			var id = vm.$route.params.id;
			var url = baseUrl + 'product-groups/' + id;
			vm.collection.pg_background = vm.avatar;
			axios.put(url, vm.collection).then(function (response) {
				var result = response.data;
				Common.setToast(result.message, result.status);
				return vm.$router.push('/productcollections');
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	}
} // End class