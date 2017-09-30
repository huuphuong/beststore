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
				var url = '/api/v1/categories';
				axios.get(url).then(function (response) {
					vm.cat_id = response.data.data;
				}).catch(function (errors) {
					console.log(errors)
				});
			},
		}// End method
	}
</script>