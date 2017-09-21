<template>
	<div class="col-sm-10 col-sm-offset-1 form-group">
		<div class="col-sm-8">
			<input type="color" class="form-control" v-on:input="color=$event.target.value" />
		</div><!-- /.col-sm-8 -->

		<div class="col-sm-2">
			<label class="control-label m-t-10" ref="colorName">{{ color }}</label>
		</div>
	</div><!-- /.col-sm-10 col-sm-offset-1 -->
</template>

<script>
	export default {
		name: 'productColor',
		model: {
			prop: 'color',
			event: 'change'
		},
		props: {
			color: String
		}
	}
</script>