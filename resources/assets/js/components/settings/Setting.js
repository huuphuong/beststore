import Common from '../../Common';
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
            shop_info: '',
            address: '',
            email: '',
            phone: '',
            skype: '',
            categories: '',
            page_name: [],
            page_slug: [],
            pages: [],
            avatar: '',
            header_icon_info_1: '',
            header_icon_info_2: '',
            header_icon_info_3: '',


            header_text_info_1: '',
            header_text_info_2: '',
            header_text_info_3: '',

            socials: [],
            social_name: [],
            social_icon: [],
            social_url: [],
            social_order: []
        }
    },

    created () {
        document.title = 'Setting';
    },

    mounted () {
        var vm = this;
        vm.getSetting();
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
            var vm = this;
            var url = baseUrl + 'settings';
            axios.post(url, {
                logo: vm.avatar,
                slogan: vm.slogan,
                newletter: vm.newletter,
                copyright: vm.copyright,
                shop_info: vm.shop_info,
                address: vm.address,
                email: vm.email,
                phone: vm.phone,
                skype: vm.skype,
                categories: vm.categories,
                page_name: vm.page_name,
                page_slug: vm.page_slug,
                header_icon_info_1: vm.header_icon_info_1,
                header_icon_info_2: vm.header_icon_info_2,
                header_icon_info_3: vm.header_icon_info_3,
                header_text_info_1: vm.header_text_info_1,
                header_text_info_2: vm.header_text_info_2,
                header_text_info_3: vm.header_text_info_3,
            }).then(function (response) {
                var result = response.data;
                Common.setToast(result.message, result.status);
            }).catch(function (errors) {
                console.log(errors);
            });
        },


        getSetting () {
            var vm = this;
            var url = baseUrl + 'settings';
            axios.get(url).then(function (response) {
                var result = response.data.data[0];
                vm.slogan = result.slogan;
                vm.newletter = result.newletter;
                vm.copyright = result.copyright;
                vm.address = result.address;
                vm.phone = result.phone;
                vm.email = result.email;
                vm.skype = result.skype;
                vm.shop_info = result.shop_info;
                vm.categories = result.categories;
                vm.avatar = result.logo;
                vm.header_icon_info_1 = result.header_icon_info_1;
                vm.header_icon_info_2 = result.header_icon_info_2;
                vm.header_icon_info_3 = result.header_icon_info_3;
                vm.header_text_info_1 = result.header_text_info_1;
                vm.header_text_info_2 = result.header_text_info_2;
                vm.header_text_info_3 = result.header_text_info_3;
                var categories_item = JSON.parse(result.categories_item);
                    for (var objectKey in categories_item)
                    {
                        vm.addPage();
                        vm.page_name.push(categories_item[objectKey]);
                        vm.page_slug.push(objectKey);
                    }
            }).catch(function (errors) {
                console.log(errors);
            });
        },

        addPage () {
            this.pages.push({ index: 1 });
        },

        addSocial () {
            this.socials.push({index: 1});
        },

        removeItem (key) {
            this.$delete(this.pages, key);
        },

        openHeaderModal: function () {
            $('#openHeaderModal').modal('show');
        }

    }
} // End class