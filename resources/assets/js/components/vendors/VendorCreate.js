import Common from '../../Common';
import PictureInput from 'vue-picture-input';

export default {
	name: 'VendorCreate',

	components: { PictureInput },

	data () {
		return {
			vendor: {
				vendor_name: '',
				vendor_shortname: '',
				vendor_email: '',
				vendor_skype: '',
				vendor_phone: '',
				vendor_address: '',
				vendor_images: ''
			},
		}
	},

	mounted () {
		document.title = 'Create vendor';
	},


	methods: {
		onChangeImage () {
          var vm = this;
          if (vm.$refs.pictureInput.image) {
            vm.vendor.vendor_images = vm.$refs.pictureInput.image;
          }
        },
        

        validateBeforeSubmit() {
        	var vm = this;
        	vm.$validator.validateAll().then((result) => {
        		if (result) {
        			return vm.onCreate()
        		}
        	});
        },


        onCreate () {
        	var vm = this;
        	var url = baseUrl + 'vendors';
        	axios.post(url, vm.vendor).then(function (response) {
        		var result = response.data;
        		Common.setToast(result.message, result.status);
        		if (result.status == Common.statusCode._CREATED)
        		{
        			vm.$router.push('/vendors');
        		}
        	}).catch(function (errors) {
        		console.log(errors);
        	});
        }
	} // End methods
} // End class