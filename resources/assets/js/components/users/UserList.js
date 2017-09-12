import Paginate from 'vuejs-paginate'

export default {
	name: 'userList',

	components: { Paginate },

	data () {
		return {
			users: [],
			last_page: null,
			query: { }
		}
	},

	mounted () {
		this.getListUser();
	},

	methods: {
		getListUser () {
			var vm = this;
			var url = '/api/v1/users';
			axios.get(url).then(function (response) {
				var result = response.data;
				vm.users = result.data.data;
				vm.last_page = result.data.last_page;
				console.log(vm.users);
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	}
} // End class