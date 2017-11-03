import Common from '../../Common';

export default {
	name: 'CategoryDetail',

	data () {
		return {
			category: null,
			message : '',
		}
	},


	mounted () {
		document.title = 'Chi tiết danh mục';
		this.getCategory();
	},


	methods: {
		getCategory() {
			var vm = this;
			var id = vm.$route.params.id;
			var url = baseUrl + 'categories/' + id;
			axios.get(url).then(function (response) {
				var result = response.data;
				if (result.status == Common.statusCode._OK)
				{
					vm.category = result.data;
				}else {
					vm.message = result.message;
				}
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	}
} // End class