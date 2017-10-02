import Common from '../../Common'

export default {
	name: 'CategoryList',

	data () {
		return {	
			categories: [],
			searchText: '',
		}
	},


	mounted () {
		document.title = 'Category List';
		this.getCategories();
	},

	methods: {
		getCategories () {
			var vm = this;
			var url = baseUrl + 'categories/list';
			axios.get(url).then(function (response) {
				var result = response.data;
				vm.categories = result.data;
				
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		filterCategory () {
		    // Declare variables 
		    var filter, table, tr, td, i;
		    filter = Common.changeToSlug(this.searchText);
		    table = document.getElementById("myTable");
		    tr = table.getElementsByTagName("tr");

			 // Loop through all table rows, and hide those who don't match the search query
			for (i = 0; i < tr.length; i++) {
			  	var td0 = tr[i].getElementsByTagName("td")[0];
			  	var td1 = tr[i].getElementsByTagName("td")[1];
			  	var td2 = tr[i].getElementsByTagName("td")[2];
			  	var td3 = tr[i].getElementsByTagName("td")[3];
			  	var td4 = tr[i].getElementsByTagName("td")[4];
			  	var td5 = tr[i].getElementsByTagName("td")[5];
			  	if (td0 || td1 || td2 || td3 || td4 || td5) {
			  		if (
			  			Common.changeToSlug(td0.innerHTML).indexOf(filter) > -1 ||
			  			Common.changeToSlug(td1.innerHTML).indexOf(filter) > -1 ||
			  			Common.changeToSlug(td2.innerHTML).indexOf(filter) > -1 ||
			  			Common.changeToSlug(td3.innerHTML).indexOf(filter) > -1 ||
			  			Common.changeToSlug(td4.innerHTML).indexOf(filter) > -1 ||
			  			Common.changeToSlug(td5.innerHTML).indexOf(filter) > -1
			  		) 
			  		{
			  			tr[i].style.display = "";
			  		} else {
			  			tr[i].style.display = "none";
			  		}
			  	} 
			}
		},


		clearFilter () 
		{
			var vm = this;
			vm.searchText = '';
			vm.filterCategory();
		}
	}

} // End class