import Dropzone from 'vue2-dropzone'
import Recusive from '../shared/Recusive.vue';
import { VueEditor } from 'vue2-editor'

export default {
	name: 'productCreate',

	components: { Dropzone, Recusive, VueEditor },

	data () {
		return {
			title: 'Thêm sản phẩm',
			option: `<option value="">Chọn</option>`,
			product: {
				cat_id: ''
			},
			uploadUrl: '/api/v1/products/upload',
			sizes: [],
			input: [{class: 'jscolor form-control', value: null}],
			colors: {}
		}
	},

	mounted () {
		var vm = this;
		// var data = [
		// 	{ id: 1, title: 'Quần', parent_id: 0 },
		// 	{ id: 2, title: 'Quần thun', parent_id: 1 },
		// 	{ id: 3, title: 'Quần âu', parent_id: 1 },
		// 	{ id: 4, title: 'Quần thể thao', parent_id: 2 },
		// 	{ id: 5, title: 'Áo', parent_id: 0 },
		// 	{ id: 6, title: 'Áo sơ mi', parent_id: 5 },
		// 	{ id: 7, title: 'Đai lưng', parent_id: 0 },
		// ];

		// vm.clear();

		// vm.category(data);
		vm.getSizes()
	},

	methods: {
		updateValue () {

		},

		clear () {
			var vm = this;
			console.log(vm.$refs);
		},

		showSuccess (file) {
			console.log("Upload success");
		},

		checkDuplicate (file) {
			console.log(file);
		},

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

		getSizes () {
			var vm = this;
			var url = '/api/v1/sizes';
			axios.get(url).then(function (response) {
				vm.sizes = response.data.data;
			}).catch(function (errors) {

			})
		},

		addColorInput (input) {
			this.input.push({class: 'jscolor form-control', value: null});
		},

		removeColorInput (key) {
			this.input.splice(key, 1);
		},

		changeColor (index, value) {
			this.input[index].value = this.colors;
		}
	}, // Method
} // End class