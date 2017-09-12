import Paginate from 'vuejs-paginate'
const queryString = require('query-string');

export default {
	name: 'userList',

	components: { Paginate },

	data () {
		return {
			users: [],
			last_page: 0,
			first_page: 1,
			current_page: 1,
			query: { },
			total: 0,
		}
	},

	mounted () {
		this.getListUser();
	},

	methods: {
		getListUser (currentPage = 1, filterQuery = {}) {
			var vm = this;
			var url = '/api/v1/users?page=' + currentPage + '&' + queryString.stringify(filterQuery);
			axios.get(url).then(function (response) {
				var result      = response.data;
				vm.users        = result.data.users.data;
				vm.last_page    = result.data.users.last_page;
				vm.total        = result.data.total;
				vm.current_page = currentPage;
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		clearPage () {
			var vm = this;
			vm.query = { };
			vm.getListUser(vm.first_page);
		},

		indexNumber (key, limitedRow = 50) {
			if (this.current_page == 1) {
				return key;
			}else {
				return key + (this.current_page-1) * limitedRow;
			}
		}
	}
} // End class