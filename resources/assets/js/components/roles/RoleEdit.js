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
      document.title = 'Sửa quyền';
      this.getRole();
  },

  methods: {
    validateBeforeSubmit() {
      var vm = this;
      vm.$validator.validateAll().then((result) => {
        if (result) {
          return vm.onUpdate()
        }
      });
    },


    getRole: function () {
      var vm = this;
      var id = vm.$route.params.id;
      var url = `/api/v1/roles/${id}/edit`;
      axios.get(url).then(function (response) {
                    var result = response.data;
                    if (result.status == Common.statusCode._NOTFOUND) {
                      return Common.setToast(result.message, result.status);
                    }else {
                      vm.postBody = result.data;
                    }
                  }).catch(function (errors) {
                      console.log(errors);
                  })
    },


    onUpdate: function () {
      var vm = this;
      var id = vm.$route.params.id;
      let url = '/api/v1/roles/' + id;

      axios.put(url, {
          body: vm.postBody
        })
        .then(function (response) {
          var result = response.data;
          Common.setToast(result.message, result.status);
          return vm.$router.push('/roles/detail/' + id);
        })
        .catch(function (errors) {
          console.log(errors);
        })
    }
  } // End method
} // End class