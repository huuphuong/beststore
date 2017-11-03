import Common from '../../Common';

export default {
  name: 'roleCreate',

  data: function () {
    return {
      postBody: {
        role_name: '',
        role_desc: ''
      }
    }
  },

  mounted: function () {
    document.title = 'Tạo quyền';
  },

  methods: {
    validateBeforeSubmit() {
      var vm = this;
      vm.$validator.validateAll().then((result) => {
        if (result) {
          return vm.onSubmit()
        }
      });
    },


    onSubmit: function () {
      var vm = this;;
      let url = '/api/v1/roles';

      axios.post(url, {
          body: vm.postBody
        })
        .then(function (response) {
          var result = response.data;
          Common.setToast(result.message, result.status);
          return vm.$router.push('/roles/detail/' + result.id);
        })
        .catch(function (errors) {
          console.log(errors);
        })
    }
  } // End method
} // End class