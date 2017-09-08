import Dropzone from 'vue2-dropzone'
import PictureInput from 'vue-picture-input'
import Common from '../../Common'

export default {
  name: 'userCreate',

  components: {
    Dropzone,
    PictureInput
  },

  data: function () {
    return {
      user: {
        gender: 'Male',
        email: ''
      },
      repassword: '',
      avatar: ''
    }
  },

  created () {
    
  },

  mounted: function () {
    
  },


  methods: {
    onChangeImage: function () {
      var vm = this;
      if (vm.$refs.pictureInput.image) {
        vm.avatar = vm.$refs.pictureInput.image
      }
    },


    validateBeforeSubmit() {
      var vm = this;
      vm.$validator.validateAll().then((result) => {
        if (result) {
          return vm.createUser()
        } else {
          alert(errors)
        }
      });
    },


    onCheckEmailExist: function (email) {
      var vm = this;

      email = email.trim();
      let url = '/api/users/check_exists/' + email;
      let result;
      axios.get(url)
        .then(function (response) {
          vm.result = !response.data
        })
        .catch(function (errors) {
          vm.result = errors
        });

      return vm.result;
    },


    createUser: function () {
      let vm = this;
      let url = '/api/users';
      axios.post(url, {
        body: {
          user: vm.user,
          avatar: vm.avatar
        }
      }).then(function (response) {
          var result = response.data;
          Common.setToast(result.message, result.type);
          if (result.type == 'success') {
            console.log('Chuyển hướng');
          }
      }).catch(function (errors) {
        console.log(errors)
      })
    }
  }, // End methods


} // End class