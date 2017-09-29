<template>
	<div class="vconditional">
		<select class="form-control" v-model="enum_data" @change="changeValue">
			<option value="">All</option>
			<option value="1">Yes</option>
			<option value="0">No</option>
		</select>
	</div>
</template>

<script>
	export default {
		name: 'VConditional',

		data () {
			return {
				enum_data: ''
			}
		},

		methods: {
			changeValue () {
				this.$emit('input', { target: { value: this.enum_data } });
			},
		}
	}
</script>