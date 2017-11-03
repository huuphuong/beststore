<template>
  <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Tạo quyền</h3>
      </div>

      <form autocomplete="off" method="POST" v-on:submit.prevent="validateBeforeSubmit">
      <div class="panel-body">
        <div class="form-group">
          <label for="role_name">Tên quyền:</label>
          <input type="text" :class="{'form-control': true}" name="postBody.role_name" v-validate="'required'" data-vv-as="Tên nhóm người dùng" v-model="postBody.role_name">
          <span class="label label-danger" v-show="errors.has('postBody.role_name')">{{ errors.first('postBody.role_name') }}</span>
        </div>
        <div class="form-group">
          <label for="role_desc">Ghi chú (không bắt buộc):</label>
          <input type="text" class="form-control" v-model="postBody.role_desc">
        </div>
      </div>
      <div class="panel-footer">
        <button type="reset" class="btn btn-default">Hủy bỏ</button>
        <button type="submit" class="btn btn-primary">Tạo quyền</button>
      </div>
      <!-- /.panel-footer -->
    </form>
  </div>
</template>

<script src="./RoleCreate.js"></script>