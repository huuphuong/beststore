var vm = new Vue({
	el: '#subscribeForm',
	data: {
		sub_email: '',
		message: '',
	},

	methods: {
		subscribe: function () {
			if (! this.sub_email) {
				this.message = 'Mời bạn nhập email'
			}else if (! this.validateEmail (this.sub_email) ) {
				this.message = 'Email không đúng định dạng';
			}else {
				this.message = '';

				// Gửi yêu cầu subscribe
				var url = $('base').attr('href') + '/subscribe';
				this.$http.post(url, {
					email: this.sub_email,
					_token: $('meta[name="csrf-token"]').attr('content')
				}).then(function (response) {
					if (response.data == 'success')
					{
						alert('Xin cảm ơn quý khách đã ủng hộ shop');
						this.sub_email = '';
					}
				}).catch(function (errors) {
					console.log(errors);
				});
			}
		},

		validateEmail: function (email) {
		    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		    return re.test(email);
		}
	}
});