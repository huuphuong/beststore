<template>
	<div id="root">
		<select class="form-control" v-html="cat_id" @change="changeValue" v-model="cate">
			
		</select>
	</div>
</template>

<script>
	export default {
		name: 'recusive',
		// props: ['value'],

		data () {
			return {
				cat_id: '',
				cate: '',
			}
		},


		mounted () {
			var vm = this;
			vm.getCategories();
			
		},


		methods: {
			changeValue () {
				this.$emit('input', this.cate)
			},


			getCategories () {
				var vm = this;
				let param = typeof vm.$route.params.id != 'undefined' ? vm.$route.params.id : '';
				var url = '/api/v1/categories?cat=' + param;
				axios.get(url).then(function (response) {
					vm.cat_id = response.data.data;
					if (param.length && response.data.parent_cat_id > 0)
					{
						vm.cate = response.data.parent_cat_id;
					}
				}).catch(function (errors) {
					console.log(errors)
				});
			},
		}// End method
	}
</script>