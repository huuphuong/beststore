import Common from '../../Common';
import PictureInput from 'vue-picture-input';
import Action from '../shared/Action.vue';

export default {
	name: 'VendorCreate',

	components: { PictureInput, Action },

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
		document.title = 'Cập nhật thông tin nhà cung cấp';
        this.getVendor();
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
        			return vm.onUpdate()
        		}
        	});
        },


        onUpdate () {
        	var vm = this;
            let id = this.$route.params.id;
        	var url = baseUrl + 'vendors/' + id;
        	axios.put(url, vm.vendor).then(function (response) {
        		var result = response.data;
        		Common.setToast(result.message, result.status);
        		if (result.status == Common.statusCode._CREATED)
        		{
        			vm.$router.push('/vendors');
        		}
        	}).catch(function (errors) {
        		console.log(errors);
        	});
        },


        getVendor () {
            var vm = this;
            let id = this.$route.params.id;
            var url = baseUrl + 'vendors/' + id + '/edit';
            axios.get(url).then(function (response) {
                vm.vendor = response.data.data;
            }).catch(function (errors) {
                console.log(errors);
            });
        }
	} // End methods
} // End class