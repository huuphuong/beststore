export default {
	name: 'CurrentUser',

	data () {
		return {

		}
	},


	mounted () {
		this.getCurrentUser();
	},


	methods: {
		getCurrentUser () {
			var vm = this;
			var url = baseUrl + 'authUser';
			var user_data = $('meta[name="authors"]').attr('content');
			axios.post(url, {
				user_data: user_data
			}).then(function (response) {
				var result = response.data;
				var storageUser = {
					user_id: result.id,
					user_name: result.name,
					user_email: result.email,
					user_role: result.role
				};
				sessionStorage.user = JSON.stringify(storageUser);
			}).catch(function (errors) {
				window.location.href = '/';
			});
		}
	}
} // End class