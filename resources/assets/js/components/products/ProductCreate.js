import Dropzone from 'vue2-dropzone';
import Recusive from '../shared/Recusive.vue';
import { VueEditor } from 'vue2-editor';
import Multiselect from 'vue-multiselect';
import VueClipboard from 'vue-clipboard2'
import ProductColor from './ProductColor'; 

export default {
	name: 'productCreate',

	components: { Dropzone, Recusive, VueEditor, Multiselect, VueClipboard },

	data () {
		return {
			title: 'Thêm sản phẩm',
			option: `<option value="">Chọn</option>`,
			product: {
				cat_id: ''
			},
			uploadUrl: '/api/v1/products/upload',
			sizes: [],
			colors: [],
			selected: [],
			color_id: '',
		}
	},

	mounted () {
		var vm = this;
		vm.getSizes();
		vm.getColors();
	},

	methods: {
	
		showSuccess (file) {
			console.log("Upload success");
		},

		checkDuplicate (file) {
			console.log(file);
		},

		
		getSizes () {
			var vm = this;
			var url = '/api/v1/sizes';
			axios.get(url).then(function (response) {
				vm.sizes = response.data.data;
			}).catch(function (errors) {
				console.log(errors);
			})
		},

		getColors () {
			var vm = this;
			var url = '/api/v1/colors';
			axios.get(url).then(function (response) {
				vm.colors = response.data.data;
			}).catch(function (errors) {
				console.log(errors);
			})
		}

	}, // Method

	computed: {
		selectAll: {
			get () {
				var vm = this;
				return vm.sizes ? vm.selected.length == vm.sizes.length : false;
			},

			set (value) {
				var vm = this;
				var selected = [];

                if (value) {
                    vm.sizes.forEach(function (size) {
                        selected.push(size.size_id);
                    });
                }

                vm.selected = selected;
			}
		}
	}, // Computed

	directives: {
		rainbow: {
			bind (el, binding, vnode) {
				el.style.color = '#' + Math.random().toString().slice(2, 8);
			}
		},

		theme: {
			bind (el, binding, vnode) {
				
			}
		}
	}
} // End class