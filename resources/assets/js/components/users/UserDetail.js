export default {
	name: 'userDetail',

	data () {
		return {
			user: { },
			message: '',
		}
	},


	mounted () {
		this.getUser();
	},


	methods: {
		getUser () {
			var vm = this;

			var id = this.$route.params.id;
			var url = `/api/v1/users/${id}`;
			axios.get(url)
				.then(function (response) {
					if (typeof response.data.data != 'undefined') {
						vm.user = response.data.data;	
					}else {
						vm.message = response.data.message;
					}
				})
				.catch(function (errors) {
					console.log(errors);
				});
		}
	}
} // End class