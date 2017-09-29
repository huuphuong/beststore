<template>
	<div id="root">
		<select class="form-control" v-model="option" @change="changeValue">
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
				option: '',
			}
		},


		mounted () {
			var vm = this;
		},


		methods: {
			changeValue () {
				this.$emit('input', { target: { value: this.option } });
			},
		}
	}
</script>