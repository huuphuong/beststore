Vue.use(VeeValidate, {
	locale: 'vi'
});

var vm = new Vue({
	el: '#loginBottom',
	data: {
		remail: '',
		rpassword: '',
		rcpassword: '',
		message: '',
		className: false
	},

	methods: {
		validateBeforeSubmit: function() {
	      this.$validator.validateAll().then(function (result) {
	        if (result) {
              return vm.onRegister();
            }else {
            	console.log('Please fill all require fill');
            }
	      });
	    },


		onRegister: function () {
			var vm = this;
			var url = $('base').attr('href') + '/register';
			vm.$http.post(url, {
				email: vm.remail,
				password: vm.rpassword,
				_token: $('meta[name="csrf-token"]').attr('content')
			}).then(function (response) {
				var result = response.data;
				if (result.status == 409) {					
					vm.className = 'alert alert-danger';
					vm.message = result.message;
				}else if (result.status == 201) {
					vm.className = 'alert alert-success';
					vm.message = result.message;
				}
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	} // End method
});