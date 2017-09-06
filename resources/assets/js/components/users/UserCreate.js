export default {
  name: 'userCreate',

  data: function () {
    return {
      user: {
        gender: 'Male',
        email: ''
      },
      repassword: '',
      image: '',
      result: ''
    }
  },

  created: function () {
    var vm = this;
    vm.$validator.extend('check_exists', {

      getMessage(field) {
        return 'Email đã được sử dụng'
      },


      validate: function (value) {
        return new Promise(resolve => {
          resolve({
            valid: vm.onCheckEmailExist(value)
          });
        })
      }
    });
  },

  mounted: function () {

  },


  methods: {
    onChangeFile: function (e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      this.createImage(files[0]);
    },

    createImage: function (file) {
      var image = new Image();
      var reader = new FileReader();
      var vm = this;

      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },

    removeImage: function () {
      this.image = '';
    },

    onSubmit: function () {
      var vm = this;
      console.log(vm.user);
    },

    onCheckEmailExist: function (email) {
      var vm = this;

      email = email.trim();
      let url = '/api/users/check_exists/' + email;
      let result;
      axios.get(url)
            .then(function (response) {
              vm.result = ! response.data
            })
            .catch(function (errors) {
              vm.result = errors
            });

      return vm.result;
    }
  }
}
