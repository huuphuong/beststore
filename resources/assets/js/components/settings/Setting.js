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
            social_order: [],

            // List collection
            listCollection: [],
            listVendors: [],
            arr_title: '',
            arr_desc: '',
            arr_collection_1: '',
            arr_collection_2: '',
            vendor_1: '',
            text_1: '',
            vendor_2: '',
            text_2: '',

        }
    },

    created () {
        document.title = 'Setting';
    },

    mounted () {
        var vm = this;
        vm.getSetting();
        vm.getCollections();
        vm.getVendors();
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

                // Header text
                header_icon_info_1: vm.header_icon_info_1,
                header_icon_info_2: vm.header_icon_info_2,
                header_icon_info_3: vm.header_icon_info_3,
                header_text_info_1: vm.header_text_info_1,
                header_text_info_2: vm.header_text_info_2,
                header_text_info_3: vm.header_text_info_3,

                // Social
                social_name: vm.social_name,
                social_icon: vm.social_icon,
                social_url: vm.social_url,
                social_order: vm.social_order,

                arr_title: vm.arr_title,
                arr_desc: vm.arr_desc,
                arr_collection_1: vm.arr_collection_1,
                arr_collection_2: vm.arr_collection_2,
                vendor_1: vm.vendor_1,
                text_1: vm.text_1,
                vendor_2: vm.vendor_2,
                text_2: vm.text_2,
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

                // NEW ARRIVALS
                vm.arr_title        = result.arr_title;
                vm.arr_desc         = result.arr_desc;
                vm.arr_collection_1 = result.arr_collection_1;
                vm.arr_collection_2 = result.arr_collection_2;
                vm.vendor_1         = result.vendor_1;
                vm.text_1           = result.text_1;
                vm.vendor_2         = result.vendor_2;
                vm.text_2           = result.text_2;

                var categories_item = JSON.parse(result.categories_item);
                    for (var objectKey in categories_item)
                    {
                        vm.addPage();
                        vm.page_name.push(categories_item[objectKey]);
                        vm.page_slug.push(objectKey);
                    }

                var social_item = JSON.parse(result.social_item);

                for (var item of social_item) {
                    vm.addSocial();
                    vm.social_name.push(item['social_name']);
                    vm.social_icon.push(item['social_icon']);
                    vm.social_url.push(item['social_url']);
                    vm.social_order.push(item['social_order']);
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

        removeSocialItem (key) {
             this.$delete(this.socials, key);
        },

        openHeaderModal: function () {
            $('#openHeaderModal').modal('show');
        },


        getCollections () {
            var vm = this;
            var url = baseUrl + 'product-groups';
            axios.get(url).then(function (response) {
                vm.listCollection = response.data.data;
            }).catch(function (errors) {
                console.log(errors);
            });
        },

        getVendors () {
            var vm = this;
            var url = baseUrl + 'vendors';
            axios.get(url).then(function (response) {
                vm.listVendors = response.data.data;
            }).catch(function (errors) {
                console.log(errors);
            });
        }

    } // End method
} // End class