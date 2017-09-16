<template>
	<div id="root">
		<select id="inputV-Model=" class="form-control" v-html="options">
		</select>
	</div>
</template>

<script>
	export default {
		name: 'recusive',
		props: ['options']
	}
</script>