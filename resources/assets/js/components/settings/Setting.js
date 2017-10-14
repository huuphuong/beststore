import PictureInput from 'vue-picture-input';
import Multiselect from 'vue-multiselect'

export default {
    name: 'Setting',

    components: {
        PictureInput, Multiselect
    },

    data () {
        return {
            slogan: '',
            newletter: '',
            copyright: '',
            shop_label: '',
            address: '',
            email: '',
            phone: '',
            skype: '',
            categories: '',
            page_name: [],
            page_slug: [],
            pages: [{ index: 1 }],
            avatar: ''
        }
    },

    created () {
        document.title = 'Setting';
    },

    mounted () {
        var vm = this;
       
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
              return vm.updateSetting()
            }
          });
        },


        updateSetting () {

        },

        addPage () {
            this.pages.push({ index: 1 });
        },

        removeItem (key) {
            this.$delete(this.pages, key);
        }

    }
} // End class