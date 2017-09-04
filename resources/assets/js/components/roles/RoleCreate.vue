<template>
  <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Create Role</h3>
      </div>

      <form autocomplete="off" method="POST" v-on:submit.prevent="onSubmit">
      <div class="panel-body">
        <div class="form-group">
          <label for="">Role name:</label>
          <input type="text" class="form-control" v-model="postBody.role_name">
        </div>
        <div class="form-group">
          <label for="">Description (optional):</label>
          <input type="text" class="form-control" v-model="postBody.role_desc">
        </div>
      </div>
      <div class="panel-footer">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Add Role</button>
      </div>
      <!-- /.panel-footer -->
    </form>
  </div>
</template>


<script>
  export default {
  	name: 'roleCreate',

  	data: function () {
  		return {
  			postBody: {
  				role_name: '',
  				role_desc: ''
  			}
  		}
  	},

  	mounted: function () {
  		console.log("Role create is mouted");
  	},

  	methods: {
  		onSubmit: function () {
  			var vm = this
  			let url = `/api/roles`

  			axios.post(url, {
  				body: vm.postBody
  			})
  			.then(function (response) {

  			})
  			.catch(function (errors) {

  			})
  		}
  	}
  }
</script>