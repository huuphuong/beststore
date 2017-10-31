Vue.use(VeeValidate, {
	locale: 'vi'
});

// REGISTER
var vm = new Vue({
	el: '#loginBottom',
	data: {
		remail: '',
		rpassword: '',
		rcpassword: '',
		message: '',
		className: false,
	},

	methods: {
		validateBeforeSubmit: function() {
			var self = this;
			this.$validator.validateAll().then(function (result) {
				if (result) {
					return self.onRegister();
				}else {
					console.log('Please fill all require fill');
				}
			});
		},


		onRegister: function () {
			var self = this;
			var url = $('base').attr('href') + '/register';
			self.$http.post(url, {
				email: self.remail,
				password: self.rpassword,
				_token: $('meta[name="csrf-token"]').attr('content')
			}).then(function (response) {
				var result = response.data;
				if (result.status == 409) {					
					self.className = 'alert alert-danger';
					self.message = result.message;
				}else if (result.status == 201) {
					self.className = 'alert alert-success';
					self.message = result.message;
				}
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	} // End method
});


// LOGIN
var login = new Vue({
	el: '#loginRight',
	data: {
		lemail: '',
		lpassword: '',
		lremember_me: 1
	},

	methods: {
		validateBeforeSubmit: function() {
			var self = this;
			this.$validator.validateAll().then(function (result) {
				if (result) {
					return self.onLogin();
				}else {
					console.log('Please fill all require fill');
				}
			});
		},


		onLogin: function () {
			var self = this;
			var url = $('base').attr('href') + '/signin';
			self.$http.post(url, {
				email: self.lemail,
				password: self.lpassword,
				lremember_me: self.lremember_me,
				_token: $('meta[name="csrf-token"]').attr('content')
			}).then(function (response) {
				var result = response.data;
				if (result.status == 200) {
					location.reload();
				}
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		toogleCheck: function () {
			this.lremember_me = !this.lremember_me;
		}
	} // End method
});