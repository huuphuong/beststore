<template>
	<div id="root">
		<select class="form-control">
			<option value="">{{ first }}</option>
			<option v-for="(value, key) in listData" v-bind:value="value.textid">
				{{ value.textname }}
			</option>
		</select>
	</div>
</template>

<script>
	export default {
		name: 'SelectOption',
		props: ['first', 'listData'],

		data () {
			return {
				cat_id: '',
				cate: '',
			}
		},


		mounted () {
			var vm = this;
			
		}
	}
</script>