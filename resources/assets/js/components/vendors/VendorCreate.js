import Common from '../../Common';
import PictureInput from 'vue-picture-input';

export default {
	name: 'VendorCreate',

	components: { PictureInput },

	data () {
		return {

		}
	},

	mounted () {
		document.title = 'Create vendor';
	},


	methods: {
		onChangeImage () {
          var vm = this;
          if (vm.$refs.pictureInput.image) {
            vm.avatar = vm.$refs.pictureInput.image;
          }
        },
	}
} // End class