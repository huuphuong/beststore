import Common from '../../Common';

export default {
	name: 'VendorList',

	data () {
		return {
			vendors: []
		}
	},

	mounted () {
		document.title = 'List Vendor';
		this.getVendors();
	},


	methods: {
		getVendors () {
			var vm = this;
			var url = baseUrl + 'vendors';

			axios.get(url).then(function (response) {
				vm.vendors = response.data.data;
				console.log(vm.vendors);
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		removeVendor (vendorId, key) {
			var url = baseUrl + 'vendors/' + vendorId;
			var vm = this;

			var confirmDelete = confirm('Do you want delete this vendor?');
			if (confirmDelete) {
				axios.delete(url).then(function (response) {
					var result = response.data;
					Common.setToast(result.message, result.status);
					if (result.status == Common.statusCode._CREATED)
					{
						vm.vendors.splice(key, 1);
					}
				}).catch(function (errors) {
					console.log(errors);
				});
			}
		}
	} // End class

} // End class