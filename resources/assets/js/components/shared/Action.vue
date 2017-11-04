<template>
	<router-link :to="{name: actionRoute, params: {actionsParams}}">
		<a class="btn btn-default">
			<span v-bind:class="actionIcon"></span>
			{{ actionText }}
		</a>
	</router-link>
</template>

<script>
	export default {
		name: 'action',
		props: ['actionText', 'actionIcon', 'actionRoute', 'actionsParams']
	}
</script>