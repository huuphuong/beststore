export default {
	name: 'productCreate',

	data () {
		return {
			option: `<option value="">Chọn</option>`,
			product: {
				cat_id: ''
			}
		}
	},

	mounted () {
		var vm = this;
		var data = [
			{ id: 1, title: 'Quần', parent_id: 0 }, 
			{ id: 2, title: 'Quần thun', parent_id: 1 },
			{ id: 3, title: 'Quần âu', parent_id: 1 },
			{ id: 4, title: 'Quần thể thao', parent_id: 2 },
			{ id: 5, title: 'Áo', parent_id: 0 },
			{ id: 6, title: 'Áo sơ mi', parent_id: 5 },
			{ id: 7, title: 'Đai lưng', parent_id: 0 },
		];

		vm.category(data);
	},

	methods: {
		category (data, parent = 0, string = '---|', select=0) {
			var vm = this;
			for (var value of data) {
				if (value.parent_id == parent) {
					var id = value.id;
					var name = value.title;

					if(select != 0 && select== id){
						vm.option += `<option value="${id}" selected='selected'>${string} ${name}</option>`; 
					}else {
						vm.option += `<option value="${id}">${string} ${name}</option>`;
					}
					
					vm.category (data, id, string + '---|', select);
				}
			}
		},
	} // Method
} // End class